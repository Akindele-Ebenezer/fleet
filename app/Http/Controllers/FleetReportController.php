<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class FleetReportController extends Controller
{
    public function car_report(Fpdf $fpdf) {
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(50, 25, '(This report is for official purpose only)');
        $fpdf->Cell(33, 25, '');
        $fpdf->SetFont('Arial', 'B', 15);
        $fpdf->Cell(50, 25, 'VEHICLE FLEET MANAGEMENT SYSTEM');
        $fpdf->Ln(5); 
        $fpdf->Cell(170, 25, '');
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
        $fpdf->MultiCell(190, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam doloribus temporibus perspiciatis? Molestiae ipsam porro optio architecto, fugit quibusdam veritatis qui iure nemo assumenda! Unde ad perferendis tempora quisquam sunt? Dolore minus ipsum, quaerat culpa quae maiores porro nisi assumenda, corrupti laborum earum. Incidunt impedit soluta libero, magni atque nobis ab tenetur fuga veniam rem alias, laudantium molestiae placeat nulla..');

        $fpdf->Ln(8);
        $fpdf->Cell(50, 5, 'Quisquam doloribus temporibus perspiciatis? Molestiae ipsam porro optio architecto');
        $fpdf->Cell(116, 25, '');
        $fpdf->Cell(50, 5, 'Date25/04/2023');
        $fpdf->SetFont('Arial', '', 9);

        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'The following are the brief particulars:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Registration No.', 0, 0, ''); 
        $fpdf->SetDrawColor(220, 220, 220);
        $fpdf->Cell(50, 6, '{Registration No}', 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Cell(35, 6, 'Maintenance', 0, 0, ''); 
        $fpdf->SetDrawColor(220, 220, 220);
        $fpdf->Cell(50, 6, '{Maintenance}', 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Used By', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Used By}', 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Repairs', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Repairs}', 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Balance', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Balance}', 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Cell(35, 6, 'Refueling', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Refueling}', 1);
        $fpdf->Cell(20, 6, '');
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Refueling', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Refueling}', 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Cell(35, 6, 'Status', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Status}', 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Deposits', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Deposits}', 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Cell(35, 6, 'Total ', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Total }', 1);
        $fpdf->Cell(20, 6, '');  
        

        $fpdf->Ln(10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell(190, 5, 'Overview:', 0, 0, '', true);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Ln(8);
        $fpdf->Cell(35, 6, 'Price', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Price}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Purchase Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Purchase Date}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Company Code', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Company Code}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Supplier', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Supplier}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Licence Expiry Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Licence Expiry Date}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Maker', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Maker}', 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Insurance Expiry Date', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Insurance Expiry Date}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Model', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Model}', 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Card No (TOTAL)', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Card No (TOTAL)}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Engine Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Engine Type}', 1);
        $fpdf->Cell(20, 6, '');
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Monthly Budget', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Monthly Budget}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Gear Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Gear Type}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Fuel Tank Capacity', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Fuel Tank Capacity}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Gear Type', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Gear Type}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Engine Volume', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Engine Volume}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Engine No', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Engine No}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Ln(8);
        
        $fpdf->Cell(35, 6, 'Model Year', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Model Year}', 1);
        $fpdf->Cell(20, 6, '');  
        $fpdf->Cell(35, 6, 'Chasis No', 0, 0, ''); 
        $fpdf->Cell(50, 6, '{Chasis No}', 1);
        $fpdf->Cell(20, 6, '');  
        
        $fpdf->Ln(11);
        $fpdf->Cell(190, 5, 'More data from this vehicle:', 0, 0, '', true);
        $fpdf->Ln(10);  
        $fpdf->Cell(34, 5, '{Stop Date}', 1, 0, '', true);     
   
        $fpdf->Cell(5, 5, '');  
        $fpdf->Cell(34, 5, 'Driver', 0, 0, '', true);   
 
        
        $fpdf->Ln(7);
        $fpdf->SetFillColor(255, 255, 255); 
        $fpdf->Cell(34, 5, '{Stop Date}', 1, 0, '', true); 
        $fpdf->SetTextColor(0, 0, 0);

        $fpdf->Cell(5, 5, '');  
        $fpdf->Cell(34, 5, '{Driver}', 1, 0, '', true);  
 
        $fpdf->Footer('sfk');  
 
        $fpdf->Output();
        exit;
    }
}
