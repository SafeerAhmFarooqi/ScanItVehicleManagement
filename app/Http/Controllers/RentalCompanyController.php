<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RentalCompany;
use App\Models\CompanyCurrentAccount;
use App\Models\CompanyTransactionRecord;
use App\Models\RentalCompanyInitialAmount;

class RentalCompanyController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-new-rental-company-page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //Validation Rules
            'company' => ['required', 'string', 'max:100'],
            'initialbalance' => ['required', 'numeric'],
            
          
        ],[
            //Validation Messages
            'required'=>':attribute Is Required',
        ],[
            //Validation Attributes
            'company' =>'Company',
            'initialbalance' => 'Initial Balance',
        ]);

        $company=RentalCompany::create([
            'name'=>$request->company,
        ]);

        CompanyCurrentAccount::create([
            'rentalcompany_id' => $company->id,
            'currentbalance' => $request->initialbalance,

        ]);

        CompanyTransactionRecord::create([
            'rentalcompany_id' => $company->id,
            'credit' => true,
            'amount' => $request->initialbalance,
            'detail' => 'Initial Balance',
        ]);

        RentalCompanyInitialAmount::create([
            'rentalcompany_id' => $company->id,
            'initialbalance' => $request->initialbalance,

        ]);


        if($company)
        {
            return back()->with('success', 'New Company Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Company' );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        switch ($id) {
            case "1":
              return view('rental-company-list-page');
              break;
           
                  
            default:
              return back();
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
