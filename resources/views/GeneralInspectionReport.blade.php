@extends('Layouts.Layout2')

@section('Title', 'INSPECTION REPORT') 
@section('Heading', 'INSPECTION REPORT') 
@section('Button_1', '+ Add Inspection') 
@section('Button_1_Link', 'daily-checklist-route') 
@section('Button_2_Link', 'daily-vehicle-inspection-form') 
@section('Button_2', '+ Inspection Form') 

@section('Components')
    @include('Components.EditVehicleInspectionReportComponent')
@endsection

@section('Content')
    <div class="table-wrapper"> 
        <table class="table" id="Table">
            <tr class="table-head"> 
                <th onclick="sortTable(0)">#</th>
                <th onclick="sortTable(1)" class="text-align-center">Inspection Number</th>
                <th onclick="sortTable(2)">Vehicle Plate #</th>
                <th onclick="sortTable(3)">Date Inspected</th>
                <th onclick="sortTable(4)">Driver</th>
                <th onclick="sortTable(5)" class="text-align-center">Status</th> 
                <th onclick="sortTable(6)">Weeks</th>
            </tr> 
            @unless (count($General_Inspection_Report) > 0)
            <tr>
                <td>No vehicle inspections (report).</td>
            </tr>    
            @endunless 
            @foreach ($General_Inspection_Report as $Report)
            <tr class="HistoryTableRow"> 
                @switch($Report->DateInspected)
                    @case(date('Y-m-d'))
                        @php
                            $NumberOfRecords_Today = \DB::table('inspection_report')->select('id')->where('DateInspected', date('Y-m-d'))->count();
                        @endphp
                        <td class="Today Hide HistoryTitle">{{ number_format($NumberOfRecords_Today) ?? 0 }} :: Today</td>
                        @break 
                    @case($Report->DateInspected >= date('Y-m-d', strtotime("this week")))
                        @php
                            $NumberOfRecords_ThisWeek = \DB::table('inspection_report')->select('id')->where('DateInspected', '>=', date('Y-m-d', strtotime("this week")))->count();
                        @endphp
                        <td class="ThisWeek Hide HistoryTitle">{{ number_format($NumberOfRecords_ThisWeek) ?? 0 }} :: This week</td>
                        @break 
                    @case(($Report->DateInspected >= date('Y-m-d', strtotime("last week")))) 
                        @php
                            $NumberOfRecords_LastWeek = \DB::table('inspection_report')->select('id')->where('DateInspected', '>=', date('Y-m-d', strtotime("last week")))->where('DateInspected', '<', date('Y-m-d', strtotime("this week")))->count();
                        @endphp
                        <td class="OneWeekAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_LastWeek) ?? 0 }} :: Last week</td>
                        @break
                    @case(($Report->DateInspected >= date('Y-m-d', strtotime("-2 weeks"))))
                        @php
                            $NumberOfRecords_TwoWeeksAgo = \DB::table('inspection_report')->select('id')->where('DateInspected', '>=', date('Y-m-d', strtotime("-2 weeks")))->where('DateInspected', '<', date('Y-m-d', strtotime("last week")))->count();
                        @endphp
                        <td class="TwoWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoWeeksAgo) ?? 0 }} :: Two weeks ago</td>
                        @break
                    @case(($Report->DateInspected >= date('Y-m-d', strtotime("-3 weeks"))))
                        @php
                            $NumberOfRecords_ThreeWeeksAgo = \DB::table('inspection_report')->select('id')->where('DateInspected', '>=', date('Y-m-d', strtotime("-3 weeks")))->where('DateInspected', '<', date('Y-m-d', strtotime("-2 weeks")))->count();
                        @endphp
                        <td class="ThreeWeeksAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_ThreeWeeksAgo) ?? 0 }} :: Three weeks ago</td>
                        @break
                    @case(($Report->DateInspected >= date('Y-m-d', strtotime("-1 month"))))
                        @php
                            $NumberOfRecords_OneMonthAgo = \DB::table('inspection_report')->select('id')->where('DateInspected', '>=', date('Y-m-d', strtotime("-1 month")))->where('DateInspected', '<', date('Y-m-d', strtotime("-3 weeks")))->count();
                        @endphp
                        <td class="OneMonthAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_OneMonthAgo) ?? 0 }} :: Last month</td>
                        @break
                    @case(($Report->DateInspected >= date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_TwoMonthsAgo = \DB::table('inspection_report')->select('id')->where('DateInspected', '>=', date('Y-m-d', strtotime("-2 month")))->where('DateInspected', '<', date('Y-m-d', strtotime("-1 month")))->count();
                        @endphp
                        <td class="TwoMonthsAgo Hide HistoryTitle">{{ number_format($NumberOfRecords_TwoMonthsAgo) ?? 0 }} :: Two months ago</td>
                        @break
                    @case(($Report->DateInspected < date('Y-m-d', strtotime("-2 month"))))
                        @php
                            $NumberOfRecords_Older = \DB::table('inspection_report')->select('id')->where('DateInspected', '<', date('Y-m-d', strtotime("-2 month")))->count();
                        @endphp
                        <td class="Older Hide HistoryTitle">{{ number_format($NumberOfRecords_Older) ?? 0 }} :: Older</td>
                        @break
                    @default 
                @endswitch 
            </tr>
            @php
                $CarStatus = \App\Models\Car::select('Status')->where('VehicleNumber', $Report->VehicleNumber)->first();  
            @endphp 
            <tr>
                <td class="pdf">
                    <img src="{{ asset('Images/pdf.png') }}" class="pdf-x">
                    <span class="Hide">{{ $Report->InspectionNumber }}</span>
                </td>
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
                <td class="make-x underline">
                    {{ $Report->VehicleNumber }}
                </td>
                <td>{{ $Report->DateInspected }}</td>
                <td class="drivers-x underline">{{ $Report->InspectedBy }}</td>
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
        {{ $General_Inspection_Report->onEachSide(5)->links() }}  
@endsection
@section('JS')
<script src="{{ asset('Js/Edit/VehicleInspectionReport.js') }}"></script>
@endsection 