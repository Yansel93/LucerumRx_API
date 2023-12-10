<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use App\Http\Resources\SendExpirytCodeResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class EmailController extends Controller
{
    /**
     * funcion para enviar un nuevo codigo 
     * cuando este alla vencido 
     */
    public function SendExpirytCode(Request $request){
        $username   = $request->get('username');
        $email      = $request->get('email');
        /*Chequeo que existe el usuario*/
        $user = User::Where('username',$username)->first();
        if (!$user) {
                    return response()->json([
                        "res" => "error",
                        "msg" => "user not found",
                    ], 404);
        }
        /*Chequeo que existe el email*/
        $email = Email::Where('user_id',$user->id)->Where('email',$email)->first();
        if (!$email) {
            return response()->json([
                "res" => "error",
                "msg" => "email not found",
            ], 404);
        }
        /*Asignar el nuevo código */
        // $hashedCode = hash('sha256', random_int(1, 999999));
        $email->verificationcode = Crypt::encryptString(random_int(1, 999999));
        $email->save();

        return response()->json([
            "msg"   => "verification code sent",
            "data"  => new SendExpirytCodeResource($email)
        ]);
    }

        
    /**
     * Funcion para verificar el codigo 
     */
    public function VerifyEmailCode(Request $request){
        $code = $request->code;
        $email= Email::Where('email',$request->email)->first();
        /**Compruebo si existe un email valido */
        if(!$email){
            return response()->json([
                "res" => "error",
                "msg" => "email not found",
            ], 404);
        }
        /**Compruebo que el email ya este verificado previamente*/
        if($email->verified ==  true){
            return response()->json([
                "res" => "error",
                "msg" => "The email is already verified",
            ], 404);
        }
        /**Compruebo que el codigo no halla expirado */
        $now = Carbon::now();
        $created = Carbon::parse($email->created_at);
        //$expiryDate = Carbon::parse($email->expirydate);
        $minutes = $now->diffInMinutes($created);
        if($minutes > 10){
            return response()->json([
                "res" => "error",
                "msg" => "code expired",
            ], 400);
        }
        if (password_verify($code,$email->verificationcode) && $minutes <= 10){
            $user = User::findorfail($email->user_id);
            $email->verified = true;  
            $user->verified = true;
            $email->save();  
            $user->save();
            return response()->json([
                "res" => "success",
                "msg" => "verified code",
            ], 200);
        }
        return response()->json([
            "res" => "error",
            "msg" => "unverified code",
        ], 400);
    }
    
}
