<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::all();
        return $subject;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subject = new Subject();
        $subject->study_id           = $request->studyid;
        $subject->species_id         = $request->speciesid;
        $subject->strain_id          = $request->strainid;
        $subject->geneticmodtype    = $request->geneticmodtype;
        $subject->group_id           = $request->groupid;
        $subject->sex               = $request->sex;
        $subject->age               = $request->age;
        $subject->ageunit           = $request->ageunit;
        $subject->dob               = $request->dob;
        $subject->acclimationlength   = $request->acclimationlength;
        $subject->acclimationlengthUnit = $request->acclimationlengthUnit;
        $subject->clinicalstatus        = $request->clinicalstatus;
        $subject->active                = $request->active;
        $subject->save();

        return response()->json([
            "success" => true,
            "subject" => $subject->id,
            "msg" => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $subject = Subject::findorfail($request->subject);
        $subject->study_id           = $request->studyid;
        $subject->species_id         = $request->speciesid;
        $subject->strain_id          = $request->strainid;
        $subject->geneticmodtype    = $request->geneticmodtype;
        $subject->group_id           = $request->groupid;
        $subject->sex               = $request->sex;
        $subject->age               = $request->age;
        $subject->ageunit           = $request->ageunit;
        $subject->dob               = $request->dob;
        $subject->acclimationlength   = $request->acclimationlength;
        $subject->acclimationlengthUnit = $request->acclimationlengthUnit;
        $subject->clinicalstatus        = $request->clinicalstatus;
        $subject->active                = $request->active;
        $subject->save();

        return response()->json([
            "success" => true,
            "subject" => $subject->id,
            "msg" => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $subject = Subject::findorfail($request->subject);
        $subject->is_deleted = true;
        $subject->save();

        return response()->json([
            "success" => true,
            "subject" => $subject->id,
            "msg" => "Deleted successfully"
        ], 201);
    }
}
