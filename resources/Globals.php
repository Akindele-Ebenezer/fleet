<?php

    $Cars_Absolute = \App\Models\Car::all();
    $Cars_Maker_GROUPED = \App\Models\Car::select('Maker')->distinct()->get();
    $Cars_EngineType_GROUPED = \App\Models\Car::select('EngineType')->distinct()->get();
    $Cars_GearType_GROUPED = \App\Models\Car::select('GearType')->distinct()->get();
    $Cars_Org_GROUPED = \App\Models\organisation::select(['CompanyCode', 'CompanyName'])->distinct()->get();
    $Cars_Status_GROUPED = \App\Models\Car::select('Status')->distinct()->get();
    $Users_Role_GROUPED = \App\Models\User::select('Role')->distinct()->get();

    $NumberOfCarOwners = \App\Models\Car::select('CarOwner')->distinct()->count(); 
    $NumberOfFleetUsers = \App\Models\User::select('id')->count();
    $NumberOfCars = \App\Models\Car::select('VehicleNumber')->distinct()->count();
    $NumberOfCars_ACTIVE = \App\Models\Car::select('Status')->where('Status', 'ACTIVE')->count();
    $NumberOfCars_INACTIVE = \App\Models\Car::select('Status')->where('Status', 'INACTIVE')->count();
    $NumberOfDrivers = \App\Models\Car::select('Drivers')->distinct()->count();
    $NumberOfCarRepairs = \App\Models\Repair::select('VehicleNumber')->count();
    $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')->count();
    $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')->count();
    $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')->count();

    $NumberOfCars_MyRecords = \App\Models\Car::select(['VehicleNumber', 'UserId'])
                                                        ->where('UserId', request()->session()
                                                        ->get('Id'))
                                                        ->count();
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

    function MyRecords_TOTAL() {
        $MyRecords_Cars = \App\Models\Car::select(['VehicleNumber', 'UserId'])
                                                            ->where('UserId', request()->session()
                                                            ->get('Id'))
                                                            ->count();
        $MyRecords_Maintenance = \App\Models\Maintenance::select(['VehicleNumber', 'UserId'])
                                                            ->where('UserId', request()->session()
                                                            ->get('Id'))
                                                            ->count();
        $MyRecords_Refueling = \App\Models\Refueling::select(['VehicleNumber', 'UserId'])
                                                            ->where('UserId', request()->session()
                                                            ->get('Id'))
                                                            ->count();
        $MyRecords_Repairs = \App\Models\Repair::select(['VehicleNumber', 'UserId'])
                                                            ->where('UserId', request()->session()
                                                            ->get('Id'))
                                                            ->count();
        $MyRecords_Deposits = \App\Models\Deposits::select(['VehicleNumber', 'UserId'])
                                                            ->where('UserId', request()->session()
                                                            ->get('Id'))
                                                            ->count();

        $MyRecords_TOTAL = $MyRecords_Cars + $MyRecords_Maintenance + $MyRecords_Refueling + $MyRecords_Repairs + $MyRecords_Deposits;
        
        return $MyRecords_TOTAL;

    }  
?>