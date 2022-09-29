<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\RentalCompany;
use App\Models\Driver;
use App\Models\DriverAttendance;
use Illuminate\Support\Carbon;

class DriverAttendanceReport extends Component
{
    public $selectedRentalCompany='';
    public $selectedDriver='';
    public $selectedFromMonth='';
    public $selectedToMonth='';
    public $generateReport=false;

    public function render()
    {
        $attendances=NULL;
        if ($this->generateReport&&$this->selectedFromMonth&&$this->selectedToMonth&&$this->selectedRentalCompany) {
            $attendances=DriverAttendance::
            when($this->selectedRentalCompany,function($query){
                return $query->where('rentalcompany_id',$this->selectedRentalCompany);
            })
            ->when($this->selectedDriver,function($query){
                return $query->where('driver_id',$this->selectedDriver);
            })
            ->when($this->selectedFromMonth&&$this->selectedToMonth,function($query){
                return $query->whereBetween('attendancedate',[Carbon::parse($this->selectedFromMonth),Carbon::parse($this->selectedToMonth)]);
            })
            ->orderBy('attendancedate','DESC')->get();
            
            $this->generateReport=false;
        }
        $this->generateReport=false;

        return view('livewire.driver-attendance-report',[
            'rentalCompanies' => RentalCompany::all(),
            'drivers' => Driver::where('rentalcompany_id',$this->selectedRentalCompany)->get(),
            'attendances' => $attendances,
            'totalWorkingHours' => $totalWorkingHours=0,
        ]);
    }
}
