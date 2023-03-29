<?php

use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    return view('Login');
});

Route::get('/VehicleReport', function () {
    return view('VehicleReport');
})->name('VehicleReport');