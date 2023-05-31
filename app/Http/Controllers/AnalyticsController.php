<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;   
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index() {
        $MaintenanceComments = Maintenance::select(['UserId', 'IncidentAction', 'Date'])->limit(4)->whereNot('IncidentAction', NULL)->where('IncidentType', 'MAINTENANCE')->orderBy('Date', 'DESC')->get();   
        $RepairComments = Maintenance::select(['UserId', 'IncidentAction', 'Date'])->where('IncidentType', 'REPAIR')->limit(4)->whereNot('IncidentAction', NULL)->orderBy('Date', 'DESC')->get(); 

        return view('Analytics', [
            'MaintenanceComments' => $MaintenanceComments, 
            'RepairComments' => $RepairComments,
        ]);
    }
}
