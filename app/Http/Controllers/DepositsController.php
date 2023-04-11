<?php

namespace App\Http\Controllers;

use App\Models\Deposits;
use Illuminate\Http\Request;

class DepositsController extends Controller
{
    public function config() {
        $Deposits = Deposits::orderBy('Date', 'DESC')->paginate(14); 
        $Id = request()->get('Id');
        $Deposits__MyRecords = Deposits::where('UserId', $Id)->orderBy('Date', 'DESC')->paginate(14);
 
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Deposits $deposits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposits $deposits)
    {
        //
    }
}
