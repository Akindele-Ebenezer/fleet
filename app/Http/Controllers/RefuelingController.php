<?php

namespace App\Http\Controllers;

use App\Models\Refueling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class RefuelingController extends Controller
{
    
    public function config() {
        $Refueling = Refueling::orderBy('Date', 'DESC')->orderBy('Time', 'DESC')->paginate(14); 
        $Refueling__MyRecords = Refueling::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->orderBy('Time', 'DESC')->paginate(14);

        return [
            'Refuelings' => $Refueling,
            'Refueling__MyRecords' => $Refueling__MyRecords,
        ];
    }

    public function index()
    {
        $Config = self::config();
        Schema::dropIfExists('refuelings_export');

        if (isset($_GET['Filter_All_Refueling'])) { 
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();  
            }

                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('refuelings_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('Mileage')->nullable();
                    $table->string('KMLITER')->nullable();
                    $table->string('TERNO')->nullable();
                    $table->string('ReceiptNumber')->nullable(); 
                    $table->string('Quantity')->nullable();
                    $table->string('Amount')->nullable();
                    $table->string('CardNumber')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->string('KM')->nullable();
                    $table->string('Consumption')->nullable();
                    $table->timestamps();
                });
                /////
                \DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
                $RefuelingsExport_Filter = \DB::table('refuelings')  
                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])->groupBy('VehicleNumber')
                        ->get()->toArray();
                        $RefuelingsExport_Filter = \DB::table('refuelings')
                        ->join('cars', 'refuelings.VehicleNumber', '=', 'cars.VehicleNumber')
                        ->select('refuelings.VehicleNumber', 
                                 \DB::raw('SUM(refuelings.Amount) as Amount'), 
                                 \DB::raw('SUM(refuelings.Consumption) as Consumption'), 
                                 \DB::raw('SUM(refuelings.Quantity) as Quantity'),
                                 'cars.CarOwner', 'refuelings.CardNumber', 'refuelings.Time', 'refuelings.Date', 
                                 'refuelings.Mileage', 'refuelings.TERNO', 'refuelings.ReceiptNumber',
                                 'refuelings.KM', 'refuelings.DateIn', 'refuelings.TimeIn', 'refuelings.UserId')
                        ->whereBetween('refuelings.Date', [$_GET['Date_From'], $_GET['Date_To']])
                        ->groupBy('refuelings.VehicleNumber', 'cars.CarOwner')->get()->toArray(); 

                        foreach ($RefuelingsExport_Filter as $FilterData) {
                            \DB::table('refuelings_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'Date' => $FilterData->Date, 
                                'CardNumber' => $FilterData->CardNumber, 
                                'Amount' => $FilterData->Amount, 
                                'Time' => $FilterData->Time, 
                                'Mileage' => $FilterData->Mileage, 
                                'TERNO' => $FilterData->TERNO, 
                                'Quantity' => $FilterData->Quantity, 
                                'Amount' => $FilterData->Amount, 
                                'ReceiptNumber' => $FilterData->ReceiptNumber, 
                                'KM' => $FilterData->KM,  
                                'Consumption' => $FilterData->Consumption,  
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                                'UserId' => $FilterData->UserId, 
                            ]); 
                        } 
                ////////////////
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $Refueling = Refueling::whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Refueling->withPath($_SERVER['REQUEST_URI']);

            return view('Refueling', $Config)->with('Refuelings', $Refueling)->with('SumOfCarRefueling', $SumOfCarRefueling);
        }

        if (isset($_GET['Filter_Refueling_Yearly'])) {
            if(empty($_GET['VehicleNo']) || empty($_GET['Year'])) {
                return back();
            }

                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('refuelings_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('Mileage')->nullable();
                    $table->string('KMLITER')->nullable();
                    $table->string('TERNO')->nullable();
                    $table->string('ReceiptNumber')->nullable(); 
                    $table->string('Quantity')->nullable();
                    $table->string('Amount')->nullable();
                    $table->string('CardNumber')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->string('KM')->nullable();
                    $table->string('Consumption')->nullable();
                    $table->timestamps();
                });
                /////
                $RefuelingsExport_Filter = \DB::table('refuelings')  
                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%') 
                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                        ->get()->toArray();  

                        foreach ($RefuelingsExport_Filter as $FilterData) {
                            \DB::table('refuelings_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'CardNumber' => $FilterData->CardNumber, 
                                'Amount' => $FilterData->Amount, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'Mileage' => $FilterData->Mileage, 
                                'TERNO' => $FilterData->TERNO, 
                                'Quantity' => $FilterData->Quantity, 
                                'Amount' => $FilterData->Amount, 
                                'ReceiptNumber' => $FilterData->ReceiptNumber, 
                                'KM' => $FilterData->KM,  
                                'Consumption' => $FilterData->Consumption,  
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                                'UserId' => $FilterData->UserId, 
                            ]); 
                        } 
                ////////////////
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Amount'); 
            $Refueling = Refueling::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%') 
                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31']) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Refueling->withPath($_SERVER['REQUEST_URI']);

            return view('Refueling', $Config)->with('Refuelings', $Refueling)->with('SumOfCarRefueling', $SumOfCarRefueling);
        }

        if (isset($_GET['Filter_Refueling_Range'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('refuelings_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('Mileage')->nullable();
                    $table->string('KMLITER')->nullable();
                    $table->string('TERNO')->nullable();
                    $table->string('ReceiptNumber')->nullable(); 
                    $table->string('Quantity')->nullable();
                    $table->string('Amount')->nullable();
                    $table->string('CardNumber')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->string('KM')->nullable();
                    $table->string('Consumption')->nullable();
                    $table->timestamps();
                });
                /////
                $RefuelingsExport_Filter = \DB::table('refuelings')  
                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                        ->get()->toArray();  

                        foreach ($RefuelingsExport_Filter as $FilterData) {
                            \DB::table('refuelings_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'CardNumber' => $FilterData->CardNumber, 
                                'Amount' => $FilterData->Amount, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'Mileage' => $FilterData->Mileage, 
                                'TERNO' => $FilterData->TERNO, 
                                'Quantity' => $FilterData->Quantity, 
                                'Amount' => $FilterData->Amount, 
                                'ReceiptNumber' => $FilterData->ReceiptNumber, 
                                'KM' => $FilterData->KM,  
                                'Consumption' => $FilterData->Consumption,  
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                                'UserId' => $FilterData->UserId, 
                            ]); 
                        } 
                ////////////////
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $Refueling = Refueling::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) //ANY DATE
                                        // ->orWhereBetween('Date', ['2021-01-01', '2021-12-31']) //YEARLY
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Refueling->withPath($_SERVER['REQUEST_URI']);

            return view('Refueling', $Config)->with('Refuelings', $Refueling)->with('SumOfCarRefueling', $SumOfCarRefueling);
        }
        ///////
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 

            if ($FilterValue === 'active') {
                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('refuelings_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('Mileage')->nullable();
                    $table->string('KMLITER')->nullable();
                    $table->string('TERNO')->nullable();
                    $table->string('ReceiptNumber')->nullable(); 
                    $table->string('Quantity')->nullable();
                    $table->string('Amount')->nullable();
                    $table->string('CardNumber')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->string('KM')->nullable();
                    $table->string('Consumption')->nullable();
                    $table->timestamps();
                });
                /////
                $RefuelingsExport_Filter = \DB::table('refuelings')->join('cars', 'cars.VehicleNumber', '=', 'refuelings.VehicleNumber')
                                            ->select([
                                                'cars.VehicleNumber', 
                                                'refuelings.VehicleNumber', 
                                                'refuelings.Date', 
                                                'refuelings.Time', 
                                                'refuelings.Mileage', 
                                                'refuelings.TERNO', 
                                                'refuelings.Quantity', 
                                                'refuelings.Amount', 
                                                'refuelings.CardNumber', 
                                                'refuelings.KM', 
                                                'refuelings.ReceiptNumber',
                                                'refuelings.Consumption',
                                                'refuelings.DateIn',
                                                'refuelings.TimeIn',
                                                'refuelings.UserId',
                                            ])  
                                            ->where('Status', 'ACTIVE')
                                            ->get()->toArray();  

                        foreach ($RefuelingsExport_Filter as $FilterData) {
                            \DB::table('refuelings_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'CardNumber' => $FilterData->CardNumber, 
                                'Amount' => $FilterData->Amount, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'Mileage' => $FilterData->Mileage, 
                                'TERNO' => $FilterData->TERNO, 
                                'Quantity' => $FilterData->Quantity, 
                                'Amount' => $FilterData->Amount, 
                                'ReceiptNumber' => $FilterData->ReceiptNumber, 
                                'KM' => $FilterData->KM,  
                                'Consumption' => $FilterData->Consumption,  
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                                'UserId' => $FilterData->UserId, 
                            ]); 
                        } 
                ////////////////
                $Refuelings = Refueling::join('cars', 'cars.VehicleNumber', '=', 'refuelings.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'refuelings.VehicleNumber', 
                        'refuelings.Date', 
                        'refuelings.Time', 
                        'refuelings.Mileage', 
                        'refuelings.TERNO', 
                        'refuelings.Quantity', 
                        'refuelings.Amount', 
                        'refuelings.CardNumber', 
                        'refuelings.KM', 
                        'refuelings.Consumption'
                    ])->where('Status', 'ACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Refuelings->withPath($_SERVER['REQUEST_URI']);
            } else if ($FilterValue === 'inactive') {
                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('refuelings_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('Mileage')->nullable();
                    $table->string('KMLITER')->nullable();
                    $table->string('TERNO')->nullable();
                    $table->string('ReceiptNumber')->nullable(); 
                    $table->string('Quantity')->nullable();
                    $table->string('Amount')->nullable();
                    $table->string('CardNumber')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->string('KM')->nullable();
                    $table->string('Consumption')->nullable();
                    $table->timestamps();
                });
                /////
                $RefuelingsExport_Filter = \DB::table('refuelings')->join('cars', 'cars.VehicleNumber', '=', 'refuelings.VehicleNumber')
                                            ->select([
                                                'cars.VehicleNumber', 
                                                'refuelings.VehicleNumber', 
                                                'refuelings.Date', 
                                                'refuelings.Time', 
                                                'refuelings.Mileage', 
                                                'refuelings.TERNO', 
                                                'refuelings.Quantity', 
                                                'refuelings.Amount', 
                                                'refuelings.CardNumber', 
                                                'refuelings.KM', 
                                                'refuelings.ReceiptNumber',
                                                'refuelings.Consumption',
                                                'refuelings.DateIn',
                                                'refuelings.TimeIn',
                                                'refuelings.UserId',
                                            ])  
                                            ->where('Status', 'INACTIVE')
                                            ->get()->toArray();  

                        foreach ($RefuelingsExport_Filter as $FilterData) {
                            \DB::table('refuelings_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'CardNumber' => $FilterData->CardNumber, 
                                'Amount' => $FilterData->Amount, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'Mileage' => $FilterData->Mileage, 
                                'TERNO' => $FilterData->TERNO, 
                                'Quantity' => $FilterData->Quantity, 
                                'Amount' => $FilterData->Amount, 
                                'ReceiptNumber' => $FilterData->ReceiptNumber, 
                                'KM' => $FilterData->KM,  
                                'Consumption' => $FilterData->Consumption,  
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                                'UserId' => $FilterData->UserId, 
                            ]); 
                        } 
                ////////////////
                $Refuelings = Refueling::join('cars', 'cars.VehicleNumber', '=', 'refuelings.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'refuelings.VehicleNumber', 
                        'refuelings.Date', 
                        'refuelings.Time', 
                        'refuelings.Mileage', 
                        'refuelings.TERNO', 
                        'refuelings.Quantity', 
                        'refuelings.Amount', 
                        'refuelings.CardNumber', 
                        'refuelings.KM', 
                        'refuelings.Consumption'
                    ])->where('Status', 'INACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Refuelings->withPath($_SERVER['REQUEST_URI']);
            } else {
                // CREATE NEW TABLE FOR EXPORT DATA
                Schema::create('refuelings_export', function (Blueprint $table) {
                    $table->id();
                    $table->string('VehicleNumber')->nullable();
                    $table->string('RFLNO')->nullable();
                    $table->string('Date')->nullable();
                    $table->string('Time')->nullable();
                    $table->string('Mileage')->nullable();
                    $table->string('KMLITER')->nullable();
                    $table->string('TERNO')->nullable();
                    $table->string('ReceiptNumber')->nullable(); 
                    $table->string('Quantity')->nullable();
                    $table->string('Amount')->nullable();
                    $table->string('CardNumber')->nullable();
                    $table->string('UserId')->nullable();
                    $table->string('DateIn')->nullable();
                    $table->string('TimeIn')->nullable();
                    $table->string('KM')->nullable();
                    $table->string('Consumption')->nullable();
                    $table->timestamps();
                });
                /////
                $RefuelingsExport_Filter = \DB::table('refuelings')  
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Mileage', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TERNO', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Quantity', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('ReceiptNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('KM', 'LIKE', '%' . $FilterValue . '%') 
                        ->get()->toArray();  

                        foreach ($RefuelingsExport_Filter as $FilterData) {
                            \DB::table('refuelings_export')->insert([
                                'VehicleNumber' => $FilterData->VehicleNumber, 
                                'CardNumber' => $FilterData->CardNumber, 
                                'Amount' => $FilterData->Amount, 
                                'Date' => $FilterData->Date, 
                                'Time' => $FilterData->Time, 
                                'Mileage' => $FilterData->Mileage, 
                                'TERNO' => $FilterData->TERNO, 
                                'Quantity' => $FilterData->Quantity, 
                                'Amount' => $FilterData->Amount, 
                                'ReceiptNumber' => $FilterData->ReceiptNumber, 
                                'KM' => $FilterData->KM,  
                                'Consumption' => $FilterData->Consumption,  
                                'DateIn' => $FilterData->DateIn, 
                                'TimeIn' => $FilterData->TimeIn, 
                                'UserId' => $FilterData->UserId, 
                            ]); 
                        } 
                ////////////////

                $Refuelings = Refueling::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                    ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('Mileage', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('TERNO', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('Quantity', 'LIKE', '%' . $FilterValue . '%')
                    ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%') 
                    ->orWhere('ReceiptNumber', 'LIKE', '%' . $FilterValue . '%') 
                    ->orWhere('KM', 'LIKE', '%' . $FilterValue . '%') 
                    ->orderBy('Date', 'DESC')
                    ->orderBy('Time', 'DESC')
                    ->paginate(7);

                    $Refuelings->withPath($_SERVER['REQUEST_URI']);
            }
            return view('Refueling', $Config)->with('Refuelings', $Refuelings);
        } 
        return view('Refueling', $Config);
    }

    public function my_records_refueling()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 

            if ($FilterValue === 'active') {
                $Refueling__MyRecords = Refueling::join('cars', 'cars.VehicleNumber', '=', 'refuelings.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'refuelings.VehicleNumber', 
                        'refuelings.Date', 
                        'refuelings.Time', 
                        'refuelings.Mileage', 
                        'refuelings.TERNO', 
                        'refuelings.Quantity', 
                        'refuelings.Amount', 
                        'refuelings.CardNumber', 
                        'refuelings.KM', 
                        'refuelings.Consumption'
                    ])->where('refuelings.UserId', self::USER_ID())
                    ->where('Status', 'ACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Refueling__MyRecords->withPath($_SERVER['REQUEST_URI']);
            } else if ($FilterValue === 'inactive') {
                $Refueling__MyRecords = Refueling::join('cars', 'cars.VehicleNumber', '=', 'refuelings.VehicleNumber')
                    ->select([
                        'cars.VehicleNumber', 
                        'refuelings.VehicleNumber', 
                        'refuelings.Date', 
                        'refuelings.Time', 
                        'refuelings.Mileage', 
                        'refuelings.TERNO', 
                        'refuelings.Quantity', 
                        'refuelings.Amount', 
                        'refuelings.CardNumber', 
                        'refuelings.KM', 
                        'refuelings.Consumption'
                    ])->where('refuelings.UserId', self::USER_ID())
                    ->where('Status', 'INACTIVE')->orderBy('Date', 'DESC')->paginate(14);
 
                $Refueling__MyRecords->withPath($_SERVER['REQUEST_URI']);
            }  else {
                $Refueling__MyRecords = Refueling::where('UserId', self::USER_ID())
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Mileage', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TERNO', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Quantity', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('ReceiptNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('KM', 'LIKE', '%' . $FilterValue . '%') 
                        ->orderBy('Date', 'DESC')
                        ->orderBy('Time', 'DESC')
                        ->paginate(7);

                $Refueling__MyRecords->withPath($_SERVER['REQUEST_URI']);
            }
            return view('Edit.EditRefueling', $Config)->with('Refueling__MyRecords', $Refueling__MyRecords);
        } 
        return view('Edit.EditRefueling', $Config);
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
    public function store($Refueling, Request $request)
    { 
        $Mileage = \App\Models\Refueling::select('Mileage')->whereNotNull('VehicleNumber')->where('VehicleNumber', $request->VehicleNumber_REFUELING)->orderBy('Date', 'DESC')->first();  
        $KM = $request->Mileage - ($Mileage->Mileage ?? 0);  
        $FuelConsumption = $request->Quantity == 0 ? 0 : $KM / $request->Quantity; 
        
        if ($request->CardType === 'fleet-card') {
            $Balance = \App\Models\Car::whereNotNull('CardNumber')->where('CardNumber', $request->CardNumber)->first();  
            $Balance->Balance = $Balance->Balance - $request->Amount;
            $Balance->save();
        } elseif ($request->CardType === 'master-card') {
            $Balance = \App\Models\MasterCard::whereNotNull('CardNumber')->where('CardNumber', $request->CardNumber)->first();  
            $Balance->Balance = $Balance->Balance - $request->Amount;
            $Balance->save();
        } elseif ($request->CardType === 'voucher-card') {
            $Balance = \DB::table('voucher_cards')->whereNotNull('CardNumber')->where('CardNumber', $request->CardNumber)->first();  
            $VoucherBalance = $Balance->Balance - $request->Amount;
            
            \DB::table('voucher_cards')->where('CardNumber', $request->CardNumber)
            ->update([ 
                'Balance' => $VoucherBalance,  
            ]);
        }

        Refueling::insert([ 
            'VehicleNumber' => $request->VehicleNumber_REFUELING, 
            'CardNumber' => $request->CardNumber, 
            'Amount' => $request->Amount, 
            'Date' => $request->Date, 
            'Time' => $request->Time, 
            'KMLITER' => $request->KMLITER, 
            'Mileage' => $request->Mileage, 
            'TERNO' => $request->TerminalNumber, 
            'Quantity' => $request->Quantity, 
            'Amount' => $request->Amount, 
            'ReceiptNumber' => $request->ReceiptNumber, 
            'KM' => $KM,  
            'Consumption' => $FuelConsumption,  
            'DateIn' => date('F j, Y'), 
            'TimeIn' => date("g:i a"), 
            'UserId' => request()->session()->get('Id'), 
        ]);

        return back();  
    }

    /**
     * Display the specified resource.
     */
    public function show(Refueling $refueling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refueling $refueling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($RefuelingId, Request $request, Refueling $refueling)
    {   
        Refueling::where('id', $RefuelingId)
            ->update([
                'VehicleNumber' => $request->VehicleNumber, 
                'CardNumber' => $request->CardNumber, 
                'Date' => $request->Date, 
                'Time' => $request->Time, 
                'Amount' => $request->Amount, 
                'KMLITER' => $request->KMLITER, 
                'Mileage' => $request->Mileage, 
                'TERNO' => $request->TerminalNumber, 
                'Quantity' => $request->Quantity, 
                'Amount' => $request->Amount, 
                'ReceiptNumber' => $request->ReceiptNumber, 
                'KM' => $request->KM,    
            ]);

            return back(); 
    } 

    public function reverse($CardNumber, $Amount, $RefuelingId)
    {
        $Balance = \App\Models\Car::whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first()
                    ?? \App\Models\MasterCard::whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first();
        
        if (empty($Balance)) { 
            $Balance = \DB::table('voucher_cards')->whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first();
            $ReverseVoucherCardBalance = $Balance->Balance + $Amount; 
            \DB::table('voucher_cards')->where('CardNumber', $CardNumber)
                ->update([
                    'Balance' => $ReverseVoucherCardBalance,  
                ]); 
            $ReverseRefueling = Refueling::where('id', $RefuelingId)->delete();
        } else {
            $Balance = \App\Models\Car::whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first()
            ?? \App\Models\MasterCard::whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first();

            $Balance->Balance = $Balance->Balance + $Amount; 
            $Balance->save();
            $ReverseRefueling = Refueling::where('id', $RefuelingId)->delete();
        } 
        
        return back();

    }
}
