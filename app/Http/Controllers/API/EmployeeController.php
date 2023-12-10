<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::With('Users')->get();
        return $employee;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->user_id = $request->userid;
        $employee->save();

        return response()->json([
            "success"   => true,
            "employee"  => $employee->id,
            "msg"       => "Creted Successfully"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $employee = Employee::find($request->employee);

        if(!$employee){
            return response()->json([
                "error" => true,
                "msg" => "The employee does not exist"
            ], 404);    
        }
        return response()->json($employee);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $employee = Employee::find($request->employee);
        if(!$employee){
            return response()->json([
                "error" => true,
                "msg" => "The employee does not exist"
            ], 404);  
        }
        $employee->user_id = $request->userid;
        $employee->save();

        return response()->json([
            "success"   => true,
            "msg"       => "Update Successfully"
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $employee = Employee::find($request->employee);
        $employee->is_deleted = true;
        $employee->save();

        return response()->json([
            "success"   => true,
            "msg"       => "Deleted Successfully"
        ], 200);
    }
}
