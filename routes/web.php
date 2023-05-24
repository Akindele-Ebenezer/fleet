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
use App\Http\Controllers\AnalyticsController; 
use App\Http\Controllers\CarsExportController; 
use App\Http\Controllers\RepairsExportController; 
use App\Http\Controllers\MaintenanceExportController; 
use App\Http\Controllers\DepositsExportController; 
use App\Http\Controllers\RefuelingExportController; 
use App\Http\Controllers\CardController; 
 
Route::view('/', 'Login');

Route::post('/Login', [AuthController::class, 'Auth'])->name('Auth');
Route::get('/Logout', [AuthController::class, 'Logout'])->name('Logout');

Route::get('/Analytics', [AnalyticsController::class, 'index'])->name('Analytics'); 

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

Route::get('/Management/Edit/Credit/Cards', [DepositsController::class, 'my_records_deposits'])->name('EditDeposits'); 
Route::get('/Add/Deposits/{Deposits}', [DepositsController::class, 'store'])->name('store_Deposits'); 
Route::get('/Update/Deposits/{Deposits}', [DepositsController::class, 'update'])->name('UpdateDeposits');
Route::get('/Delete/Deposits/{Deposits}/{CardNumber}/{Amount}', [DepositsController::class, 'destroy'])->name('DeleteDeposits');

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

Route::get('/Cars/Report/{CarReportId}', [FleetReportController::class, 'car_report'])->name('CarReport');
Route::get('/Cars/Repairs/Report/{RepairReportId}', [FleetReportController::class, 'repair_report'])->name('RepairReport');
Route::get('/Cars/Maintenance/Report/{MaintenanceReportId}', [FleetReportController::class, 'maintenance_report'])->name('MaintenanceReport');
Route::get('/Cars/Deposits/Report/{DepositReportId}', [FleetReportController::class, 'deposit_report'])->name('DepositsReport');
Route::get('/Cars/Refueling/Report/{RefuelingReportId}', [FleetReportController::class, 'refueling_report'])->name('RefuelingReport');

Route::get('Cars/Export/', [CarsExportController::class, 'Export'])->name('Cars_ExportToExcel');
Route::get('Repairs/Export/', [RepairsExportController::class, 'Export'])->name('Repairs_ExportToExcel');
Route::get('Maintenance/Export/', [MaintenanceExportController::class, 'Export'])->name('Maintenance_ExportToExcel');
Route::get('Deposits/Export/', [DepositsExportController::class, 'Export'])->name('Deposits_ExportToExcel');
Route::get('Refueling/Export/', [RefuelingExportController::class, 'Export'])->name('Refueling_ExportToExcel');

Route::get('/Management/Credit/Cards', [CardController::class, 'credit_card_index'])->name('CreditCard');

Route::get('/Management/Master/Cards', [CardController::class, 'master_card_index'])->name('MasterCard');
Route::get('/Management/Deposits/Master/Cards', [CardController::class, 'master_card_deposits'])->name('Deposits_MasterCard');
Route::get('/Management/Edit/Master/Cards', [CardController::class, 'master_card_edit'])->name('EditMasterCardDeposits');