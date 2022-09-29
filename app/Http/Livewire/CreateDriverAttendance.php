<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Session;

use App\Models\RentalCompany;
use App\Models\Driver;
use App\Models\DriverAttendance;
use Illuminate\Support\Carbon;

class CreateDriverAttendance extends Component
{
    public $selectedRentalCompany='';
    public $selectedDriver='';
    public $attendanceDate='';
    public $inTime='';
    public $outTime='';

    protected $validationAttributes = [
        'selectedRentalCompany' => 'Rental Company',
        'selectedDriver' => 'Driver',
        'attendanceDate'=>'Attendance Date',
        'inTime'=>'Driver In Time',
        'outTime'=>'Driver Out Time',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedRentalCompany' => ['required', 'string'],
            'selectedDriver' => ['required', 'string'],
            'attendanceDate'=>['required', 'date'],
            'inTime'=>['required', 'date_format:H:i'],
            'outTime'=>['required', 'date_format:H:i'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $driverAttendance=DriverAttendance::create([
            'rentalcompany_id' => $this->selectedRentalCompany,
            'driver_id' => $this->selectedDriver,
            'attendancedate'=>$this->attendanceDate,
            'intime'=>$this->inTime,
            'outtime'=>$this->outTime,
        ]);

        if($driverAttendance) {
            $this->resetForm();
            Session::flash('success', __('Driver Attendance Created Successfully'));
        } else {
            Session::flash('error', __('Unable to Create Driver Attendance'));
        }
    }
    public function render()
    {
        $drivers=Driver::where('rentalcompany_id',$this->selectedRentalCompany)->get();
        return view('livewire.create-driver-attendance',[
            'drivers' => $drivers,
            'rentalCompanies' => RentalCompany::all(),
        ]);
    }

    public function resetForm()
    {
        $this->selectedRentalCompany='';
        $this->selectedDriver='';
        $this->attendanceDate='';
        $this->inTime='';
        $this->outTime='';
    }
}
