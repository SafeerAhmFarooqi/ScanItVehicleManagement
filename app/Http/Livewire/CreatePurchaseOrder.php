<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\RentalCompany;
use App\Models\Vehicle;
use App\Models\VehicleExpenses as VehicleExpense;
use App\Models\CompanyTransactionRecord;
use App\Models\CompanyCurrentAccount;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Session;
use App\Models\PurchaseOrder;
use Illuminate\Support\Carbon;


class CreatePurchaseOrder extends Component
{
    public $forms=[' '];
    public $selectedDateOfPurchase=[];
    public $selectedSupplier=[];
    public $selectedProductCategory=[];
    public $selectedProduct=[];
    public $selectedRate=[0];
    public $selectedQuantity=[0];
    public $selectedAmount=[0];
    public $selectedDeliveryDate=[];
    public $selectedNote=[];
    public $selectedSpecification=[];
    

    protected $validationAttributes = [
        'selectedRentalCompany.0' => 'Rental Company',
        'selectedRentalCompany.*' => 'Rental Company',
        'selectedVehicle' => 'Vehicle',
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
            'selectedVehicle' => ['required'],
            'selectedDate' => ['required', 'date'],
            'selectedExpenseHead' => ['required', 'string','max:100'],
            'selectedRate' => ['required', 'numeric'],
            'selectedQuantity' => ['required', 'numeric'],
        ];
    }

    public function submitPurchaseOrder()
    {
        //$this->validate();
     

        foreach ($this->forms as $key => $value) {
            if (@$this->selectedDateOfPurchase[$key]&&@$this->selectedSupplier[$key]&&@$this->selectedProductCategory[$key]&&@$this->selectedProduct[$key]&&@$this->selectedRate[$key]&&@$this->selectedQuantity[$key]&&@$this->selectedDeliveryDate[$key]) {
                
                while(true)
                {
                 $invoiceNumber=Carbon::now()->format('y').Carbon::now()->format('m').mt_rand('1000000','9999999');
                 if (PurchaseOrder::where('invoicenumber',$invoiceNumber)->first()) {
                    continue;
                 } else {
                    break;
                 }    
                }
                
                $purchaseOrder=PurchaseOrder::create([
                    'category_id' => $this->selectedProductCategory[$key],
                    'supplier_id' => $this->selectedSupplier[$key],
                    'product_id' => $this->selectedProduct[$key],
                    'date' => $this->selectedDateOfPurchase[$key],
                    'deliverydate' => $this->selectedDeliveryDate[$key],
                    'invoicenumber' => $invoiceNumber,
                    'rate' => $this->selectedRate[$key],
                    'quantity' => $this->selectedQuantity[$key],
                    'amount' => $this->selectedRate[$key]*$this->selectedQuantity[$key],
                    'notes' => @$this->selectedNote[$key]??'',
                ]);


                Session::flash('success', __('Purchase Order Created Successfully'));
            }
        }

        $this->resetForm();
    }

    public function render()
    {
        $products=[];
        foreach ($this->forms as $key => $value) {
            $products[$key]=Product::where('category_id',$this->selectedProductCategory[$key]??0)->get(); 
            @$this->selectedRate[$key]=(Product::find(@$this->selectedProduct[$key]))->price??0;
            @$this->selectedSpecification[$key]=(Product::find(@$this->selectedProduct[$key]))->specification??'';
            if (@$this->selectedRate[$key]!=Null&&@$this->selectedQuantity[$key]!=Null) {
                $this->selectedAmount[$key]=$this->selectedRate[$key]*(float)$this->selectedQuantity[$key];
            }
        }
        return view('livewire.create-purchase-order',[
            'products' => $products,
            'suppliers' => Supplier::all(),
            'productCategories' => ProductCategory::all(),
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

    public function resetForm()
    {
        $this->forms=[' '];
        $this->selectedDateOfPurchase=[];
        $this->selectedSupplier=[];
        $this->selectedProductCategory=[];
        $this->selectedProduct=[];
        $this->selectedRate=[0];
        $this->selectedQuantity=[0];
        $this->selectedAmount=[0];
        $this->selectedDeliveryDate=[];
        $this->selectedNote=[];
        $this->selectedSpecification=[];
    }
}
