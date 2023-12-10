<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Target;
use App\Http\Requests\StoreTargetRequest;
use App\Http\Requests\UpdateTargetRequest;
use Illuminate\Http\Request;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $target = Target::all();
        return $target;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $target = new Target();
        $target->name       = $request->name;
        $target->accession  = $request->accession;
        $target->targetclass_id  = $request->targetclassid;
        $target->swissprotid    = $request->swissprotid;
        $target->organism       = $request->organism;
        $target->gene           = $request->gene;
        $target->save();

        return response()->json([
            "success" => true,
            "targetclass" => $target->target->id,
            "msg"   => "Created successfully"
        ], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Target $target)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $target = Target::findorfail($request->target);
        $target->name       = $request->name;
        $target->name       = $request->name;
        $target->accession  = $request->accession;
        $target->targetclass_id  = $request->targetclassid;
        $target->swissprotid    = $request->swissprotid;
        $target->organism       = $request->organism;
        $target->gene           = $request->gene;
        $target->save();

        return response()->json([
            "success" => true,
            "targetclass" => $target->target->id,
            "msg"   => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $target = Target::findorfail($request->target);
        $target->is_deleted       = true;
        $target->save();

        return response()->json([
            "success" => true,
            "targetclass" => $target->target->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
