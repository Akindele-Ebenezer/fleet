<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RefuelingExport;
use Maatwebsite\Excel\Facades\Excel;

class RefuelingExportController extends Controller
{
    public function Export() 
    {
        return Excel::download(new RefuelingExport, 'Refueling - DEPASA MARINE.xlsx');
    }
}
