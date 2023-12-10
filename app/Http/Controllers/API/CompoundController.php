<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Compound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compound = Compound::all();
        return $compound;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $compound = new Compound();
        $compound->uid                  = Hash::make($request->name);
        $compound->effectonsleep_id     = $request->effectonsleepid;
        $compound->compoundclass_id     = $request->compoundclassid;
        $compound->compoundsubclass_id  = $request->compoundsubclassid;
        $compound->target_id            = $request->targetid;
        $compound->targetselectivity    = $request->targetselectivity;
        $compound->name                 = $request->name;
        $compound->synonyms             = $request->synonyms;
        $compound->tradenames           = $request->tradenames;
        $compound->chemicalstructure    = $request->chemicalstructure;
        $compound->casregistrynumber    = $request->casregistrynumber;
        $compound->indication           = $request->indication;
        $compound->description          = $request->description;
        $compound->bioactivity          = $request->bioactivity;
        $compound->abusepotential       = $request->abusepotential;
        $compound->createdby = $request->createdby;
        $compound->ownerCompany = $request->ownerCompany;
        $compound->lastUpdatedBy = $request->lastUpdatedBy;
        $compound->save();

        return response()->json([
            "success"   => true,
            "compound"  => $compound,
            "msg"       => "Created successfully"
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Compound $compound)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $compound = Compound::findorfail($request->compound);
        $compound->uid                  = Hash::make($request->name);
        $compound->effectonsleep_id     = $request->effectonsleepid;
        $compound->compoundclass_id     = $request->compoundclassid;
        $compound->compoundsubclass_id  = $request->compoundsubclassid;
        $compound->target_id            = $request->targetid;
        $compound->targetselectivity    = $request->targetselectivity;
        $compound->name                 = $request->name;
        $compound->synonyms             = $request->synonyms;
        $compound->tradenames           = $request->tradenames;
        $compound->chemicalstructure    = $request->chemicalstructure;
        $compound->casregistrynumber    = $request->casregistrynumber;
        $compound->indication           = $request->indication;
        $compound->description          = $request->description;
        $compound->bioactivity          = $request->bioactivity;
        $compound->abusepotential       = $request->abusepotential;
        $compound->createdby = $request->createdby;
        $compound->ownerCompany = $request->ownerCompany;
        $compound->lastUpdatedBy = $request->lastUpdatedBy;
        $compound->save();

        return response()->json([
            "success"   => true,
            "compound"  => $compound->id,
            "msg"       => "Update successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $compound = Compound::findorfail($request->compound);
        $compound->is_deleted = true;
        $compound->save();

        return response()->json([
            "success"   => true,
            "compound"  => $compound->id,
            "msg"       => "Deleted successfully"
        ]);
    }
}
