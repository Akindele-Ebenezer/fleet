@extends('Layouts.Layout2')

@section('Title', 'VEHICLE DAILY CHECKLIST') 
@section('Heading', 'VEHICLE DAILY CHECKLIST') 
@section('Button_1_Link', 'cars-route') 
@section('Button_1', 'Explore Cars') 

@section('Content')
    <div class="daily-checklist">
        <form action="{{ route('Add_Inspection_Report') }}"> 
            <div class="daily-checklist-inner">
                <h1>Daily Vehicle Inspection Form</h1>
                <div class="inner-wrapper-1">  
                    <div class="checklist">
                        <label>Vehicle Plate #:</label> <br>
                        <input type="text" name="VehicleNumber">
                    </div>
                    <div class="checklist">
                        <label>Fleet (Inspection Number) #:</label> <br>
                        <input type="text" name="InspectionNumber">
                    </div>
                    <div class="checklist">
                        <label>Mileage:</label> <br>
                        <input type="text" name="Mileage">
                    </div>
                </div>
                <div class="inner-wrapper-1">
                    <div class="checklist">
                        <label>Date Inspected:</label> <br>
                        <input type="date" name="DateInspected">
                    </div>
                    <div class="checklist">
                        <label>Vehicle Make:</label> <br>
                        <input type="text" name="VehicleMake">
                    </div>
                    <div class="checklist">
                        <label>Vehicle Model:</label> <br>
                        <input type="text" name="VehicleModel">
                    </div>
                    <div class="checklist">
                        <label>Driver:</label> <br>
                        <input type="text" name="Driver">
                    </div>
                    <div class="checklist">
                        <label>Inspected By:</label> <br>
                        <input type="text" name="InspectedBy">
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
                            <input type="radio" name="BodyDamages"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BodyDamages"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BodyDamages"> 
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
                            <input type="radio" name="TireCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="TireCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="TireCondition"> 
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
                            <input type="radio" name="WindshieldCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldCondition"> 
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
                            <input type="radio" name="LightsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="LightsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="LightsCondition"> 
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
                            <input type="radio" name="MirrorCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorCondition"> 
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
                            <input type="radio" name="SeatBeltsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatBeltsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatBeltsCondition"> 
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
                            <input type="radio" name="SeatsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="SeatsCondition"> 
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
                            <input type="radio" name="HornCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="HornCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="HornCondition"> 
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
                            <input type="radio" name="AllControlsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="AllControlsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="AllControlsCondition"> 
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
                            <input type="radio" name="MirrorVisibility"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorVisibility"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="MirrorVisibility"> 
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
                            <input type="radio" name="EngineOilCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineOilCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineOilCondition"> 
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
                            <input type="radio" name="CoolantLevelCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="CoolantLevelCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="CoolantLevelCondition"> 
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
                            <input type="radio" name="BrakeFluidLevelCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeFluidLevelCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeFluidLevelCondition"> 
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
                            <input type="radio" name="WindshieldWasherFluidCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldWasherFluidCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WindshieldWasherFluidCondition"> 
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
                            <input type="radio" name="PowerSteeringFluidLevelCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PowerSteeringFluidLevelCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PowerSteeringFluidLevelCondition"> 
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
                            <input type="radio" name="EngineCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EngineCondition"> 
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
                            <input type="radio" name="BrakeCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeCondition"> 
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
                            <input type="radio" name="BrakeEngagingCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeEngagingCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BrakeEngagingCondition"> 
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
                            <input type="radio" name="WiperBladesCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WiperBladesCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="WiperBladesCondition"> 
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
                            <input type="radio" name="BatteryCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BatteryCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="BatteryCondition"> 
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
                            <input type="radio" name="PresenceOfSpareTire"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfSpareTire"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfSpareTire"> 
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
                            <input type="radio" name="PresenceOfFirstAidKit"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfFirstAidKit"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="PresenceOfFirstAidKit"> 
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
                            <input type="radio" name="FunctionalityOfAllSafetyFeatures"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="FunctionalityOfAllSafetyFeatures"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="FunctionalityOfAllSafetyFeatures"> 
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
                            <input type="radio" name="EmergencyLightsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EmergencyLightsCondition"> 
                        </div>
                        <div class="item-checklist-inner">
                            <input type="radio" name="EmergencyLightsCondition"> 
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
                    <input type="text" name="Status" placeholder="Vehicle Safety...">
                </div>
                <h1 class="h1-x">Assigned Mechanic/Agent</h1>
                <div class="div">
                    <h2>Mechanic or agent that is assigned to address individual defects in this vehicle</h2> <br>
                    <input type="text" name="Mechanic" placeholder="Agent Name...">
                </div>
            </div>
            <input type="hidden" value="{{ date('h:i a') }}" name="SubmitTime">
            <button>Submit</button>
        </form>
    </div>
@endsection