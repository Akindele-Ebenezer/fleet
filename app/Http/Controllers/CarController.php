<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request; 

class CarController extends Controller
{
    public function config() { 
        $Cars = Car::orderBy('PurchaseDate', 'DESC')->paginate(7);
        $Cars__MyRecords = Car::where('UserId', self::USER_ID())->orderBy('PurchaseDate', 'DESC')->paginate(7);
 
        return [
            'Cars' => $Cars,
            'Cars__MyRecords' => $Cars__MyRecords, 
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
        if(isset($_GET['AddCar'])) {
            Car::insert([
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
                'UserId' => request()->session()->get('Id'),
                'DateIn' => $request->DateIn,
                'TimeIn' => $request->TimeIn,
                'Supplier' => $request->Supplier,
                'CarOwner' => $request->CarOwner,
                'Driver' => $request->Driver,
                'CardNumber' => $request->CardNumber,
                'MonthlyBudget' => $request->MonthlyBudget,
                'CompanyCode' => $request->CompanyCode,
                'TotalDeposits' => $request->TotalDeposits,
                'TotalRefueling' => $request->TotalRefueling,
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
        $Deposits = str_replace(['₦', ',', ' '], '', $request->Deposits); 
        $Refueling = str_replace(['₦', ',', ' '], '', $request->Refueling);
        $Balance = str_replace(['₦', ',', ' '], '', $request->Balance);
        $Price = str_replace(['₦', ',', ' '], '', $request->Price);
        $MonthlyBudget = str_replace(['₦', ',', ' '], '', $request->MonthlyBudget);
 
            Car::where('VehicleNumber', $request->VehicleNumber)
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
                    'Price' => $Price, 
                    'DateIn' => $request->DateIn,
                    'TimeIn' => $request->TimeIn,
                    'Supplier' => $request->Supplier,
                    'CarOwner' => $request->CarOwner,
                    'Driver' => $request->Driver,
                    'CardNumber' => $request->CardNumber,
                    'MonthlyBudget' => $MonthlyBudget,
                    'CompanyCode' => $request->CompanyCode,
                    'TotalDeposits' => $Deposits,
                    'TotalRefueling' => $Refueling,
                    'Balance' => $Balance,
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
        $DeleteCar = Car::where('VehicleNumber', $Car)->delete();

        return back();
    }
}
