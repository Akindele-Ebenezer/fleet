<?php

namespace App\Http\Controllers;

use App\Models\Deposits;
use Illuminate\Http\Request;
use App\Models\MasterCard;
use App\Models\DepositsMasterCard;

class DepositsController extends Controller
{
    public function config() {
        $Deposits = Deposits::orderBy('Date', 'DESC')->paginate(6); 
        $Deposits__MyRecords = Deposits::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(6);
        $Deposits_MasterCards = DepositsMasterCard::orderBy('Date', 'DESC')->paginate(6); 
        $Deposits_VoucherCards = \DB::table('deposits_voucher_cards')->orderBy('Date', 'DESC')->paginate(14); 
        $DepositsMasterCard__MyRecords = DepositsMasterCard::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(6);
        $DepositsVoucherCard__MyRecords = \DB::table('deposits_voucher_cards')->where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(6);
 
        return [
            'Deposits' => $Deposits,
            'Deposits__MyRecords' => $Deposits__MyRecords,
            'Deposits_MasterCards' => $Deposits_MasterCards,
            'Deposits_VoucherCards' => $Deposits_VoucherCards,
            'DepositsMasterCard__MyRecords' => $DepositsMasterCard__MyRecords,
            'DepositsVoucherCard__MyRecords' => $DepositsVoucherCard__MyRecords,
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

            $SumOfCarDeposits_MasterCard = \App\Models\DepositsMasterCard::select('Amount')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $Deposits_MasterCards = DepositsMasterCard::whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']]) 
                                        ->orderBy('Date', 'DESC')
                                        ->paginate(7);
                                        
            $Deposits->withPath($_SERVER['REQUEST_URI']);

            return view('Deposits', $Config)->with('Deposits', $Deposits)->with('SumOfCarDeposits', $SumOfCarDeposits)->with('Deposits_MasterCards', $Deposits_MasterCards)->with('SumOfCarDeposits_MasterCard', $SumOfCarDeposits_MasterCard);
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
                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])   
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
                        ->orderBy('Date', 'DESC') 
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

            $DepositsMasterCard__MyRecords = DepositsMasterCard::where('UserId', self::USER_ID())
                                            ->where('CardNumber', 'LIKE', '%' . $FilterValue . '%') 
                                            ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('DateIn', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Year', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Month', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('TimeIn', 'LIKE', '%' . $FilterValue . '%')
                                            ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                                            ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%') 
                                            ->paginate(7);
                                            
            $Deposits__MyRecords->withPath($_SERVER['REQUEST_URI']);

            return view('Edit.EditDeposits', $Config)->with('Deposits__MyRecords', $Deposits__MyRecords)->with('DepositsMasterCard__MyRecords', $DepositsMasterCard__MyRecords);
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
    public function reverse($DepositsId, $CardNumber, $Amount, Deposits $deposits)
    { 
        $Reverse = \App\Models\Car::where('CardNumber', $CardNumber)->first(); 
        $Reverse->Balance = $Reverse->Balance - $Amount;
        $Reverse->save(); 
        $DeleteDeposits = Deposits::where('id', $DepositsId)->delete();

        return back();
    }
}
