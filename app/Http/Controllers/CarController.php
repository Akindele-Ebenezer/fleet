<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request; 

class CarController extends Controller
{
    public function config() { 
        $Cars = Car::orderBy('PurchaseDate', 'DESC')->paginate(7);
        $Cars__MyRecords = Car::where('UserId', self::USER_ID())->orderBy('PurchaseDate', 'DESC')->paginate(7);
        $CarOwners = Car::select(['id','CarOwner', 'VehicleNumber'])->paginate(7); 
 
        return [
            'Cars' => $Cars,
            'Cars__MyRecords' => $Cars__MyRecords, 
            'CarOwners' => $CarOwners,
        ];
    }

    public function index()
    {
        $Config = self::config();

        return view('Cars', $Config);
    }

    public function car_owners()
    {
        $Config = self::config();

        return view('CarOwners', $Config);
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
    public function store($Car, Request $request)
    {  
        Car::insert([
            'VehicleNumber' => $request->VehicleNumber_CAR,
            'Maker' => $request->Maker,
            'Model' => $request->Model,
            'SubModel' => $request->SubModel,
            'GearType' => $request->GearType,
            'EngineType' => $request->EngineType,
            'EngineNumber' => $request->EngineNumber,
            'ChassisNumber' => $request->ChassisNumber,
            'ModelYear' => $request->ModelYear,
            'EngineVolume' => $request->EngineVolume,
            'Comments' => $request->Comments,
            'PurchaseDate' => $request->PurchaseDate,
            'Price' => $request->Price,
            'UserId' => request()->session()->get('Id'),
            'DateIn' => $request->DateIn,
            'TimeIn' => $request->TimeIn,
            'Supplier' => $request->Supplier,
            'CarOwner' => $request->CarOwner,
            'Driver' => $request->Driver,
            'CardNumber' => $request->CardNumber,
            'MonthlyBudget' => $request->MonthlyBudget,
            'CompanyCode' => $request->CompanyCode,
            'TotalDeposits' => $request->Deposits,
            'TotalRefueling' => $request->Refueling,
            'Balance' => $request->Balance,
            'PinCode' => $request->PinCode, 
            'Status' => $request->Status,
            'StopDate' => $request->StopDate,
            'LicenceExpiryDate' => $request->LicenceExpiryDate,
            'InsuranceExpiryDate' => $request->InsuranceExpiryDate,
            'FuelTankCapacity' => $request->FuelTankCapacity, 
        ]);

        return back();  
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    { 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    { 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {    
            Car::where('id', $request->CarId)
                ->update([
                    'VehicleNumber' => $request->VehicleNumber,
                    'Maker' => $request->Maker,
                    'Model' => $request->Model,
                    'SubModel' => $request->SubModel,
                    'GearType' => $request->GearType,
                    'EngineType' => $request->EngineType,
                    'EngineNumber' => $request->EngineNumber,
                    'ChassisNumber' => $request->ChassisNumber,
                    'ModelYear' => $request->ModelYear,
                    'EngineVolume' => $request->EngineVolume,
                    'Comments' => $request->Comments,
                    'PurchaseDate' => $request->PurchaseDate,
                    'Price' => $request->Price, 
                    'DateIn' => $request->DateIn,
                    'TimeIn' => $request->TimeIn,
                    'Supplier' => $request->Supplier,
                    'CarOwner' => $request->CarOwner,
                    'Driver' => $request->Driver,
                    'CardNumber' => $request->CardNumber,
                    'MonthlyBudget' => $request->MonthlyBudget,
                    'CompanyCode' => $request->CompanyCode,
                    'TotalDeposits' => $request->Deposits,
                    'TotalRefueling' => $request->Refueling,
                    'Balance' => $request->Balance,
                    'PinCode' => $request->PinCode, 
                    'Status' => $request->Status,
                    'StopDate' => $request->StopDate,
                    'LicenceExpiryDate' => $request->LicenceExpiryDate,
                    'InsuranceExpiryDate' => $request->InsuranceExpiryDate,
                    'FuelTankCapacity' => $request->FuelTankCapacity, 
                ]);

            return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Car, Car $car)
    {
        $DeleteCar = Car::where('id', $Car)->delete();

        return back();
    }
}
