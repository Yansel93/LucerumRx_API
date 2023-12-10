<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TimePoint;
use Illuminate\Http\Request;

class TimePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $timePoint = TimePoint::with('Users','Company')->get();
        $timePoint = TimePoint::get();
        return $timePoint;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $timePoint = new TimePoint();
        $timePoint->name        = $request->name;
        $timePoint->study_id    = $request->studyid;
        $timePoint->ownercompany = $request->ownercompany;
        $timePoint->save();

        return response()->json([
            "success"   => true,
            "id"        => $timePoint->id,
            "msg"       => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TimePoint $timePoint)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $timePoint = TimePoint::findorfail($request->timepoint);
        $timePoint->name    = $request->name;
        $timePoint->study_id = $request->studyid;
        $timePoint->ownercompany = $request->ownercompany;
        $timePoint->save();

        return response()->json([
            "success"   => true,
            "id"        => $timePoint->id,
            "msg"       => "Updated successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $timePoint = TimePoint::findorfail($request->timepoint);
        $timePoint->is_deleted = true;
        $timePoint->save();

        return response()->json([
            "id"        => $timePoint->id,
        ], 200);
    }
}
