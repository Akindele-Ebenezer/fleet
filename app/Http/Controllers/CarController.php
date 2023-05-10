<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request; 
use AmrShawky\LaravelCurrency\Facade\Currency;

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

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
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
                        ->paginate(7);
 
                        $Cars->withPath($_SERVER['REQUEST_URI']);

            return view('Cars', $Config)->with('Cars', $Cars);
        } 

        return view('Cars', $Config);
    }

    public function car_owners()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $CarOwners = Car::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
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
                        ->paginate(7);
 
                        $CarOwners->withPath($_SERVER['REQUEST_URI']);

            return view('CarOwners', $Config)->with('CarOwners', $CarOwners);
        } 

        return view('CarOwners', $Config);
    }

    public function my_records_activity()
    {
        $Config = self::config();
 
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
            $Cars__MyRecords = Car::where('UserId', self::USER_ID())
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
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
                        ->paginate(7);
 
                        $Cars__MyRecords->withPath($_SERVER['REQUEST_URI']);
 
            return view('Edit.EditMyRecords', $Config)->with('Cars__MyRecords', $Cars__MyRecords);
        }
        
        return view('Edit.EditMyRecords', $Config);
    }

    public function vehicle_report()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = $_GET['FilterValue']; 
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
                        ->paginate(7);
 
                        $Cars->withPath($_SERVER['REQUEST_URI']);

            return view('Cars', $Config)->with('Cars', $Cars);
        } 

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
