<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\DoseRoute;
use Illuminate\Http\Request;

class DoseRouteController extends Controller
{

    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doseRoute = DoseRoute::all();
        return $doseRoute;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doseRoute = new DoseRoute();
        $doseRoute->name = $request->name;
        $doseRoute->save();

        return response()->json([
            "success" => true,
            "doseRoute" => $doseRoute->id,
            "msg"   => "Created successfully"
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $doseRoute = DoseRoute::find($request->dosageroute);
        return response()->json([
            "success" => true,
            "doseRoute" => $doseRoute
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        $doseRoute = DoseRoute::find($request->dosageroute);
        $doseRoute->name = $request->name;
        $doseRoute->save();

        return response()->json([
            "success" => true,
            "doseRoute" => $doseRoute->id,
            "msg"   => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $doseRoute = DoseRoute::findorfail($request->dosageroute);
        $doseRoute->is_deleted = true;
        $doseRoute->save();

        return response()->json([
            "success" => true,
            "doseRoute" => $doseRoute->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
