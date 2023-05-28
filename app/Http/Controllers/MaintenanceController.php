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
  //////////////
        if (isset($_GET['Filter_All_Maintenance'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost'); 
            $Maintenance = Maintenance::whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Maintenance->withPath($_SERVER['REQUEST_URI']);

            return view('Maintenance', $Config)->with('Maintenance', $Maintenance)->with('SumOfCarMaintenance', $SumOfCarMaintenance);
        }

        if (isset($_GET['Filter_Maintenance_Yearly'])) {
            if(empty($_GET['VehicleNo']) || empty($_GET['Year'])) {
                return back();
            }

            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Cost');
            $Maintenance = Maintenance::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%') 
                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31']) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Maintenance->withPath($_SERVER['REQUEST_URI']);

            return view('Maintenance', $Config)->with('Maintenance', $Maintenance)->with('SumOfCarMaintenance', $SumOfCarMaintenance);
        }

        if (isset($_GET['Filter_Maintenance_Range'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost'); 
            $Maintenance = Maintenance::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) //ANY DATE
                                        // ->orWhereBetween('Date', ['2021-01-01', '2021-12-31']) //YEARLY
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Maintenance->withPath($_SERVER['REQUEST_URI']);

            return view('Maintenance', $Config)->with('Maintenance', $Maintenance)->with('SumOfCarMaintenance', $SumOfCarMaintenance);
        }
  //////////////
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Maintenance = Maintenance::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('IncidentType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('IncidentAction', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ReleaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ReleaseTime', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Cost', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InvoiceNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
 
                        $Maintenance->withPath($_SERVER['REQUEST_URI']);

            return view('Maintenance', $Config)->with('Maintenance', $Maintenance);
        } 
        return view('Maintenance', $Config);
    }

    public function my_records_maintenance()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Maintenance__MyRecords = Maintenance::where('UserId', self::USER_ID())
                                                    ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                                                    ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('IncidentType', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('IncidentAction', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('ReleaseDate', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('ReleaseTime', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('Cost', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('InvoiceNumber', 'LIKE', '%' . $FilterValue . '%')
                                                    ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                                                    ->paginate(7);
                            
            $Maintenance__MyRecords->withPath($_SERVER['REQUEST_URI']);

            return view('Edit.EditMaintenance', $Config)->with('Maintenance__MyRecords', $Maintenance__MyRecords);
        } 
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
        $IncidentFile = $request->file('IncidentAttachment'); 
        $DestinationPath = 'Images/Maintenance';
        $IncidentFile->move($DestinationPath, $IncidentFile->getClientOriginalName());
 
        Maintenance::insert([ 
            'VehicleNumber' => $Maintenance, 
            'IncidentType' => $request->IncidentType, 
            'IncidentAction' => $request->IncidentAction, 
            'Date' => $request->Date, 
            'Time' => $request->Time, 
            'ReleaseDate' => $request->ReleaseDate, 
            'ReleaseTime' => $request->ReleaseTime, 
            'Cost' => $request->Cost, 
            'IncidentAttachment' => $IncidentFile->getClientOriginalName(),
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
        $IncidentFile_UPDATED = $request->file('IncidentAttachment'); 
        $DestinationPath = 'Images/Maintenance';
        $IncidentFile_UPDATED->move($DestinationPath, $IncidentFile_UPDATED->getClientOriginalName());

        Maintenance::where('id', $request->MaintenanceId)
            ->update([
                'VehicleNumber' => $request->VehicleNumber,
                'Date' => $request->Date,
                'Time' => $request->Time,
                'IncidentType' => $request->IncidentType,
                'IncidentAction' => $request->IncidentAction,
                'ReleaseDate' => $request->ReleaseDate,
                'ReleaseTime' => $request->ReleaseTime,
                'Cost' => $request->Cost,
                'InvoiceNumber' => $request->InvoiceNumber,
                'Week' => $request->Week, 
                'IncidentAttachment' => $IncidentFile_UPDATED->getClientOriginalName(),
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
