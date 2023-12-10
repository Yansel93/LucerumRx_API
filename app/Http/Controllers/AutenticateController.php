<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;
use Tymon\JWTAuth\Facades\JWTAuth as FacadesJWTAuth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class AutenticateController extends Controller
{
    /**Autenticacion de usuario */
    public function authenticate(Request $request)
    {
        $user = User::Where('username',$request->username)->first();
        if($user->verified == true){
            $credentials = $request->only('username', 'password');
            try {
                if (! $token = FacadesJWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials'], 400);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
            return response()->json(compact('token'));
        }
        return response()->json([
            'res' => "error",
            "msg" => "user not verified"
        ], 400);
    }

    /**Registro de usuarios */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'username'  => 'required|string|max:255|unique:users,username',
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'role'      => 'nullable|integer',
            'dob'       => 'nullable',
            'password'  => 'required|string|min:6|confirmed', 
            'createdby' => 'nullable|integer', 
            'company_id'=> 'required|integer', 
            'email' => 'required|email|max:255|unique:emails,email',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(),400);
        }

        $user = new User();
        $user->name         = $request->get('name');
        $user->username     = $request->get('username');
        $user->firstname    = $request->get('firstname');
        $user->lastname     = $request->get('lastname');
        $user->password     = Hash::make($request->get('password'));
        $user->uid          = Crypt::encryptString($request->get('name').$request->get('firstname').$request->get('lastname'));
        $user->role         = $request->get('role');
        $user->company_id   = $request->get('company_id');
        $user->dob          = $request->get('dob');
        $user->createdby    = $request->get('createdby');
        $user->save();

        $email = new Email();
        $email->user_id = $user->id;
        $email->email = $request->get('email');
        $email->verificationcode = Hash::make(random_int(1,999999));
        $now = Carbon::now();
        $email->expirydate =Carbon::create($now->year, $now->month, $now->day,$now->hour,$now->minute,$now->second)->addMinutes(10);
        $email->save();

        // $token = JWTAuth::fromUser($user);

        return response()->json(compact('user'),201);
    }


    public function Logout(Request $request){
        auth()->logout();
        return response()->json([
            'res' => true,
            'success' => 'Deleted token correctly'
        ], 200);
    }
}
