<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','startTime','endTime'];

    protected $fillable = ['rentalcompany_id', 'name','address','phone','license','salary','startTime','endTime','deleted_at'];
}