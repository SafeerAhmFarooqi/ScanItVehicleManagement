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
    public $selectedStartDate='';
    public $selectedEndDate='';
    public $selectedId='';
    public $currentPurchaseOrder='';
    
    public function render()
    {
        $this->selectedId?$this->currentPurchaseOrder=PurchaseOrder::find($this->selectedId) : $this->currentPurchaseOrder='';
        $purchaseOrders=PurchaseOrder::
        when($this->selectedPurchaseOrder,function($query){
            return $query->where('id',$this->selectedPurchaseOrder);
        })
        ->when($this->searchPurchaseOrder,function($query){
            return $query->orWhere('invoicenumber',$this->searchPurchaseOrder);
        })
        ->when($this->selectedStartDate&&$this->selectedEndDate,function($query){
            return $query->orWhereBetween('date',[$this->selectedStartDate,$this->selectedEndDate]);
        })
        ->get();
        $totalReceivedAmounQuantity=0;
        $totalReceivedUnits=0;
        $totalBalance=0;
        foreach ($purchaseOrders as $purchaseOrder) {
                $totalReceivedAmounQuantity+=$purchaseOrder->goodsReceived->sum('amountreceived')*$purchaseOrder->rate;
                $totalReceivedUnits+=$purchaseOrder->goodsReceived->sum('amountreceived');
                $totalBalance+=($purchaseOrder->amount)-($purchaseOrder->goodsReceived->sum('amountreceived')*$purchaseOrder->rate);
        }
        return view('livewire.goods-received-report',[
            'invoices' => PurchaseOrder::all(),
            'purchaseOrders' => $purchaseOrders,
            'totalReceivedAmounQuantity' => $totalReceivedAmounQuantity,
            'totalReceivedUnits' => $totalReceivedUnits,
            'totalBalance' => $totalBalance,
        ]);
    }
}
