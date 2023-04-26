<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Car;
use App\Models\Maintenance;
use App\Models\Repair;

class FleetReportController extends Controller
{ 
    public function get_car_report_data($QueryColumn, $Value, $GetColumn) {
        $Data = Car::where($QueryColumn, $Value)->first(); 
        if(empty($Data->$GetColumn)) {
            return 0;
        } else {
            return $Data->$GetColumn;
        }
    }

    public function get_maintenance_report_data_count($Column, $Value) {
        $Data = Maintenance::select('id')->where($Column, $Value)->count(); 
        return $Data;
    }

    public function get_repairs_report_data_count($Column, $Value) {
        $Data = Repair::select('id')->where($Column, $Value)->count(); 
        return $Data;
    }
    
    public function car_report($CarReportId, Fpdf $fpdf) {   
        $fpdf->SetTitle('Vehicle Report - ' . $CarReportId . ' | Fleet Management System');

        $fpdf->AddPage();
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(50, 25, 'Reg No: ' . $CarReportId . '');
        $fpdf->Cell(33, 25, '');
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, 'VEHICLE FLEET MANAGEMENT SYSTEM');
        $fpdf->Ln(5); 
        if (self::get_car_report_data('VehicleNumber', $CarReportId, 'Status') == 'ACTIVE') {
            $fpdf->SetTextColor(102,205,170);
        } else { 
            $fpdf->SetTextColor(250, 128, 114);
        }
        $fpdf->SetFont('Arial', 'I', 10);
        $fpdf->Cell(170, 25, self::get_car_report_data('VehicleNumber', $CarReportId, 'Status'));
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, '(VFMS)');
        $fpdf->SetFont('Arial', '', 10);
        
        $fpdf->Ln(17);
        $fpdf->SetFillColor(207, 184, 24);
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(50, 10, 'INFORMATION RESOURCES', 0, 0, 'C', true);
        $fpdf->Cell(70, 25, '');
        $fpdf->Image('../public/Images/depasa-logo.png', 163, 30, 40, 20);

        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Ln(20);
        $fpdf->MultiCell(190, 4, 'This report provides information on the maintenance and repair activities carried out during the reporting period, including the number of vehicles that required repairs, the types of repairs performed, and the associated costs. This document clearly shows brief summary of the fleet\'s performance during the reporting period, including key metrics such as total distance traveled, fuel consumption, maintenance costs, and any significant events or changes that have occurred. ');

        $fpdf->Ln(8);
        $fpdf->Cell(50, 5, 'This car is ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'Status')  . '. Licence Expires on ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'LicenceExpiringDate') . '..');
        $fpdf->Cell(113, 25, '');
        $fpdf->Cell(50, 5, 'Date: ' . date('Y/m/d'));
        $fpdf->SetFont('Arial', '', 9);

        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'The following are the brief particulars:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8); 
        $fpdf->Cell(35, 6, 'Maintenance', 0, 0, ''); 
        $fpdf->SetDrawColor(220, 220, 220);
        $fpdf->Cell(50, 6, self::get_maintenance_report_data_count('VehicleNumber', $CarReportId), 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Cell(35, 6, 'Used By', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'CarOwner'), 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Repairs', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Repairs}', 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Balance', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'Balance')), 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Status', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'Status'), 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Refueling', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'TotalRefueling')), 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Cell(35, 6, 'Repairs', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_repairs_report_data_count('VehicleNumber', $CarReportId, 'Status'), 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Deposits', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'TotalDeposits')), 1);
        $fpdf->Cell(20, 6, '');  
          
        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'Overview:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Price', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'Price')), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Purchase Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'PurchaseDate'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Company Code', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'CompanyCode'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Supplier', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'Supplier'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Licence Expiry Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'LicenceExpiryDate'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Maker', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'Maker'), 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Insurance Expiry Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'InsuranceExpiryDate'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Model', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'Model'), 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Card No (TOTAL)', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'CardNumber'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Engine Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'EngineType'), 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Monthly Budget', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'MonthlyBudget')), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Gear Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'GearType'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Fuel Tank Capacity', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'FuelTankCapacity'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Sub Model', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'SubModel'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Engine Volume', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'EngineVolume'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Engine No', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'EngineNumber'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Model Year', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'ModelYear'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Chasis No', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'ChassisNumber'), 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Ln(11);
        $fpdf->Cell(190, 5, 'More data from this vehicle:', 0, 0, '', true);
        $fpdf->Ln(10); 
   
        $fpdf->Cell(35, 6, 'Stop Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'StopDate'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Driver', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'Driver'), 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8); 
    
        $fpdf->Cell(35, 6, 'Pin Code', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'PinCode'), 1);
        $fpdf->Cell(20, 6, '');  

        $fpdf->Ln(15);  
        $fpdf->Cell(15, 6, 'Remarks:', 0, 0, ''); 
        $fpdf->Cell(70, 6, substr(self::get_car_report_data('VehicleNumber', $CarReportId, 'Comments'), 30));
        
        $fpdf->Ln(9); 
        $fpdf->Cell(50, 6, request()->session()->get('Name'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(7); 
        $fpdf->Cell(50, 6, date('Y-m-d'));
        $fpdf->Cell(20, 6, '');  

        $fpdf->Image('../public/Images/depasa-signature.png', 11, 270, 30, 20);

        $fpdf->Output();
        exit;
    }
}
