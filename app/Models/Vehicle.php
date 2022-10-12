<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','warrantyperiod'];

    protected $fillable = [ 'rentalcompany_id','name','enginenumber','model','cc','licensenumber','warrantyperiod','deleted_at'];

    
    public function rentalCompany()
    {
        return $this->belongsTo(RentalCompany::class, 'rentalcompany_id');
    }
}
