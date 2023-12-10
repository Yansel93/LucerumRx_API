<?php

namespace App\Http\Controllers;

use App\Models\FileTest;
use App\Http\Requests\StoreFileTestRequest;
use App\Http\Requests\UpdateFileTestRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileTestController extends Controller
{
    /**
     * UpLoad files Dicoms
     */
    public function upLoad_file(Request $request)
    {
        $tp = new FileTest();

            $tp->study_id = $request->studyid;
            $tp->file = $request->file('file')->getClientOriginalName();
            $tp->path = $request->file('file')->storeAs('Files',  $tp->file, 'public');
            $tp->save();
            return response()->json(['path' => $tp->file,"msg"   => "archivo subido correctamente" ]);                               
    }

    /**
     * Download Dicoms
     */
    public function download(Request $request)
    {
        $tps = FileTest::Where('study_id',$request->id)->first();
        //$tps = FileTest::Where('study_id',$request->id)->get();
        
        if($tps)
        {
            $pathToFile = Storage::path('public/Files/' . $tps->file);
            $fileSize = Storage::disk('public')->size('Files/' . $tps->file);
            $headers = [
                'Content-Type' => 'application/json',
                'file_name' => 'attachment; filename="' . $tps->file . '"',
                'file_size' => $fileSize * 8,                
            ];
            
            return response()->download($pathToFile, $tps->file,$headers);
        }

    }
        
}
