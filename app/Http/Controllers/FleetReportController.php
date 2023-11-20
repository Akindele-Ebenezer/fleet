<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Car;
use App\Models\Maintenance; 

class FleetReportController extends Controller
{ 
    public function get_sum_of_deposits($QueryColumn, $Value) {
        $Data = \App\Models\Deposits::where($QueryColumn, $Value)->sum('Amount');
        return $Data;
    }

    public function get_sum_of_refueling($QueryColumn, $Value) {
        $Data = \App\Models\Refueling::where($QueryColumn, $Value)->sum('Amount');
        return $Data;
    }

    public function get_car_report_data($QueryColumn, $Value, $GetColumn) {
        $Data = Car::where($QueryColumn, $Value)->first(); 
        if(empty($Data->$GetColumn)) {
            return 0;
        } else {
            return $Data->$GetColumn;
        }
    }

    public function get_maintenance_report_data_count($Column, $Value) {
        $Data = \App\Models\Maintenance::select('Cost')->where($Column, $Value)->sum('Cost'); 
        return $Data;
    } 

    public function car_report($CarReportId, Fpdf $fpdf) {   
        $fpdf->SetTitle('Vehicle Report - ' . $CarReportId . ' | Fleet Management System');

        $fpdf->AddPage();

        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 8);
        $fpdf->Cell(50, -11, 'Powered By - http://www.fleet.depasamarine.com');
        $fpdf->SetFont('Arial', 'B', 10); 
        $fpdf->Ln(0); 
        $fpdf->SetTextColor(0,0,0);
        
