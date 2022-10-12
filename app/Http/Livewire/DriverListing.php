<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\RentalCompany;
use Illuminate\Support\Facades\Session;

class DriverListing extends Component
{
    public $selectedRentalCompany='';
    public $searchRentalCompany='';
    public $selectedDriverName=[];
    public $selectedDriverLicense=[];
    public $selectedDriverAddress=[];
    public $selectedDriverPhone=[];
    public $selectedDriverStartTime=[];
    public $selectedDriverEndTime=[];

    public function edit($id)
    {
        $driver=Driver::find($id);

        $driver->update([
            'name' => $this->selectedDriverName[$driver->id],
            'license' => $this->selectedDriverLicense[$driver->id],
            'address' => $this->selectedDriverAddress[$driver->id],
            'phone' => $this->selectedDriverPhone[$driver->id],
            'startTime' => $this->selectedDriverStartTime[$driver->id],
            'endTime' => $this->selectedDriverEndTime[$driver->id],
        ]);

        Session::flash('success', __('Driver Updated Successfully'));
    }

    public function delete($id)
    {
        $driver=Driver::find($id)->delete();

        Session::flash('error', __('Driver Deleted Successfully'));
    }

    public function render()
    {
        $drivers=Driver::where('rentalcompany_id',$this->selectedRentalCompany)->orWhereRelation('rentalCompany', 'name', $this->searchRentalCompany)->get();

        foreach ($drivers as  $driver) {
            $this->selectedDriverName[$driver->id]=$driver->name;
            $this->selectedDriverLicense[$driver->id]=$driver->license;
            $this->selectedDriverAddress[$driver->id]=$driver->address;
            $this->selectedDriverPhone[$driver->id]=$driver->phone;
            $this->selectedDriverStartTime[$driver->id]=$driver->startTime;
            $this->selectedDriverEndTime[$driver->id]=$driver->endTime;
        }
        return view('livewire.driver-listing',[
            'drivers' => $drivers,
            'rentalCompanies' => RentalCompany::all(), 
        ]);
    }
}
