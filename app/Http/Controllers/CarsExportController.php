<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CarsExport;
use Maatwebsite\Excel\Facades\Excel;

class CarsExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new CarsExport, 'Cars - DEPASA MARINE.xlsx');
    }
}
