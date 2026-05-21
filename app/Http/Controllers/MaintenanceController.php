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

    public function create_schema() {
        Schema::create('maintenances_export', function (Blueprint $table) {
            $table->id();
            
            // Vehicle & Reference
            $table->string('VehicleNumber')->nullable();
            $table->string('RFLNO')->nullable();
            
            // Incident Details
            $table->string('IncidentType')->nullable();
            $table->string('IncidentAction')->nullable();
            $table->text('Details')->nullable(); // Changed to text for longer descriptions
            
            // Primary Schedule
            $table->string('Date')->nullable(); // Or $table->date('Date')->nullable();
            $table->string('Time')->nullable(); // Or $table->time('Time')->nullable();
            
            // Release Schedule
            $table->string('ReleaseDate')->nullable();
            $table->string('ReleaseTime')->nullable();
            
            // Financials & Tracking
            $table->string('Cost')->nullable(); // Or $table->decimal('Cost', 15, 2)->nullable();
            $table->string('InvoiceNumber')->nullable();
            $table->string('Week')->nullable();
            $table->string('IncidentAttachment')->nullable();
            
            // Audit Trail
            $table->string('UserId')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            
            $table->timestamps();
        });
    }

    public function maintenancesExport_filter($MaintenancesExport_Filter) {
        foreach ($MaintenancesExport_Filter as $FilterData) {
            \DB::table('maintenances_export')->insert([
                'VehicleNumber' => $FilterData->VehicleNumber, 
                'Date' => $FilterData->Date, 
                'Cost' => $FilterData->Cost, 
                'Time' => $FilterData->Time,  
                'DateIn' => $FilterData->DateIn, 
                'TimeIn' => $FilterData->TimeIn, 
                'UserId' => $FilterData->UserId, 
            ]); 
        } 
    }

    public function index()
    {
        $Config = self::config();
        Schema::dropIfExists('maintenances_export');
  
        if (isset($_GET['Filter_All_Maintenance'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }
            $this->create_schema(); 
            $MaintenancesExport_Filter = \DB::table('maintenances')  
                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                    ->get()->toArray();  

                    \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
                    $MaintenancesExport_Filter = \DB::table('maintenances')
                    ->join('cars', 'maintenances.VehicleNumber', '=', 'cars.VehicleNumber')
                    ->select('maintenances.VehicleNumber', 
                                \DB::raw('SUM(maintenances.Cost) as Cost'),  
                                'cars.CarOwner', 'cars.CardNumber', 'maintenances.Time', 'maintenances.Date', 
                                'maintenances.IncidentType', 'maintenances.IncidentAction',  'maintenances.InvoiceNumber', 'cars.CarOwner', 'maintenances.Details', 'maintenances.ReleaseDate',   'maintenances.IncidentAttachment', 'maintenances.Week', 'maintenances.ReleaseTime', 'maintenances.DateIn', 'maintenances.TimeIn', 'maintenances.UserId')
                    ->whereBetween('maintenances.Date', [$_GET['Date_From'], $_GET['Date_To']])
                    ->groupBy('maintenances.VehicleNumber', 'cars.CarOwner')->orderBy('Cost', 'DESC')->get()->toArray(); 
                    $this->maintenancesExport_filter($MaintenancesExport_Filter);
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
            $this->create_schema();
            $MaintenancesExport_Filter = \DB::table('maintenances')  
                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%') 
                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                    ->get()->toArray();  
            $this->maintenancesExport_filter($MaintenancesExport_Filter);
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
            $this->create_schema();
            $MaintenancesExport_Filter = \DB::table('maintenances')  
                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                    ->get()->toArray();  
            $this->maintenancesExport_filter($MaintenancesExport_Filter);
            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost'); 
            $Maintenance = Maintenance::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) //ANY DATE
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
            $Maintenance->withPath($_SERVER['REQUEST_URI']);
            return view('Maintenance', $Config)->with('Maintenance', $Maintenance)->with('SumOfCarMaintenance', $SumOfCarMaintenance);
        }
  
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $this->create_schema();
            $MaintenancesExport_Filter = \DB::table('maintenances')  
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
                    ->get()->toArray();  
            $this->maintenancesExport_filter($MaintenancesExport_Filter);
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
        $data = [
            'VehicleNumber' => $request->VehicleNumber_MAINTENANCE, 
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
        ];
        if ($request->hasFile('IncidentAttachment')) {
            $IncidentFile = $request->file('IncidentAttachment'); 
            $DestinationPath = 'Images/Maintenance';
            $IncidentFile->move($DestinationPath, $IncidentFile->getClientOriginalName());
            $data['IncidentAttachment'] = $IncidentFile->getClientOriginalName();
        } 
        Maintenance::insert($data);
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
        $data = [
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
        ];
       if ($request->hasFile('IncidentAttachment')) {
            $file = $request->file('IncidentAttachment'); 
            $filename = $file->getClientOriginalName();
            $file->move('Images/Maintenance', $filename);
            $data['IncidentAttachment'] = $filename;
        }
        Maintenance::where('id', $request->MaintenanceId)->update($data);
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
