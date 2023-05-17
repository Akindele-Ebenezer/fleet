<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RepairsExport;
use Maatwebsite\Excel\Facades\Excel;

class RepairsExportController extends Controller
{
    public function Export() 
    {
        return Excel::download(new RepairsExport, 'Repairs - DEPASA MARINE.xlsx');
    }
}
