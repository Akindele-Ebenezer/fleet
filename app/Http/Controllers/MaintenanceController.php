<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    
    public function config() {
        $Maintenance = Maintenance::orderBy('Date', 'DESC')->paginate(14); 
        $Maintenance__MyRecords = Maintenance::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);

        return [
            'Maintenance' => $Maintenance,
            'Maintenance__MyRecords' => $Maintenance__MyRecords,
        ];
    }

    public function index()
    {
        $Config = self::config();
        
        return view('Maintenance', $Config);
    }

    public function my_records_maintenance()
    {
        $Config = self::config();

        return view('Edit.EditMaintenance', $Config);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($Maintenance, Request $request)
    {
        Maintenance::insert([ 
            'VehicleNumber' => $Maintenance, 
            'MaintenanceAction' => $request->MaintenanceAction, 
            'Date' => $request->Date, 
            'Time' => $request->Time, 
            'ReleaseDate' => $request->ReleaseDate, 
            'ReleaseTime' => $request->ReleaseTime, 
            'Cost' => $request->Cost, 
            'InvoiceNumber' => $request->InvoiceNumber, 
            'Week' => $request->Week, 
            'DateIn' => date('F j, Y'), 
            'TimeIn' => date("g:i a"), 
            'UserId' => request()->session()->get('Id'), 
        ]);

        return back();  
    }

    /**
     * Display the specified resource.
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        Maintenance::where('id', $request->MaintenanceId)
            ->update([
                'VehicleNumber' => $request->VehicleNumber,
                'Date' => $request->Date,
                'Time' => $request->Time,
                'MaintenanceAction' => $request->MaintenanceAction,
                'ReleaseDate' => $request->ReleaseDate,
                'ReleaseTime' => $request->ReleaseTime,
                'Cost' => $request->Cost,
                'InvoiceNumber' => $request->InvoiceNumber,
                'Week' => $request->Week, 
            ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($MaintenanceId, Maintenance $maintenance)
    {
        $DeleteMaintenance = Maintenance::where('id', $MaintenanceId)->delete();

        return back();
    }
}
