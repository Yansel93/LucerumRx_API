<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Company::with('Users')->get();
        return $company;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'companyname'       => 'required|max:255,|string|unique:companies,companyname',
        'countryoforigin'   => 'required|max:255,|string',
        'address'           => 'required|max:255,|string|unique:companies,address',
        'registeringcode'   => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'error' => 'Error de validación',
            'messages' => $validator->errors(),
        ], 422); // Código de estado 422: Entidad no procesable
    }
        $company = new Company();
        $company->companyname       = $request->get('companyname');
        $company->uid               = Hash::make($request->get('companyname'));
        $company->countryoforigin   = $request->get('countryoforigin');
        $company->address           = $request->get('address');
        $company->registeringcode   = Hash::make($request->get('registeringcode'));
        $company->save();
        
        return response()->json([
            "success" => true,
            'msg' => "Company insert correctly"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response()->json([
            "data" => $company
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'companyname'       => 'required|max:255,|string|unique:companies,companyname',
            'countryoforigin'   => 'required|max:255,|string',
            'address'           => 'required|max:255,|string|unique:companies,address',
            'registeringcode'   => 'required',
        ]);

        if ($validator->fails()) {
                return response()->json([
                    'error' => 'Error de validación',
                    'messages' => $validator->errors(),
                ], 422); // Código de estado 422: Entidad no procesable
        }

        $company = Company::findorfail($request->company);
        if (!$company) {
            return response()->json([
                "res" => "error",
                "msg" => "Company not found",
            ], 404);
        }else{
            $company->companyname       = $request->get('companyname');
            $company->uid               = Hash::make($request->get('companyname'));
            $company->countryoforigin   = $request->get('countryoforigin');
            $company->address           = $request->get('address');
            $company->createdby         = 1;
            $company->registeringcode   = Hash::make($request->get('registeringcode'));
            $company->save();
            
            return response()->json([
            "success" => true,
            'msg' => "Company update correctly"
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $company = Company::findorfail($request->company);
        $company->is_deleted = 'true';
        $company->save();
        
        return response()->json([
            "success" => true,
            "msg" => "Deleted correctly"
        ],200);
    }
}
