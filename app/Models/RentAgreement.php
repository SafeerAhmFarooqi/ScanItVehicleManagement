<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentAgreement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','date'];

    protected $fillable = [ 'rentalcompany_id','company_id','vehicle_id','driver_id','duration','quantity','rate','amount','paid','date','deleted_at'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

}