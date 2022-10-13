<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\RentalCompany;

class VehicleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-new-vehicle-page',[
            'rentalCompanies'=>RentalCompany::all(),
        ]);
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
            'rentalcompany' => ['required', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:100'],
            'enginenumber' => ['required', 'string', 'max:100'],
            'model' => ['required', 'string', 'max:100'],
            'cc' => ['required', 'string', 'max:100'],
            'license' => ['required', 'string', 'max:100'],
            'warranty' => ['required', 'date', 'max:100'], 
            'chassisnumber' => ['required', 'string', 'max:100'], 
        ],[
            //Validation Messages
            'required'=>':attribute Is Required',
        ],[
            //Validation Attributes
            'rentalcompany' => 'Rental Company',
            'name' => 'Name',
            'enginenumber' => 'Engine Number',
            'model' => 'Model',
            'cc' => 'Engine CC',
            'license' => 'License',
            'warranty' => 'Warranty Valid Till Date',     
            'chassisnumber' => 'Chassis',
        ]);

        $vehicle=Vehicle::create([
            'rentalcompany_id' =>  $request->rentalcompany,
            'name' =>  $request->name,
            'enginenumber' =>  $request->enginenumber,
            'chassisnumber' =>  $request->chassisnumber,
            'model' =>  $request->model,
            'cc' =>  $request->cc,
            'licensenumber' =>  $request->license,
            'warrantyperiod' =>  $request->warranty,
        ]);

        if($vehicle)
        {
            return back()->with('success', 'New Vehicle Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Vehicle' );
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
              return view('vehicle-listing-page');
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
