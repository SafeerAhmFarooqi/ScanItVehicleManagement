<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\RentalCompany;
use App\Models\DriverAdvancePayment;
use App\Models\DriverSalaryRecord;
use App\Models\CompanyTransactionRecord;
use App\Models\CompanyCurrentAccount;



class GiveDriverSalary extends Component
{
    public $selectedRentalCompany='';
    public $selectedDriver='';
    public $currentDriver='';
    public $addToAdvancePayment=0;
    public $subtractFromAdvancePayment=0;
    public $selectedDeductSalaryMonth='';
    public $selectedDeductSalaryAmount='';

    protected $validationAttributes = [
        'selectedDeductSalaryMonth' => 'Month',
        'selectedDeductSalaryAmount' => 'Amount',
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

    public function submitSalaryDeduction()
    {
        $this->validate();
        if ($this->selectedDeductSalaryAmount) {
            if ($this->currentDriver->advancePayment->advancepayment) {
                if ($this->currentDriver->advancePayment->advancepayment>0) {

                    $amount=0;
                    $difference=$this->currentDriver->advancePayment->advancepayment-$this->selectedDeductSalaryAmount;
                    $difference<0?$amount=$this->selectedDeductSalaryAmount+$difference : $amount=$this->selectedDeductSalaryAmount;

                    $this->currentDriver->advancePayment->update([
                        'advancepayment' => $this->currentDriver->advancePayment->advancepayment-$amount,
                    ]);
                    DriverSalaryRecord::create([
                        'rentalcompany_id' => $this->selectedRentalCompany,
                        'driver_id' => $this->selectedDriver,
                        'amount' => $amount,
                        'month' => $this->selectedDeductSalaryMonth,
                    ]);
                }
            }
            
        }
    }

    public function submitAddToAdvancePayment()
    {
        if ($this->addToAdvancePayment) {
            if ($this->currentDriver->advancePayment) {
                $this->currentDriver->advancePayment->update([
                    'advancepayment' => $this->currentDriver->advancePayment->advancepayment+$this->addToAdvancePayment,
                ]);

                $companyCurrentAccount=CompanyCurrentAccount::find($this->selectedRentalCompany);

                $companyCurrentAccount->update([
                    'currentbalance' => $companyCurrentAccount->currentbalance-$this->addToAdvancePayment,
                ]);
        
                CompanyTransactionRecord::create([
                    'rentalcompany_id' => $this->selectedRentalCompany,
                    'credit' => false,
                    'amount' => $this->addToAdvancePayment,
                    'detail' => 'Add to Driver Advance Payment',
                ]);

            } else {
                DriverAdvancePayment::create([
                    'rentalcompany_id' => $this->selectedRentalCompany,
                    'driver_id' => $this->selectedDriver,
                    'advancepayment' => $this->addToAdvancePayment, 
                ]);

                $companyCurrentAccount=CompanyCurrentAccount::find($this->selectedRentalCompany);

                $companyCurrentAccount->update([
                    'currentbalance' => $companyCurrentAccount->currentbalance-$this->addToAdvancePayment,
                ]);
        
                CompanyTransactionRecord::create([
                    'rentalcompany_id' => $this->selectedRentalCompany,
                    'credit' => false,
                    'amount' => $this->addToAdvancePayment,
                    'detail' => 'Add to Driver Advance Payment',
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
                    $amount=0;
                    $difference=$this->currentDriver->advancePayment->advancepayment-$this->subtractFromAdvancePayment;
                    $difference<0?$amount=$this->subtractFromAdvancePayment+$difference : $amount=$this->subtractFromAdvancePayment;        
                    $companyCurrentAccount=CompanyCurrentAccount::find($this->selectedRentalCompany);
                    $companyCurrentAccount->update([
                        'currentbalance' => $companyCurrentAccount->currentbalance+$amount,
                    ]);
        
                    CompanyTransactionRecord::create([
                        'rentalcompany_id' => $this->selectedRentalCompany,
                        'credit' => true,
                        'amount' => $amount,
                        'detail' => 'Add to Driver Advance Payment',
                    ]);
                    $this->currentDriver->advancePayment->update([
                        'advancepayment' => $this->currentDriver->advancePayment->advancepayment-$amount,
                    ]);

                  
                }
                
            }
            $this->subtractFromAdvancePayment=0;
        }
    }

    public function render()
    {
        $this->currentDriver = Driver::find($this->selectedDriver);
        return view('livewire.give-driver-salary',[
            'rentalCompanies' => RentalCompany::all(),
            'currentDriver' => $this->currentDriver,
            'drivers' => Driver::where('rentalcompany_id',$this->selectedRentalCompany)->get(),
        ]);
    }
}
