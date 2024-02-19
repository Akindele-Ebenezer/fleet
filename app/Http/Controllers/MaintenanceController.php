<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    
    public function config() {
        $Maintenance = Maintenance::orderBy('Date', 'DESC')->orderBy('Time', 'DESC')->paginate(14); 
        $Maintenance__MyRecords = Maintenance::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->orderBy('Time', 'DESC')->paginate(14);

        return [
            'Maintenance' => $Maintenance,
            'Maintenance__MyRecords' => $Maintenance__MyRecords,
        ];
    }

    public function index()
    {
        $Config = self::config();
        Schema::dropIfExists('maintenances_export');
  
        if (isset($_GET['Filter_All_Maintenance'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('maintenances_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('IncidentType')->nullable();
                    $table->string('IncidentAction')->nullable();
                    $table->string('Details')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('ReleaseDate')->nullable();
                    $table->string('ReleaseTime')->nullable();
                    $table->string('Cost')->nullable();
                    $table->string('InvoiceNumber')->nullable();
                    $table->string('Week')->nullable();
                    $table->string('IncidentAttachment')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->timestamps();
                });
                /////
                $MaintenancesExport_Filter = \DB::table('maintenances')  
                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                        ->get()->toArray();  

                        foreach ($MaintenancesExport_Filter as $FilterData) {
                            \DB::table('maintenances_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'RFLNO' => $FilterData->RFLNO, 
                                'IncidentType' => $FilterData->IncidentType, 
                                'IncidentAction' => $FilterData->IncidentAction, 
                                'Details' => $FilterData->Details, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'ReleaseDate' => $FilterData->ReleaseDate, 
                                'ReleaseTime' => $FilterData->ReleaseTime, 
                                'Cost' => $FilterData->Cost, 
                                'InvoiceNumber' => $FilterData->InvoiceNumber,  
                                'Week' => $FilterData->Week,  
                                'IncidentAttachment' => $FilterData->IncidentAttachment, 
                                'UserId' => $FilterData->UserId, 
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                            ]); 
                        } 
                ////////////////
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

                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('maintenances_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('IncidentType')->nullable();
                    $table->string('IncidentAction')->nullable();
                    $table->string('Details')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('ReleaseDate')->nullable();
                    $table->string('ReleaseTime')->nullable();
                    $table->string('Cost')->nullable();
                    $table->string('InvoiceNumber')->nullable();
                    $table->string('Week')->nullable();
                    $table->string('IncidentAttachment')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->timestamps();
                });
                /////
                $MaintenancesExport_Filter = \DB::table('maintenances')  
                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%') 
                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                        ->get()->toArray();  

                        foreach ($MaintenancesExport_Filter as $FilterData) {
                            \DB::table('maintenances_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'RFLNO' => $FilterData->RFLNO, 
                                'IncidentType' => $FilterData->IncidentType, 
                                'IncidentAction' => $FilterData->IncidentAction, 
                                'Details' => $FilterData->Details, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'ReleaseDate' => $FilterData->ReleaseDate, 
                                'ReleaseTime' => $FilterData->ReleaseTime, 
                                'Cost' => $FilterData->Cost, 
                                'InvoiceNumber' => $FilterData->InvoiceNumber,  
                                'Week' => $FilterData->Week,  
                                'IncidentAttachment' => $FilterData->IncidentAttachment, 
                                'UserId' => $FilterData->UserId, 
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                            ]); 
                        } 
                ////////////////
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

                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('maintenances_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('IncidentType')->nullable();
                    $table->string('IncidentAction')->nullable();
                    $table->string('Details')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('ReleaseDate')->nullable();
                    $table->string('ReleaseTime')->nullable();
                    $table->string('Cost')->nullable();
                    $table->string('InvoiceNumber')->nullable();
                    $table->string('Week')->nullable();
                    $table->string('IncidentAttachment')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->timestamps();
                });
                /////
                $MaintenancesExport_Filter = \DB::table('maintenances')  
                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                        ->get()->toArray();  

                        foreach ($MaintenancesExport_Filter as $FilterData) {
                            \DB::table('maintenances_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'RFLNO' => $FilterData->RFLNO, 
                                'IncidentType' => $FilterData->IncidentType, 
                                'IncidentAction' => $FilterData->IncidentAction, 
                                'Details' => $FilterData->Details, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'ReleaseDate' => $FilterData->ReleaseDate, 
                                'ReleaseTime' => $FilterData->ReleaseTime, 
                                'Cost' => $FilterData->Cost, 
                                'InvoiceNumber' => $FilterData->InvoiceNumber,  
                                'Week' => $FilterData->Week,  
                                'IncidentAttachment' => $FilterData->IncidentAttachment, 
                                'UserId' => $FilterData->UserId, 
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                            ]); 
                        } 
                ////////////////
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

            if ($FilterValue === 'active') {
                $Maintenance = Maintenance::join('cars', 'cars.VehicleNumber', '=', 'maintenances.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'maintenances.VehicleNumber', 
                        'maintenances.Date', 
                        'maintenances.Time', 
                        'maintenances.IncidentType', 
                        'maintenances.IncidentAction', 
                        'maintenances.Details', 
                        'maintenances.ReleaseDate', 
                        'maintenances.ReleaseTime', 
                        'maintenances.Cost', 
                        'maintenances.InvoiceNumber',
                        'maintenances.Week',
                        'maintenances.IncidentAttachment'
                    ])->where('Status', 'ACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Maintenance->withPath($_SERVER['REQUEST_URI']);
            } else if ($FilterValue === 'inactive') {
                $Maintenance = Maintenance::join('cars', 'cars.VehicleNumber', '=', 'maintenances.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'maintenances.VehicleNumber', 
                        'maintenances.Date', 
                        'maintenances.Time', 
                        'maintenances.IncidentType', 
                        'maintenances.IncidentAction', 
                        'maintenances.Details', 
                        'maintenances.ReleaseDate', 
                        'maintenances.ReleaseTime', 
                        'maintenances.Cost', 
                        'maintenances.InvoiceNumber',
                        'maintenances.Week',
                        'maintenances.IncidentAttachment'
                    ])->where('Status', 'INACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Maintenance->withPath($_SERVER['REQUEST_URI']);
            } else {
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
                    ->orderBy('Date', 'DESC')
                    ->orderBy('Time', 'DESC')
                    ->paginate(7);

                    $Maintenance->withPath($_SERVER['REQUEST_URI']);
            }
            return view('Maintenance', $Config)->with('Maintenance', $Maintenance);
        } 
        return view('Maintenance', $Config);
    }

    public function my_records_maintenance()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 

            if ($FilterValue === 'active') {
                $Maintenance__MyRecords = Maintenance::join('cars', 'cars.VehicleNumber', '=', 'maintenances.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'maintenances.VehicleNumber', 
                        'maintenances.Date', 
                        'maintenances.Time', 
                        'maintenances.IncidentType', 
                        'maintenances.IncidentAction', 
                        'maintenances.Details', 
                        'maintenances.ReleaseDate', 
                        'maintenances.ReleaseTime', 
                        'maintenances.Cost', 
                        'maintenances.InvoiceNumber',
                        'maintenances.Week',
                        'maintenances.IncidentAttachment'
                    ])->where('maintenances.UserId', self::USER_ID())
                    ->where('Status', 'ACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Maintenance__MyRecords->withPath($_SERVER['REQUEST_URI']);
            } else if ($FilterValue === 'inactive') {
                $Maintenance__MyRecords = Maintenance::join('cars', 'cars.VehicleNumber', '=', 'maintenances.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'maintenances.VehicleNumber', 
                        'maintenances.Date', 
                        'maintenances.Time', 
                        'maintenances.IncidentType', 
                        'maintenances.IncidentAction', 
                        'maintenances.Details', 
                        'maintenances.ReleaseDate', 
                        'maintenances.ReleaseTime', 
                        'maintenances.Cost', 
                        'maintenances.InvoiceNumber',
                        'maintenances.Week',
                        'maintenances.IncidentAttachment'
                    ])->where('maintenances.UserId', self::USER_ID())
                    ->where('Status', 'INACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Maintenance__MyRecords->withPath($_SERVER['REQUEST_URI']);
            } else {
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
                    ->orderBy('Date', 'DESC')
                    ->orderBy('Time', 'DESC') 
                    ->paginate(7);

                $Maintenance__MyRecords->withPath($_SERVER['REQUEST_URI']);
            }
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
        if ($request->hasFile('IncidentAttachment')) {
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
        } else {
            Maintenance::insert([ 
                'VehicleNumber' => $Maintenance, 
                'IncidentType' => $request->IncidentType, 
                'IncidentAction' => $request->IncidentAction, 
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
        }

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
        if ($request->hasFile('IncidentAttachment')) {
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
        } else {
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
                ]); 
        }

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
