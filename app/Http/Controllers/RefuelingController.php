<?php

namespace App\Http\Controllers;

use App\Models\Refueling;
use Illuminate\Http\Request;

class RefuelingController extends Controller
{
    
    public function config() {
        $Refueling = Refueling::orderBy('Date', 'DESC')->paginate(14); 
        $Id = 'amina';
        $Refueling__MyRecords = Refueling::where('UserId', $Id)->orderBy('Date', 'DESC')->paginate(14);

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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Refueling $refueling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refueling $refueling)
    {
        //
    }
}
