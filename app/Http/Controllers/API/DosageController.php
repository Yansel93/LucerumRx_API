<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dosage;
use Illuminate\Http\Request;

class DosageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosage = Dosage::all();
        return $dosage;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dosage = new Dosage();
        $dosage->name       = $request->name;
        $dosage->study_id    = $request->studyid;
        $dosage->route_id   = $request->routeid;
        $dosage->compound_id = $request->compoundid;
        $dosage->level      = $request->level;
        $dosage->save();

        return response()->json([
            "success" => true,
            "dosage" => $dosage->id,
            "msg"   => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $dosage = Dosage::find($request->dosage);
        return response()->json([
            "success" => true,
            "dosage" => $dosage
        ], 200);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dosage = Dosage::findorfail($request->dosage);
        $dosage->name       = $request->name;
        $dosage->study_id    = $request->studyid;
        $dosage->route_id   = $request->routeid;
        $dosage->compound_id = $request->compoundid;
        $dosage->level      = $request->level;
        $dosage->save();

        return response()->json([
            "success" => true,
            "dosage" => $dosage->id,
            "msg"   => "Update successfully"
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $dosage = Dosage::findorfail($request->dosage);
        $dosage->is_deleted       = true;
        $dosage->save();

        return response()->json([
            "success" => true,
            "dosage" => $dosage->id,
            "msg"   => "Deleted successfully"
        ] , 200);
    }
}
