<?php

namespace App\Http\Controllers\API;
use  App\Http\Controllers\Controller;
use App\Models\StudyType;
use App\Http\Requests\UpdateStudyTypeRequest;
use Illuminate\Http\Request;

class StudyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studyType = StudyType::all();
        return $studyType;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $studyType = new StudyType();
        $studyType->name = $request->name;
        $studyType->save();

        return response()->json([
            "success" => true,
            "studyType" => $studyType->id,
            "msg" => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudyType $studyType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $studyType = StudyType::findorfail($request->studytype);
        $studyType->name = $request->name;
        $studyType->save();

        return response()->json([
            "success" => true,
            "studyType" => $studyType->id,
            "msg" => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $studyType = StudyType::findorfail($request->studytype);
        $studyType->is_deleted = true;
        $studyType->save();

        return response()->json([
            "success" => true,
            "studyType" => $studyType->id,
            "msg" => "Deleted successfully"
        ], 200);
    }
}
