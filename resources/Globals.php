<?php

    $Cars_Absolute = \App\Models\Car::all();
    $Cars_Maker_GROUPED = \App\Models\Car::select('Maker')->distinct()->get();
    $Cars_EngineType_GROUPED = \App\Models\Car::select('EngineType')->distinct()->get();
    $Cars_GearType_GROUPED = \App\Models\Car::select('GearType')->distinct()->get();
    $Cars_Org_GROUPED = \App\Models\organisation::select(['CompanyCode', 'CompanyName'])->distinct()->get();
    $Cars_Status_GROUPED = \App\Models\Car::select('Status')->distinct()->get();

    $NumberOfCars = \App\Models\Car::select('VehicleNumber')->distinct()->count();
    $NumberOfCars_ACTIVE = \App\Models\Car::select('Status')->where('Status', 'ACTIVE')->count();
    $NumberOfCars_INACTIVE = \App\Models\Car::select('Status')->where('Status', 'INACTIVE')->count();
    $NumberOfDrivers = \App\Models\Car::select('Drivers')->distinct()->count();
    $NumberOfCarRepairs = \App\Models\Repair::select('VehicleNumber')->count();
    $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')->count();
    $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')->count();
    $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')->count();

    $NumberOfCarRepairs_MyRecords = \App\Models\Repair::select(['VehicleNumber', 'UserId'])
                                                        ->where('UserId', request()->session()
                                                        ->get('Id'))
                                                        ->count();
    $NumberOfCarMaintenance_MyRecords = \App\Models\Maintenance::select(['VehicleNumber', 'UserId'])
                                                        ->where('UserId', request()->session()
                                                        ->get('Id'))
                                                        ->count();
    $NumberOfCarDeposits_MyRecords = \App\Models\Deposits::select(['VehicleNumber', 'UserId'])
                                                        ->where('UserId', request()->session()
                                                        ->get('Id'))
                                                        ->count();
    $NumberOfCarRefueling_MyRecords = \App\Models\Refueling::select(['VehicleNumber', 'UserId'])
                                                        ->where('UserId', request()->session()
                                                        ->get('Id'))
                                                        ->count();

?>