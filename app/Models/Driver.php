<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','startTime','endTime'];

    protected $fillable = ['rentalcompany_id','vehicle_id', 'name','address','phone','license','salary','startTime','endTime','deleted_at'];

    public function advancePayment()
    {
        return $this->hasOne(DriverAdvancePayment::class, 'driver_id');
    }

    public function salaryRecords()
    {
        return $this->hasMany(DriverSalaryRecord::class, 'driver_id');
    }

    public function salaryRecordsWithRange($startDate,$endDate)
    {
        $startDate=Carbon::parse($startDate)->startOfMonth();
        $endDate=Carbon::parse($endDate)->endOfMonth();
        return DriverSalaryRecord::where('driver_id',$this->id)->whereBetween('month',[$startDate,$endDate])->get();
    }

    public function attendanceRecordsWithRange($startDate,$endDate)
    {
        $startDate=Carbon::parse($startDate)->startOfMonth();
        $endDate=Carbon::parse($endDate)->endOfMonth();
        return DriverAttendance::where('driver_id',$this->id)->whereBetween('attendancedate',[$startDate,$endDate])->get();
    }

    public function driverAttendances()
    {
        return $this->hasMany(DriverAttendance::class, 'driver_id');
    }

    public function rentalCompany()
    {
        return $this->belongsTo(RentalCompany::class, 'rentalcompany_id');
    }

    public function getLastAttendance()
    {
        return DriverAttendance::where('driver_id',$this->id)->orderBy('attendancedate','DESC')->first();
    }

    public function getLastAttendanceWithRange($startDate,$endDate)
    {
        $startDate=Carbon::parse($startDate)->startOfMonth();
        $endDate=Carbon::parse($endDate)->endOfMonth();
        return DriverAttendance::where('driver_id',$this->id)->whereBetween('attendancedate',[$startDate,$endDate])->orderBy('attendancedate','DESC')->first();
    }
}
