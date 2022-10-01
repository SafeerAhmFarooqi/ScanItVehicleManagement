<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentalCompanyController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RentAgreementController;
use App\Http\Controllers\DriverAttendanceController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    View()->share( 'headTitle', $this->headTitle = 'Dashboard');
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::name('app.')->prefix("vehicle-management")->middleware(['auth'])->group(function () {
    Route::resource('rentalcompany', RentalCompanyController::class);
    Route::resource('vehicle', VehicleController::class);
    Route::resource('company', CompanyController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('rentagreement', RentAgreementController::class);
    Route::resource('driverattendance', DriverAttendanceController::class);
    Route::resource('account', AccountController::class);
    
});

require __DIR__.'/auth.php';
