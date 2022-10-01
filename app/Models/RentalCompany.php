<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RentalCompany extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [ 'name','deleted_at'];

    public function rentalagreements()
    {
        return $this->hasMany(RentAgreement::class, 'rentalcompany_id');
    }

    public function currentAccount()
    {
        return $this->hasOne(CompanyCurrentAccount::class, 'rentalcompany_id');
    }
}
