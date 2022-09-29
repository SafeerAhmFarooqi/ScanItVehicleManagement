<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverAttendance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','attendancedate','intime','outtime'];

    protected $fillable = ['rentalcompany_id', 'driver_id','attendancedate','intime','outtime','deleted_at'];
}