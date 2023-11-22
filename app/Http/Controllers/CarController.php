<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request; 
use AmrShawky\LaravelCurrency\Facade\Currency;
use File;

class CarController extends Controller
{
    public function bd() {
        return view('bd');
    }
    
    public function config() {  
        $Cars = Car::whereNotNull('VehicleNumber')->orderBy('PurchaseDate', 'DESC')->paginate(14);
        $Cars__MyRecords = Car::whereNotNull('VehicleNumber')->selectRaw("*, TRIM(VehicleNumber) AS VehicleNumber")->where('UserId', self::USER_ID())->orderBy('PurchaseDate', 'DESC')->paginate(7); 
        \DB::statement("SET SQL_MODE=''");
        $CarOwners = Car::selectRaw("id, TRIM(CarOwner) AS CarOwner, TRIM(VehicleNumber) AS VehicleNumber, CardNumber")->whereNotNull('CarOwner')->groupBy('CarOwner')->paginate(7); 
        $MyInspectionReport = \DB::table('inspection_report')->where('UserId', self::USER_ID())->orderBy('DateInspected', 'DESC')->paginate(14);
        $General_Inspection_Report = \DB::table('inspection_report')->orderBy('DateInspected', 'DESC')->paginate(14);

        return [
            'Cars' => $Cars,
            'Cars__MyRecords' => $Cars__MyRecords, 
            'CarOwners' => $CarOwners, 
            'MyInspectionReport' => $MyInspectionReport, 
            'General_Inspection_Report' => $General_Inspection_Report, 
        ];
    }

    public function index()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 

            if ($FilterValue === 'active') {
                $Cars = Car::where('Status', 'ACTIVE')->paginate(14);

                $Cars->withPath($_SERVER['REQUEST_URI']);
            } else {
                $Cars = Car::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Odometer', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->paginate(14);
 
                        $Cars->withPath($_SERVER['REQUEST_URI']);
                }

