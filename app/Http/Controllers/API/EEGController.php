<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\EEG;
use Illuminate\Http\Request;

class EEGController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eeg = EEG::all();
        return $eeg;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $eeg = new EEG();
        $eeg->name          = $request->name;
        $eeg->subject_id     = $request->subjectid;
        $eeg->study_id       = $request->studyid;
        $eeg->experimentalcondition_id = $request->experimentalconditionid;
        $eeg->filepath      = $request->filepath;
        $eeg->save();

        return response()->json([
            "success" => true,
            "eeg" => $eeg->id,
            "msg" => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $eeg = EEG::find($request->eeg);
        return response()->json([
            "success" => true,
            "eeg" => $eeg
        ], 200);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $eeg = EEG::findorfail($request->eeg);
        $eeg->name          = $request->name;
        $eeg->subject_id     = $request->subjectid;
        $eeg->study_id       = $request->studyid;
        $eeg->experimentalcondition_id = $request->experimentalconditionid;
        $eeg->filepath      = $request->filepath;
        $eeg->save();

        return response()->json([
            "success" => true,
            "eeg" => $eeg->id,
            "msg" => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $eeg = EEG::findorfail($request->eeg);
        $eeg->is_deleted      = true;
        $eeg->save();

        return response()->json([
            "success" => true,
            "eeg" => $eeg->id,
            "msg" => "Deleted successfully"
        ]);
    }
}
