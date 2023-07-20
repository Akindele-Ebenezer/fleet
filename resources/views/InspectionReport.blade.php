@extends('Layouts.Layout2')

@section('Title', 'INSPECTION REPORT') 
@section('Heading', 'INSPECTION REPORT') 
@section('Button_1', '+ Add Inspection') 
@section('Button_1_Link', 'daily-checklist-route') 

@section('Components')
    @include('Components.EditVehicleInspectionReportComponent')
@endsection

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">S/N</th>
                <th onclick="sortTable(1)" class="text-align-center">Inspection Number</th>
                <th onclick="sortTable(2)">Vehicle Plate #</th>
                <th onclick="sortTable(3)">Date Inspected</th>
                <th onclick="sortTable(4)">Driver</th>
                <th onclick="sortTable(5)" class="text-align-center">Status</th> 
                <th onclick="sortTable(6)">Weeks</th>
            </tr> 
            @unless (count($InspectionReport) > 0)
            <tr>
                <td>No vehicle inspections (report).</td>
            </tr>    
            @endunless 
            @foreach ($InspectionReport as $Report)
            @php
                $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Report->VehicleNumber)->first();  
            @endphp 
            <tr>
                <td>{{ $Report->id }}</td>
                <td class="inspection-number underline show-record-x-2">
                    <span class="{{ $CarStatus->Status ?? 'INACTIVE' === 'ACTIVE' ? 'active-x' : 'inactive-x' }}"></span>
                    {{ $Report->InspectionNumber }} 
                    <img src="{{ asset('Images/service.png') }}" alt="">
                </td>
                <td class="Hide">{{ $Report->VehicleNumber }}</td>
                <td class="Hide">{{ $Report->InspectionNumber }}</td>
                <td class="Hide">{{ $Report->Mileage }}</td> 
                <td class="Hide">{{ $Report->DateInspected }}</td>
                <td class="Hide">{{ $Report->InspectedBy }}</td>
                {{-- EXTERIOR INSPECTION --}}
                @php
                    $ExteriorInspection = \DB::table('exterior_inspection')
                                                        ->where('InspectionNumber', $Report->InspectionNumber)
                                                        ->first(); 
                @endphp
                <td class="Hide">{{ $ExteriorInspection->BodyDamages }}</td> 
                <td class="Hide">{{ $ExteriorInspection->TireCondition }}</td> 
                <td class="Hide">{{ $ExteriorInspection->WindshieldCondition }}</td> 
                <td class="Hide">{{ $ExteriorInspection->LightsCondition }}</td> 
                <td class="Hide">{{ $ExteriorInspection->MirrorCondition }}</td> 
                <td class="Hide">{{ $ExteriorInspection->BodyDamages_ActionRequired }}</td> 
                <td class="Hide">{{ $ExteriorInspection->TireCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $ExteriorInspection->WindshieldCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $ExteriorInspection->LightsCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $ExteriorInspection->MirrorCondition_ActionRequired }}</td> 
                {{-- INTERIOR INSPECTION --}}
                @php
                    $InteriorInspection = \DB::table('interior_inspection')
                                                        ->where('InspectionNumber', $Report->InspectionNumber)
                                                        ->first(); 
                @endphp
                <td class="Hide">{{ $InteriorInspection->SeatBeltsCondition }}</td> 
                <td class="Hide">{{ $InteriorInspection->SeatsCondition }}</td> 
                <td class="Hide">{{ $InteriorInspection->HornCondition }}</td> 
                <td class="Hide">{{ $InteriorInspection->AllControlsCondition }}</td> 
                <td class="Hide">{{ $InteriorInspection->MirrorVisibility }}</td> 
                <td class="Hide">{{ $InteriorInspection->SeatBeltsCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $InteriorInspection->SeatsCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $InteriorInspection->HornCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $InteriorInspection->AllControlsCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $InteriorInspection->MirrorVisibility_ActionRequired }}</td> 
                {{-- FLUIDS LEVELS --}}
                @php
                    $FluidLevel = \DB::table('fluid_levels')
                                                        ->where('InspectionNumber', $Report->InspectionNumber)
                                                        ->first(); 
                @endphp
                <td class="Hide">{{ $FluidLevel->EngineOilCondition }}</td> 
                <td class="Hide">{{ $FluidLevel->CoolantLevelCondition }}</td> 
                <td class="Hide">{{ $FluidLevel->BrakeFluidLevelCondition }}</td> 
                <td class="Hide">{{ $FluidLevel->WindshieldWasherFluidCondition }}</td> 
                <td class="Hide">{{ $FluidLevel->PowerSteeringFluidLevelCondition }}</td> 
                <td class="Hide">{{ $FluidLevel->EngineOilCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $FluidLevel->CoolantLevelCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $FluidLevel->BrakeFluidLevelCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $FluidLevel->WindshieldWasherFluidCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $FluidLevel->PowerSteeringFluidLevelCondition_ActionRequired }}</td> 
                {{-- MECHANICAL INSPECTION --}}
                @php
                    $MechanicalInspection = \DB::table('mechanical_inspection')
                                                        ->where('InspectionNumber', $Report->InspectionNumber)
                                                        ->first(); 
                @endphp
                <td class="Hide">{{ $MechanicalInspection->EngineCondition }}</td> 
                <td class="Hide">{{ $MechanicalInspection->BrakeCondition }}</td> 
                <td class="Hide">{{ $MechanicalInspection->BrakeEngagingCondition }}</td> 
                <td class="Hide">{{ $MechanicalInspection->WiperBladesCondition }}</td> 
                <td class="Hide">{{ $MechanicalInspection->BatteryCondition }}</td> 
                <td class="Hide">{{ $MechanicalInspection->EngineCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $MechanicalInspection->BrakeCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $MechanicalInspection->BrakeEngagingCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $MechanicalInspection->WiperBladesCondition_ActionRequired }}</td> 
                <td class="Hide">{{ $MechanicalInspection->BatteryCondition_ActionRequired }}</td> 
                {{-- SAFETY EQUIPMENT --}}
                @php
                    $SafetyEquipment = \DB::table('safety_equipment')
                                                        ->where('InspectionNumber', $Report->InspectionNumber)
                                                        ->first(); 
                @endphp
                <td class="Hide">{{ $SafetyEquipment->PresenceOfSpareTire }}</td> 
                <td class="Hide">{{ $SafetyEquipment->PresenceOfFirstAidKit }}</td> 
                <td class="Hide">{{ $SafetyEquipment->FunctionalityOfAllSafetyFeatures }}</td> 
                <td class="Hide">{{ $SafetyEquipment->EmergencyLightsCondition }}</td> 
                <td class="Hide">{{ $SafetyEquipment->PresenceOfSpareTire_ActionRequired }}</td> 
                <td class="Hide">{{ $SafetyEquipment->PresenceOfFirstAidKit_ActionRequired }}</td> 
                <td class="Hide">{{ $SafetyEquipment->FunctionalityOfAllSafetyFeatures_ActionRequired }}</td> 
                <td class="Hide">{{ $SafetyEquipment->EmergencyLightsCondition_ActionRequired }}</td> 
                {{-- OTHERS --}}
                <td class="Hide">{{ $Report->AdditionalNotes }}</td> 
                <td class="Hide">{{ $Report->Attachment }}</td> 
                <td class="Hide">{{ $Report->Status }}</td> 
                <td class="Hide">{{ $Report->Mechanic }}</td> 
                <td class=" ">
                    {{ $Report->VehicleNumber }}
                </td>
                <td>{{ $Report->DateInspected }}</td>
                <td>{{ $Report->InspectedBy }}</td>
                <td>
                    <center>
                        <span class="
                                    {{ $Report->Status === 'GOOD' ? 'active-x' : '' }}
                                    {{ $Report->Status === 'BAD' ? 'inactive-x' : '' }}
                                    {{ $Report->Status === 'FAIR' ? 'fair-x' : '' }}
                        ">
                            {{ $Report->Status }}
                        </span>
                    </center>
                </td>
                <td>{{ $Report->Week }}</td>
            </tr>
            @endforeach 
        </table>
        {{-- {{ $Maintenance->onEachSide(5)->links() }}   --}}
@endsection
@section('JS')
<script src="{{ asset('Js/Edit/VehicleInspectionReport.js') }}"></script>
@endsection 