            return view('Cars', $Config)->with('Cars', $Cars);
        } 

        return view('Cars', $Config);
    }

    public function cars_daily_checklist() {
        return view('DailyCheckList');
    }

    public function cars_inspection_report() {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $MyInspectionReport = \DB::table('inspection_report')
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('InspectionNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Mileage', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('DateInspected', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InspectedBy', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('AdditionalNotes', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Attachment', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Mechanic', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubmitTime', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(14);
 
                        $MyInspectionReport->withPath($_SERVER['REQUEST_URI']);

            return view('InspectionReport', $Config)->with('MyInspectionReport', $MyInspectionReport);
        } 
        return view('InspectionReport', $Config);
    }

    public function cars_general_inspection_report() {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $General_Inspection_Report = \DB::table('inspection_report')
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('InspectionNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Mileage', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('DateInspected', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InspectedBy', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('AdditionalNotes', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Attachment', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Mechanic', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubmitTime', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Week', 'LIKE', '%' . $FilterValue . '%') 
                        ->paginate(14);
                      
                        $General_Inspection_Report->withPath($_SERVER['REQUEST_URI']);

            return view('GeneralInspectionReport', $Config)->with('General_Inspection_Report', $General_Inspection_Report);
        } 
        return view('GeneralInspectionReport', $Config);
    }

    public function cars_inspection_store(Request $request) {  
        if(empty($request->file('Attachment'))) {   
            \DB::table('inspection_report')->insert([
                'VehicleNumber' => $request->VehicleNumber, 
                'InspectionNumber' => $request->InspectionNumber, 
                'Mileage' => $request->Mileage,
                'DateInspected' => $request->DateInspected, 
                'InspectedBy' => $request->InspectedBy,
                'AdditionalNotes' => $request->AdditionalNotes, 
                'Status' => $request->Status,
                'Mechanic' => $request->Mechanic,
                'SubmitTime' => $request->SubmitTime,
                'Week' => $request->Week,
                'UserId' => self::USER_ID(),
            ]); 
        } else {
            $Attachment = $request->file('Attachment'); 
            $Attachment->move('Inspections/' . $request->VehicleNumber, $Attachment->getClientOriginalName()); 
            \DB::table('inspection_report')->insert([
                'VehicleNumber' => $request->VehicleNumber, 
                'InspectionNumber' => $request->InspectionNumber, 
                'Mileage' => $request->Mileage,
                'DateInspected' => $request->DateInspected, 
                'InspectedBy' => $request->InspectedBy,
                'AdditionalNotes' => $request->AdditionalNotes,
                'Attachment' => $Attachment->getClientOriginalName(),
                'Status' => $request->Status,
                'Mechanic' => $request->Mechanic,
                'SubmitTime' => $request->SubmitTime,
                'Week' => $request->Week,
                'UserId' => self::USER_ID(),
            ]); 
        }
 
        \DB::table('exterior_inspection')->insert([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'BodyDamages' => $request->BodyDamages,
            'TireCondition' => $request->TireCondition,
            'WindshieldCondition' => $request->WindshieldCondition,
            'LightsCondition' => $request->LightsCondition,
            'MirrorCondition' => $request->MirrorCondition, 
            'BodyDamages_ActionRequired' => $request->BodyDamages_ActionRequired, 
            'TireCondition_ActionRequired' => $request->TireCondition_ActionRequired, 
            'WindshieldCondition_ActionRequired' => $request->WindshieldCondition_ActionRequired, 
            'LightsCondition_ActionRequired' => $request->LightsCondition_ActionRequired, 
            'MirrorCondition_ActionRequired' => $request->MirrorCondition_ActionRequired, 
        ]); 

        \DB::table('interior_inspection')->insert([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'SeatBeltsCondition' => $request->SeatBeltsCondition,
            'SeatsCondition' => $request->SeatsCondition,
            'HornCondition' => $request->HornCondition,
            'AllControlsCondition' => $request->AllControlsCondition,
            'MirrorVisibility' => $request->MirrorVisibility, 
            'SeatBeltsCondition_ActionRequired' => $request->SeatBeltsCondition_ActionRequired, 
            'SeatsCondition_ActionRequired' => $request->SeatsCondition_ActionRequired, 
            'HornCondition_ActionRequired' => $request->HornCondition_ActionRequired, 
            'AllControlsCondition_ActionRequired' => $request->AllControlsCondition_ActionRequired, 
            'MirrorVisibility_ActionRequired' => $request->MirrorVisibility_ActionRequired, 
        ]); 

        \DB::table('fluid_levels')->insert([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'EngineOilCondition' => $request->EngineOilCondition,
            'CoolantLevelCondition' => $request->CoolantLevelCondition,
            'BrakeFluidLevelCondition' => $request->BrakeFluidLevelCondition,
            'WindshieldWasherFluidCondition' => $request->WindshieldWasherFluidCondition,
            'PowerSteeringFluidLevelCondition' => $request->PowerSteeringFluidLevelCondition, 
            'EngineOilCondition_ActionRequired' => $request->EngineOilCondition_ActionRequired, 
            'CoolantLevelCondition_ActionRequired' => $request->CoolantLevelCondition_ActionRequired, 
            'BrakeFluidLevelCondition_ActionRequired' => $request->BrakeFluidLevelCondition_ActionRequired, 
            'WindshieldWasherFluidCondition_ActionRequired' => $request->WindshieldWasherFluidCondition_ActionRequired, 
            'PowerSteeringFluidLevelCondition_ActionRequired' => $request->PowerSteeringFluidLevelCondition_ActionRequired, 
        ]); 

        \DB::table('mechanical_inspection')->insert([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'EngineCondition' => $request->EngineCondition,
            'BrakeCondition' => $request->BrakeCondition,
            'BrakeEngagingCondition' => $request->BrakeEngagingCondition,
            'WiperBladesCondition' => $request->WiperBladesCondition,
            'BatteryCondition' => $request->BatteryCondition, 
            'EngineCondition_ActionRequired' => $request->EngineCondition_ActionRequired, 
            'BrakeCondition_ActionRequired' => $request->BrakeCondition_ActionRequired, 
            'BrakeEngagingCondition_ActionRequired' => $request->BrakeEngagingCondition_ActionRequired, 
            'WiperBladesCondition_ActionRequired' => $request->WiperBladesCondition_ActionRequired, 
            'BatteryCondition_ActionRequired' => $request->BatteryCondition_ActionRequired, 
        ]); 

        \DB::table('safety_equipment')->insert([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'PresenceOfSpareTire' => $request->PresenceOfSpareTire,
            'PresenceOfFirstAidKit' => $request->PresenceOfFirstAidKit,
            'FunctionalityOfAllSafetyFeatures' => $request->FunctionalityOfAllSafetyFeatures,
            'EmergencyLightsCondition' => $request->EmergencyLightsCondition,
            'PresenceOfSpareTire_ActionRequired' => $request->PresenceOfSpareTire_ActionRequired, 
            'PresenceOfFirstAidKit_ActionRequired' => $request->PresenceOfFirstAidKit_ActionRequired, 
            'FunctionalityOfAllSafetyFeatures_ActionRequired' => $request->FunctionalityOfAllSafetyFeatures_ActionRequired, 
            'EmergencyLightsCondition_ActionRequired' => $request->EmergencyLightsCondition_ActionRequired, 
        ]); 

        return redirect()->route('Inspection_Report');
    }

    public function cars_inspection_update(Request $request) {  
        if(empty($request->file('Attachment'))) {   
            \DB::table('inspection_report')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
                'VehicleNumber' => $request->VehicleNumber, 
                'InspectionNumber' => $request->InspectionNumber, 
                'Mileage' => $request->Mileage,
                'DateInspected' => $request->DateInspected, 
                'InspectedBy' => $request->InspectedBy,
                'AdditionalNotes' => $request->AdditionalNotes, 
                'Status' => $request->Status,
                'Mechanic' => $request->Mechanic,
                'SubmitTime' => $request->SubmitTime,
                'Week' => $request->Week,
                'UserId' => self::USER_ID(),
            ]); 
        } else { 
            $Attachment = $request->file('Attachment'); 
            $Attachment->move('Inspections/' . $request->VehicleNumber, $Attachment->getClientOriginalName()); 
            \DB::table('inspection_report')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
                'VehicleNumber' => $request->VehicleNumber, 
                'InspectionNumber' => $request->InspectionNumber, 
                'Mileage' => $request->Mileage,
                'DateInspected' => $request->DateInspected, 
                'InspectedBy' => $request->InspectedBy,
                'AdditionalNotes' => $request->AdditionalNotes,
                'Attachment' => $Attachment->getClientOriginalName(),
                'Status' => $request->Status,
                'Mechanic' => $request->Mechanic,
                'SubmitTime' => $request->SubmitTime,
                'Week' => $request->Week,
                'UserId' => self::USER_ID(),
            ]); 
        }
  
        \DB::table('exterior_inspection')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'BodyDamages' => $request->BodyDamages,
            'TireCondition' => $request->TireCondition,
            'WindshieldCondition' => $request->WindshieldCondition,
            'LightsCondition' => $request->LightsCondition,
            'MirrorCondition' => $request->MirrorCondition, 
            'BodyDamages_ActionRequired' => $request->BodyDamages_ActionRequired, 
            'TireCondition_ActionRequired' => $request->TireCondition_ActionRequired, 
            'WindshieldCondition_ActionRequired' => $request->WindshieldCondition_ActionRequired, 
            'LightsCondition_ActionRequired' => $request->LightsCondition_ActionRequired, 
            'MirrorCondition_ActionRequired' => $request->MirrorCondition_ActionRequired, 
        ]); 

        \DB::table('interior_inspection')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'SeatBeltsCondition' => $request->SeatBeltsCondition,
            'SeatsCondition' => $request->SeatsCondition,
            'HornCondition' => $request->HornCondition,
            'AllControlsCondition' => $request->AllControlsCondition,
            'MirrorVisibility' => $request->MirrorVisibility, 
            'SeatBeltsCondition_ActionRequired' => $request->SeatBeltsCondition_ActionRequired, 
            'SeatsCondition_ActionRequired' => $request->SeatsCondition_ActionRequired, 
            'HornCondition_ActionRequired' => $request->HornCondition_ActionRequired, 
            'AllControlsCondition_ActionRequired' => $request->AllControlsCondition_ActionRequired, 
            'MirrorVisibility_ActionRequired' => $request->MirrorVisibility_ActionRequired, 
        ]); 

        \DB::table('fluid_levels')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'EngineOilCondition' => $request->EngineOilCondition,
            'CoolantLevelCondition' => $request->CoolantLevelCondition,
            'BrakeFluidLevelCondition' => $request->BrakeFluidLevelCondition,
            'WindshieldWasherFluidCondition' => $request->WindshieldWasherFluidCondition,
            'PowerSteeringFluidLevelCondition' => $request->PowerSteeringFluidLevelCondition, 
            'EngineOilCondition_ActionRequired' => $request->EngineOilCondition_ActionRequired, 
            'CoolantLevelCondition_ActionRequired' => $request->CoolantLevelCondition_ActionRequired, 
            'BrakeFluidLevelCondition_ActionRequired' => $request->BrakeFluidLevelCondition_ActionRequired, 
            'WindshieldWasherFluidCondition_ActionRequired' => $request->WindshieldWasherFluidCondition_ActionRequired, 
            'PowerSteeringFluidLevelCondition_ActionRequired' => $request->PowerSteeringFluidLevelCondition_ActionRequired, 
        ]); 

        \DB::table('mechanical_inspection')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'EngineCondition' => $request->EngineCondition,
            'BrakeCondition' => $request->BrakeCondition,
            'BrakeEngagingCondition' => $request->BrakeEngagingCondition,
            'WiperBladesCondition' => $request->WiperBladesCondition,
            'BatteryCondition' => $request->BatteryCondition, 
            'EngineCondition_ActionRequired' => $request->EngineCondition_ActionRequired, 
            'BrakeCondition_ActionRequired' => $request->BrakeCondition_ActionRequired, 
            'BrakeEngagingCondition_ActionRequired' => $request->BrakeEngagingCondition_ActionRequired, 
            'WiperBladesCondition_ActionRequired' => $request->WiperBladesCondition_ActionRequired, 
            'BatteryCondition_ActionRequired' => $request->BatteryCondition_ActionRequired, 
        ]); 

        \DB::table('safety_equipment')->where('InspectionNumber', $request->InspectionNumber)
            ->update([
            'VehicleNumber' => $request->VehicleNumber, 
            'InspectionNumber' => $request->InspectionNumber, 
            'PresenceOfSpareTire' => $request->PresenceOfSpareTire,
            'PresenceOfFirstAidKit' => $request->PresenceOfFirstAidKit,
            'FunctionalityOfAllSafetyFeatures' => $request->FunctionalityOfAllSafetyFeatures,
            'EmergencyLightsCondition' => $request->EmergencyLightsCondition,
            'PresenceOfSpareTire_ActionRequired' => $request->PresenceOfSpareTire_ActionRequired, 
            'PresenceOfFirstAidKit_ActionRequired' => $request->PresenceOfFirstAidKit_ActionRequired, 
            'FunctionalityOfAllSafetyFeatures_ActionRequired' => $request->FunctionalityOfAllSafetyFeatures_ActionRequired, 
            'EmergencyLightsCondition_ActionRequired' => $request->EmergencyLightsCondition_ActionRequired, 
        ]); 

        return redirect()->route('Inspection_Report');
    }

    public function cars_inspection_delete($InspectionNumber) { 
        $Tables = ['inspection_report', 'exterior_inspection', 'interior_inspection', 'fluid_levels', 'mechanical_inspection', 'safety_equipment',];

        foreach ($Tables as $Table) {
            \DB::table($Table)->where('InspectionNumber', $InspectionNumber)->delete();
        } 

        return redirect()->route('Inspection_Report');
    }

    public function car_documents() {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $Cars = Car::whereNotNull('VehicleNumber')
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Odometer', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->paginate(14);
 
                        $Cars->withPath($_SERVER['REQUEST_URI']);

            return view('Documents.Cars.Documents', $Config)->with('Cars', $Cars);
        } 
        return view('Documents.Cars.Documents', $Config);
    }

    public function car_documents_update($VehicleNumber, Request $request) {
        if (
            $request->hasFile('RegistrationCertificate')  
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $VehicleNumber;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
    
            $RegistrationCertificateFile = $request->file('RegistrationCertificate');  
     
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber,
                'RegistrationCertificate' => $RegistrationCertificateFile->getClientOriginalName(),
                'RegistrationCertificateSize' => $RegistrationCertificateFile->getSize() / 1024, 
            ]);
    
            $RegistrationCertificateFile->move($DestinationPath, $RegistrationCertificateFile->getClientOriginalName()); 
        }
        
        if ( 
            $request->hasFile('DrivingLicence') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $VehicleNumber;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $DrivingLicenceFile = $request->file('DrivingLicence');   
     
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'DrivingLicence' => $DrivingLicenceFile->getClientOriginalName(),
                'DrivingLicenceSize' => $DrivingLicenceFile->getSize() / 1024, 
            ]);
     
            $DrivingLicenceFile->move($DestinationPath, $DrivingLicenceFile->getClientOriginalName());  
        }
        
        if ( 
            $request->hasFile('PUCCertificate')  
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $VehicleNumber;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $PUCCertificateFile = $request->file('PUCCertificate');  
     
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'PUCCertificate' => $PUCCertificateFile->getClientOriginalName(),
                'PUCCertificateSize' => $PUCCertificateFile->getSize() / 1024, 
            ]);
     
            $PUCCertificateFile->move($DestinationPath, $PUCCertificateFile->getClientOriginalName()); 
        }
        
        if ( 
            $request->hasFile('ProofOfOwnership') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $VehicleNumber;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $ProofOfOwnershipFile = $request->file('ProofOfOwnership');  
     
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'ProofOfOwnership' => $ProofOfOwnershipFile->getClientOriginalName(), 
                'ProofOfOwnershipSize' => $ProofOfOwnershipFile->getSize() / 1024, 
            ]);
     
            $ProofOfOwnershipFile->move($DestinationPath, $ProofOfOwnershipFile->getClientOriginalName()); 
        }
        
        if ( 
            $request->hasFile('CertificateOfRoadWorthiness') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $VehicleNumber;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $CertificateOfRoadWorthinessFile = $request->file('CertificateOfRoadWorthiness');  
     
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'CertificateOfRoadWorthiness' => $CertificateOfRoadWorthinessFile->getClientOriginalName(), 
                'CertificateOfRoadWorthinessSize' => $CertificateOfRoadWorthinessFile->getSize() / 1024, 
            ]);
     
            $CertificateOfRoadWorthinessFile->move($DestinationPath, $CertificateOfRoadWorthinessFile->getClientOriginalName());  
        }
        
        if ( 
            $request->hasFile('InsuranceCertificate') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $VehicleNumber;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $InsuranceCertificateFile = $request->file('InsuranceCertificate');  
     
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'InsuranceCertificate' => $InsuranceCertificateFile->getClientOriginalName(), 
                'InsuranceCertificateSize' => $InsuranceCertificateFile->getSize() / 1024,
            ]); 

            $InsuranceCertificateFile->move($DestinationPath, $InsuranceCertificateFile->getClientOriginalName());
        }
