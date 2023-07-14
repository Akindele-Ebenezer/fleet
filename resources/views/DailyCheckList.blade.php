@extends('Layouts.Layout2')

@section('Title', 'VEHICLE DAILY CHECKLIST') 
@section('Heading', 'VEHICLE DAILY CHECKLIST') 
@section('Button_1_Link', 'cars-route') 
@section('Button_1', 'Explore Cars') 

@section('Content')
@php 
    date_default_timezone_set('Africa/Lagos');
    $Cars_Absolute = \App\Models\Car::whereNotNull('VehicleNumber')->get();
    $Drivers = \App\Models\Car::select('Driver')->get();
@endphp
    <div class="daily-checklist">
        <form action="{{ route('Add_Inspection_Report') }}" method="POST" enctype="multipart/form-data">@csrf 
            <div class="daily-checklist-inner">
                <h1>Daily Vehicle Inspection Form</h1>
                <div class="inner-wrapper-1"> 
                    <div class="checklist readonly">
                        <label>Fleet (Inspection Number) #:</label> <br>
                        <input type="number" name="InspectionNumber" value="{{ date('Ymd') . date('his') }}">
                    </div> 
                    <div class="checklist">
                        <label>Vehicle Plate #:</label> <br>
                        <input type="text" name="VehicleNumber" autocomplete="off" class="datalist-input">
                        @include('Components.Datalist.VehicleListComponent')
                    </div>
                    <div class="checklist">
                        <label>Mileage:</label> <br>
                        <input type="number" name="Mileage" autocomplete="off">
                    </div>
                    <div class="checklist">
                        <label>Date Inspected:</label> <br>
                        <input type="date" name="DateInspected" value="{{ date('Y-m-d') }}">
                    </div>
                </div>
                <div class="inner-wrapper-1"> 
                    <div class="checklist">
                        <label>Inspected By:</label> <br>
                        <input list="Drivers" type="text" name="InspectedBy" autocomplete="off" class="datalist-input">
                        @include('Components.Datalist.DriverListComponent')
                    </div> 
                </div>
                <h1>Item Checklist</h1>
                <div class="inspection-x inspection-1">
                    <h2>Exterior Inspection</h2>
                    <div class="item-checklist heading">
                        <div class="item-checklist-inner heading"> 
                        </div>
                        <div class="item-checklist-inner heading">
                            &#10007; 
                        </div>
                        <div class="item-checklist-inner heading">
                            &#10004; 
                        </div>
                        <div class="item-checklist-inner heading">
                            N/A 
                        </div>
                        <div class="item-checklist-inner heading">
                            Action Required 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check for any damages or scratches on the body 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BodyDamages" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BodyDamages" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BodyDamages" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="BodyDamages_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Inspect the tires for wear and tear and ensure they are properly inflated 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="TireCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="TireCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="TireCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="TireCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check the windshield and windows for any cracks or chips 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="WindshieldCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Verify that all lights (headlights, taillights, indicators) are functioning correctly 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="LightsCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="LightsCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="LightsCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="LightsCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist last">
                        <div class="item-checklist-inner">
                            Ensure that mirrors are clean and properly adjusted 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="MirrorCondition_ActionRequired"> 
                        </div>
                    </div>
                    <h2>Interior Inspection</h2>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check the seat belts for proper functionality and adjust them if necessary 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatBeltsCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatBeltsCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatBeltsCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="SeatBeltsCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Inspect the condition of the seats, dashboard, and floor mats
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatsCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatsCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatsCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="SeatsCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Test the horn to ensure it is working 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="HornCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="HornCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="HornCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="HornCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Verify that all controls (AC, heating, audio, etc.) are functioning correctly 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="AllControlsCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="AllControlsCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="AllControlsCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="AllControlsCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist last">
                        <div class="item-checklist-inner">
                            Check the visibilty by cleaning the windshield and mirrors 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorVisibility" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorVisibility" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorVisibility" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="MirrorVisibility_ActionRequired"> 
                        </div>
                    </div>
                    <h2>Fluid Levels</h2>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check the engine oil level and add more if needed 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineOilCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineOilCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineOilCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="EngineOilCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Verify the coolant level and top up if necessary
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="CoolantLevelCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="CoolantLevelCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="CoolantLevelCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="CoolantLevelCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check the brake fluid level and add more if required 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeFluidLevelCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeFluidLevelCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeFluidLevelCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="BrakeFluidLevelCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Ensure the windshield washer fluid is filled 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldWasherFluidCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldWasherFluidCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldWasherFluidCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="WindshieldWasherFluidCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist last">
                        <div class="item-checklist-inner">
                            Check the power steering fluid level and add more if needed 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PowerSteeringFluidLevelCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PowerSteeringFluidLevelCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PowerSteeringFluidLevelCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="PowerSteeringFluidLevelCondition_ActionRequired"> 
                        </div>
                    </div>
                    <h2>Mechanical Inspection</h2>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Start the engine and listen for any unusual noises or vibrations 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="EngineCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check the functionality of the brakes, accelerator, and clutch (if applicable)
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="BrakeCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Test the parking brake and ensure it engages and disengages properly 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeEngagingCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeEngagingCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeEngagingCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="BrakeEngagingCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Inspect the wiper blades for any signs of wear and replace if necessary 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WiperBladesCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WiperBladesCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WiperBladesCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="WiperBladesCondition_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist last">
                        <div class="item-checklist-inner">
                            Check the battery condition and terminals for corrosion 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BatteryCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BatteryCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BatteryCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="BatteryCondition_ActionRequired"> 
                        </div>
                    </div>
                    <h2>Safety Equipment</h2>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Ensure that a spare tire, jack, and lug wrench are present in the vehicle 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfSpareTire" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfSpareTire" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfSpareTire" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="PresenceOfSpareTire_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Verify the presence of a first aid kit and a fire extinguisher
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfFirstAidKit" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfFirstAidKit" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfFirstAidKit" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="PresenceOfFirstAidKit_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist">
                        <div class="item-checklist-inner">
                            Check the functioning of all safety features, such as airbags and seatbelt pretensioners 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="FunctionalityOfAllSafetyFeatures" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="FunctionalityOfAllSafetyFeatures" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="FunctionalityOfAllSafetyFeatures" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="FunctionalityOfAllSafetyFeatures_ActionRequired"> 
                        </div>
                    </div>
                    <div class="item-checklist last">
                        <div class="item-checklist-inner">
                            Test the operation of the emergency lights and warning triangle (if available)
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EmergencyLightsCondition" value="BAD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EmergencyLightsCondition" value="GOOD"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EmergencyLightsCondition" value="NO_ANSWER"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="text" name="EmergencyLightsCondition_ActionRequired"> 
                        </div>
                    </div> 
                </div>
                <h1>Remarks</h1>
                <div class="additional-notes">
                    <h2>Additional Notes</h2>
                    <textarea name="AdditionalNotes" placeholder="Type here..."></textarea>
                </div>
                <h1>Attachments</h1>
                <div class="attachment">
                    <h2>Indicate if damage or any other fault is noted</h2>
                    <input type="file" name="Attachment">
                </div>
                <h1 class="h1-x">Status</h1>
                <div class="div">
                    <h2>Indicate if the vehicle is Safe or Unsafe to drive</h2> <br> 
                    <select name="Status"> 
                        <option value="GOOD">GOOD</option>
                        <option value="FAIR">FAIR</option>
                        <option value="BAD">BAD</option> 
                </select>
                </div>
                <h1 class="h1-x">Assigned Mechanic/Agent</h1>
                <div class="div">
                    <h2>Mechanic or agent that is assigned to address individual defects in this vehicle</h2> <br>
                    <input type="text" name="Mechanic" placeholder="Agent Name...">
                </div>
            </div>
            <input type="hidden" value="{{ date('W') }}" name="Week">
            <input type="hidden" value="{{ date('h:i a') }}" name="SubmitTime">
            <button>Submit</button>
        </form>
    </div>
@endsection
