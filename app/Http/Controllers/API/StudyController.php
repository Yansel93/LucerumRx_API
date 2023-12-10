<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Study;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $study = Study::with('StudyType')->get();
        $study = Study::get();
        return $study;
    }

    /**
     * Store a newly created resource in storage.
     * @Request
     */
    public function store(Request $request)
    {
        $study = new Study();
        $study->type_id      = $request->typeid;
        $study->name        = $request->name;
        $study->channeltype = $request->channeltype;
        $study->valid       = $request->valid;
        $study->save();

        return response()->json([
            "success" => true,
            "study" => $study->id,
            "msg"   => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Study $study)
    {
        //
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $study = Study::findorfail($request->study);
        $study->type_id      = $request->typeid;
        $study->name        = $request->name;
        $study->channeltype = $request->channeltype;
        $study->valid       = $request->valid;
        $study->save();

        return response()->json([
            "success" => true,
            "study" => $study->id,
            "msg"   => "Created successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $study = Study::findorfail($request->study);
        $study->is_deleted = true;
        $study->save();

        return response()->json([
            "success" => true,
            "study" => $study->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
