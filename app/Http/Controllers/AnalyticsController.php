<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;  
use App\Models\Repair;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index() {
        $MaintenanceComments = Maintenance::select(['UserId', 'IncidentAction', 'Date'])->limit(4)->whereNot('IncidentAction', NULL)->orderBy('Date', 'DESC')->get();   
        $RepairComments = Repair::select(['UserId', 'RepairAction', 'Date'])->limit(4)->whereNot('RepairAction', NULL)->orderBy('Date', 'DESC')->get(); 

        return view('Analytics', [
            'MaintenanceComments' => $MaintenanceComments, 
            'RepairComments' => $RepairComments,
        ]);
    }
}
