<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodsReceived extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['receiveddate','deleted_at'];

    protected $fillable = ['purchaseorder_id', 'amountreceived','receiveddate','deleted_at'];
}
