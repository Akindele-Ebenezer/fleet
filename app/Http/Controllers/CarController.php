<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request; 

class CarController extends Controller
{
    public function config() {
        $Cars = Car::orderBy('PurchaseDate', 'DESC')->paginate(7);
        $Id = 'amina';
        $Cars__MyRecords = Car::where('UserId', $Id)->orderBy('PurchaseDate', 'DESC')->paginate(7);
 // GLOBAL
 
        $Cars_Absolute = Car::all();
        $Cars_Maker_GROUPED = Car::select('Maker')->distinct()->get();
        $Cars_EngineType_GROUPED = Car::select('EngineType')->distinct()->get();
        $Cars_GearType_GROUPED = Car::select('GearType')->distinct()->get();
         
        return [
            'Cars' => $Cars,
            'Cars__MyRecords' => $Cars__MyRecords,
            'Cars_Absolute' => $Cars_Absolute,
            'Cars_Maker_GROUPED' => $Cars_Maker_GROUPED,
            'Cars_EngineType_GROUPED' => $Cars_EngineType_GROUPED,
            'Cars_GearType_GROUPED' => $Cars_GearType_GROUPED,
        ];
    }

    public function index()
    {
        $Config = self::config();

        return view('Cars', $Config);
    }

    public function my_records_activity()
    {
        $Config = self::config();

        return view('Edit.EditMyRecords', $Config);
    }

    public function vehicle_report()
    {
        $Config = self::config();

        return view('VehicleReport', $Config);
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
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
