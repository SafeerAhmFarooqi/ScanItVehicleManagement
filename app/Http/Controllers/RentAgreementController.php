<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalCompany;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\RentAgreement;

class RentAgreementController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-new-rent-agreement-page',[
            'rentalCompanies' => RentalCompany::all(),
            'vehicles' => Vehicle::all(),
            'drivers' => Driver::all(),
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
        if (count($request->kt_docs_repeater_basic)>0) {
            foreach ($request->kt_docs_repeater_basic as $key => $value) {
                if ($value['rentalcompany']??false&&$value['vehicle']??false&&$value['driver']??false&&$value['duration']??false&&$value['quantity']??false&&$value['rate']??false&&$value['amount']??false) {
                    RentAgreement::create([
                        'rentalcompany_id' => $value['rentalcompany'],
                        'vehicle_id' =>  $value['vehicle']??'',
                        'driver_id' => $value['driver'],
                        'duration' => $value['duration'],
                        'rate' => $value['rate']??0,
                        'quantity' => $value['quantity']??0,
                        'amount' => ($value['rate']??0)*($value['quantity']??0),
                    ]);
                }    
            }
        }
        
        return back()->with('success', 'Expenses Created Successfully' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
