<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\RentalCompany;
use App\Models\Vehicle;
use App\Models\DriverImages;
use App\Models\MonthlyDriverSalary;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;


class AddNewDriver extends Component
{
    use WithFileUploads;

    public $selectedRentalCompany='';
    public $selectedName='';
    public $selectedVehicle='';
    public $selectedLicense='';
    public $selectedNldNumber='';
    public $selectedAddress='';
    public $selectedPhoneNumber='';
    public $selectedSalary='';
    public $selectedStartTime='';
    public $selectedEndTime='';
    public $selectedImage='';

    protected $validationAttributes = [
     'selectedRentalCompany' => 'Rental Company',
     'selectedName' => 'Name',
     'selectedVehicle' => 'Vehicle',
     'selectedLicense' => 'License',
     'selectedNldNumber' => 'Nld Number',
     'selectedAddress' => 'Address',
     'selectedPhoneNumber' => 'Phone Number',
     'selectedSalary' => 'Salary',
     'selectedStartTime' => 'Start Time',
     'selectedEndTime' => 'End Time',
     'selectedImage' => 'Driver Photo',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedRentalCompany' => ['required', 'string'],
            'selectedName' => ['required', 'string'],
            'selectedVehicle' =>['required', 'string'],
            'selectedLicense' => ['required', 'string'],
            'selectedNldNumber' => ['required', 'string'],
            'selectedAddress' => ['required', 'string'],
            'selectedPhoneNumber' => ['required', 'string'],
            'selectedSalary' => ['required', 'numeric'],
            'selectedStartTime' => ['required', 'date_format:H:i'],
            'selectedEndTime' => ['required', 'date_format:H:i'],
            'selectedImage' => ['required','image','max:2024'],
        ];
    }

    public function submit()
    {
        $this->validate();
        $driver=Driver::create([
            'rentalcompany_id' =>  $this->selectedRentalCompany,
            'vehicle_id' =>  $this->selectedVehicle,
            'name' =>  $this->selectedName,
            'license' =>   $this->selectedLicense,
            'nldnumber' =>   $this->selectedNldNumber,
            'address'=>   $this->selectedAddress,
            'phone' =>   $this->selectedPhoneNumber,
            'salary' => $this->selectedSalary,
            'startTime' => $this->selectedStartTime,
            'endTime' =>  $this->selectedEndTime,        
        ]);

        if ($this->selectedImage) {
            $this->selectedImage->store('driver-images/'.$driver->id,'public');
            $filePath = 'driver-images/'.$driver->id.'/'. $this->selectedImage->hashName();
            DriverImages::create([
                'driver_id' => $driver->id,
                'path' => $filePath, 
            ]);
        }

        MonthlyDriverSalary::create([
            'rentalcompany_id' =>  $this->selectedRentalCompany,
            'driver_id' => $driver->id,
            'amount' => $this->selectedSalary,
            'month' => Carbon::now(),
        ]);

        if($driver) {
            $this->resetForm();
            Session::flash('success', __('New Driver Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create New Driver'));
        }
    }

    public function render()
    {
        return view('livewire.add-new-driver',[
            'rentalCompanies'=>RentalCompany::all(),
            'vehicles' => Vehicle::where('rentalcompany_id',$this->selectedRentalCompany)->get(),
        ]);
    }

    public function resetForm()
    {
         $this->selectedRentalCompany='';
         $this->selectedName='';
         $this->selectedVehicle='';
         $this->selectedLicense='';
         $this->selectedNldNumber='';
         $this->selectedAddress='';
         $this->selectedPhoneNumber='';
         $this->selectedSalary='';
         $this->selectedStartTime='';
         $this->selectedEndTime='';
    }
}
