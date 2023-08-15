<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DepositsExport;
use Maatwebsite\Excel\Facades\Excel;

class DepositsExportController extends Controller
{ 
    public function ExportCarDeposits($VehicleNumber) 
    {
        return Excel::download(new DepositsExport($VehicleNumber), 'Deposits - DEPASA MARINE.xlsx');
    }
}
