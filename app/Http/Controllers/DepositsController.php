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

        return view('Deposits', $Config);
    }

    public function my_records_deposits()
    {
        $Config = self::config();

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
    public function destroy($DepositsId, Deposits $deposits)
    {
        $DeleteDeposits = Deposits::where('id', $DepositsId)->delete();

        return back();
    }
}
