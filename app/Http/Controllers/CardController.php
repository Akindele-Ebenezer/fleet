<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\MasterCard;
use App\Models\DepositsMasterCard;

class CardController extends Controller
{
    public function config() {
        $Deposits_MasterCards = DepositsMasterCard::orderBy('Date', 'DESC')->paginate(14); 
        $DepositsMasterCard__MyRecords = DepositsMasterCard::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);
 
        return [
            'Deposits_MasterCards' => $Deposits_MasterCards,
            'DepositsMasterCard__MyRecords' => $DepositsMasterCard__MyRecords,
        ];
    }
 
    /**
     * Display a listing of the resource.
     */
    public function credit_card_index()
    {
        $Cars = Car::orderBy('DateIn', 'DESC')->paginate(7);
        $MasterCards = MasterCard::orderBy('Date', 'DESC')->paginate(7);
        return view('FleetCard', [
            'Cars' => $Cars,
            'MasterCards' => $MasterCards,
        ]);
    }

    public function master_card_index()
    {
        $MasterCards = MasterCard::orderBy('Date', 'DESC')->paginate(7);
        return view('MasterCard', [
            'MasterCards' => $MasterCards,
        ]);
    }

    public function master_card_deposits()
    {
        $Deposits_MasterCards = DepositsMasterCard::orderBy('Date', 'DESC')->paginate(7);
        return view('Deposits_MasterCard', [
            'Deposits_MasterCards' => $Deposits_MasterCards,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function my_records_deposits_master_card()
    {
        $Config = self::config();

        // if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
        //     $FilterValue = $_GET['FilterValue']; 
        //     $Deposits__MyRecords = Deposits::where('UserId', self::USER_ID())
        //                                     ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
        //                                     ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
        //                                     ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
        //                                     ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
        //                                     ->orWhere('Year', 'LIKE', '%' . $FilterValue . '%')
        //                                     ->orWhere('Month', 'LIKE', '%' . $FilterValue . '%')
        //                                     ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
        //                                     ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
        //                                     ->paginate(7);

        //     $Deposits__MyRecords->withPath($_SERVER['REQUEST_URI']);

        //     return view('Edit.EditDeposits', $Config)->with('Deposits__MyRecords', $Deposits__MyRecords);
        // } 
        return view('Edit.EditDeposits_MasterCard', $Config);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store_master_card(Request $request)
    {
        MasterCard::insert([  
            'CardNumber' => $request->CardNumber, 
            'Date' => $request->Date, 
            'MonthlyBudget' => $request->MonthlyBudget, 
            'Balance' => $request->Balance, 
            'Status' => $request->Status,  
            'UserId' => request()->session()->get('Id'),  
        ]);

        return back();  
    }

    public function store_deposits_master_card($Deposits, Request $request)
    {
        $Balance = \App\Models\MasterCard::where('CardNumber', $request->CardNumber_DEPOSITS)->first(); 
        $Balance->Balance = $request->Amount + $Balance->Balance;
        $Balance->save();
        
        DepositsMasterCard::insert([  
            'CardNumber' => $request->CardNumber_DEPOSITS, 
            'Date' => $request->Date, 
            'Amount' => $request->Amount, 
            'UserId' => request()->session()->get('Id'), 
            'DateIn' => date('F j, Y'), 
            'TimeIn' => date("g:i a"),  
            'Year' => $request->Year, 
            'Month' => $request->Month, 
            'Week' => $request->Week, 
        ]);

        return back();  
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_master_card(Request $request, string $id)
    { 
        MasterCard::where('id', $request->MasterCardId)
        ->update([
            'CardNumber' => $request->CardNumber, 
            'Date' => $request->Date, 
            'MonthlyBudget' => $request->MonthlyBudget, 
            'Balance' => $request->Balance, 
            'Status' => $request->Status,    
        ]);

        return back();  
    }

    public function update_deposits_master_card($MasterCards, Request $request)
    {  
        DepositsMasterCard::where('id', $MasterCards)
            ->update([
                'CardNumber' => $request->CardNumber, 
                'Date' => $request->Date, 
                'Amount' => $request->Amount,  
                'Year' => $request->Year, 
                'Month' => $request->Month, 
                'Week' => $request->Week, 
            ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_master_card($MasterCardId)
    {
        // $Balance = \App\Models\DepositsMasterCard::where('CardNumber', $CardNumber)->first(); 
        // $Balance->Balance = $Amount - $Balance->Balance;
        // $Balance->save();  
        $DeleteMasterCard = MasterCard::where('id', $MasterCardId)->delete();

        return back();
    }

    public function destroy_deposits_master_card($MasterCardId, $CardNumber, $Amount, DepositsMasterCard $MasterCards)
    { 
        // $Balance = \App\Models\DepositsMasterCard::where('CardNumber', $CardNumber)->first(); 
        // $Balance->Balance = $Amount - $Balance->Balance;
        // $Balance->save(); 
        $DeleteDepositsMasterCard = DepositsMasterCard::where('id', $MasterCardId)->delete();

        return back();
    }
}
