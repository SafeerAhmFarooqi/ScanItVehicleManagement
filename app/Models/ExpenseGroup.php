<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExpenseGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['rentalcompany_id', 'name','description','deleted_at'];

    public function rentalCompany()
    {
        return $this->belongsTo(RentalCompany::class, 'rentalcompany_id');
    }
}
