<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverMonthlyHoliday extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','month','givendate'];

    protected $fillable = ['rentalcompany_id', 'driver_id','month','holidaydate','deleted_at'];
}