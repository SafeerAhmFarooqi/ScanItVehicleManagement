<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\RentalCompany;
use Illuminate\Support\Facades\Session;


class VehicleListing extends Component
{
    public $selectedRentalCompany='';
    public $searchRentalCompany='';
    public $selectedVehicleName=[];
    public $selectedVehicleEngineNumber=[];
    public $selectedVehicleModel=[];
    public $selectedVehicleCc=[];
    public $selectedVehicleLicenseNumber=[];
    public $selectedVehicleWarrantyPeriod=[];

    public function edit($id)
    {
        $vehicle=Vehicle::find($id);

        $vehicle->update([
            'name' => $this->selectedVehicleName[$vehicle->id],
            'enginenumber' => $this->selectedVehicleEngineNumber[$vehicle->id],
            'model' => $this->selectedVehicleModel[$vehicle->id],
            'cc' => $this->selectedVehicleCc[$vehicle->id],
            'licensenumber' => $this->selectedVehicleLicenseNumber[$vehicle->id],
            'warrantyperiod' => $this->selectedVehicleWarrantyPeriod[$vehicle->id],
        ]);

        Session::flash('success', __('Vehicle Updated Successfully'));
    }

    public function delete($id)
    {
        $vehicle=Vehicle::find($id)->delete();

        Session::flash('error', __('Vehicle Deleted Successfully'));
    }
    public function render()
    {
        $vehicles=Vehicle::where('rentalcompany_id',$this->selectedRentalCompany)->orWhereRelation('rentalCompany', 'name', $this->searchRentalCompany)->get();

        foreach ($vehicles as  $vehicle) {
            $this->selectedVehicleName[$vehicle->id]=$vehicle->name;
            $this->selectedVehicleEngineNumber[$vehicle->id]=$vehicle->enginenumber;
            $this->selectedVehicleModel[$vehicle->id]=$vehicle->model;
            $this->selectedVehicleCc[$vehicle->id]=$vehicle->cc;
            $this->selectedVehicleLicenseNumber[$vehicle->id]=$vehicle->licensenumber;
            $this->selectedVehicleWarrantyPeriod[$vehicle->id]=$vehicle->warrantyperiod;
        }
        return view('livewire.vehicle-listing',[
            'vehicles' => $vehicles,
            'rentalCompanies' => RentalCompany::all(), 
        ]);
    }
}
