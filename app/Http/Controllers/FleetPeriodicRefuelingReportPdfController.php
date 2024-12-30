<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;  

class FleetPeriodicRefuelingReportPdfController extends Controller
{ 
    public function fleet_periodic_report(Fpdf $fpdf, Request $Request) {  
        $fpdf->AddPage();    
        // $fpdf->SetAutoPageBreak(false);
        $fpdf->SetFont('Arial', '', 10);  
 
        $Month = strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F'));
        $Year = $Request->Year;
        $fpdf->SetTitle('Vehicle Fuel Cost Report - ' . $Month . ' ' . $Year);

        $fpdf->Image('../public/images/depasa-logo.png', 10, 7, 60);    

        $fpdf->Ln(35);      
        
        $fpdf->SetFont('Arial', 'B', 15); 
        $fpdf->SetFillColor(217, 242, 255);  
        $fpdf->Cell(190, 10, 'VEHICLE REPORT - Fuel Cost', 0, 1, 1, 'L');
        $fpdf->SetFont('Arial', '', 10);   

        $fpdf->Ln(6);     

        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 0, 'Generated by: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(108.5, 0, session()->get('Name'));
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(10, 0, 'Month: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(20, 0, $Month . ' ' . $Year);
        $fpdf->Ln(6);     

        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(20, 0, 'Date of report: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(108.5, 0, date('Y-m-d'));
        $fpdf->SetFont('Arial', 'B', 7); 
        $fpdf->Cell(10, 0, 'Vehicle: ');
        $fpdf->SetFont('Arial', '', 7); 
        $fpdf->Cell(20, 0, $Request->VehicleNumber ?? '*');

        $fpdf->SetDrawColor(200, 200, 200);
        $fpdf->SetTextColor(50, 50, 50);

        $fpdf->Ln(10);    
        $fpdf->SetFont('Arial', 'B', 14);  
        $fpdf->Cell(190, 10, 'SUMMARY', 0, 1, 1, 'L');

        $fpdf->SetFont('Arial', 'B', 7);   
        // $Vessels = \DB::table('vessel_availabilities')->where('Vessel', $Request->VesselReportFor)->first(); 
        if (isset($Request->Month) AND isset($Request->VehicleNumber)) {  
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, 'This report summarizes vehicle expenses for each month, detailing an overview of the current status, performance metrics, and maintenance schedules of the fleet. It highlights operational efficiency, cost management, and areas for improvement, ensuring optimal utilization and safety across all vehicles.');
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'IN ' . strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F')) . ' ' . $Request->Year, 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', 'B', 9);  
            $fpdf->Cell(31.7, 5, 'Vehicle ', 1);
            $fpdf->Cell(24.4, 5, 'Date ', 1);
            $fpdf->Cell(24.4, 5, 'Card Number', 1);
            $fpdf->Cell(24.4, 5, 'Mileage ', 1);
            $fpdf->Cell(24.4, 5, 'Quantity ', 1);
            $fpdf->Cell(24.4, 5, 'Distance ', 1);
            $fpdf->Cell(36.4, 5, 'Amount ', 1);

            $fpdf->Ln();
            $fpdf->SetFont('Arial', '', 7);  
            $fpdf->Ln(0.1); 
            $ReportQuery = \DB::table('refuelings')->where('VehicleNumber', $Request->VehicleNumber)->whereMonth('Date', $Request->Month)->whereYear('Date', $Year)->orderBy('Date')->get();
            $FuelCostArr = [];
            $DistanceCoveredArr = [];
            $DistanceCoveredArr = [];
            $QuantityArr = [];
            $ConsumptionArr = [];
            foreach ($ReportQuery as $Car) { 
                array_push($FuelCostArr, $Car->Amount);
                array_push($DistanceCoveredArr, $Car->KM);
                array_push($QuantityArr, $Car->Quantity);
                array_push($ConsumptionArr, $Car->Consumption);
                $fpdf->Cell(31.7, 5, $Car->VehicleNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Date, 1);
                $fpdf->Cell(24.4, 5, $Car->CardNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Mileage, 1);
                $fpdf->Cell(24.4, 5, $Car->Quantity, 1);
                $fpdf->Cell(24.4, 5, $Car->KM, 1);
                $fpdf->Cell(36.4, 5, number_format($Car->Amount) . ' NGN', 1);
                $fpdf->Ln(); 
            } 
            $fpdf->Cell(153.5, 5, '', 0);
            $fpdf->Cell(36.4, 5, number_format(collect($FuelCostArr)->sum()) . ' NGN', 1);
            $fpdf->Ln(15);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'OVERVIEW', 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', '', 9); 
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, "The vehicle fleet report offers a comprehensive analysis of our fleet's operational performance, including vehicle utilization rates, mileage/kilometer history, and fuel efficiency. It aims to identify trends, optimize resource allocation, and enhance overall fleet management for improved service delivery and cost-effectiveness.");
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Cell(65.7, 5, 'FUEL COST = ' . number_format(collect($FuelCostArr)->sum()) . ' NGN' . ',', 0);
            $fpdf->Cell(52.7, 5, 'DISTANCE COVERED = ' . collect($DistanceCoveredArr)->sum() . ',', 0);
            $fpdf->Ln(5);
            $fpdf->Cell(65.7, 5, 'AVERAGE CONSUMPTION = ' . round(collect($ConsumptionArr)->sum()) . ',', 0); 
            $fpdf->Cell(76.7, 5, 'QUANTITY = ' . collect($QuantityArr)->sum() . ',', 0);
            $fpdf->Cell(25.7, 5, 'TOTAL ACTIVITIES = ' . count($ReportQuery), 0);
        } else {   
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, 'This report summarizes vehicle expenses for each month, detailing an overview of the current status, performance metrics, and maintenance schedules of the fleet. It highlights operational efficiency, cost management, and areas for improvement, ensuring optimal utilization and safety across all vehicles.');
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'IN ' . strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F')) . ' ' . $Request->Year, 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', 'B', 9);  
            $fpdf->Cell(31.7, 5, 'Vehicle ', 1);
            $fpdf->Cell(24.4, 5, 'Date ', 1);
            $fpdf->Cell(24.4, 5, 'Card Number', 1);
            $fpdf->Cell(24.4, 5, 'Mileage ', 1);
            $fpdf->Cell(24.4, 5, 'Quantity ', 1);
            $fpdf->Cell(24.4, 5, 'Distance ', 1);
            $fpdf->Cell(36.4, 5, 'Amount ', 1);
            $fpdf->Ln();
            $fpdf->SetFont('Arial', '', 7);  
            $fpdf->Ln(0.1); 
            $ReportQuery = \DB::table('refuelings')->whereMonth('Date', $Request->Month)->whereYear('Date', $Year)->orderBy('Date')->get();
            $FuelCostArr = [];
            $DistanceCoveredArr = [];
            $DistanceCoveredArr = [];
            $QuantityArr = [];
            $ConsumptionArr = [];
            foreach ($ReportQuery as $Car) { 
                array_push($FuelCostArr, $Car->Amount);
                array_push($DistanceCoveredArr, $Car->KM);
                array_push($QuantityArr, $Car->Quantity);
                array_push($ConsumptionArr, $Car->Consumption);
                $fpdf->Cell(31.7, 5, $Car->VehicleNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Date, 1);
                $fpdf->Cell(24.4, 5, $Car->CardNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Mileage, 1);
                $fpdf->Cell(24.4, 5, $Car->Quantity, 1);
                $fpdf->Cell(24.4, 5, $Car->KM, 1);
                $fpdf->Cell(36.4, 5, number_format($Car->Amount) . ' NGN', 1);
                $fpdf->Ln(); 
            } 
            $fpdf->Cell(153.5, 5, '', 0);
            $fpdf->Cell(36.4, 5, number_format(collect($FuelCostArr)->sum()) . ' NGN', 1);
            $fpdf->Ln(15);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'OVERVIEW', 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', '', 9); 
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, "The vehicle fleet report offers a comprehensive analysis of our fleet's operational performance, including vehicle utilization rates, mileage/kilometer history, and fuel efficiency. It aims to identify trends, optimize resource allocation, and enhance overall fleet management for improved service delivery and cost-effectiveness.");
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Cell(65.7, 5, 'FUEL COST = ' . number_format(collect($FuelCostArr)->sum()) . ' NGN' . ',', 0);
            $fpdf->Cell(52.7, 5, 'DISTANCE COVERED = ' . collect($DistanceCoveredArr)->sum() . ',', 0);
            $fpdf->Ln(5);
            $fpdf->Cell(65.7, 5, 'AVERAGE CONSUMPTION = ' . round(collect($ConsumptionArr)->sum()) . ',', 0); 
            $fpdf->Cell(76.7, 5, 'QUANTITY = ' . collect($QuantityArr)->sum() . ',', 0);
            $fpdf->Cell(25.7, 5, 'TOTAL ACTIVITIES = ' . count($ReportQuery), 0);
        }
        $fpdf->SetFont('Arial', 'B', 7); 
  
        $fpdf->Ln(5);   
        $fpdf->Image('../public/Images/depasa-signature.png', 11, 270, 30, 20);
          
        $fpdf->SetTextColor(223, 46, 56);
        $fpdf->SetFont('Arial', '', 7);
        $fpdf->Cell(50, 6, 'Powered By: ' . $_SERVER['HTTP_HOST'] . ' (Fleet Management Software)');  

        $fpdf->Output();        
        exit; 
    }
}
