<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\GeneticallyModifiedType;
use App\Http\Requests\StoreGeneticallyModifiedTypeRequest;
use App\Http\Requests\UpdateGeneticallyModifiedTypeRequest;
use Illuminate\Http\Request;

class GeneticallyModifiedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genetically = GeneticallyModifiedType::all();
        return $genetically;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genetically = new GeneticallyModifiedType();
        $genetically->name = $request->name;
        $genetically->save();

        return response()->json([
            "success" => true,
            "genetically" => $genetically,
            "msg" => "created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneticallyModifiedType $geneticallyModifiedType)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $genetically = GeneticallyModifiedType::findorfail($request->genetically);
        $genetically->name = $request->name;
        $genetically->save();

        return response()->json([
            "success" => true,
            "genetically" => $genetically,
            "msg" => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $genetically = GeneticallyModifiedType::findorfail($request->genetically);
        $genetically->is_deleted = true;
        $genetically->save();

        return response()->json([
            "success" => true,
            "genetically" => $genetically,
            "msg" => "Deleted successfully"
        ], 200);
    }
}
