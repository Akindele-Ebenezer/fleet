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

Route::get('/VehicleReport', [CarController::class, 'vehicle_report'])->name('VehicleReport');

Route::get('/EditRepairs', function () {
    return view('Edit.EditRepairs');
})->name('EditRepairs');

Route::get('/EditMaintenance', function () {
    return view('Edit.EditMaintenance');
})->name('EditMaintenance');

Route::get('/EditDeposits', function () {
    return view('Edit.EditDeposits');
})->name('EditDeposits');

Route::get('/EditRefueling', function () {
    return view('Edit.EditRefueling');
})->name('EditRefueling');

Route::get('/Repairs', [RepairController::class, 'index'])->name('Repairs');

Route::get('/Maintenance', [MaintenanceController::class, 'index'])->name('Maintenance');

Route::get('/Deposits', [DepositsController::class, 'index'])->name('Deposits');

Route::get('/Refueling', [RefuelingController::class, 'index'])->name('Refueling');
  
Route::get('/Users', [UserController::class, 'index'])->name('Users');
   
Route::get('/MyRecords', function () {
    return view('MyRecords');
})->name('MyRecords');

Route::get('/Cars', [CarController::class, 'index'])->name('Cars');
 
Route::get('/pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {

    $fpdf->AddPage();
    $fpdf->SetFont('Courier', 'B', 18);
    $fpdf->Cell(50, 25, 'Hello World!');
    $fpdf->Output();
    exit;

});