<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\RefuelingExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Refueling;
use App\Http\Controllers\RefuelingController; 

class RefuelingExportController extends Controller
{
    public function ExportCarFuelHistory($Car, $DateFrom, $DateTo) 
    {
        $fileName = 'Refueling_Report_DEPASA_MARINE - ' . now()->format('Y-m-d') . '.xlsx';
        return Excel::download(new RefuelingExport($Car, $DateFrom, $DateTo), $fileName);
    }

    public function ExportCarFuelHistoryTwo(RefuelingController $RefuelingController) 
    { 
        $RefuelingController->create_schema(); 
        \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
        $RefuelingsExport_Filter = \DB::table('refuelings')  
        ->join('cars', 'refuelings.VehicleNumber', '=', 'cars.VehicleNumber')
        ->select(
            'refuelings.VehicleNumber', 
            \DB::raw('SUM(refuelings.Amount) as Amount'), 
            \DB::raw('AVG(refuelings.Consumption) as Consumption'), 
            \DB::raw('SUM(refuelings.Quantity) as Quantity'),
            \DB::raw('SUM(refuelings.KM) as TotalKM'),
            'cars.CarOwner', 'refuelings.CardNumber', 'refuelings.Time', 'refuelings.Date', 
            'refuelings.Mileage', 'refuelings.TERNO', 'refuelings.ReceiptNumber', 'cars.CarOwner',
            'refuelings.KM', 'refuelings.DateIn', 'refuelings.TimeIn', 'refuelings.UserId' 
        )
        ->groupBy('refuelings.VehicleNumber', 'cars.CarOwner', 'refuelings.CardNumber', 'refuelings.Time', 'refuelings.Date', 
        'refuelings.Mileage', 'refuelings.TERNO', 'refuelings.ReceiptNumber', 'cars.CarOwner',
        'refuelings.KM', 'refuelings.DateIn', 'refuelings.TimeIn', 'refuelings.UserId')
        ->orderBy('Amount', 'DESC')
        ->get()
        ->toArray();
        $RefuelingController->refuelingsExport_filter($RefuelingsExport_Filter); 
        $fileName = 'Refueling_Report_DEPASA_MARINE - ' . now()->format('Y-m-d') . '.xlsx';
        return Excel::download(new RefuelingExport('all', null, null), $fileName);
        return back();
    }
}
