<?php
    date_default_timezone_set('Africa/Lagos');
    \DB::statement("SET SQL_MODE=''"); 

    $Cars_Absolute = \App\Models\Car::whereNotNull('VehicleNumber')->get();
    $Cars_Maker = DB::table('makers')->select('Maker')->get();
    $Cars_EngineType = DB::table('engine_types')->select('EngineType')->get();
    $Cars_GearType = DB::table('gear_types')->select('GearType')->get();
    $Cars_Organisation = \App\Models\organisation::select(['CompanyCode', 'CompanyName'])->distinct()->get();
    $CardVendors = DB::table('card_vendors')->select('CardVendors')->get();

    $NumberOfCarOwners = \App\Models\Car::selectRaw("id, TRIM(CarOwner) AS CarOwner, VehicleNumber")->groupBy('CarOwner')->get()->count(); 
    $NumberOfFleetUsers = \App\Models\User::select('id')->count();
    $NumberOfCars = \App\Models\Car::select('VehicleNumber')->whereNotNull('VehicleNumber')->distinct()->count();
    $NumberOfCars_ACTIVE = \App\Models\Car::select('Status')->whereNotNull('VehicleNumber')->where('Status', 'ACTIVE')->count();
    $NumberOfCars_INACTIVE = \App\Models\Car::select('Status')->whereNotNull('VehicleNumber')->where('Status', 'INACTIVE')->count();
    $NumberOfDrivers = \App\Models\Car::select('Drivers')->whereNotNull('VehicleNumber')->distinct()->count();
    $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')->count();
    $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')->count();
    $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')->count();

    $NumberOfCars_MyRecords = \App\Models\Car::select(['VehicleNumber', 'UserId'])
                                                        ->whereNotNull('VehicleNumber')
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
        $MyRecords_Deposits = \App\Models\Deposits::select(['VehicleNumber', 'UserId'])
                                                            ->where('UserId', request()->session()
                                                            ->get('Id'))
                                                            ->count();

        $MyRecords_TOTAL = $MyRecords_Cars + $MyRecords_Maintenance + $MyRecords_Refueling  + $MyRecords_Deposits;
        
        return $MyRecords_TOTAL;

    }  
?>