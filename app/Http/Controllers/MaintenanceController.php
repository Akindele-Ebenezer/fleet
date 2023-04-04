<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    
    public function config() {
        $Maintenance = Maintenance::orderBy('Date', 'DESC')->paginate(14); 
        $Id = 'amina';
        $Maintenance__MyRecords = Maintenance::where('UserId', $Id)->orderBy('Date', 'DESC')->paginate(14);

        return [
            'Maintenance' => $Maintenance,
            'Maintenance__MyRecords' => $Maintenance__MyRecords,
        ];
    }

    public function index()
    {
        $Config = self::config();
        
        return view('EditMaintenance', $Config);
    }

    public function my_records_maintenance()
    {
        $Config = self::config();

        return view('Edit.EditMaintenance', $Config);
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
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
