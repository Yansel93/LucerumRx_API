<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CompoundClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompoundClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compound = CompoundClass::all();
        return $compound;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compound = new CompoundClass();
        $compound->name = $request->name;
        $compound->uid = Hash::make($request->name);        
        $compound->save();

        return response()->json([
            "success" => true,
            "compound" => $compound->id,
            "msg"       => "Created Successfully"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CompoundClass $compoundClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $compound = CompoundClass::findorfail($request->compoundClass);
        $compound->name = $request->name;
        $compound->uid = Hash::make($request->name);        
        $compound->save();

        return response()->json([
            "success" => true,
            "compound" => $compound->id,
            "msg"       => "Update Successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $compound = CompoundClass::findorfail($request->compoundClass);
        $compound->is_deleted = true;
        $compound->save();

        return response()->json([
            "success" => true,
            "compound" => $compound->id,
            "msg"       => "Deleted Successfully"
        ]);
    }
}
