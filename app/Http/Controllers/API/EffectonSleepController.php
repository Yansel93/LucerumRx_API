<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EffectonSleep;
use Illuminate\Http\Request;

class EffectonSleepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $effectonSleep = EffectonSleep::all();
        return $effectonSleep;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $effectonSleep = new EffectonSleep();
        $effectonSleep->name = $request->name;
        $effectonSleep->save();

        return response()->json([
            "success" => true,
            "effectonSleep" => $effectonSleep->id,
            "msg" => "Created successfully"
        ] , 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $effectonSleep = EffectonSleep::findorfail($request->effectionsleep);
        return response()->json([
            "success" => true,
            "effectonSleep" => $effectonSleep
        ], 200);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $effectonSleep = EffectonSleep::findorfail($request->effectionsleep);
        $effectonSleep->name = $request->name;
        $effectonSleep->save();

        return response()->json([
            "success" => true,
            "effectonSleep" => $effectonSleep->id,
            "msg" => "Update successfully"
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $effectonSleep = EffectonSleep::findorfail($request->effectionsleep);
        $effectonSleep->is_deleted = true;
        $effectonSleep->save();

        return response()->json([
            "success" => true,
            "effectonSleep" => $effectonSleep,
            "msg" => "Delete successfully"
        ] , 200);
    }
}
