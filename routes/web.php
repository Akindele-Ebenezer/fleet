<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CarController; 
use App\Http\Controllers\RepairController; 
use App\Http\Controllers\MaintenanceController; 
use App\Http\Controllers\DepositsController; 
use App\Http\Controllers\RefuelingController; 
use App\Http\Controllers\UserController; 

Route::get('/', function () {
    return view('Login');
});

Route::get('/MyRecords', [CarController::class, 'my_records_activity'])->name('MyRecords');
 
Route::get('/EditRepairs', [RepairController::class, 'my_records_repairs'])->name('EditRepairs'); 
 
Route::get('/EditMaintenance', [MaintenanceController::class, 'my_records_maintenance'])->name('EditMaintenance'); 
 
Route::get('/EditDeposits', [DepositsController::class, 'my_records_deposits'])->name('EditDeposits'); 
 
Route::get('/EditRefueling', [RefuelingController::class, 'my_records_refueling'])->name('EditRefueling'); 
   
Route::get('/VehicleReport', [CarController::class, 'vehicle_report'])->name('VehicleReport');

Route::get('/Repairs', [RepairController::class, 'index'])->name('Repairs');

Route::get('/Maintenance', [MaintenanceController::class, 'index'])->name('Maintenance');

Route::get('/Deposits', [DepositsController::class, 'index'])->name('Deposits');

Route::get('/Refueling', [RefuelingController::class, 'index'])->name('Refueling');
  
Route::get('/Users', [UserController::class, 'index'])->name('Users');

Route::get('/Cars', [CarController::class, 'index'])->name('Cars');
 
Route::get('/pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit;

});