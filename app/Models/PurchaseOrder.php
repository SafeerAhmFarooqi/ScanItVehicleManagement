<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $dates = ['date','deliverydate'];

    protected $fillable = ['supplier_id','product_id','date','deliverydate','invoicenumber','rate','quantity','amount','notes'];
}
