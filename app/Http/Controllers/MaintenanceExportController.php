<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MaintenanceExport;
use Maatwebsite\Excel\Facades\Excel;

class MaintenanceExportController extends Controller
{
    public function ExportCarMaintenance($VehicleNumber) 
    {
        return Excel::download(new MaintenanceExport($VehicleNumber), 'Maintenance - DEPASA MARINE.xlsx');
    }
}
