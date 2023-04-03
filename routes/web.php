<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CarController; 

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

Route::get('/Repairs', function () {
    return view('Edit.EditRepairs');
})->name('Repairs');

Route::get('/Maintenance', function () {
    return view('Maintenance');
})->name('Maintenance');

Route::get('/Deposits', function () {
    return view('Deposits');
})->name('Deposits');

Route::get('/Refueling', function () {
    return view('Refueling');
})->name('Refueling');

Route::get('/Users', function () {
    return view('Users');
})->name('Users');

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