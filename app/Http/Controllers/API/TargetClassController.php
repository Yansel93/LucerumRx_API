<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\TargetClass;
use Illuminate\Http\Request;

class TargetClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $targetClass = TargetClass::all();
        return $targetClass;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $targetClass = new TargetClass();
        $targetClass->name        = $request->name;
        $targetClass->save();

        return response()->json([
            "success" => true,
            "targetClass" => $targetClass->id,
            "msg"   => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TargetClass $targetClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $targetClass = TargetClass::findorfail($request->target);
        $targetClass->name        = $request->name;
        $targetClass->save();

        return response()->json([
            "success" => true,
            "targetClass" => $targetClass->id,
            "msg"   => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $targetClass = TargetClass::findorfail($request->target);
        $targetClass->is_deleted        = true;
        $targetClass->save();

        return response()->json([
            "success" => true,
            "targetClass" => $targetClass->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
