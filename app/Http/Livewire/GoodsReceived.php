<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\GoodsReceived as GoodsReceiveds;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Session;

class GoodsReceived extends Component
{
    public $selectedPurchaseOrder='a';
    public $searchPurchaseOrder='';
    public $selectedReceivedAmount='';
    public $selectedReceivedDate='';

    protected $validationAttributes = [
        'selectedReceivedAmount' => 'Received Amount',
        'selectedReceivedDate' => 'Received Date',
    ];

    protected $messages = [
        'required' => ':attribute is Required',        
    ];

    protected function rules()
    {
        return [
            'selectedReceivedAmount' => ['required', 'numeric'],
            'selectedReceivedDate' => ['required', 'date'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $purchaseOrder=PurchaseOrder::find($this->selectedPurchaseOrder);

            GoodsReceiveds::create([
                'purchaseorder_id' => $this->selectedPurchaseOrder,
                'amountreceived' => $this->selectedReceivedAmount,
                'receiveddate' => $this->selectedReceivedDate,
            ]);
            Session::flash('success', __('Record Updated Successfully'));
        
        
    }
    

    public function render()
    {
        $purchaseOrder=PurchaseOrder::
        when($this->selectedPurchaseOrder,function($query){
            return $query->where('id',$this->selectedPurchaseOrder);
        })
        ->when($this->searchPurchaseOrder,function($query){
            return $query->orWhere('invoicenumber',$this->searchPurchaseOrder);
        })
        ->first();
        return view('livewire.goods-received',[
            'invoices' => PurchaseOrder::all(),
            'purchaseOrder' => $purchaseOrder,
        ]);
    }
}
