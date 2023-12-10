<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\ResultFiles;
use App\Http\Requests\StoreResultFilesRequest;
use App\Http\Requests\UpdateResultFilesRequest;
use Illuminate\Http\Request;

class ResultFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultFiles = ResultFiles::all();
        return $resultFiles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resultFiles = new ResultFiles();
        $resultFiles->study_id = $request->studyid;
        $resultFiles->filePath = $request->filePath;
        $resultFiles->save();

        return response()->json([
            "success" => true,
            "resultFiles" => $resultFiles->id,
            "msg" => "created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ResultFiles $resultFiles)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $resultFiles = ResultFiles::findorfail($request->result);
        $resultFiles->study_id = $request->studyid;
        $resultFiles->filePath = $request->filePath;
        $resultFiles->save();

        return response()->json([
            "success" => true,
            "resultFiles" => $resultFiles->id,
            "msg" => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $resultFiles = ResultFiles::findorfail($request->result);
        $resultFiles->is_deleted = true;
        $resultFiles->save();

        return response()->json([
            "success" => true,
            "resultFiles" => $resultFiles->id,
            "msg" => "Deleted successfully"
        ], 200);
    }
}
