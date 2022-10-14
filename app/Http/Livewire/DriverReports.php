<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\RentalCompany;
use Illuminate\Support\Carbon;

class DriverReports extends Component
{
    public $searchDriverName;
    public $selectedDriver;
    public $selectedRentalCompany;
    public $selectedStartMonth;
    public $selectedEndMonth;

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
        

        return view('livewire.driver-reports',[
            'rentalCompanies' => RentalCompany::all(),
            'drivers' => Driver::where('rentalcompany_id',$this->selectedRentalCompany)->get(), 
            'driver' => $driver,
            'totalWorkingHours' => $totalWorkingHours,
            'totalWorkingHoursWithRange' => $totalWorkingHoursWithRange,
        ]);
    }
}
