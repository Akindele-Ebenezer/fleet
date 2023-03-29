<?php

use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('Login');
});

Route::get('/VehicleReport', function () {
    return view('VehicleReport');
})->name('VehicleReport');

Route::get('/Repairs', function () {
    return view('Repairs');
})->name('Repairs');

Route::get('/Maintainance', function () {
    return view('Maintainance');
})->name('Maintainance');

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

Route::get('/Cars', function () {
    return view('Cars');
})->name('Cars');