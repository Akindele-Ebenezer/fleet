<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\MaintenanceExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\MaintenanceController; 

class MaintenanceExportController extends Controller
{
    public function ExportCarMaintenance($VehicleNumber) 
    {
        return Excel::download(new MaintenanceExport($VehicleNumber), 'Maintenance - DEPASA MARINE.xlsx');
    }

    public function ExportCarMaintenanceTwo(MaintenanceController $MaintenanceController) 
    { 
        $MaintenanceController->create_schema(); 
        \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $MaintenancesExport_Filter = \DB::table('maintenances')  
        ->join('cars', 'maintenances.VehicleNumber', '=', 'cars.VehicleNumber')
        ->select(
            'maintenances.VehicleNumber', 
            \DB::raw('SUM(maintenances.Cost) as Cost'),   
            'cars.CarOwner', 'cars.CardNumber', 'maintenances.Time', 'maintenances.Date', 'maintenances.TimeIn', 'maintenances.DateIn', 
            'maintenances.IncidentType', 'maintenances.IncidentAction', 'maintenances.Details', 'maintenances.IncidentAttachment', 'maintenances.UserId' 
        )
        ->groupBy('maintenances.VehicleNumber', 'cars.CarOwner', 'cars.CardNumber', 'maintenances.Time', 'maintenances.Date', 'maintenances.TimeIn', 'maintenances.DateIn',
        'maintenances.IncidentType', 'maintenances.IncidentAction', 'maintenances.Details', 'maintenances.IncidentAttachment', 'maintenances.UserId')
        ->orderBy('Cost', 'DESC')
        ->get()
        ->toArray();
        $MaintenanceController->maintenancesExport_filter($MaintenancesExport_Filter); 
        $fileName = 'Maintenance_Report_DEPASA_MARINE - ' . now()->format('Y-m-d') . '.xlsx';
        return Excel::download(new MaintenanceExport('all', null, null), $fileName);
        return back();
    }
}