        $fpdf->Cell(50, 25, 'Reg No: ' . $CarReportId . '');
        $fpdf->Cell(33, 25, '');
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, 'FLEET MANAGEMENT SYSTEM');
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
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_maintenance_report_data_count('VehicleNumber', $CarReportId)), 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Cell(35, 6, 'Used By', 0, 0, ''); 
        $fpdf->Cell(50, 6, self::get_car_report_data('VehicleNumber', $CarReportId, 'CarOwner'), 1);
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
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_sum_of_refueling('VehicleNumber', $CarReportId)), 1);
        $fpdf->Cell(20, 6, '');    
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Deposits', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format(self::get_sum_of_deposits('VehicleNumber', $CarReportId)), 1);
        $fpdf->Cell(20, 6, '');  
          
        $fpdf->Ln(10);

        $fpdf->Cell(35, 6, 'Brought Forward', 0, 0, ''); 
        $fpdf->Cell(50, 6, 'N ' . number_format((self::get_car_report_data('VehicleNumber', $CarReportId, 'MonthlyBudget') - self::get_car_report_data('VehicleNumber', $CarReportId, 'Balance')) < 0 ? 0 : (self::get_car_report_data('VehicleNumber', $CarReportId, 'MonthlyBudget') - self::get_car_report_data('VehicleNumber', $CarReportId, 'Balance'))), 1);
        $fpdf->Cell(20, 6, '');  
          
        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'Overview:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Price', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'Price')));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Purchase Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'PurchaseDate'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Company Code', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'CompanyCode'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Supplier', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'Supplier'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Licence Expiry Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'LicenceExpiryDate'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Maker', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'Maker'));
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Insurance Expiry Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'InsuranceExpiryDate'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Model', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'Model'));
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Card No (TOTAL)', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'CardNumber'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Engine Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'EngineType'));
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Monthly Budget', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . 'N ' . number_format(self::get_car_report_data('VehicleNumber', $CarReportId, 'MonthlyBudget')));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Gear Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'GearType'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Fuel Tank Capacity', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'FuelTankCapacity'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Sub Model', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'SubModel'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Engine Volume', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'EngineVolume'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Engine No', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'EngineNumber'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Model Year', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'ModelYear'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Chasis No', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'ChassisNumber'));
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Ln(11);
        $fpdf->Cell(190, 5, 'More data from this vehicle:', 0, 0, '', true);
        $fpdf->Ln(10); 
   
        $fpdf->Cell(35, 6, 'Stop Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'StopDate'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Driver', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'Driver'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8); 
    
        $fpdf->Cell(35, 6, 'Pin Code', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . self::get_car_report_data('VehicleNumber', $CarReportId, 'PinCode'));
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
          
        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(50, 6, 'http://192.168.20.100');

        $fpdf->Output();
        exit;
    }
  
    public function maintenance_report($MaintenanceReportId, Fpdf $fpdf, Request $Request) {   
        $fpdf->SetTitle('Maintenance Report - ' . $MaintenanceReportId . ' | Fleet Management System');

        $fpdf->AddPage();

        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 8);
        $fpdf->Cell(50, -11, 'Powered By - http://www.fleet.depasamarine.com');
        $fpdf->SetFont('Arial', 'B', 10); 
        $fpdf->Ln(0); 
        $fpdf->SetTextColor(0,0,0);
        
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(50, 25, 'Reg No: ' . $MaintenanceReportId . '');
        $fpdf->Cell(33, 25, '');
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, 'FLEET MANAGEMENT SYSTEM');
        $fpdf->Ln(5); 
        if (self::get_car_report_data('VehicleNumber', $MaintenanceReportId, 'Status') == 'ACTIVE') {
            $fpdf->SetTextColor(102,205,170);
        } else { 
            $fpdf->SetTextColor(250, 128, 114);
        }
        $fpdf->SetFont('Arial', 'I', 10);
        $fpdf->Cell(170, 25, self::get_car_report_data('VehicleNumber', $MaintenanceReportId, 'Status'));
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, '(VFMS)');
        $fpdf->SetFont('Arial', '', 10);
        
        $fpdf->Ln(17);
        $fpdf->SetFillColor(207, 184, 24);
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(50, 10, 'MAINTENANCE', 0, 0, 'C', true);
        $fpdf->Cell(70, 25, '');
        $fpdf->Image('../public/Images/depasa-logo.png', 163, 30, 40, 20);

        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Ln(20);
        $fpdf->MultiCell(190, 4, 'This report provides information on the maintenance activities carried out during the reporting period, including the number of vehicles that required repairs, the types of repairs performed, and the associated costs. This document clearly shows brief summary of the fleet\'s performance during the reporting period, including key metrics such as total distance traveled, fuel consumption, maintenance costs, and any significant events or changes that have occurred. ');

        $fpdf->Ln(8);
        $fpdf->Cell(50, 5, 'This car is ' . self::get_car_report_data('VehicleNumber', $MaintenanceReportId, 'Status')  . '. Licence Expires on ' . self::get_car_report_data('VehicleNumber', $MaintenanceReportId, 'LicenceExpiringDate') . '..');
        $fpdf->Cell(113, 25, '');
        $fpdf->Cell(50, 5, 'Date: ' . date('Y/m/d'));
        $fpdf->SetFont('Arial', '', 9);

        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'The following are the repair info:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8); 
        $fpdf->Cell(35, 6, 'Date', 0, 0, ''); 
        $fpdf->SetDrawColor(220, 220, 220);
        $fpdf->Cell(50, 6, ': ' . $Request->Date);
        $fpdf->Cell(20, 6, '');
        $fpdf->Cell(35, 6, 'Time', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Time);
        $fpdf->Cell(20, 6, ''); 
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Week', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Week);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Release Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->ReleaseDate);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Release Time', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->ReleaseTime);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Cell(35, 6, 'Cost', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . 'N ' . number_format(str_replace(',', '', str_replace('₦', '', $Request->Cost))));
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Invoice No.', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->InvoiceNo);
        $fpdf->Cell(20, 6, '');  
          
        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'Incident Action:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8); 
        $fpdf->MultiCell(190, 4, $Request->IncidentAction); 
        
        $fpdf->Ln(112); 
        $fpdf->Cell(50, 6, request()->session()->get('Name'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(7); 
        $fpdf->Cell(50, 6, date('Y-m-d'));
        $fpdf->Cell(20, 6, '');  

        $fpdf->Image('../public/Images/depasa-signature.png', 11, 270, 30, 20);
          
        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(50, 6, 'http://192.168.20.100');

        $fpdf->Output();
        exit; 
    }
 
    public function deposit_report($DepositReportId, Fpdf $fpdf, Request $Request) {   
        $fpdf->SetTitle('Deposit Report - ' . $DepositReportId . ' | Fleet Management System');

        $fpdf->AddPage();

        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 8);
        $fpdf->Cell(50, -11, 'Powered By - http://www.fleet.depasamarine.com');
        $fpdf->SetFont('Arial', 'B', 10); 
        $fpdf->Ln(0); 
        $fpdf->SetTextColor(0,0,0);

        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(50, 25, 'Reg No: ' . $DepositReportId . '');
        $fpdf->Cell(33, 25, '');
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, 'FLEET MANAGEMENT SYSTEM');
        $fpdf->Ln(5); 
        if (self::get_car_report_data('VehicleNumber', $DepositReportId, 'Status') == 'ACTIVE') {
            $fpdf->SetTextColor(102,205,170);
        } else { 
            $fpdf->SetTextColor(250, 128, 114);
        }
        $fpdf->SetFont('Arial', 'I', 10);
        $fpdf->Cell(170, 25, self::get_car_report_data('VehicleNumber', $DepositReportId, 'Status'));
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, '(VFMS)');
        $fpdf->SetFont('Arial', '', 10);
        
        $fpdf->Ln(17);
        $fpdf->SetFillColor(207, 184, 24);
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(50, 10, 'DEPOSIT', 0, 0, 'C', true);
        $fpdf->Cell(70, 25, '');
        $fpdf->Image('../public/Images/depasa-logo.png', 163, 30, 40, 20);

        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Ln(20);
        $fpdf->MultiCell(190, 4, 'This report provides information on the deposit activities carried out during the reporting period, including the number of vehicles that required repairs, the types of repairs performed, and the associated costs. This document clearly shows brief summary of the fleet\'s performance during the reporting period, including key metrics such as total distance traveled, fuel consumption, maintenance costs, and any significant events or changes that have occurred. ');

        $fpdf->Ln(8);
        $fpdf->Cell(50, 5, 'This car is ' . self::get_car_report_data('VehicleNumber', $DepositReportId, 'Status')  . '. Licence Expires on ' . self::get_car_report_data('VehicleNumber', $DepositReportId, 'LicenceExpiringDate') . '..');
        $fpdf->Cell(113, 25, '');
        $fpdf->Cell(50, 5, 'Date: ' . date('Y/m/d'));
        $fpdf->SetFont('Arial', '', 9);

        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'The following are the deposit info:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8); 
        $fpdf->Cell(35, 6, 'Date', 0, 0, ''); 
        $fpdf->SetDrawColor(220, 220, 220);
        $fpdf->Cell(50, 6, ': ' . $Request->Date);
        $fpdf->Cell(20, 6, '');
        $fpdf->Cell(35, 6, 'Card Number', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->CardNumber);
        $fpdf->Cell(20, 6, ''); 
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Amount', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . 'N ' . number_format(str_replace(',', '', str_replace('₦', '', $Request->Amount))));
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Year', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Year);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Week', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Week);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Cell(35, 6, 'Month', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Month);
        $fpdf->Cell(20, 6, '');   
        $fpdf->Ln(140); 
        $fpdf->Cell(50, 6, request()->session()->get('Name'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(7); 
        $fpdf->Cell(50, 6, date('Y-m-d'));
        $fpdf->Cell(20, 6, '');  

        $fpdf->Image('../public/Images/depasa-signature.png', 11, 270, 30, 20);
          
        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(50, 6, 'http://192.168.20.100');
         
        $fpdf->Output();
        exit; 
    }
    
    public function refueling_report($RefuelingReportId, Fpdf $fpdf, Request $Request) {   
        $fpdf->SetTitle('Refueling Report - ' . $RefuelingReportId . ' | Fleet Management System');

        $fpdf->AddPage();

        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 8);
        $fpdf->Cell(50, -11, 'Powered By - http://www.fleet.depasamarine.com');
        $fpdf->SetFont('Arial', 'B', 10); 
        $fpdf->Ln(0); 
        $fpdf->SetTextColor(0,0,0);
        

        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(50, 25, 'Reg No: ' . $RefuelingReportId . '');
        $fpdf->Cell(33, 25, '');
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, 'FLEET MANAGEMENT SYSTEM');
        $fpdf->Ln(5); 
        if (self::get_car_report_data('VehicleNumber', $RefuelingReportId, 'Status') == 'ACTIVE') {
            $fpdf->SetTextColor(102,205,170);
        } else { 
            $fpdf->SetTextColor(250, 128, 114);
        }
        $fpdf->SetFont('Arial', 'I', 10);
        $fpdf->Cell(170, 25, self::get_car_report_data('VehicleNumber', $RefuelingReportId, 'Status'));
        $fpdf->SetTextColor(70,130,180);
        $fpdf->Cell(50, 25, '(VFMS)');
        $fpdf->SetFont('Arial', '', 10);
        
        $fpdf->Ln(17);
        $fpdf->SetFillColor(207, 184, 24);
        $fpdf->SetTextColor(255, 255, 255);
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(50, 10, 'REFUEL', 0, 0, 'C', true);
        $fpdf->Cell(70, 25, '');
        $fpdf->Image('../public/Images/depasa-logo.png', 163, 30, 40, 20);

        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Ln(20);
        $fpdf->MultiCell(190, 4, 'This report provides information on the refueling activities carried out during the reporting period, including the number of vehicles that required repairs, the types of repairs performed, and the associated costs. This document clearly shows brief summary of the fleet\'s performance during the reporting period, including key metrics such as total distance traveled, fuel consumption, maintenance costs, and any significant events or changes that have occurred. ');

        $fpdf->Ln(8);
        $fpdf->Cell(50, 5, 'This car is ' . self::get_sum_of_refueling('VehicleNumber', $RefuelingReportId, 'Status')  . '. Licence Expires on ' . self::get_car_report_data('VehicleNumber', $RefuelingReportId, 'LicenceExpiringDate') . '..');
        $fpdf->Cell(113, 25, '');
        $fpdf->Cell(50, 5, 'Date: ' . date('Y/m/d'));
        $fpdf->SetFont('Arial', '', 9);

        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'The following are the refueling info:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8); 
        $fpdf->Cell(35, 6, 'Date', 0, 0, ''); 
        $fpdf->SetDrawColor(220, 220, 220);
        $fpdf->Cell(50, 6, ': ' . $Request->Date);
        $fpdf->Cell(20, 6, '');
        $fpdf->Cell(35, 6, 'Card Number', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->CardNumber);
        $fpdf->Cell(20, 6, ''); 
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Amount', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . 'N ' . number_format(str_replace(',', '', str_replace('₦', '', $Request->Amount))));
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Mileage', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Mileage);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Terminal No.', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->TerminalNo);
        $fpdf->Cell(20, 6, '');  
         
        $fpdf->Cell(35, 6, 'Quantity', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->Quantity);
        $fpdf->Cell(20, 6, '');  
         
        $fpdf->Cell(35, 6, 'KM', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->KM);
        $fpdf->Cell(20, 6, '');   

        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Distance Traveled', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->DistanceTraveled);
        $fpdf->Cell(20, 6, '');  
          
        $fpdf->Cell(35, 6, 'Terminal No.', 0, 0, ''); 
        $fpdf->Cell(50, 6, ': ' . $Request->TerminalNo);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
           
        $fpdf->Ln(112); 
        $fpdf->Cell(50, 6, request()->session()->get('Name'));
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(7); 
        $fpdf->Cell(50, 6, date('Y-m-d'));
        $fpdf->Cell(20, 6, '');  

        $fpdf->Image('../public/Images/depasa-signature.png', 11, 270, 30, 20);
          
        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(50, 6, 'http://192.168.20.100');

        $fpdf->Output();
        exit; 
    }
}
