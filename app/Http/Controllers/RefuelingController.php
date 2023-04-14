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
        
        return view('Refueling', $Config);
    }

    public function my_records_refueling()
    {
        $Config = self::config();

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
        Refueling::insert([ 
            'VehicleNumber' => $request->VehicleNumber_REFUELING, 
            'CardNumber' => $request->CardNumber, 
            'Amount' => $request->Amount, 
            'Date' => $request->Date, 
            'Time' => $request->Time, 
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
