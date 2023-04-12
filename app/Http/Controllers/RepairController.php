<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request; 

class RepairController extends Controller
{
    public function config() {
        $Repairs = Repair::orderBy('Date', 'DESC')->paginate(14); 
        $Repairs__MyRecords = Repair::where('UserId', self::USER_ID())->orderBy('Date', 'DESC')->paginate(14);
 
        return [
            'Repairs' => $Repairs,
            'Repairs__MyRecords' => $Repairs__MyRecords,
        ];
    }
 
    public function index()
    {
        $Config = self::config();

        return view('Repairs', $Config);
    }

    public function my_records_repairs()
    {
        $Config = self::config();

        return view('Edit.EditRepairs', $Config);
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
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repair $repair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repair $repair)
    {
        //
    }
}
