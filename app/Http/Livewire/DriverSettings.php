<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\RentalCompany;
use App\Models\Driver;
use App\Models\DriverAdvancePayment;
use App\Models\DriverSalaryRecord;
use App\Models\MonthlyDriverSalary;
use App\Models\DriverMonthlyHoliday;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Session;

class DriverSettings extends Component
{
    public $selectedRentalCompany='';
    public $selectedDriver='';
    public $currentDriver='';
    public $addToAdvancePayment=0;
    public $subtractFromAdvancePayment=0;
    public $selectedDeductSalaryMonth='';
    public $selectedDeductSalaryAmount='';
    public $perMonthSalaryAmount='';
    public $salaryStartMonth='';
    public $salaryEndMonth='';
    public $holidaySettingMode=false;
    public $everyHolidayAt1='';
    public $everyHolidayAt2='';
    public $everyHolidayShow1=[];
    public $everyHolidayShow2=[];
    public $automaticHolidayStartMonth='';
    public $automaticHolidayEndMonth='';
    
    
    public array $everyHolidays = [
        '1' => 'Sunday',
        '2' => 'Monday',
        '3' => 'Tuesday',
        '4' => 'Wednesday',
        '5' => 'Thursday',
        '6' => 'Friday',
        '7' => 'Saturday',
    ];

    
    protected $validationAttributes = [
        'selectedDeductSalaryMonth' => 'Month',
        'selectedDeductSalaryAmount' => 'Amount',
        'perMonthSalaryAmount' => 'Per Month Salary',
        'salaryStartMonth' => 'Start Month For Salary',
        'salaryEndMonth' => 'End Month For Salary',
        'automaticHolidayStartMonth' => 'Start Month',
        'automaticHolidayEndMonth' => 'End Month',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedDeductSalaryMonth' => ['required', 'date'],
            'selectedDeductSalaryAmount' => ['required', 'numeric'],
        ];
    }

    protected function rulesForSubmitMonthlySalary()
    {
        return [
            'perMonthSalaryAmount' => ['required', 'numeric'],
            'salaryStartMonth' => ['required', 'date'],
            'salaryEndMonth' => ['required', 'date'],
        ];
    }

    protected function rulesForSubmitAutomaticHolidaySetting()
    {
        return [
            'automaticHolidayStartMonth' => ['required', 'date'],
            'automaticHolidayEndMonth' => ['required', 'date'],
        ];
    }

    public function submitSalaryDeduction()
    {
        $this->validate();
        $amountBeforeDeduction=0;
        $amountAfterDeduction=0;
        $amountDeductionDifference=0;
        if ($this->selectedDeductSalaryAmount) {
            if ($this->currentDriver->advancePayment) {
                if ($this->currentDriver->advancePayment->advancepayment>0) {
                    $amountBeforeDeduction=$this->currentDriver->advancePayment->advancepayment;
                    $this->currentDriver->advancePayment->update([
                        'advancepayment' => $this->currentDriver->advancePayment->advancepayment<=$this->selectedDeductSalaryAmount?0 :$this->currentDriver->advancePayment->advancepayment-$this->selectedDeductSalaryAmount ,
                    ]);
                    $amountAfterDeduction=$this->currentDriver->advancePayment->advancepayment;
                    $amountDeductionDifference=$amountBeforeDeduction-$amountAfterDeduction;
                }
            }
            
        }
        if ($amountDeductionDifference>0) {
            DriverSalaryRecord::create([
                'rentalcompany_id' => $this->selectedRentalCompany,
                'driver_id' => $this->selectedDriver,
                'amount' => $amountDeductionDifference,
                'month' => $this->selectedDeductSalaryMonth,
            ]);
        }


    }

    public function submitAddToAdvancePayment()
    {
        if ($this->addToAdvancePayment) {
            if ($this->currentDriver->advancePayment) {
                $this->currentDriver->advancePayment->update([
                    'advancepayment' => $this->currentDriver->advancePayment->advancepayment+$this->addToAdvancePayment,
                ]);
            } else {
                DriverAdvancePayment::create([
                    'rentalcompany_id' => $this->selectedRentalCompany,
                    'driver_id' => $this->selectedDriver,
                    'advancepayment' => $this->addToAdvancePayment, 
                ]);
            }
            $this->addToAdvancePayment=0;
        }
    }

    public function submitSubtractFromAdvancePayment()
    {
        if ($this->subtractFromAdvancePayment) {
            if ($this->currentDriver->advancePayment) {
                if ($this->currentDriver->advancePayment->advancepayment>0) {
                    $this->currentDriver->advancePayment->update([
                        'advancepayment' => $this->currentDriver->advancePayment->advancepayment<=$this->subtractFromAdvancePayment?0 :$this->currentDriver->advancePayment->advancepayment-$this->subtractFromAdvancePayment ,
                    ]);
                }
                
            }
            $this->subtractFromAdvancePayment=0;
        }
    }

    public function submitMonthlySalary()
    {
        $this->validate($this->rulesForSubmitMonthlySalary());
        $startMonth=Carbon::parse($this->salaryStartMonth);
        $endMonth=Carbon::parse($this->salaryEndMonth);
        $noOfMonths=$startMonth->diffInMonths($endMonth)+1;
        for ($i=0; $i < $noOfMonths; $i++) { 
            $startMonth->addMonths($i);
            if (MonthlyDriverSalary::where('month',$startMonth)->first()) {
                $thisMonth=MonthlyDriverSalary::where('month',$startMonth)->first();
                $thisMonth->update([
                    'amount' => $this->perMonthSalaryAmount,
                ]);
            } else {
                MonthlyDriverSalary::create([
                    'rentalcompany_id' => $this->selectedRentalCompany,
                    'driver_id' => $this->selectedDriver,
                    'amount' => $this->perMonthSalaryAmount,
                    'month' => $startMonth,
                ]);
            }
            $startMonth->subMonths($i);
            
        }
        Session::flash('success', __('Driver Monthly Salary Updated Successfully'));
    }

    public function submitAutomaticHolidaySetting()
    {
        $this->validate($this->rulesForSubmitAutomaticHolidaySetting());

        if ($this->everyHolidayAt1||$this->everyHolidayAt1) {
            $startMonth=Carbon::parse($this->automaticHolidayStartMonth);
            $endMonth=Carbon::parse($this->automaticHolidayEndMonth);
            $noOfMonths=$startMonth->diffInMonths($endMonth)+1;
            for ($i=0; $i < $noOfMonths; $i++) { 
                $startMonth->addMonths($i);
                DriverMonthlyHoliday::where('month',$startMonth)->delete();
                if($this->everyHolidayAt1)
                {
                    $period = CarbonPeriod::create($startMonth, $startMonth->copy()->endOfMonth());
                    foreach ($period as $date) {
                        if($this->everyHolidayAt1==1)
                        {
                            $date->isSunday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt1==2)
                        {
                            $date->isMonday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt1==3)
                        {
                            $date->isTuesday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt1==4)
                        {
                            $date->isWednesday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt1==5)
                        {
                            $date->isThursday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt1==6)
                        {
                            $date->isFriday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt1==7)
                        {
                            $date->isSaturday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                    }
                }

                if($this->everyHolidayAt2)
                {
                    $period = CarbonPeriod::create($startMonth, $startMonth->copy()->endOfMonth());
                    foreach ($period as $date) {
                        if($this->everyHolidayAt2==1)
                        {
                            $date->isSunday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt2==2)
                        {
                            $date->isMonday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt2==3)
                        {
                            $date->isTuesday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt2==4)
                        {
                            $date->isWednesday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt2==5)
                        {
                            $date->isThursday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt2==6)
                        {
                            $date->isFriday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                        if($this->everyHolidayAt2==7)
                        {
                            $date->isSaturday()? DriverMonthlyHoliday::create([
                                'rentalcompany_id' => $this->selectedRentalCompany,
                                'driver_id' => $this->selectedDriver,
                                'month' =>  $startMonth,
                                'holidaydate' => $date,
                            ]) : '';
                        }
                    }
                }
                $startMonth->subMonths($i);
                
            }
            Session::flash('success', __('Driver Monthly Salary Updated Successfully'));
        }
    } 

    public function render()
    {
        $this->currentDriver = Driver::find($this->selectedDriver);
        $this->automaticHolidaySetting();
        return view('livewire.driver-settings',[
            'rentalCompanies' => RentalCompany::all(),
            'drivers' => Driver::where('rentalcompany_id',$this->selectedRentalCompany)->get(),
            'currentDriver' => $this->currentDriver,
            'everyHolidayShow1' => $this->everyHolidayShow1,
            'everyHolidayShow2' => $this->everyHolidayShow2,
        ]);
    }

    public function automaticHolidaySetting()
    {
        $this->everyHolidayShow1=$this->everyHolidays;
        $this->everyHolidayShow2=$this->everyHolidays;
        unset($this->everyHolidayShow1[$this->everyHolidayAt2]);
        unset($this->everyHolidayShow2[$this->everyHolidayAt1]);
    }
    
}
