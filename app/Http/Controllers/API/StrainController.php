<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Strain;
use Illuminate\Http\Request;

class StrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $strain = Strain::all();
        return $strain;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $strain = new Strain();
        $strain->name        = $request->name;
        $strain->save();

        return response()->json([
            "success" => true,
            "strain" => $strain->id,
            "msg"   => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Strain $strain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $strain = Strain::findorfail($request->strain);
        $strain->name        = $request->name;
        $strain->save();

        return response()->json([
            "success" => true,
            "strain" => $strain->id,
            "msg"   => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $strain = Strain::findorfail($request->strain);
        $strain->is_deleted        =true;
        $strain->save();

        return response()->json([
            "success" => true,
            "strain" => $strain->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
