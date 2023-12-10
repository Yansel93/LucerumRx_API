<?php


namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specie = Specie::all();
        return $specie;
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $specie =  new Specie();
        $specie->name        = $request->name;
        $specie->description = $request->description;
        $specie->save();

        return response()->json([
            "success" => true,
            "specie" => $specie->id,
            "msg"   => "Created successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $specie =  Specie::findorfail($request->spacie);
        $specie->name        = $request->name;
        $specie->description = $request->description;
        $specie->save();

        return response()->json([
            "success" => true,
            "specie" => $specie->id,
            "msg"   => "Update successfully"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $specie =  Specie::findorfail($request->spacie);
        $specie->is_deleted  = true;
        $specie->save();

        return response()->json([
            "success" => true,
            "specie" => $specie->id,
            "msg"   => "Deleted successfully"
        ], 200);
    }
}
