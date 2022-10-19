<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\DriverImages;
use App\Models\RentalCompany;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Vehicle;



class DriverProfile extends Component
{
    use WithFileUploads;

    public $searchDriverName;
    public $selectedDriver;
    public $selectedRentalCompany;
    public $selectedStartMonth;
    public $selectedEndMonth;

    public $selectedPic='';
    public $selectedPicRemove='';

    public $selectedDriverName='';
    public $selectedDriverVehicle='';
    public $selectedDriverLicense='';
    public $selectedDriverNldNumber='';
    public $selectedDriverAddress='';
    public $selectedDriverSalary='';
    public $selectedDriverPhone='';
    public $selectedDriverStartTime='';
    public $selectedDriverEndTime='';

    protected $validationAttributes = [
         'selectedPic' => 'Profile Picture',
         'selectedDriverName' => 'Driver Name',
         'selectedDriverVehicle' => 'Vehicle',
         'selectedDriverLicense' => 'License Number',
         'selectedDriverNldNumber' => 'Nld Number',
         'selectedDriverAddress' => 'Address',
         'selectedDriverSalary' => 'First Month Salary',
         'selectedDriverPhone' => 'Phone',
         'selectedDriverStartTime' => 'Start Time',
         'selectedDriverEndTime' => 'End Time',
   ];

   protected $messages = [
    'required' => ':attribute is Required',        
];

protected function picRules()
{
    return [
        'selectedPic' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp|max:2048',
    ];
}

protected function rules()
{
    return [
        'selectedDriverName' => ['required', 'string'],
        'selectedDriverVehicle' => ['required'],
        'selectedDriverLicense' => ['required', 'string'],
        'selectedDriverNldNumber' => ['required', 'string'],
        'selectedDriverAddress' => ['required', 'string'],
        'selectedDriverSalary' => ['required', 'numeric'],
        'selectedDriverPhone' => ['required', 'string'],
        'selectedDriverStartTime' => ['required', 'date_format:H:i'],
        'selectedDriverEndTime' => ['required', 'date_format:H:i'],
    ];
}

public function submit()
{
    $this->validate();
    $driver=Driver::find($this->selectedDriver);

    $driver->update([
        'name' => $this->selectedDriverName,
        'vehicle_id' => $this->selectedDriverVehicle,
        'license' => $this->selectedDriverLicense,
        'nldnumber' => $this->selectedDriverNldNumber,
        'address' => $this->selectedDriverAddress,
        'salary' => $this->selectedDriverSalary,
        'phone' => $this->selectedDriverPhone,
        'startTime' => $this->selectedDriverStartTime,
        'endTime' => $this->selectedDriverEndTime,
    ]);

    session()->flash('success', 'Profile Updated Successfully');

    return redirect()->to(route('app.driver.show',[4]));
    
}

public function updatePic()
{
    $this->validate($this->picRules());
    $driver=Driver::find($this->selectedDriver);

    if ($this->selectedPic) {
        if($driver->profilePic->path)
        {
            $oldPic=$driver->profilePic->path;
            Storage::disk('public')->delete($oldPic);
        }

        $this->selectedPic->store('driver-images/'.$driver->id,'public');
        $filePath = 'driver-images/'.$driver->id.'/'. $this->selectedPic->hashName();
        if ($driver->profilePic) {
            $driver->profilePic->update([
                'path' => $filePath,
            ]);
        } else {
            DriverImages::create([
                'driver_id' => $driver->id,
                'path' => $filePath, 
            ]);
        }
        
    }

    session()->flash('success', 'Profile Picture Updated Successfully');

    return redirect()->to(route('app.driver.show',[4]));
    
}

    public function render()
    {
        
        $totalWorkingHours=0;
        $totalWorkingHoursWithRange=0;
        $driver=Driver::
        where('name','like','%'.$this->searchDriverName.'%')
        ->Where('rentalcompany_id',$this->selectedRentalCompany)
        ->Where('id',$this->selectedDriver)
        ->first();
        
        foreach ($driver->driverAttendances??[] as  $driverAttendance) {
            $totalWorkingHours+=$driverAttendance->intime->diffInHours($driverAttendance->outtime);
        }

        if ($driver) {
            foreach ($driver->attendanceRecordsWithRange($this->selectedStartMonth,$this->selectedEndMonth)??[] as  $driverAttendanceWithRange) {
                $totalWorkingHoursWithRange+=$driverAttendanceWithRange->intime->diffInHours($driverAttendanceWithRange->outtime);
            }
            
        }

        $this->selectedDriverName=$driver->name??'';
        $this->selectedDriverVehicle=$driver->vehicle_id??'';
        $this->selectedDriverLicense=$driver->license??'';
        $this->selectedDriverNldNumber=$driver->nldnumber??'';
        $this->selectedDriverAddress=$driver->address??'';
        $this->selectedDriverSalary=$driver->salary??'';
        $this->selectedDriverPhone=$driver->phone??'';
        $this->selectedDriverStartTime=($driver->startTime??Carbon::now())->format('H:i')??'';
        $this->selectedDriverEndTime=($driver->endTime??Carbon::now())->format('H:i')??'';
        return view('livewire.driver-profile',[
            'rentalCompanies' => RentalCompany::all(),
            'drivers' => Driver::where('rentalcompany_id',$this->selectedRentalCompany)->get(), 
            'driver' => $driver,
            'totalWorkingHours' => $totalWorkingHours,
            'totalWorkingHoursWithRange' => $totalWorkingHoursWithRange,
            'vehicles' => Vehicle::where('rentalcompany_id',$this->selectedRentalCompany)->get(),
        ]);
    }
}
