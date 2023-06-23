<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;   
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function config() { 
        $NumberOfCars = \App\Models\Car::select('VehicleNumber')->whereNotNull('VehicleNumber')->distinct()->count();

        $NumberOfCarRepairs = \App\Models\Maintenance::select('VehicleNumber')->where('IncidentType', 'REPAIR')->count();
        $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')->where('IncidentType', 'MAINTENANCE')->count();
        $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')->count();
        $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')->count();
        $NumberOfCarAccidents = \App\Models\Maintenance::select('VehicleNumber')->where('IncidentType', 'ACCIDENT')->count();
    
        $SumOfCarRepairs = \App\Models\Maintenance::select('Cost')->where('IncidentType', 'REPAIR')->sum('Cost');
        $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')->sum('Cost');
        $SumOfCarDeposits = \App\Models\Deposits::select('Amount')->sum('Amount');
        $SumOfCarRefueling = \App\Models\Refueling::select('Amount')->sum('Amount');
        $SumOfCarAccidents = \App\Models\Maintenance::select('Cost')->where('IncidentType', 'ACCIDENT')->sum('Cost');
     
        $FleetSurvey_TOTAL = $NumberOfCarRepairs + $NumberOfCarMaintenance + $NumberOfCarDeposits + $NumberOfCarRefueling;
        $FleetSurvey_Repairs_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRepairs / $FleetSurvey_TOTAL * 100;
        $FleetSurvey_Maintenance_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarMaintenance / $FleetSurvey_TOTAL * 100;
        $FleetSurvey_Deposits_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarDeposits / $FleetSurvey_TOTAL * 100;
        $FleetSurvey_Refueling_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRefueling / $FleetSurvey_TOTAL * 100;
        
        $NumberOfCars_ACTIVE = \App\Models\Car::select('Status')->whereNotNull('VehicleNumber')->where('Status', 'ACTIVE')->count();
        $NumberOfCars_INACTIVE = \App\Models\Car::select('Status')->whereNotNull('VehicleNumber')->where('Status', 'INACTIVE')->count();
        $NumberNumberOfCars_ACTIVE_PERCENTAGE = $NumberOfCars == 0 ? 0 : $NumberOfCars_ACTIVE / $NumberOfCars * 100;
        $NumberNumberOfCars_INACTIVE_PERCENTAGE = $NumberOfCars == 0 ? 0 : $NumberOfCars_INACTIVE / $NumberOfCars * 100;
    
        $NumberOfDrivers = \App\Models\Car::select('Drivers')->whereNotNull('VehicleNumber')->distinct()->count();
        
        $NumberOfCars_MAINTENANCE = \App\Models\Maintenance::selectRaw("REPLACE(VehicleNumber, ' ', '') ")
                                                            ->groupBy('VehicleNumber')
                                                            ->get();
        $NumberOfCars_MAINTENANCE_ = [];
        foreach ($NumberOfCars_MAINTENANCE as $Car) {
            array_push($NumberOfCars_MAINTENANCE_, $Car);
        }
        $NumberOfCars_MAINTENANCE = count($NumberOfCars_MAINTENANCE_);
    
        $NumberOfCars_REPAIRS = \App\Models\Maintenance::selectRaw("REPLACE(VehicleNumber, ' ', '') ")
                                                            ->groupBy('VehicleNumber')
                                                            ->where('IncidentType', 'REPAIR')
                                                            ->get();
        $NumberOfCars_REPAIRS_ = [];
        foreach ($NumberOfCars_REPAIRS as $Car) {
            array_push($NumberOfCars_REPAIRS_, $Car);
        } 
        $NumberOfCars_REPAIRS = count($NumberOfCars_REPAIRS_); 
    
        $NumberOfCars_REEFUELING = \App\Models\Refueling::selectRaw("REPLACE(VehicleNumber, ' ', '') ")
                                                            ->groupBy('VehicleNumber') 
                                                            ->get();
     
        $NumberOfCars_REEFUELING_ = [];
        foreach ($NumberOfCars_REEFUELING as $Car) {
            array_push($NumberOfCars_REEFUELING_, $Car);
        } 
        $NumberOfCars_REEFUELING = count($NumberOfCars_REEFUELING_); 
         
        $NumberOfCars_DEPOSITS = \App\Models\Deposits::selectRaw("REPLACE(VehicleNumber, ' ', '') ")
                                                            ->groupBy('VehicleNumber')
                                                            ->get();
        $NumberOfCars_DEPOSITS_ = [];
        foreach ($NumberOfCars_DEPOSITS as $Car) {
            array_push($NumberOfCars_DEPOSITS_, $Car);
        } 
        $NumberOfCars_DEPOSITS = count($NumberOfCars_DEPOSITS_); 
     
        $FirstDayOfCurrentYear = date('Y') . '-01-01';
        $MaintenanceCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->sum('Cost');
        $RepairCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->where('IncidentType', 'REPAIR')
                                                                ->sum('Cost');
        $RefuelingCosts_CURRENT_YEAR = \App\Models\Refueling::select('Cost')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->sum('Amount');
        $DepositsCosts_CURRENT_YEAR = \App\Models\Deposits::select('Amount')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->sum('Amount');
    
        $FirstDayOfPreviousYear = date('Y') - 1 . '-01-01';
        $LastDayOfPreviousYear = date('Y') - 1 . '-12-31';
        $MaintenanceCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                ->sum('Cost');
        $RepairCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                ->where('IncidentType', 'REPAIR')
                                                                ->sum('Cost');
        $RefuelingCosts_PREVIOUS_YEAR = \App\Models\Refueling::select('Amount')
                                                                ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                ->sum('Amount');
        $DepositsCosts_PREVIOUS_YEAR = \App\Models\Deposits::select('Amount')
                                                                ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                ->sum('Amount');
            
        $MonthNames = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];    

    
        $MaintenanceComments = Maintenance::select(['UserId', 'IncidentAction', 'Date'])->limit(4)->whereNot('IncidentAction', NULL)->where('IncidentType', 'MAINTENANCE')->orderBy('Date', 'DESC')->get();   
        $RepairComments = Maintenance::select(['UserId', 'IncidentAction', 'Date'])->where('IncidentType', 'REPAIR')->limit(4)->whereNot('IncidentAction', NULL)->orderBy('Date', 'DESC')->get(); 
      
        return [
            'MaintenanceComments' => $MaintenanceComments, 
            'RepairComments' => $RepairComments,
            'NumberOfCars' => $NumberOfCars, 
            'NumberOfCarRepairs' => $NumberOfCarRepairs,
            'NumberOfCarMaintenance' => $NumberOfCarMaintenance, 
            'NumberOfCarDeposits' => $NumberOfCarDeposits,
            'NumberOfCarRefueling' => $NumberOfCarRefueling, 
            'NumberOfCarAccidents' => $NumberOfCarAccidents, 
            'SumOfCarAccidents' => $SumOfCarAccidents,
            'SumOfCarRepairs' => $SumOfCarRepairs,
            'SumOfCarMaintenance' => $SumOfCarMaintenance, 
            'SumOfCarDeposits' => $SumOfCarDeposits,
            'SumOfCarRefueling' => $SumOfCarRefueling, 
            'FleetSurvey_TOTAL' => $FleetSurvey_TOTAL,
            'FleetSurvey_Repairs_PERCENTAGE' => $FleetSurvey_Repairs_PERCENTAGE, 
            'FleetSurvey_Maintenance_PERCENTAGE' => $FleetSurvey_Maintenance_PERCENTAGE,
            'FleetSurvey_Deposits_PERCENTAGE' => $FleetSurvey_Deposits_PERCENTAGE, 
            'FleetSurvey_Refueling_PERCENTAGE' => $FleetSurvey_Refueling_PERCENTAGE,
            'NumberOfCars_ACTIVE' => $NumberOfCars_ACTIVE, 
            'NumberOfCars_INACTIVE' => $NumberOfCars_INACTIVE,
            'NumberNumberOfCars_ACTIVE_PERCENTAGE' => $NumberNumberOfCars_ACTIVE_PERCENTAGE, 
            'NumberNumberOfCars_INACTIVE_PERCENTAGE' => $NumberNumberOfCars_INACTIVE_PERCENTAGE,
            'NumberOfDrivers' => $NumberOfDrivers, 
            'NumberOfCars_MAINTENANCE' => $NumberOfCars_MAINTENANCE, 
            'NumberOfCars_REPAIRS' => $NumberOfCars_REPAIRS,
            'NumberOfCars_REEFUELING' => $NumberOfCars_REEFUELING, 
            'NumberOfCars_DEPOSITS' => $NumberOfCars_DEPOSITS,   
            'MaintenanceCosts_CURRENT_YEAR' => $MaintenanceCosts_CURRENT_YEAR,
            'RepairCosts_CURRENT_YEAR' => $RepairCosts_CURRENT_YEAR,
            'RefuelingCosts_CURRENT_YEAR' => $RefuelingCosts_CURRENT_YEAR,
            'DepositsCosts_CURRENT_YEAR' => $DepositsCosts_CURRENT_YEAR,
            'MaintenanceCosts_PREVIOUS_YEAR' => $MaintenanceCosts_PREVIOUS_YEAR,
            'RepairCosts_PREVIOUS_YEAR' => $RepairCosts_PREVIOUS_YEAR,
            'RefuelingCosts_PREVIOUS_YEAR' => $RefuelingCosts_PREVIOUS_YEAR,
            'DepositsCosts_PREVIOUS_YEAR' => $DepositsCosts_PREVIOUS_YEAR, 
            'MonthNames' => $MonthNames, 
        ]; 
    }

    public function index() {
        $Config = self::config();
 
        if (isset($_GET['Filter_All_Analytics'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }

            $NumberOfCarRepairs = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->where('IncidentType', 'REPAIR')->count();
            $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->where('IncidentType', 'MAINTENANCE')->count();
            $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->count();
            $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->count();
            $NumberOfCarAccidents = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('IncidentType', 'ACCIDENT')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->count();
            
            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->where('IncidentType', 'MAINTENANCE')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost');  
            $SumOfCarRepairs = \App\Models\Maintenance::select('Cost')
                                                        ->where('IncidentType', 'REPAIR')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost');   
            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 
            $SumOfCarAccidents = \App\Models\Maintenance::select('Cost')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost'); 

            $FleetSurvey_TOTAL = $NumberOfCarRepairs + $NumberOfCarMaintenance + $NumberOfCarDeposits + $NumberOfCarRefueling;
            $FleetSurvey_Repairs_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRepairs / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Maintenance_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarMaintenance / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Deposits_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarDeposits / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Refueling_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRefueling / $FleetSurvey_TOTAL * 100;
        
            $FirstDayOfCurrentYear = date('Y') . '-01-01';
            $MaintenanceCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Cost');
            $RepairCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_CURRENT_YEAR = \App\Models\Refueling::select('Cost')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Amount');
            $DepositsCosts_CURRENT_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Amount');
        
            $FirstDayOfPreviousYear = date('Y') - 1 . '-01-01';
            $LastDayOfPreviousYear = date('Y') - 1 . '-12-31';
            $MaintenanceCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Cost');
            $RepairCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_PREVIOUS_YEAR = \App\Models\Refueling::select('Amount')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');
            $DepositsCosts_PREVIOUS_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');
                                                               

            return view('Analytics', $Config)->with('NumberOfCarRepairs' , $NumberOfCarRepairs)  
                                            ->with('NumberOfCarMaintenance' , $NumberOfCarMaintenance)
                                            ->with('NumberOfCarDeposits' , $NumberOfCarDeposits)  
                                            ->with('NumberOfCarRefueling' , $NumberOfCarRefueling)
                                            ->with('NumberOfCarAccidents' , $NumberOfCarAccidents)
                                            ->with('SumOfCarAccidents' , $SumOfCarAccidents)
                                            ->with('SumOfCarMaintenance', $SumOfCarMaintenance)
                                            ->with('SumOfCarRepairs', $SumOfCarRepairs)
                                            ->with('SumOfCarDeposits', $SumOfCarDeposits)
                                            ->with('SumOfCarRefueling', $SumOfCarRefueling)
                                            ->with('FleetSurvey_TOTAL' , $FleetSurvey_TOTAL)  
                                            ->with('FleetSurvey_Repairs_PERCENTAGE' , $FleetSurvey_Repairs_PERCENTAGE)  
                                            ->with('FleetSurvey_Maintenance_PERCENTAGE' , $FleetSurvey_Maintenance_PERCENTAGE)  
                                            ->with('FleetSurvey_Deposits_PERCENTAGE' , $FleetSurvey_Deposits_PERCENTAGE)  
                                            ->with('FleetSurvey_Refueling_PERCENTAGE' , $FleetSurvey_Refueling_PERCENTAGE)
                                            ->with('MaintenanceCosts_CURRENT_YEAR', $MaintenanceCosts_CURRENT_YEAR)
                                            ->with('RepairCosts_CURRENT_YEAR', $RepairCosts_CURRENT_YEAR)
                                            ->with('RefuelingCosts_CURRENT_YEAR', $RefuelingCosts_CURRENT_YEAR)
                                            ->with('DepositsCosts_CURRENT_YEAR', $DepositsCosts_CURRENT_YEAR)
                                            ->with('MaintenanceCosts_PREVIOUS_YEAR', $MaintenanceCosts_PREVIOUS_YEAR)
                                            ->with('RepairCosts_PREVIOUS_YEAR', $RepairCosts_PREVIOUS_YEAR)
                                            ->with('RefuelingCosts_PREVIOUS_YEAR', $RefuelingCosts_PREVIOUS_YEAR)
                                            ->with('DepositsCosts_PREVIOUS_YEAR', $DepositsCosts_PREVIOUS_YEAR); 
        }

        if (isset($_GET['Filter__Yearly_Analytics'])) {
            if(empty($_GET['VehicleNo']) || empty($_GET['Year'])) {
                return back();
            }


            $NumberOfCarRepairs = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->where('IncidentType', 'REPAIR')->count();
            $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->where('IncidentType', 'MAINTENANCE')->count();
            $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->count();
            $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->count();
            
            $NumberOfCarAccidents = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('IncidentType', 'ACCIDENT')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->count();

            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->where('IncidentType', 'MAINTENANCE')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Cost');  
            $SumOfCarRepairs = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->where('IncidentType', 'REPAIR')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Cost');   
            
            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Amount');  
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Amount'); 

            $SumOfCarAccidents = \App\Models\Maintenance::select('Cost')
                                                        ->where('IncidentType', 'ACCIDENT')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                        ->sum('Cost'); 

            $FleetSurvey_TOTAL = $NumberOfCarRepairs + $NumberOfCarMaintenance + $NumberOfCarDeposits + $NumberOfCarRefueling;
            $FleetSurvey_Repairs_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRepairs / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Maintenance_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarMaintenance / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Deposits_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarDeposits / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Refueling_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRefueling / $FleetSurvey_TOTAL * 100;
            
            $FirstDayOfCurrentYear = date('Y') . '-01-01';
            $MaintenanceCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Cost');
            $RepairCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_CURRENT_YEAR = \App\Models\Refueling::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Amount');
            $DepositsCosts_CURRENT_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Amount');
        
            $FirstDayOfPreviousYear = date('Y') - 1 . '-01-01';
            $LastDayOfPreviousYear = date('Y') - 1 . '-12-31';
            $MaintenanceCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Cost');
            $RepairCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_PREVIOUS_YEAR = \App\Models\Refueling::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');
            $DepositsCosts_PREVIOUS_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Year'] . '-01-01', $_GET['Year'] . '-12-31'])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');

            $VehicleNumber = $_GET['VehicleNo'];
            $UsedBy = \App\Models\Car::select('CarOwner')->where('VehicleNumber', $VehicleNumber)->get();
            $Mileage = \App\Models\Refueling::select('Mileage')->where('VehicleNumber', $VehicleNumber)->orderBy('id', 'DESC')->first();
            $Balance = \App\Models\Car::select('Balance')->where('VehicleNumber', $VehicleNumber)->get();
            $MonthlyBudget = \App\Models\Car::select('MonthlyBudget')->where('VehicleNumber', $VehicleNumber)->get();

            foreach ($UsedBy as $UsedBy_) {
                $UsedBy = $UsedBy_->CarOwner;
            } 
         
            foreach ($Balance as $Balance_) {
                $Balance = $Balance_->Balance;
            } 
            
            foreach ($MonthlyBudget as $MonthlyBudget_) {
                $MonthlyBudget = $MonthlyBudget_->MonthlyBudget;
            } 

            $BalanceBroughtForward = $MonthlyBudget - $Balance;

            return view('Analytics', $Config)->with('NumberOfCarRepairs' , $NumberOfCarRepairs)  
                                            ->with('NumberOfCarMaintenance' , $NumberOfCarMaintenance)
                                            ->with('NumberOfCarDeposits' , $NumberOfCarDeposits)  
                                            ->with('NumberOfCarRefueling' , $NumberOfCarRefueling)
                                            ->with('NumberOfCarAccidents' , $NumberOfCarAccidents)
                                            ->with('SumOfCarAccidents' , $SumOfCarAccidents)
                                            ->with('SumOfCarMaintenance', $SumOfCarMaintenance)
                                            ->with('SumOfCarRepairs', $SumOfCarRepairs)
                                            ->with('SumOfCarDeposits', $SumOfCarDeposits)
                                            ->with('SumOfCarRefueling', $SumOfCarRefueling)
                                            ->with('FleetSurvey_TOTAL' , $FleetSurvey_TOTAL)  
                                            ->with('FleetSurvey_Repairs_PERCENTAGE' , $FleetSurvey_Repairs_PERCENTAGE)  
                                            ->with('FleetSurvey_Maintenance_PERCENTAGE' , $FleetSurvey_Maintenance_PERCENTAGE)  
                                            ->with('FleetSurvey_Deposits_PERCENTAGE' , $FleetSurvey_Deposits_PERCENTAGE)  
                                            ->with('FleetSurvey_Refueling_PERCENTAGE' , $FleetSurvey_Refueling_PERCENTAGE)
                                            ->with('MaintenanceCosts_CURRENT_YEAR', $MaintenanceCosts_CURRENT_YEAR)
                                            ->with('RepairCosts_CURRENT_YEAR', $RepairCosts_CURRENT_YEAR)
                                            ->with('RefuelingCosts_CURRENT_YEAR', $RefuelingCosts_CURRENT_YEAR)
                                            ->with('DepositsCosts_CURRENT_YEAR', $DepositsCosts_CURRENT_YEAR)
                                            ->with('MaintenanceCosts_PREVIOUS_YEAR', $MaintenanceCosts_PREVIOUS_YEAR)
                                            ->with('RepairCosts_PREVIOUS_YEAR', $RepairCosts_PREVIOUS_YEAR)
                                            ->with('RefuelingCosts_PREVIOUS_YEAR', $RefuelingCosts_PREVIOUS_YEAR)
                                            ->with('DepositsCosts_PREVIOUS_YEAR', $DepositsCosts_PREVIOUS_YEAR)
                                            ->with('VehicleNumber' , $VehicleNumber) 
                                            ->with('UsedBy' , $UsedBy ?? 'Pool') 
                                            ->with('Mileage' , $Mileage->Mileage ?? 0) 
                                            ->with('Balance' , $Balance ?? 0)
                                            ->with('BalanceBroughtForward' , $BalanceBroughtForward ?? 0);  
        }

        if (isset($_GET['Filter__Range_Analytics'])) {
            if(empty($_GET['Date_From']) || empty($_GET['Date_To'])) {
                return back();
            }


            $NumberOfCarRepairs = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->where('IncidentType', 'REPAIR')->count();
            $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->where('IncidentType', 'MAINTENANCE')->count();
            $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->count();
            $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->count();
            
            $NumberOfCarAccidents = \App\Models\Maintenance::select('VehicleNumber')
                                                        ->where('IncidentType', 'ACCIDENT')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->count();

            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->where('IncidentType', 'MAINTENANCE')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost');  
            $SumOfCarRepairs = \App\Models\Maintenance::select('Cost')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->where('IncidentType', 'REPAIR')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost');   
            
            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount');  
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Amount'); 

            $SumOfCarAccidents = \App\Models\Maintenance::select('Cost')
                                                        ->where('IncidentType', 'ACCIDENT')
                                                        ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                        ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                        ->sum('Cost'); 
            $FleetSurvey_TOTAL = $NumberOfCarRepairs + $NumberOfCarMaintenance + $NumberOfCarDeposits + $NumberOfCarRefueling;
            $FleetSurvey_Repairs_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRepairs / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Maintenance_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarMaintenance / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Deposits_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarDeposits / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Refueling_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRefueling / $FleetSurvey_TOTAL * 100;
            
            $FirstDayOfCurrentYear = date('Y') . '-01-01';
            $MaintenanceCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Cost');
            $RepairCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_CURRENT_YEAR = \App\Models\Refueling::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Amount');
            $DepositsCosts_CURRENT_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Amount');
        
            $FirstDayOfPreviousYear = date('Y') - 1 . '-01-01';
            $LastDayOfPreviousYear = date('Y') - 1 . '-12-31';
            $MaintenanceCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Cost');
            $RepairCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_PREVIOUS_YEAR = \App\Models\Refueling::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');
            $DepositsCosts_PREVIOUS_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' .  $_GET['VehicleNo'] . '%')
                                                                    ->whereBetween('Date', [$_GET['Date_From'], $_GET['Date_To']])
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');

            $VehicleNumber = $_GET['VehicleNo'];
            $UsedBy = \App\Models\Car::select('CarOwner')->where('VehicleNumber', $VehicleNumber)->get();
            $Mileage = \App\Models\Refueling::select('Mileage')->where('VehicleNumber', $VehicleNumber)->orderBy('id', 'DESC')->first();
            $Balance = \App\Models\Car::select('Balance')->where('VehicleNumber', $VehicleNumber)->get();
            $MonthlyBudget = \App\Models\Car::select('MonthlyBudget')->where('VehicleNumber', $VehicleNumber)->get();
            
            foreach ($UsedBy as $UsedBy_) {
                $UsedBy = $UsedBy_->CarOwner;
            } 
         
            foreach ($Balance as $Balance_) {
                $Balance = $Balance_->Balance;
            } 
            
            foreach ($MonthlyBudget as $MonthlyBudget_) {
                $MonthlyBudget = $MonthlyBudget_->MonthlyBudget;
            } 

            $BalanceBroughtForward = $MonthlyBudget - $Balance;

            return view('Analytics', $Config)->with('NumberOfCarRepairs' , $NumberOfCarRepairs)  
                                            ->with('NumberOfCarMaintenance' , $NumberOfCarMaintenance)
                                            ->with('NumberOfCarDeposits' , $NumberOfCarDeposits)  
                                            ->with('NumberOfCarRefueling' , $NumberOfCarRefueling)
                                            ->with('NumberOfCarAccidents' , $NumberOfCarAccidents)
                                            ->with('SumOfCarAccidents' , $SumOfCarAccidents)
                                            ->with('SumOfCarMaintenance', $SumOfCarMaintenance)
                                            ->with('SumOfCarRepairs', $SumOfCarRepairs)
                                            ->with('SumOfCarDeposits', $SumOfCarDeposits)
                                            ->with('SumOfCarRefueling', $SumOfCarRefueling)
                                            ->with('FleetSurvey_TOTAL' , $FleetSurvey_TOTAL)  
                                            ->with('FleetSurvey_Repairs_PERCENTAGE' , $FleetSurvey_Repairs_PERCENTAGE)  
                                            ->with('FleetSurvey_Maintenance_PERCENTAGE' , $FleetSurvey_Maintenance_PERCENTAGE)  
                                            ->with('FleetSurvey_Deposits_PERCENTAGE' , $FleetSurvey_Deposits_PERCENTAGE)  
                                            ->with('FleetSurvey_Refueling_PERCENTAGE' , $FleetSurvey_Refueling_PERCENTAGE)
                                            ->with('MaintenanceCosts_CURRENT_YEAR', $MaintenanceCosts_CURRENT_YEAR)
                                            ->with('RepairCosts_CURRENT_YEAR', $RepairCosts_CURRENT_YEAR)
                                            ->with('RefuelingCosts_CURRENT_YEAR', $RefuelingCosts_CURRENT_YEAR)
                                            ->with('DepositsCosts_CURRENT_YEAR', $DepositsCosts_CURRENT_YEAR)
                                            ->with('MaintenanceCosts_PREVIOUS_YEAR', $MaintenanceCosts_PREVIOUS_YEAR)
                                            ->with('RepairCosts_PREVIOUS_YEAR', $RepairCosts_PREVIOUS_YEAR)
                                            ->with('RefuelingCosts_PREVIOUS_YEAR', $RefuelingCosts_PREVIOUS_YEAR)
                                            ->with('DepositsCosts_PREVIOUS_YEAR', $DepositsCosts_PREVIOUS_YEAR)
                                            ->with('VehicleNumber' , $VehicleNumber) 
                                            ->with('UsedBy' , $UsedBy ?? 'Pool') 
                                            ->with('Mileage' , $Mileage->Mileage ?? 0) 
                                            ->with('Balance' , $Balance ?? 0)
                                            ->with('BalanceBroughtForward' , $BalanceBroughtForward ?? 0);  
        }

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $Config = self::config();
    
            $FilterValue = $_GET['FilterValue']; 
          
            $NumberOfCarRepairs = \App\Models\Maintenance::select('VehicleNumber')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->where('IncidentType', 'REPAIR')->count();
            $NumberOfCarMaintenance = \App\Models\Maintenance::select('VehicleNumber')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->where('IncidentType', 'MAINTENANCE')->count();
            $NumberOfCarDeposits = \App\Models\Deposits::select('VehicleNumber')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->count();
            $NumberOfCarRefueling = \App\Models\Refueling::select('VehicleNumber')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->count();
            
            $SumOfCarRepairs = \App\Models\Maintenance::select('Cost')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->where('IncidentType', 'REPAIR')->sum('Cost');
            $SumOfCarMaintenance = \App\Models\Maintenance::select('Cost')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->sum('Cost');
            $SumOfCarDeposits = \App\Models\Deposits::select('Amount')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->sum('Amount');
            $SumOfCarRefueling = \App\Models\Refueling::select('Amount')->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')->sum('Amount');
 
            $FleetSurvey_TOTAL = $NumberOfCarRepairs + $NumberOfCarMaintenance + $NumberOfCarDeposits + $NumberOfCarRefueling;
            $FleetSurvey_Repairs_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRepairs / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Maintenance_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarMaintenance / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Deposits_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarDeposits / $FleetSurvey_TOTAL * 100;
            $FleetSurvey_Refueling_PERCENTAGE = $FleetSurvey_TOTAL == 0 ? 0 : $NumberOfCarRefueling / $FleetSurvey_TOTAL * 100;
        
            $FirstDayOfCurrentYear = date('Y') . '-01-01';

            $MaintenanceCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                    ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                    ->sum('Cost');
            $RepairCosts_CURRENT_YEAR = \App\Models\Maintenance::select('Cost')
                                                                ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->where('IncidentType', 'REPAIR')
                                                                ->sum('Cost');
            $RefuelingCosts_CURRENT_YEAR = \App\Models\Refueling::select('Cost')
                                                                ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->sum('Amount');
            $DepositsCosts_CURRENT_YEAR = \App\Models\Deposits::select('Amount')
                                                                ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                ->whereBetween('Date', [$FirstDayOfCurrentYear, date('Y-m-d')])
                                                                ->sum('Amount');

            $FirstDayOfPreviousYear = date('Y') - 1 . '-01-01';
            $LastDayOfPreviousYear = date('Y') - 1 . '-12-31';
            $MaintenanceCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Cost');
            $RepairCosts_PREVIOUS_YEAR = \App\Models\Maintenance::select('Cost')
                                                                    ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->where('IncidentType', 'REPAIR')
                                                                    ->sum('Cost');
            $RefuelingCosts_PREVIOUS_YEAR = \App\Models\Refueling::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');
            $DepositsCosts_PREVIOUS_YEAR = \App\Models\Deposits::select('Amount')
                                                                    ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                                                                    ->whereBetween('Date', [$FirstDayOfPreviousYear, $LastDayOfPreviousYear])
                                                                    ->sum('Amount');
                                                                    
            return view('Analytics', $Config)->with('NumberOfCarRepairs' , $NumberOfCarRepairs)
            ->with('NumberOfCarMaintenance' , $NumberOfCarMaintenance)
            ->with('NumberOfCarDeposits' , $NumberOfCarDeposits)  
            ->with('NumberOfCarRefueling' , $NumberOfCarRefueling)  
            ->with('SumOfCarRepairs' , $SumOfCarRepairs)  
            ->with('SumOfCarMaintenance' , $SumOfCarMaintenance)  
            ->with('SumOfCarDeposits' , $SumOfCarDeposits)  
            ->with('SumOfCarRefueling' , $SumOfCarRefueling)  
            ->with('FleetSurvey_TOTAL' , $FleetSurvey_TOTAL)  
            ->with('FleetSurvey_Repairs_PERCENTAGE' , $FleetSurvey_Repairs_PERCENTAGE)  
            ->with('FleetSurvey_Maintenance_PERCENTAGE' , $FleetSurvey_Maintenance_PERCENTAGE)  
            ->with('FleetSurvey_Deposits_PERCENTAGE' , $FleetSurvey_Deposits_PERCENTAGE)  
            ->with('FleetSurvey_Refueling_PERCENTAGE' , $FleetSurvey_Refueling_PERCENTAGE) 
            ->with('MaintenanceCosts_CURRENT_YEAR' , $MaintenanceCosts_CURRENT_YEAR)  
            ->with('RepairCosts_CURRENT_YEAR' , $RepairCosts_CURRENT_YEAR)  
            ->with('RefuelingCosts_CURRENT_YEAR' , $RefuelingCosts_CURRENT_YEAR)  
            ->with('DepositsCosts_CURRENT_YEAR' , $DepositsCosts_CURRENT_YEAR)  
            ->with('MaintenanceCosts_PREVIOUS_YEAR' , $MaintenanceCosts_PREVIOUS_YEAR)  
            ->with('RepairCosts_PREVIOUS_YEAR' , $RepairCosts_PREVIOUS_YEAR)  
            ->with('RefuelingCosts_PREVIOUS_YEAR' , $RefuelingCosts_PREVIOUS_YEAR)  
            ->with('DepositsCosts_PREVIOUS_YEAR' , $DepositsCosts_PREVIOUS_YEAR)  
            ->with('NumberOfCarRefueling' , $NumberOfCarRefueling)  
            ->with('NumberOfCarDeposits' , $NumberOfCarDeposits); 
        } 

        return view('Analytics', $Config);
    }
}
