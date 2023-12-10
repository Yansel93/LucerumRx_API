<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExperimentalCondition;
use App\Http\Requests\StoreExperimentalConditionRequest;
use App\Http\Requests\UpdateExperimentalConditionRequest;
use Illuminate\Http\Request;

class ExperimentalConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experimental = ExperimentalCondition::all();
        return $experimental;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $experimental  = new ExperimentalCondition();
        $experimental->dosage_id    = $request->dosageid;
        $experimental->study_id     = $request->studyid;
        $experimental->timepoint_id = $request->timepointid;
        $experimental->group_id     = $request->groupid;
        $experimental->save();

        return response()->json([
            "success"       => true,
            "experimental" => $experimental->id,
            "msg"           => "Created successfully"
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(ExperimentalCondition $experimentalCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $experimental  = ExperimentalCondition::findorfail($request->experimental);
        $experimental->dosage_id    = $request->dosageid;
        $experimental->study_id     = $request->studyid;
        $experimental->timepoint_id = $request->timepointid;
        $experimental->group_id     = $request->groupid;
        $experimental->save();

        return response()->json([
            "success"       => true,
            "experimental" => $experimental->id,
            "msg"           => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $experimental  = ExperimentalCondition::findorfail($request->experimental);
        $experimental->is_deleted = true;
        $experimental->save();

        return response()->json([
            "success"       => true,
            "experimental" => $experimental->id,
            "msg"           => "Deleted successfully"
        ], 200);
    }
}
