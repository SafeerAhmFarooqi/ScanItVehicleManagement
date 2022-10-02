<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverSalaryRecord extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','month','givendate'];

    protected $fillable = ['rentalcompany_id', 'driver_id','amount','month','givendate','deleted_at'];

    public function rentalCompany()
    {
        return $this->belongsTo(RentalCompany::class, 'rentalcompany_id');
    }
}