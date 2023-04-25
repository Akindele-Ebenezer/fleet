<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CarController; 
use App\Http\Controllers\RepairController; 
use App\Http\Controllers\MaintenanceController; 
use App\Http\Controllers\DepositsController; 
use App\Http\Controllers\RefuelingController; 
use App\Http\Controllers\UserController; 
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\FleetReportController; 

Route::get('/', function () {
    return view('Login');
});

Route::post('/Login', [AuthController::class, 'Auth'])->name('Auth');
Route::get('/Logout', [AuthController::class, 'Logout'])->name('Logout');

Route::get('/MyRecords', [CarController::class, 'my_records_activity'])->name('MyRecords'); 
Route::get('/Add/Car/{Car}', [CarController::class, 'store'])->name('store_MyRecords'); 
Route::get('/Update/Car/{Car}', [CarController::class, 'update'])->name('UpdateCar');
Route::get('/Delete/Car/{Car}', [CarController::class, 'destroy'])->name('DeleteCar');

Route::get('/Edit/Repairs', [RepairController::class, 'my_records_repairs'])->name('EditRepairs');  
Route::get('/Add/Repair/{Repair}', [RepairController::class, 'store'])->name('store_Repairs'); 
Route::get('/Update/Repair/{Repair}', [RepairController::class, 'update'])->name('UpdateRepair');
Route::get('/Delete/Repair/{Repair}', [RepairController::class, 'destroy'])->name('DeleteRepair');

Route::get('/Edit/Maintenance', [MaintenanceController::class, 'my_records_maintenance'])->name('EditMaintenance'); 
Route::get('/Add/Maintenance/{Maintenance}', [MaintenanceController::class, 'store'])->name('store_Maintenance'); 
Route::get('/Update/Maintenance/{Maintenance}', [MaintenanceController::class, 'update'])->name('UpdateMaintenance');
Route::get('/Delete/Maintenance/{Maintenance}', [MaintenanceController::class, 'destroy'])->name('DeleteMaintenance');

Route::get('/Edit/Deposits', [DepositsController::class, 'my_records_deposits'])->name('EditDeposits'); 
Route::get('/Add/Deposits/{Deposits}', [DepositsController::class, 'store'])->name('store_Deposits'); 
Route::get('/Update/Deposits/{Deposits}', [DepositsController::class, 'update'])->name('UpdateDeposits');
Route::get('/Delete/Deposits/{Deposits}', [DepositsController::class, 'destroy'])->name('DeleteDeposits');

Route::get('/Edit/Refueling', [RefuelingController::class, 'my_records_refueling'])->name('EditRefueling'); 
Route::get('/Add/Refueling/{Refueling}', [RefuelingController::class, 'store'])->name('store_Refueling'); 
Route::get('/Update/Refueling/{Refueling}', [RefuelingController::class, 'update'])->name('UpdateRefueling');
Route::get('/Delete/Refueling/{Refueling}', [RefuelingController::class, 'destroy'])->name('DeleteRefueling');

Route::get('/Cars', [CarController::class, 'index'])->name('Cars');
Route::get('/Cars/Owners', [CarController::class, 'car_owners'])->name('CarOwners');

Route::get('/VehicleReport', [CarController::class, 'vehicle_report'])->name('VehicleReport');
Route::get('/Repairs', [RepairController::class, 'index'])->name('Repairs');
Route::get('/Maintenance', [MaintenanceController::class, 'index'])->name('Maintenance');
Route::get('/Deposits', [DepositsController::class, 'index'])->name('Deposits');
Route::get('/Refueling', [RefuelingController::class, 'index'])->name('Refueling');
  
Route::get('/Users', [UserController::class, 'index'])->name('Users');
Route::get('/Add/User/{User}', [UserController::class, 'store'])->name('store_User'); 
Route::get('/Update/User/{User}', [UserController::class, 'update'])->name('UpdateUser');
Route::get('/Delete/User/{User}', [UserController::class, 'destroy'])->name('DeleteUser');

Route::get('/CarReport', [FleetReportController::class, 'car_report'])->name('CarReport');