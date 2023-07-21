<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class InspectionReportPdfController extends Controller
{
    protected $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf;
    }

    public function index(Request $request) 
    { 
        $InspectionReport = \DB::table('inspection_report')->where('InspectionNumber', $request->InspectionNumber)->first();
        $ExteriorInspection = \DB::table('exterior_inspection')->where('InspectionNumber', $request->InspectionNumber)->first();
        $InteriorInspection = \DB::table('interior_inspection')->where('InspectionNumber', $request->InspectionNumber)->first();
        $FluidLevels = \DB::table('fluid_levels')->where('InspectionNumber', $request->InspectionNumber)->first();
        $MechanicalInspection = \DB::table('mechanical_inspection')->where('InspectionNumber', $request->InspectionNumber)->first();
        $SafetyEquipment = \DB::table('safety_equipment')->where('InspectionNumber', $request->InspectionNumber)->first();

        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->SetTextColor(245, 37, 95);
        $this->fpdf->SetFillColor(227, 232, 243);
        $this->fpdf->AddPage();
        $this->fpdf->SetDrawColor(49, 52, 56);
        $this->fpdf->SetFont('Arial', '', 8);  
        $this->fpdf->Cell(190, 8,'Depasa Marine International', 0, 0, 'R'); 
        $this->fpdf->Ln();    
        $this->fpdf->SetFont('Arial', 'B', 15);   
        $this->fpdf->SetTextColor(49, 52, 56);
        $this->fpdf->Cell(190, 9,'VEHICLE INSPECTION REPORT', 0, 0, 'L', 1);  
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', '', 9);   
        $this->fpdf->Ln();   
        $this->fpdf->MultiCell(190, 4,'This report is an essential document that provides comprehensive information about the condition of this vehicle. It helps to identify any issues or potential problems with the vehicle and can be used to verify its condition before purchase or sale. This report is essential to ensure the safety and reliability of the vehicle.'); 
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', 'B', 11);  
        $this->fpdf->Cell(190, 8,'DAILY VEHICLE INSPECTION DETAILS', 'B');  
        $this->fpdf->SetFont('Arial', '', 9);  
        $this->fpdf->Cell(0, 10,' ', 0, 0);    
        $this->fpdf->Ln();   

        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(120, 5,'Inspection Number:', 0, 0);   
        $this->fpdf->Cell(140, 5,'Vehicle Plate #:', 0, 0);   
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->Cell(80, 8, $request->InspectionNumber, 0, 0);  
        $this->fpdf->Cell(40, 8,' ', 0, 0);   
        $this->fpdf->Cell(70, 8, $InspectionReport->VehicleNumber, 0, 0);   
        $this->fpdf->Cell(0, 10,' ', 0, 0);   
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(120, 5,'Mileage:', 0, 0);   
        $this->fpdf->Cell(140, 5,'Date Inspected:', 0, 0);   
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->Cell(80, 8, $InspectionReport->Mileage, 0, 0);  
        $this->fpdf->Cell(40, 8,' ', 0, 0);    
        $this->fpdf->Cell(70, 8, $InspectionReport->DateInspected, 0, 0);  
        $this->fpdf->Cell(0, 10,' ', 0, 0);    
        $this->fpdf->Ln();     
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(120, 5,'Inspected By:', 0, 0);    
        $this->fpdf->Cell(140, 5,'Status:', 0, 0); 
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->Cell(80, 8, $InspectionReport->InspectedBy, 0, 0); 
        $this->fpdf->Cell(40, 8,' ', 0, 0);  
        $this->fpdf->Cell(70, 8, $InspectionReport->Status, 0, 0);  
        $this->fpdf->Cell(0, 10,' ', 0, 0);   
        $this->fpdf->Ln();     
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->Cell(120, 5,'Assigned Mechanic/Agent:', 0, 0);  
        $this->fpdf->SetFont('Arial', '', 9);   
        $this->fpdf->Ln();   
        $this->fpdf->Cell(80, 8, $InspectionReport->Mechanic, 0, 0,); 
  
        $this->fpdf->Cell(0, 10,' ', 0, 0);   
        $this->fpdf->Ln();   
        $this->fpdf->SetFont('Arial', 'B', 11);  
        $this->fpdf->Cell(190, 9,'ITEM CHECKLIST', 0, 0, 'L', 1);  
        $this->fpdf->SetTextColor(49, 52, 56); 
        $this->fpdf->SetFont('Arial', '', 9);

        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 10,' ', 0, 0); 
        $this->fpdf->SetTextColor(245, 37, 95);
        $this->fpdf->Cell(20, 10,'BAD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(42, 201, 47);
        $this->fpdf->Cell(20, 10,'GOOD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(71, 128, 213);
        $this->fpdf->Cell(20, 10,'N/A', 0, 0, 'C');  
        $this->fpdf->Ln();      
        $this->fpdf->SetTextColor(49, 52, 56);
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetDrawColor(227, 232, 243);
        $this->fpdf->Cell(130, 5, 'Exterior Inspection', 1, 0, 'L', 1); 
        $this->fpdf->SetDrawColor(171, 171, 171); 
        $this->fpdf->SetFont('Arial', '', 9);
        
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check for any damages or scratches on the body', 1, 0);  
        $this->fpdf->Cell(20, 7, $ExteriorInspection->BodyDamages === 'BAD' ? $ExteriorInspection->BodyDamages : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->BodyDamages === 'GOOD' ? $ExteriorInspection->BodyDamages : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->BodyDamages === 'NO_ANSWER' ? $ExteriorInspection->BodyDamages : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Inspect the tires for wear and tear and ensure they are properly inflated', 1, 0); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->TireCondition === 'BAD' ? $ExteriorInspection->TireCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->TireCondition === 'GOOD' ? $ExteriorInspection->TireCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->TireCondition === 'NO_ANSWER' ? $ExteriorInspection->TireCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the windshield and windows for any cracks or chips', 1, 0); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->WindshieldCondition === 'BAD' ? $ExteriorInspection->WindshieldCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->WindshieldCondition === 'GOOD' ? $ExteriorInspection->WindshieldCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->WindshieldCondition === 'NO_ANSWER' ? $ExteriorInspection->WindshieldCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Verify that all lights (headlights, taillights, indicators) are functioning correctly', 1, 0); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->LightsCondition === 'BAD' ? $ExteriorInspection->LightsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->LightsCondition === 'GOOD' ? $ExteriorInspection->LightsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->LightsCondition === 'NO_ANSWER' ? $ExteriorInspection->LightsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Ensure that mirrors are clean and properly adjusted', 1, 0); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->MirrorCondition === 'BAD' ? $ExteriorInspection->MirrorCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->MirrorCondition === 'GOOD' ? $ExteriorInspection->MirrorCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $ExteriorInspection->MirrorCondition === 'NO_ANSWER' ? $ExteriorInspection->MirrorCondition : '', 1, 0, 'C'); 
        
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 10,' ', 0, 0); 
        $this->fpdf->SetTextColor(245, 37, 95);
        $this->fpdf->Cell(20, 10,'BAD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(42, 201, 47);
        $this->fpdf->Cell(20, 10,'GOOD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(71, 128, 213);
        $this->fpdf->Cell(20, 10,'N/A', 0, 0, 'C');
        $this->fpdf->SetTextColor(49, 52, 56);
    
        $this->fpdf->Ln();     
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetDrawColor(227, 232, 243);
        $this->fpdf->Cell(130, 5,'Interior Inspection', 1, 0, 'L', 1); 
        $this->fpdf->SetDrawColor(171, 171, 171);
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->Ln();       
        $this->fpdf->Cell(130, 7,'Check the seat belts for proper functionality and adjust them if necessary', 1, 0); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->SeatBeltsCondition === 'BAD' ? $InteriorInspection->SeatBeltsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->SeatBeltsCondition === 'GOOD' ? $InteriorInspection->SeatBeltsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->SeatBeltsCondition === 'NO_ANSWER' ? $InteriorInspection->SeatBeltsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Inspect the condition of the seats, dashboard, and floor mats', 1, 0); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->SeatsCondition === 'BAD' ? $InteriorInspection->SeatsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->SeatsCondition === 'GOOD' ? $InteriorInspection->SeatsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->SeatsCondition === 'NO_ANSWER' ? $InteriorInspection->SeatsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Test the horn to ensure it is working', 1, 0); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->HornCondition === 'BAD' ? $InteriorInspection->HornCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->HornCondition === 'GOOD' ? $InteriorInspection->HornCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->HornCondition === 'NO_ANSWER' ? $InteriorInspection->HornCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Verify that all controls (AC, heating, audio, etc.) are functioning correctly', 1, 0); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->AllControlsCondition === 'BAD' ? $InteriorInspection->AllControlsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->AllControlsCondition === 'GOOD' ? $InteriorInspection->AllControlsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->AllControlsCondition === 'NO_ANSWER' ? $InteriorInspection->AllControlsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the visibilty by cleaning the windshield and mirrors', 1, 0); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->MirrorVisibility === 'BAD' ? $InteriorInspection->MirrorVisibility : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->MirrorVisibility === 'GOOD' ? $InteriorInspection->MirrorVisibility : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $InteriorInspection->MirrorVisibility === 'NO_ANSWER' ? $InteriorInspection->MirrorVisibility : '', 1, 0, 'C'); 

        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 10,' ', 0, 0); 
        $this->fpdf->SetTextColor(245, 37, 95);
        $this->fpdf->Cell(20, 10,'BAD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(42, 201, 47);
        $this->fpdf->Cell(20, 10,'GOOD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(71, 128, 213);
        $this->fpdf->Cell(20, 10,'N/A', 0, 0, 'C');
        $this->fpdf->SetTextColor(49, 52, 56);
    
        $this->fpdf->Ln();     
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetDrawColor(227, 232, 243);
        $this->fpdf->Cell(130, 5,'Fluid Levels', 1, 0, 'L', 1); 
        $this->fpdf->SetDrawColor(171, 171, 171);
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->Ln();       
        $this->fpdf->Cell(130, 7,'Check the engine oil level and add more if needed', 1, 0); 
        $this->fpdf->Cell(20, 7, $FluidLevels->EngineOilCondition === 'BAD' ? $FluidLevels->EngineOilCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->EngineOilCondition === 'GOOD' ? $FluidLevels->EngineOilCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->EngineOilCondition === 'NO_ANSWER' ? $FluidLevels->EngineOilCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Verify the coolant level and top up if necessary', 1, 0); 
        $this->fpdf->Cell(20, 7, $FluidLevels->CoolantLevelCondition === 'BAD' ? $FluidLevels->CoolantLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->CoolantLevelCondition === 'GOOD' ? $FluidLevels->CoolantLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->CoolantLevelCondition === 'NO_ANSWER' ? $FluidLevels->CoolantLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the brake fluid level and add more if required', 1, 0); 
        $this->fpdf->Cell(20, 7, $FluidLevels->BrakeFluidLevelCondition === 'BAD' ? $FluidLevels->BrakeFluidLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->BrakeFluidLevelCondition === 'GOOD' ? $FluidLevels->BrakeFluidLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->BrakeFluidLevelCondition === 'NO_ANSWER' ? $FluidLevels->BrakeFluidLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Ensure the windshield washer fluid is filled', 1, 0); 
        $this->fpdf->Cell(20, 7, $FluidLevels->WindshieldWasherFluidCondition === 'BAD' ? $FluidLevels->WindshieldWasherFluidCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->WindshieldWasherFluidCondition === 'GOOD' ? $FluidLevels->WindshieldWasherFluidCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->WindshieldWasherFluidCondition === 'NO_ANSWER' ? $FluidLevels->WindshieldWasherFluidCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the power steering fluid level and add more if needed', 1, 0); 
        $this->fpdf->Cell(20, 7, $FluidLevels->PowerSteeringFluidLevelCondition === 'BAD' ? $FluidLevels->PowerSteeringFluidLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->PowerSteeringFluidLevelCondition === 'GOOD' ? $FluidLevels->PowerSteeringFluidLevelCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $FluidLevels->PowerSteeringFluidLevelCondition === 'NO_ANSWER' ? $FluidLevels->PowerSteeringFluidLevelCondition : '', 1, 0, 'C'); 

        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 10,' ', 0, 0); 
        $this->fpdf->SetTextColor(245, 37, 95);
        $this->fpdf->Cell(20, 10,'BAD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(42, 201, 47);
        $this->fpdf->Cell(20, 10,'GOOD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(71, 128, 213);
        $this->fpdf->Cell(20, 10,'N/A', 0, 0, 'C');
        $this->fpdf->SetTextColor(49, 52, 56);

        $this->fpdf->Ln();       
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetDrawColor(227, 232, 243);
        $this->fpdf->Cell(130, 5,'Mechanical Inspection', 1, 0, 'L', 1); 
        $this->fpdf->SetDrawColor(171, 171, 171); 
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->Ln();       
        $this->fpdf->Cell(130, 7,'Start the engine and listen for any unusual noises or vibrations', 1, 0); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->EngineCondition === 'BAD' ? $MechanicalInspection->EngineCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->EngineCondition === 'GOOD' ? $MechanicalInspection->EngineCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->EngineCondition === 'NO_ANSWER' ? $MechanicalInspection->EngineCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the functionality of the brakes, accelerator, and clutch (if applicable)', 1, 0); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BrakeCondition === 'BAD' ? $MechanicalInspection->BrakeCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BrakeCondition === 'GOOD' ? $MechanicalInspection->BrakeCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BrakeCondition === 'NO_ANSWER' ? $MechanicalInspection->BrakeCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Test the parking brake and ensure it engages and disengages properly', 1, 0); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BrakeEngagingCondition === 'BAD' ? $MechanicalInspection->BrakeEngagingCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BrakeEngagingCondition === 'GOOD' ? $MechanicalInspection->BrakeEngagingCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BrakeEngagingCondition === 'NO_ANSWER' ? $MechanicalInspection->BrakeEngagingCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Inspect the wiper blades for any signs of wear and replace if necessary', 1, 0); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->WiperBladesCondition === 'BAD' ? $MechanicalInspection->WiperBladesCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->WiperBladesCondition === 'GOOD' ? $MechanicalInspection->WiperBladesCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->WiperBladesCondition === 'NO_ANSWER' ? $MechanicalInspection->WiperBladesCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the battery condition and terminals for corrosion', 1, 0); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BatteryCondition === 'BAD' ? $MechanicalInspection->BatteryCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BatteryCondition === 'GOOD' ? $MechanicalInspection->BatteryCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $MechanicalInspection->BatteryCondition === 'NO_ANSWER' ? $MechanicalInspection->BatteryCondition : '', 1, 0, 'C'); 

        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 10,' ', 0, 0); 
        $this->fpdf->SetTextColor(245, 37, 95);
        $this->fpdf->Cell(20, 10,'BAD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(42, 201, 47);
        $this->fpdf->Cell(20, 10,'GOOD', 0, 0, 'C'); 
        $this->fpdf->SetTextColor(71, 128, 213);
        $this->fpdf->Cell(20, 10,'N/A', 0, 0, 'C');
        $this->fpdf->SetTextColor(49, 52, 56);
  
        $this->fpdf->Ln();     
        $this->fpdf->SetFont('Arial', 'B', 11);
        $this->fpdf->SetDrawColor(227, 232, 243);
        $this->fpdf->Cell(130, 5,'Safety Equipment', 1, 0, 'L', 1); 
        $this->fpdf->SetFont('Arial', '', 9);
        $this->fpdf->SetDrawColor(171, 171, 171); 
        $this->fpdf->Ln();       
        $this->fpdf->Cell(130, 7,'Ensure that a spare tire, jack, and lug wrench are present in the vehicle', 1, 0); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->PresenceOfSpareTire === 'BAD' ? $SafetyEquipment->PresenceOfSpareTire : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->PresenceOfSpareTire === 'GOOD' ? $SafetyEquipment->PresenceOfSpareTire : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->PresenceOfSpareTire === 'NO_ANSWER' ? $SafetyEquipment->PresenceOfSpareTire : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Verify the presence of a first aid kit and a fire extinguisher', 1, 0); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->PresenceOfFirstAidKit === 'BAD' ? $SafetyEquipment->PresenceOfFirstAidKit : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->PresenceOfFirstAidKit === 'GOOD' ? $SafetyEquipment->PresenceOfFirstAidKit : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->PresenceOfFirstAidKit === 'NO_ANSWER' ? $SafetyEquipment->PresenceOfFirstAidKit : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Check the functioning of all safety features, such as airbags and seatbelt pretensioners', 1, 0); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->FunctionalityOfAllSafetyFeatures === 'BAD' ? $SafetyEquipment->FunctionalityOfAllSafetyFeatures : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->FunctionalityOfAllSafetyFeatures === 'GOOD' ? $SafetyEquipment->FunctionalityOfAllSafetyFeatures : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->FunctionalityOfAllSafetyFeatures === 'NO_ANSWER' ? $SafetyEquipment->FunctionalityOfAllSafetyFeatures : '', 1, 0, 'C'); 
        $this->fpdf->Ln();      
        $this->fpdf->Cell(130, 7,'Test the operation of the emergency lights and warning triangle (if available)', 1, 0); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->EmergencyLightsCondition === 'BAD' ? $SafetyEquipment->EmergencyLightsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->EmergencyLightsCondition === 'GOOD' ? $SafetyEquipment->EmergencyLightsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Cell(20, 7, $SafetyEquipment->EmergencyLightsCondition === 'NO_ANSWER' ? $SafetyEquipment->EmergencyLightsCondition : '', 1, 0, 'C'); 
        $this->fpdf->Ln();       

        $this->fpdf->Output();

        exit;
    }
}
