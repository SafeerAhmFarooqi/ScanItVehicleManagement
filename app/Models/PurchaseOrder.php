<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $dates = ['date','deliverydate'];

    protected $fillable = ['category_id','supplier_id','product_id','date','deliverydate','invoicenumber','rate','quantity','amount','notes'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function goodsReceived()
    {
        return $this->hasMany(GoodsReceived::class, 'purchaseorder_id');
    }
}
