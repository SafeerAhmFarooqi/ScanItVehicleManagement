<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalCompany;
use App\Models\Driver;
use Illuminate\Support\Carbon;

class DriverController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-new-driver-page',[
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
            'license' => ['required', 'string', 'max:100'],
            'address'=> ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'salary' => ['required', 'string', 'max:100'],
            'starttime' => ['required', 'date_format:H:i', 'max:100'],
            'endtime' => ['required', 'date_format:H:i', 'max:100'],          
        ],[
            //Validation Messages
            'required'=>':attribute Is Required',
        ],[
            //Validation Attributes
            'rentalcompany' => 'Rental Company',
            'name' => 'Name',
            'license' => 'License',
            'address'=> 'Address',
            'phone' => 'Phone Number',
            'salary' => 'Salary',
            'starttime' => 'Start Time',
            'endtime' => 'End Time',     
        ]);

        $driver=Driver::create([
            'rentalcompany_id' =>  $request->rentalcompany,
            'name' => $request->name,
            'license' => $request->license,
            'address'=> $request->address,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'startTime' => Carbon::parse($request->starttime)->format('H:i'),
            'endTime' => Carbon::parse($request->endtime)->format('H:i'),     
        ]);

        if($driver)
        {
            return back()->with('success', 'New Driver Created Successfully' );
        }
        else
        {
            return back()->with('error', 'Unable to create new Driver' );
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
              return view('driver-setting-page');
              break;
            case "2":
                return view('user-management-roles-permission-page',[

                ]);
                break;
            case "3":

                    return view('user-management-employees-permission-page',[
 
                    ]);
                    break;
                    case "4":

                        return view('expense-report-page');
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
