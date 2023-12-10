<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AnalysisRequest;
use Illuminate\Http\Request;

class AnalysisRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $analysis = AnalysisRequest::all();
        return $analysis;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $analysis = new AnalysisRequest();
        $analysis->study_id         = $request->study_id;
        $analysis->studyversion     = $request->studyversion;
        $analysis->countryoforigin  = $request->countryoforigin;
        $analysis->invalid          = $request->invalid;
        $analysis->notes            = $request->notes;
        $analysis->createdby        = $request->createdby;
        $analysis->ownercompany     = $request->ownercompany;
        $analysis->lastupdatedby    = $request->lastupdatedby;
        $analysis->save();

        return response()->json([
            "success" => true,
            "AnalysisRequest" => $analysis->id,
            "msg" => "AnalysisRequest created correctly"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(AnalysisRequest $analysisrequest)
    {
        return $analysisrequest;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $analysis = AnalysisRequest::findorfail($request->analysisrequest);
        $analysis->study_id         = $request->study_id;
        $analysis->studyversion     = $request->studyversion;
        $analysis->countryoforigin  = $request->countryoforigin;
        $analysis->invalid          = $request->invalid;
        $analysis->notes            = $request->notes;
        $analysis->createdby        = $request->createdby;
        $analysis->ownercompany     = $request->ownercompany;
        $analysis->lastupdatedby    = $request->lastupdatedby;
        $analysis->save();

        return response()->json([
            "success" => true,
            "AnalysisRequest" => $analysis->id,
            "msg" => "AnalysisRequest updated correctly"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $analysis = AnalysisRequest::findorfail($request->analysisrequest);
        $analysis->is_deleted        = true;
        $analysis->save();

        return response()->json([
            "success" => true,
            "AnalysisRequest" => $analysis->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