// ///////////////////////////////////
        if ($request->filled('DriverLicenseExpiryDate')) {
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'DriverLicenseExpiryDate' => $request->DriverLicenseExpiryDate, 
            ]); 
        }
        if ($request->filled('VehicleLicenseExpiryDate')) {
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'VehicleLicenseExpiryDate' => $request->VehicleLicenseExpiryDate, 
            ]); 
        }
        if ($request->filled('ProofOfOwnershipExpiryDate')) {
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'ProofOfOwnershipExpiryDate' => $request->ProofOfOwnershipExpiryDate, 
            ]); 
        }
        if ($request->filled('CertificateOfRoadWorthinessExpiryDate')) {
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber,  
                'CertificateOfRoadWorthinessExpiryDate' => $request->CertificateOfRoadWorthinessExpiryDate, 
            ]); 
        } 
        if ($request->filled('InsuranceCertificateExpiryDate')) {
            \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber)
            ->update([
                'VehicleNumber' => $VehicleNumber, 
                'InsuranceCertificateExpiryDate' => $request->InsuranceCertificateExpiryDate,
            ]); 
        }

        return back(); 
    }

    public function car_documents_delete($Car, $Document) {   
        \DB::table('car_documents')
            ->where('VehicleNumber', $Car)
            ->where('RegistrationCertificate', $Document) 
                ->update([ 
                    'RegistrationCertificate' => '', 
                    'RegistrationCertificateSize' => '0', 
                ]); 

        \DB::table('car_documents')
        ->where('VehicleNumber', $Car)
        ->where('DrivingLicence', $Document) 
            ->update([ 
                'DrivingLicence' => '', 
                'DrivingLicenceSize' => '0', 
            ]); 

        \DB::table('car_documents')
        ->where('VehicleNumber', $Car)
        ->where('PUCCertificate', $Document) 
            ->update([ 
                'PUCCertificate' => '', 
                'PUCCertificateSize' => '0', 
            ]); 

        \DB::table('car_documents')
        ->where('VehicleNumber', $Car)
        ->where('ProofOfOwnership', $Document) 
            ->update([ 
                'ProofOfOwnership' => '', 
                'ProofOfOwnershipSize' => '0', 
            ]); 

        \DB::table('car_documents')
        ->where('VehicleNumber', $Car)
        ->where('CertificateOfRoadWorthiness', $Document) 
            ->update([ 
                'CertificateOfRoadWorthiness' => '', 
                'CertificateOfRoadWorthinessSize' => '0', 
            ]); 

        \DB::table('car_documents')
        ->where('VehicleNumber', $Car)
        ->where('InsuranceCertificate', $Document) 
            ->update([ 
                'InsuranceCertificate' => '', 
                'InsuranceCertificateSize' => '0', 
            ]); 

        return back();
    }

    public function car_owners()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $CarOwners = Car::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Odometer', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->paginate(7);
 
                        $CarOwners->withPath($_SERVER['REQUEST_URI']);

            return view('CarOwners', $Config)->with('CarOwners', $CarOwners);
        } 

        return view('CarOwners', $Config);
    }

    public function drivers() {
        $Config = self::config();

        $Drivers = Car::select(['VehicleNumber', 'CarOwner', 'Model', 'Status', 'Driver'])
                        ->whereNotNull('Driver')
                        ->paginate(6);

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $Drivers = Car::whereNotNull('Driver')
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Odometer', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->paginate(7);
 
                        $Drivers->withPath($_SERVER['REQUEST_URI']);

            return view('Drivers', $Config)->with('Drivers', $Drivers);
        } 

        return view('Drivers', $Config)->with('Drivers', $Drivers);
    }

    public function my_records_activity()
    {
        $Config = self::config();
 
        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $Cars__MyRecords = Car::where('UserId', self::USER_ID())
                        ->where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Odometer', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->paginate(7);
 
                        $Cars__MyRecords->withPath($_SERVER['REQUEST_URI']);
 
            return view('Edit.EditMyRecords', $Config)->with('Cars__MyRecords', $Cars__MyRecords);
        }
        
        return view('Edit.EditMyRecords', $Config);
    }

    public function vehicle_report()
    {
        $Config = self::config();

        if (isset($_GET['Filter']) || isset($_GET['FilterValue'])) {
            $FilterValue = trim($_GET['FilterValue']); 
            $Cars = Car::where('VehicleNumber', 'LIKE', '%' . $FilterValue . '%') 
                        ->orWhere('Maker', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Model', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('SubModel', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('GearType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineType', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ChassisNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('ModelYear', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Odometer', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('EngineVolume', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Comments', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PurchaseDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Price', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Supplier', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CarOwner', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Driver', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CardNumber', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('MonthlyBudget', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('CompanyCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalDeposits', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('TotalRefueling', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Balance', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('PinCode', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('Status', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('StopDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('LicenceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('InsuranceExpiryDate', 'LIKE', '%' . $FilterValue . '%')
                        ->orWhere('FuelTankCapacity', 'LIKE', '%' . $FilterValue . '%')
                        ->orderBy('PurchaseDate', 'DESC') 
                        ->paginate(7);
 
                        $Cars->withPath($_SERVER['REQUEST_URI']);

            return view('VehicleReport', $Config)->with('Cars', $Cars);
        } 

        return view('VehicleReport', $Config);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store_car_properties(Request $request)
    { 
        if(!empty($request->CarProperties_Maker)) {
            \DB::table('makers')->insert([
                'Maker' => $request->CarProperties_Maker, 
            ]);
        } 
        if(!empty($request->CarProperties_EngineType)) {
            \DB::table('engine_types')->insert([
                'EngineType' => $request->CarProperties_EngineType, 
            ]);
        }
        if(!empty($request->CarProperties_GearType)) {
            \DB::table('gear_types')->insert([
                'GearType' => $request->CarProperties_GearType, 
            ]);
        }
        if(!empty($request->CarProperties_OrganisationCode)) {
            \DB::table('organisations')->insert([
                'CompanyCode' => $request->CarProperties_OrganisationCode, 
                'CompanyName' => $request->CarProperties_OrganisationName, 
            ]);
        } 

        return back();  
    }

    public function update_car_properties($Id, $Name, $DBTable, Request $request) {
        if($DBTable === 'makers') { 
            \DB::table('makers')
                    ->where('id', $Id) 
                    ->update([ 
                        'Maker' => $Name,  
                    ]); 
         }
        if($DBTable === 'engine_types') { 
            \DB::table('engine_types')
                    ->where('id', $Id) 
                    ->update([ 
                        'EngineType' => $Name,  
                    ]); 
         }
        if($DBTable === 'gear_types') { 
            \DB::table('gear_types')
                    ->where('id', $Id) 
                    ->update([ 
                        'GearType' => $Name,  
                    ]); 
         }
        if($DBTable === 'organisations') { 
            \DB::table('organisations')
                    ->where('id', $Id) 
                    ->update([ 
                        'CompanyCode' => $request->EditCarPropertiseModal_Code,  
                        'CompanyName' => $request->EditCarPropertiseModal_Name,  
                    ]); 
         }

        return back();
    }

    public function destroy_car_properties($Id, $DBTable) {  
        \DB::table($DBTable)->where('id', $Id)->delete();  
        
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($Car, Request $request)
    {   
        if (
            $request->hasFile('RegistrationCertificate')  
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $request->VehicleNumber_CAR;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
    
            $RegistrationCertificateFile = $request->file('RegistrationCertificate');  
     
            \DB::table('car_documents')->insert([
                'VehicleNumber' => $request->VehicleNumber_CAR,
                'RegistrationCertificate' => $RegistrationCertificateFile->getClientOriginalName(),
                'RegistrationCertificateSize' => $RegistrationCertificateFile->getSize() / 1024, 
            ]);
    
            $RegistrationCertificateFile->move($DestinationPath, $RegistrationCertificateFile->getClientOriginalName()); 
        }
        
        if ( 
            $request->hasFile('DrivingLicence') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $request->VehicleNumber_CAR;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $DrivingLicenceFile = $request->file('DrivingLicence');   
     
            \DB::table('car_documents')->insert([
                'VehicleNumber' => $request->VehicleNumber_CAR, 
                'DrivingLicence' => $DrivingLicenceFile->getClientOriginalName(),
                'DrivingLicenceSize' => $DrivingLicenceFile->getSize() / 1024, 
            ]);
     
            $DrivingLicenceFile->move($DestinationPath, $DrivingLicenceFile->getClientOriginalName());  
        }
        
        if ( 
            $request->hasFile('PUCCertificate')  
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $request->VehicleNumber_CAR;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $PUCCertificateFile = $request->file('PUCCertificate');  
     
            \DB::table('car_documents')->insert([
                'VehicleNumber' => $request->VehicleNumber_CAR, 
                'PUCCertificateSize' => $PUCCertificateFile->getSize() / 1024, 
            ]);
     
            $PUCCertificateFile->move($DestinationPath, $PUCCertificateFile->getClientOriginalName()); 
        }
        
        if ( 
            $request->hasFile('ProofOfOwnership') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $request->VehicleNumber_CAR;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $ProofOfOwnershipFile = $request->file('ProofOfOwnership');  
     
            \DB::table('car_documents')->insert([
                'VehicleNumber' => $request->VehicleNumber_CAR, 
                'ProofOfOwnership' => $ProofOfOwnershipFile->getClientOriginalName(), 
                'ProofOfOwnershipSize' => $ProofOfOwnershipFile->getSize() / 1024, 
            ]);
     
            $ProofOfOwnershipFile->move($DestinationPath, $ProofOfOwnershipFile->getClientOriginalName()); 
        }
        
        if ( 
            $request->hasFile('CertificateOfRoadWorthiness') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $request->VehicleNumber_CAR;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $CertificateOfRoadWorthinessFile = $request->file('CertificateOfRoadWorthiness');  
     
            \DB::table('car_documents')->insert([
                'VehicleNumber' => $request->VehicleNumber_CAR, 
                'CertificateOfRoadWorthiness' => $CertificateOfRoadWorthinessFile->getClientOriginalName(), 
                'CertificateOfRoadWorthinessSize' => $CertificateOfRoadWorthinessFile->getSize() / 1024, 
            ]);
     
            $CertificateOfRoadWorthinessFile->move($DestinationPath, $CertificateOfRoadWorthinessFile->getClientOriginalName());  
        }
        
        if ( 
            $request->hasFile('InsuranceCertificate') 
        ) {
            $DestinationPath = public_path().'/Documents/Cars/' . $request->VehicleNumber_CAR;
            File::makeDirectory($DestinationPath, $mode = 0777, true, true); 
     
            $InsuranceCertificateFile = $request->file('InsuranceCertificate');  
     
            \DB::table('car_documents')->insert([
                'VehicleNumber' => $request->VehicleNumber_CAR, 
                'InsuranceCertificate' => $InsuranceCertificateFile->getClientOriginalName(), 
                'InsuranceCertificateSize' => $InsuranceCertificateFile->getSize() / 1024,
            ]); 

            $InsuranceCertificateFile->move($DestinationPath, $InsuranceCertificateFile->getClientOriginalName());
        }
        
        Car::insert([
            'VehicleNumber' => $request->VehicleNumber_CAR,
            'Maker' => $request->Maker,
            'Model' => $request->Model,
            'SubModel' => $request->SubModel,
            'GearType' => $request->GearType,
            'EngineType' => $request->EngineType,
            'EngineNumber' => $request->EngineNumber,
            'ChassisNumber' => $request->ChassisNumber,
            'ModelYear' => $request->ModelYear,
            'Odometer' => $request->Odometer,
            'EngineVolume' => $request->EngineVolume,
            'Comments' => $request->Comments,
            'PurchaseDate' => $request->PurchaseDate,
            'Price' => $request->Price,
            'UserId' => request()->session()->get('Id'),
            'DateIn' => $request->DateIn,
            'TimeIn' => $request->TimeIn,
            'Supplier' => $request->Supplier,
            'CarOwner' => $request->CarOwner,
            'Driver' => $request->Driver,
            'CardNumber' => $request->CardNumber,
            'MonthlyBudget' => $request->MonthlyBudget,
            'CompanyCode' => $request->CompanyCode, 
            'Balance' => $request->Balance, 
            'PinCode' => $request->PinCode, 
            'Status' => $request->Status,
            'CardVendor' => $request->Vendor,
            'StopDate' => $request->StopDate,
            'LicenceExpiryDate' => $request->LicenceExpiryDate,
            'InsuranceExpiryDate' => $request->InsuranceExpiryDate,
            'FuelTankCapacity' => $request->FuelTankCapacity, 
        ]);
           
        \DB::table('car_documents')->insert([
            'VehicleNumber' => $request->VehicleNumber_CAR, 
        ]); 

        return back();  
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    { 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    { 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {      
        Car::where('id', $request->CarId)
            ->update([
                'VehicleNumber' => $request->VehicleNumber,
                'Maker' => $request->Maker,
                'Model' => $request->Model,
                'SubModel' => $request->SubModel,
                'GearType' => $request->GearType,
                'EngineType' => $request->EngineType,
                'EngineNumber' => $request->EngineNumber,
                'ChassisNumber' => $request->ChassisNumber,
                'ModelYear' => $request->ModelYear,
                'Odometer' => $request->Odometer,
                'EngineVolume' => $request->EngineVolume,
                'Comments' => $request->Comments,
                'PurchaseDate' => $request->PurchaseDate,
                'Price' => $request->Price, 
                'DateIn' => $request->DateIn,
                'TimeIn' => $request->TimeIn,
                'Supplier' => $request->Supplier,
                'CarOwner' => $request->CarOwner,
                'Driver' => $request->Driver,
                'CardNumber' => $request->CardNumber,
                'MonthlyBudget' => $request->MonthlyBudget,
                'CompanyCode' => $request->CompanyCode,
                'TotalDeposits' => $request->Deposits,
                'TotalRefueling' => $request->Refueling,
                'Balance' => $request->Balance,
                'PinCode' => $request->PinCode, 
                'Status' => $request->Status,
                'CardVendor' => $request->Vendor,
                'StopDate' => $request->StopDate,
                'LicenceExpiryDate' => $request->LicenceExpiryDate,
                'InsuranceExpiryDate' => $request->InsuranceExpiryDate,
                'FuelTankCapacity' => $request->FuelTankCapacity, 
            ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Car, Car $car)
    {
        $VehicleNumber = Car::where('id', $Car)->first();

        Car::where('id', $Car)->delete();
        \DB::table('maintenances')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('refuelings')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('inspection_report')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('car_documents')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('deposits')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('exterior_inspection')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('interior_inspection')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('fluid_levels')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('mechanical_inspection')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete();
        \DB::table('safety_equipment')->where('VehicleNumber', $VehicleNumber->VehicleNumber)->delete(); 

        return back();
    }
}
