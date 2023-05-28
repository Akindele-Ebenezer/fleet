<?php

namespace App\Http\Controllers;

use App\Models\Refueling;
use Illuminate\Http\Request;

class RefuelingController extends Controller
{
    
    public function config() {
        $Refueling = Refueling::orderBy('Date', 'DESC')->paginate(14); 
        $Refueling__MyRecords = Refueling::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);

        return [
            'Refuelings' => $Refueling,
            'Refueling__MyRecords' => $Refueling__MyRecords,
        ];
    }

    public function index()
    {
        $Config = self::config();

        if (isset($_GET['Filter_All_Refueling'])) { 
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

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
            $Refuelings = Refueling::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('KMETER', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TERNO', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Quantity', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('ReceiptNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('KM', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
  
                        $Refuelings->withPath($_SERVER['REQUEST_URI']);

            return view('Refueling', $Config)->with('Refuelings', $Refuelings);
        } 
        return view('Refueling', $Config);
    }

    public function my_records_refueling()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Refueling__MyRecords = Refueling::where('UserId', self::USER_ID())
                                                ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                                                ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('Time', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('KMETER', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('TERNO', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('Quantity', 'LIKE', '%' . $FilterValue . '%')
                                                ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%') 
                                                ->orWhere('ReceiptNumber', 'LIKE', '%' . $FilterValue . '%') 
                                                ->orWhere('KM', 'LIKE', '%' . $FilterValue . '%') 
                                                ->paginate(7);
  
            $Refueling__MyRecords->withPath($_SERVER['REQUEST_URI']);

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
        $Balance = \App\Models\Car::where('CardNumber', $request->CardNumber)->first();
        if($Balance === NULL) {
            $Balance = \App\Models\MasterCard::where('CardNumber', $request->CardNumber)->first();
        }
        // dd($Balance);
        $Balance->Balance = $Balance->Balance - $request->Amount;
        $Balance->save();

        Refueling::insert([ 
            'VehicleNumber' => $request->VehicleNumber_REFUELING, 
            'CardNumber' => $request->CardNumber, 
            'Amount' => $request->Amount, 
            'Date' => $request->Date, 
            'Time' => $request->Time, 
            'KMLITER' => $request->KMLITER, 
            'KMETER' => $request->KMETER, 
            'TERNO' => $request->TerminalNumber, 
            'Quantity' => $request->Quantity, 
            'Amount' => $request->Amount, 
            'ReceiptNumber' => $request->ReceiptNumber, 
            'KM' => $request->KM,  
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
                'KMETER' => $request->KMETER, 
                'TERNO' => $request->TerminalNumber, 
                'Quantity' => $request->Quantity, 
                'Amount' => $request->Amount, 
                'ReceiptNumber' => $request->ReceiptNumber, 
                'KM' => $request->KM,    
            ]);

            return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($RefuelingId, Refueling $refueling)
    {
        $DeleteRefueling = Refueling::where('id', $RefuelingId)->delete();

        return back();
    }
}
