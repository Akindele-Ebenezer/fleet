<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;  

class FleetPeriodicMaintenanceReportPdfController extends Controller
{ 
    public function fleet_periodic_report(Fpdf $fpdf, Request $Request) {  
        $fpdf->AddPage();    

        // $fpdf->SetAutoPageBreak(false);
        $fpdf->SetFont('Arial', '', 10);  
 
        $Month = strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F'));
        $Year = $Request->Year;
        $fpdf->SetTitle('Vehicle Maintenance Cost Report - ' . $Month . ' ' . $Year);

        $fpdf->Image('../public/images/depasa-logo.png', 10, 7, 60);    

        $fpdf->Ln(35);      
        
        $fpdf->SetFont('Arial', 'B', 15); 
        $fpdf->SetFillColor(217, 242, 255);  
        $fpdf->Cell(190, 10, 'VEHICLE REPORT - Maintenance Cost', 0, 1, 1, 'L');
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
            $fpdf->MultiCell(190, 5, "The Vehicle Maintenance Report summarizes the essential checks and services performed on the vehicle. It includes details on oil changes, tire rotations, brake inspections, and fluid levels. Regular maintenance ensures optimal performance, enhances safety, and prolongs the vehicle's lifespan.");
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'IN ' . strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F')) . ' ' . $Request->Year, 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', 'B', 9);  
            $fpdf->Cell(31.7, 5, 'Vehicle ', 1);
            $fpdf->Cell(24.4, 5, 'Date ', 1);
            $fpdf->Cell(24.4, 5, 'Time', 1);
            $fpdf->Cell(24.4, 5, 'Incident Type ', 1);
            $fpdf->Cell(24.4, 5, 'Invoice No. ', 1);
            $fpdf->Cell(24.4, 5, 'Week ', 1);
            $fpdf->Cell(36.4, 5, 'Cost ', 1);

            $fpdf->Ln();
            $fpdf->SetFont('Arial', '', 7);  
            $fpdf->Ln(0.1); 
            $ReportQuery = \DB::table('maintenances')->where('VehicleNumber', $Request->VehicleNumber)->whereMonth('Date', $Request->Month)->whereYear('Date', $Year)->orderBy('Date')->get();
            $MaintenanceCostArr = [];  
            foreach ($ReportQuery as $Car) { 
                array_push($MaintenanceCostArr, $Car->Cost); 
                $fpdf->Cell(31.7, 5, $Car->VehicleNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Date, 1);
                $fpdf->Cell(24.4, 5, $Car->Time, 1);
                $fpdf->Cell(24.4, 5, $Car->IncidentType, 1);
                $fpdf->Cell(24.4, 5, $Car->InvoiceNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Week, 1);
                $fpdf->Cell(36.4, 5, number_format($Car->Cost) . ' NGN', 1);
                $fpdf->Ln(); 
            } 
            $fpdf->Cell(153.5, 5, '', 0);
            $fpdf->Cell(36.4, 5, number_format(collect($MaintenanceCostArr)->sum()) . ' NGN', 1);
            $fpdf->Ln(15);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'OVERVIEW', 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', '', 9); 
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, "The Vehicle Maintenance Report provides a comprehensive overview of the maintenance activities conducted on the vehicle. It highlights key services such as oil changes, tire rotations, and brake inspections, ensuring that the vehicle operates efficiently and safely while extending its overall lifespan.");
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Cell(65.7, 5, 'MAINTENANCE COST = ' . number_format(collect($MaintenanceCostArr)->sum()) . ' NGN' . ',', 0); 
            $fpdf->Cell(25.7, 5, 'TOTAL ACTIVITIES = ' . count($ReportQuery), 0);
        } else {   
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, "The Vehicle Maintenance Report summarizes the essential checks and services performed on the vehicle. It includes details on oil changes, tire rotations, brake inspections, and fluid levels. Regular maintenance ensures optimal performance, enhances safety, and prolongs the vehicle's lifespan.");
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'IN ' . strtoupper(\Carbon\Carbon::create()->month($Request->Month)->format('F')) . ' ' . $Request->Year, 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', 'B', 9);  
            $fpdf->Cell(31.7, 5, 'Vehicle ', 1);
            $fpdf->Cell(24.4, 5, 'Date ', 1);
            $fpdf->Cell(24.4, 5, 'Time', 1);
            $fpdf->Cell(24.4, 5, 'Incident Type ', 1);
            $fpdf->Cell(24.4, 5, 'Invoice No. ', 1);
            $fpdf->Cell(24.4, 5, 'Week ', 1);
            $fpdf->Cell(36.4, 5, 'Cost ', 1);
            $fpdf->Ln();
            $fpdf->SetFont('Arial', '', 7);  
            $fpdf->Ln(0.1); 
            $ReportQuery = \DB::table('maintenances')->whereMonth('Date', $Request->Month)->whereYear('Date', $Year)->orderBy('Date')->get();
            $MaintenanceCostArr = [];  
            foreach ($ReportQuery as $Car) { 
                array_push($MaintenanceCostArr, $Car->Cost); 
                $fpdf->Cell(31.7, 5, $Car->VehicleNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Date, 1);
                $fpdf->Cell(24.4, 5, $Car->Time, 1);
                $fpdf->Cell(24.4, 5, $Car->IncidentType, 1);
                $fpdf->Cell(24.4, 5, $Car->InvoiceNumber, 1);
                $fpdf->Cell(24.4, 5, $Car->Week, 1);
                $fpdf->Cell(36.4, 5, number_format($Car->Cost) . ' NGN', 1);
                $fpdf->Ln(); 
            } 
            $fpdf->Cell(153.5, 5, '', 0);
            $fpdf->Cell(36.4, 5, number_format(collect($MaintenanceCostArr)->sum()) . ' NGN', 1);
            $fpdf->Ln(15);
            $fpdf->SetFont('Arial', 'B', 14);  
            $fpdf->Cell(190.4, 10, 'OVERVIEW', 0, 1, 1, 'L');
            $fpdf->SetFont('Arial', '', 9); 
            $fpdf->Ln(3);
            $fpdf->MultiCell(190, 5, "The Vehicle Maintenance Report provides a comprehensive overview of the maintenance activities conducted on the vehicle. It highlights key services such as oil changes, tire rotations, and brake inspections, ensuring that the vehicle operates efficiently and safely while extending its overall lifespan.");
            $fpdf->Ln(3);
            $fpdf->SetFont('Arial', '', 9);  
            $fpdf->Cell(65.7, 5, 'MAINTENANCE COST = ' . number_format(collect($MaintenanceCostArr)->sum()) . ' NGN' . ',', 0); 
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
