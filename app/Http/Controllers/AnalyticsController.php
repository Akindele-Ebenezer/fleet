<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;  
use App\Models\Repair;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index() {
        $MaintenanceComments = Maintenance::select(['UserId', 'MaintenanceAction', 'Date'])->limit(4)->get(7);   
        $RepairComments = Repair::select(['UserId', 'RepairAction', 'Date'])->limit(4)->get(7); 

        return view('Analytics', [
            'MaintenanceComments' => $MaintenanceComments, 
            'RepairComments' => $RepairComments,
        ]);
    }
}
