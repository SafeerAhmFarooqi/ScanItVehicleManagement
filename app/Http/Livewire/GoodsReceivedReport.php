<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\GoodsReceived as GoodsReceiveds;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Session;

class GoodsReceivedReport extends Component
{
    public $selectedPurchaseOrder='a';
    public $searchPurchaseOrder='';
    public $selectedReceivedAmount='';
    public $selectedReceivedDate='';
    
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
        return view('livewire.goods-received-report',[
            'invoices' => PurchaseOrder::all(),
            'purchaseOrder' => $purchaseOrder,
        ]);
    }
}
