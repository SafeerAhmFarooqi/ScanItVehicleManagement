<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\RentalCompany;
use App\Models\Company;
use App\Models\RentAgreement;
use App\Models\CompanyTransactionRecord;
use Illuminate\Support\Facades\Session;


class PayAgreementAmount extends Component
{
    public $selectedRentalCompany='';
    public $selectedCompany='';
    public $currentRentAgreement=null;
    public $currentRentalCompany='';

    public function getRentAgreement($id)
    {
        $this->currentRentAgreement=RentAgreement::find($id);
    }

    public function payAgreementAmount($id)
    {
        $this->currentRentAgreement=RentAgreement::find($id);
        $this->currentRentAgreement->update([
            'paid' => true,
        ]);
        $this->currentRentalCompany->currentAccount->update([
            'currentbalance' => $this->currentRentalCompany->currentAccount->currentbalance+$this->currentRentAgreement->amount,
        ]);
        CompanyTransactionRecord::create([
            'rentalcompany_id' => $this->currentRentalCompany->id,
            'credit' => true,
            'amount' => $this->currentRentAgreement->amount,
            'detail' => 'Rent Agreement Amount',
        ]);
        $this->currentRentAgreement='';
        $this->dispatchBrowserEvent('hideModel');
        Session::flash('success', __('Agreement Amount Paid Successfully'));
    }

    public function render()
    {
        $this->currentRentalCompany=RentalCompany::find($this->selectedRentalCompany);
        return view('livewire.pay-agreement-amount',[
            'rentalCompanies' => RentalCompany::all(),
            'rentAgreements' => RentAgreement::where('rentalcompany_id',$this->selectedRentalCompany)->where('company_id',$this->selectedCompany)->get(),
            'companies' => Company::whereRelation('rentalagreements', 'rentalcompany_id', $this->selectedRentalCompany)->get(),
        ]);
    }
}
