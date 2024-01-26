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
        $Deposits_VoucherCards = \DB::table('deposits_voucher_cards')->orderBy('Date', 'DESC')->paginate(14); 
        $DepositsMasterCard__MyRecords = DepositsMasterCard::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);
 
        return [
            'Deposits_MasterCards' => $Deposits_MasterCards,
            'Deposits_VoucherCards' => $Deposits_VoucherCards,
            'DepositsMasterCard__MyRecords' => $DepositsMasterCard__MyRecords,
        ];
    }
 
    /**
     * Display a listing of the resource.
     */
    public function fleet_card_index()
    {
        $Config = self::config();

        $Cars = Car::orderBy('DateIn', 'DESC')->paginate(7);
        $MasterCards = MasterCard::orderBy('Date', 'DESC')->paginate(7);
        $VoucherCards = \DB::table('voucher_cards')->orderBy('Date', 'DESC')->paginate(7);
        
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 

            if ($FilterValue === 'active') {
                $Cars = Car::where('Status', 'ACTIVE')->paginate(14);

                $Cars->withPath($_SERVER['REQUEST_URI']);
            } else {
                $Cars = Car::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->orderBy('PurchaseDate', 'DESC') 
                        ->paginate(7);
            }
            $Deposits_MasterCards = DepositsMasterCard::where('CardNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Amount', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
                        
            $MasterCards = MasterCard::where('CardNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Vendor', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);
                        
            $VoucherCards = \DB::table('voucher_cards')->where('CardNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Date', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Vendor', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(7);

                $Cars->withPath($_SERVER['REQUEST_URI']);

            return view('FleetCard', $Config)->with('Cars', $Cars)->with('Deposits_MasterCards', $Deposits_MasterCards)->with('MasterCards', $MasterCards)->with('VoucherCards', $VoucherCards);
        } 

        return view('FleetCard', [
            'Cars' => $Cars,
            'MasterCards' => $MasterCards,
            'VoucherCards' => $VoucherCards,
        ]);
    } 

    // public function master_card_deposits()
    // {
    //     $Deposits_MasterCards = DepositsMasterCard::orderBy('Date', 'DESC')->paginate(7);
    //     return view('Deposits_MasterCard', [
    //         'Deposits_MasterCards' => $Deposits_MasterCards,
    //     ]);
    // }

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

    public function store_deposits_voucher_card($Voucher, Request $request)
    {
        $Balance = \DB::table('voucher_cards')->where('CardNumber', $request->CardNumber_DEPOSITS)->first(); 
        $VoucherDeposit = $request->Amount + $Balance->Balance;
        \DB::table('voucher_cards')->where('CardNumber', $request->CardNumber_DEPOSITS)
        ->update([
            'Balance' => $VoucherDeposit,  
        ]);
        
        \DB::table('deposits_voucher_cards')->insert([  
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

    public function add_vendor(Request $request) {
        if(!empty($request->FleetCardVendor_Name)) { 
            \DB::table('card_vendors')->insert([  
                'CardVendors' => $request->FleetCardVendor_Name,   
            ]);
        } 

        return back();  
    }

    public function update_vendor(Request $request) { 
        \DB::table('card_vendors')->where('id', $request->EditFleetCardVendorModal_Id)
        ->update([
            'CardVendors' => $request->EditFleetCardVendorModal_Name,  
        ]);
        return back();  
    }

    public function destroy_vendor($FleetCardVendorId, Request $request) {
        \DB::table('card_vendors')->where('id', $FleetCardVendorId)->delete();
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
            'Vendor' => $request->Vendor,  
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

    public function update_voucher_card(Request $request, string $id)
    { 
        \DB::table('voucher_cards')->where('id', $request->VoucherCardId)
        ->update([
            'CardNumber' => $request->CardNumber, 
            'Date' => $request->Date, 
            'MonthlyBudget' => $request->MonthlyBudget, 
            'Balance' => $request->Balance, 
            'Status' => $request->Status,    
            'Vendor' => $request->Vendor,  
        ]);

        return back();  
    }

    public function update_deposits_voucher_card($VoucherCards, Request $request)
    {  
        \DB::table('deposits_voucher_cards')->where('id', $VoucherCards)
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
        $MasterCardNumber = MasterCard::where('id', $MasterCardId)->first();
 
        $DeleteMasterCard = MasterCard::where('id', $MasterCardId)->delete();
        \DB::table('deposits_master_cards')->where('CardNumber', $MasterCardNumber->CardNumber)->delete();

        return back();
    }

    public function destroy_voucher_card($VoucherCardId)
    {
        $VoucherCardNumber = \DB::table('voucher_cards')->where('id', $VoucherCardId)->first();

        $DeleteVoucherCard = \DB::table('voucher_cards')->where('id', $VoucherCardId)->delete();
        \DB::table('deposits_voucher_cards')->where('CardNumber', $VoucherCardNumber->CardNumber)->delete();

        return back();
    }

    public function reverse_deposits_master_card($MasterCardId, $CardNumber, $Amount, DepositsMasterCard $MasterCards)
    { 
        $Reverse = \App\Models\MasterCard::whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first();; 
        $Reverse->Balance = $Reverse->Balance - $Amount;
        $Reverse->save();  
        $DeleteDepositsMasterCard = DepositsMasterCard::where('id', $MasterCardId)->delete();

        return back();
    }
    
    public function reverse_deposits_voucher_card($VoucherCardId, $CardNumber, $Amount)
    { 
        $Reverse = \DB::table('voucher_cards')->whereNotNull('CardNumber')->where('CardNumber', $CardNumber)->first();; 
        $ReverseVoucherCardBalance = $Reverse->Balance - $Amount;
        \DB::table('voucher_cards')->where('CardNumber', $CardNumber)
            ->update([
                'Balance' => $ReverseVoucherCardBalance,  
            ]);

        \DB::table('deposits_voucher_cards')->where('id', $VoucherCardId)->delete();

        return back();
    }
}
