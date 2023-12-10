<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = Group::all();
        return $group;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->name        = $request->name;
        $group->timepoints  = $request->timepoints;
        $group->save();

        return response()->json([
            "success" => true,
            "group" => $group->id,
            "msg"  => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $group = Group::findorfail($request->group);
        $group->name = $request->name;
        $group->timepoints = $request->timepoints;
        $group->save();

        return response()->json([
            "success" => true,
            "group" => $group->id,
            "msg"  => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $group = Group::findorfail($request->group);
        $group->is_deleted = true;
        $group->save();

        return response()->json([
            "success" => true,
            "group" => $group->id,
            "msg"  => "Deleted successfully"
        ], 200);
    }
}
