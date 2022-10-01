<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyDriverSalary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','month'];

    protected $fillable = ['rentalcompany_id', 'driver_id','amount','month','deleted_at'];
}