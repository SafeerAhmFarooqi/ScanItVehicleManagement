<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [ 'name','address','phone','deleted_at'];

    public function rentalagreements()
    {
        return $this->hasMany(RentAgreement::class, 'company_id');
    }
}
