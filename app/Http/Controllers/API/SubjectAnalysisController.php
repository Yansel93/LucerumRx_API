<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SubjectAnalysis;
use App\Http\Requests\StoreSubjectAnalysisRequest;
use App\Http\Requests\UpdateSubjectAnalysisRequest;
use Illuminate\Http\Request;

class SubjectAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $subject = SubjectAnalysis::all();
        return $subject;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject = new SubjectAnalysis();
        $subject->study_id      = $request->studyid;
        $subject->studyversion  = $request->studyversion;
        $subject->subject_id    = $request->subjectid;
        $subject->invalid       = $request->invalid;
        $subject->filepath      = $request->filepath;
        $subject->createdby     = $request->createdby;
        $subject->ownercompany  = $request->ownercompany;
        $subject->lastupdatedby = $request->lastupdatedby;
        $subject->save();
        return response()->json([
            "success" => true,
            "SubjectAnalysis" => $subject->id,
            "msg" => "SubjectAnalysis saved successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $subject = new SubjectAnalysis($request->subjectanalysi);
        $subject->study_id      = $request->study_id;
        $subject->studyversion  = $request->studyversion;
        $subject->subject_id    = $request->subject_id;
        $subject->invalid       = $request->invalid;
        $subject->filepath      = $request->filepath;
        $subject->createdby     = $request->createdby;
        $subject->ownercompany  = $request->ownercompany;
        $subject->lastupdatedby = $request->lastupdatedby;
        $subject->save();
        return response()->json([
            "success" => true,
            "SubjectAnalysis" => $subject->id,
            "msg" => "SubjectAnalysis updated successfully"
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $subject = SubjectAnalysis::findorfail($request->subjectanalysi);
        $subject->is_deleted        = true;
        $subject->save();

        return response()->json([
            "success" => true,
            "SubjectAnalysis" => $subject->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
    
}
