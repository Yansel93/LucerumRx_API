<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\CompoundSubclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompoundSubclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compoundSubclass = CompoundSubclass::all();
        return $compoundSubclass;
        
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compoundSubclass = new CompoundSubclass();
        $compoundSubclass->name = $request->name;
        $compoundSubclass->uid = Hash::make($request->name);
        $compoundSubclass->save();

        return response()->json([
            "success"   => true,
            "compound"  => $compoundSubclass->id,
            "msg"       => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $compoundSubclass = CompoundSubclass::find($request->compoundsubclass);
        return response()->json([
            "success" => true,
            "compound" => $compoundSubclass
        ], 200);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $compoundSubclass = CompoundSubclass::findorfail($request->compoundsubclass);
        $compoundSubclass->name = $request->name;
        $compoundSubclass->uid = Hash::make($request->name);
        $compoundSubclass->save();

        return response()->json([
            "success"   => true,
            "compound"  => $compoundSubclass->id,
            "msg"       => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $compoundSubclass = CompoundSubclass::findorfail($request->compoundsubclass);
        $compoundSubclass->is_deleted = true;
        $compoundSubclass->save();

        return response()->json([
            "success"   => true,
            "compound"  => $compoundSubclass->id,
            "msg"       => "Deleted successfully"
        ], 200);
    }
}
