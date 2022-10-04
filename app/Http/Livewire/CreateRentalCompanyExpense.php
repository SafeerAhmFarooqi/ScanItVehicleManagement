<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\RentalCompany;
use App\Models\ExpenseGroup;
use App\Models\RentalCompanyExpense;
use App\Models\CompanyTransactionRecord;
use App\Models\CompanyCurrentAccount;
use Illuminate\Support\Facades\Session;

class CreateRentalCompanyExpense extends Component
{
    public $forms=[' '];
    public $selectedRentalCompany=[];
    public $selectedExpenseGroup=[];
    public $selectedDate=[];
    public $selectedExpenseHead=[];
    public $selectedRate=[0];
    public $selectedQuantity=[0];
    public $selectedAmount=[0];

    protected $validationAttributes = [
        'selectedRentalCompany.0' => 'Rental Company',
        'selectedRentalCompany.*' => 'Rental Company',
        'selectedExpenseGroup' => 'Expense Group',
        'selectedDate' => 'Date',
        'selectedExpenseHead' => 'Expense Head',
        'selectedRate' => 'Rate',
        'selectedQuantity' => 'Quantity',
        'selectedAmount' => 'Amount',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedRentalCompany.0' => ['required','numeric'],
            'selectedRentalCompany.*' => ['required','numeric'],
            'selectedExpenseGroup' => ['required'],
            'selectedDate' => ['required', 'date'],
            'selectedExpenseHead' => ['required', 'string','max:100'],
            'selectedRate' => ['required', 'numeric'],
            'selectedQuantity' => ['required', 'numeric'],
        ];
    }

    public function submitVehicleExpenses()
    {
        //$this->validate();

        foreach ($this->forms as $key => $value) {
            if (@$this->selectedRentalCompany[$key]&&@$this->selectedExpenseGroup[$key]&&@$this->selectedDate[$key]&&@$this->selectedExpenseHead[$key]&&@$this->selectedRate[$key]&&@$this->selectedQuantity[$key]) {
                $rentalCompanyExpense=RentalCompanyExpense::create([
                    'rentalcompany_id' => $this->selectedRentalCompany[$key],
                    'expensegroup_id' => $this->selectedExpenseGroup[$key],
                    'date' => $this->selectedDate[$key],
                    'expensehead' => $this->selectedExpenseHead[$key],
                    'rate' => $this->selectedRate[$key],
                    'quantity' => $this->selectedQuantity[$key],
                    'amount' => $this->selectedRate[$key]*$this->selectedQuantity[$key],
                ]);

                $companyCurrentAccount=CompanyCurrentAccount::find($this->selectedRentalCompany[$key]);
                $companyCurrentAccount->update([
                    'currentbalance' => $companyCurrentAccount->currentbalance-$this->selectedAmount[$key],
                ]);
    
                CompanyTransactionRecord::create([
                    'rentalcompany_id' => $this->selectedRentalCompany[$key],
                    'credit' => false,
                    'amount' => $this->selectedAmount[$key],
                    'detail' => 'Rental Company Expenses',
                    'related_id' => $rentalCompanyExpense->id,
                ]);

                Session::flash('success', __('Expense Record Made Successfully'));
            }
        }
    }

    public function render()
    {
        $expenseGroups=[];
        foreach ($this->forms as $key => $value) {
            $expenseGroups[$key]=ExpenseGroup::where('rentalcompany_id',$this->selectedRentalCompany[$key]??0)->get(); 
            if (@$this->selectedRate[$key]!=Null&&@$this->selectedQuantity[$key]!=Null) {
                $this->selectedAmount[$key]=$this->selectedRate[$key]*(float)$this->selectedQuantity[$key];
            }
        }
        return view('livewire.create-rental-company-expense',[
            'rentalCompanies' => RentalCompany::all(),
            'expenseGroups' => $expenseGroups,
        ]);
    }

    public function addForm()
    {
        $this->forms[]='';
    }

    public function deleteForm($key)
    {
        unset($this->forms[$key]);
        $this->forms = array_values($this->forms);
    }
}
