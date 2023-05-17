<?php

namespace App\Http\Controllers;

use App\Models\Deposits;
use Illuminate\Http\Request;

class DepositsController extends Controller
{
    public function config() {
        $Deposits = Deposits::orderBy('Date', 'DESC')->paginate(14); 
        $Deposits__MyRecords = Deposits::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);
 
        return [
            'Deposits' => $Deposits,
            'Deposits__MyRecords' => $Deposits__MyRecords,
        ];
    }
 
    public function index()
    {
        $Config = self::config();

        if (isset($_GET['Filter_All_Deposits'])) { 
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $Deposits = Deposits::whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Deposits->withPath($_SERVER['REQUEST_URI']);

            return view('Deposits', $Config)->with('Deposits', $Deposits)->with('SumOfCarDeposits', $SumOfCarDeposits);
        }

        if (isset($_GET['Filter_Deposits_Yearly'])) {
            if(empty($_GET['VehicleNo']) || empty($_GET['Year'])) {
                return back();
            }

            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Amount'); 
            $Deposits = Deposits::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31']) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Deposits->withPath($_SERVER['REQUEST_URI']);

            return view('Deposits', $Config)->with('Deposits', $Deposits)->with('SumOfCarDeposits', $SumOfCarDeposits);
        }

        if (isset($_GET['Filter_Deposits_Range'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $Deposits = Deposits::where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) //ANY DATE
                                        // ->orWhereBetween('Date', ['2021-01-01', '2021-12-31']) //YEARLY
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Deposits->withPath($_SERVER['REQUEST_URI']);

            return view('Deposits', $Config)->with('Deposits', $Deposits)->with('SumOfCarDeposits', $SumOfCarDeposits);
        }
        ///////
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Deposits = Deposits::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Year', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Month', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
 
                        $Deposits->withPath($_SERVER['REQUEST_URI']);

            return view('Deposits', $Config)->with('Deposits', $Deposits);
        } 
        return view('Deposits', $Config);
    }

    public function my_records_deposits()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Deposits__MyRecords = Deposits::where('UserId', self::USER_ID())
                                            ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                                            ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Year', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Month', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                                            ->paginate(7);

            $Deposits__MyRecords->withPath($_SERVER['REQUEST_URI']);

            return view('Edit.EditDeposits', $Config)->with('Deposits__MyRecords', $Deposits__MyRecords);
        } 
        return view('Edit.EditDeposits', $Config);
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
    public function store($Deposits, Request $request)
    { 
        $Balance = \App\Models\Car::where('CardNumber', $request->CardNumber)->first();
        $Balance->Balance = $request->Amount + $Balance->Balance;
        $Balance->save();
        
        Deposits::insert([ 
            'VehicleNumber' => $Deposits, 
            'CardNumber' => $request->CardNumber, 
            'Date' => $request->Date, 
            'Amount' => $request->Amount, 
            'Year' => $request->Year, 
            'Month' => $request->Month, 
            'Week' => $request->Week, 
            'DateIn' => date('F j, Y'), 
            'TimeIn' => date("g:i a"), 
            'Comments' => $request->Comments, 
            'UserId' => request()->session()->get('Id'), 
        ]);

        return back();  
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposits $deposits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposits $deposits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($Deposits, Request $request, Deposits $deposits)
    {
        Deposits::where('id', $request->DepositsId)
            ->update([
                'VehicleNumber' => $request->VehicleNumber, 
                'CardNumber' => $request->CardNumber, 
                'Date' => $request->Date, 
                'Amount' => $request->Amount, 
                'Year' => $request->Year, 
                'Month' => $request->Month, 
                'Week' => $request->Week,  
                'Comments' => $request->Comments,  
            ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($DepositsId, $CardNumber, $Amount, Deposits $deposits)
    { 
        $Balance = \App\Models\Car::where('CardNumber', $CardNumber)->first(); 
        $Balance->Balance = $Amount - $Balance->Balance;
        $Balance->save(); 
        $DeleteDeposits = Deposits::where('id', $DepositsId)->delete();

        return back();
    }
}
