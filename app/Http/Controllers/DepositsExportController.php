<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DepositsExport;
use Maatwebsite\Excel\Facades\Excel;

class DepositsExportController extends Controller
{
    public function Export() 
    {
        return Excel::download(new DepositsExport, 'Deposits - DEPASA MARINE.xlsx');
    }
}
