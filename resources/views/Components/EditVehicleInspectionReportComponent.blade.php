<div class="daily-checklist edit form">
    <form class="EditVehicleDailyChecklist"> @csrf
        <div class="cancel-modal">✖</div>
        <div class="daily-checklist-inner">
            <h1>Edit Daily Vehicle Inspection Report</h1>
            <div class="inner-wrapper-1">  
                <div class="checklist readonly">
                    <label>Vehicle Plate #:</label> <br>
                    <input type="text" name="VehicleNumber" class="VehicleNumber">
                </div>
                <div class="checklist readonly">
                    <label>Fleet (Inspection Number) #:</label> <br>
                    <input type="text" name="InspectionNumber" class="InspectionNumber">
                </div>
                <div class="checklist">
                    <label>Mileage:</label> <br>
                    <input type="text" name="Mileage" class="Mileage">
                </div>
                <div class="checklist">
                    <label>Date Inspected:</label> <br>
                    <input type="date" name="DateInspected" class="DateInspected">
                </div>
            </div>
            <div class="inner-wrapper-1"> 
                <div class="checklist">
                    <label>Inspected By:</label> <br>
                    <input type="text" name="InspectedBy" class="InspectedBy">
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
                        <input type="radio" name="BodyDamages" class="BodyDamages" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BodyDamages" class="BodyDamages" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BodyDamages" class="BodyDamages" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="BodyDamages_ActionRequired" class="BodyDamages_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Inspect the tires for wear and tear and ensure they are properly inflated 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="TireCondition" class="TireCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="TireCondition" class="TireCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="TireCondition" class="TireCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="TireCondition_ActionRequired" class="TireCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Check the windshield and windows for any cracks or chips 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WindshieldCondition" class="WindshieldCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WindshieldCondition" class="WindshieldCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WindshieldCondition" class="WindshieldCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="WindshieldCondition_ActionRequired" class="WindshieldCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Verify that all lights (headlights, taillights, indicators) are functioning correctly 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="LightsCondition" class="LightsCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="LightsCondition" class="LightsCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="LightsCondition" class="LightsCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="LightsCondition_ActionRequired" class="LightsCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist last">
                    <div class="item-checklist-inner">
                        Ensure that mirrors are clean and properly adjusted 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="MirrorCondition" class="MirrorCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="MirrorCondition" class="MirrorCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="MirrorCondition" class="MirrorCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="MirrorCondition_ActionRequired" class="MirrorCondition_ActionRequired"> 
                    </div>
                </div>
                <h2>Interior Inspection</h2>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Check the seat belts for proper functionality and adjust them if necessary 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="SeatBeltsCondition" class="SeatBeltsCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="SeatBeltsCondition" class="SeatBeltsCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="SeatBeltsCondition" class="SeatBeltsCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="SeatBeltsCondition_ActionRequired" class="SeatBeltsCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Inspect the condition of the seats, dashboard, and floor mats
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="SeatsCondition" class="SeatsCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="SeatsCondition" class="SeatsCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="SeatsCondition" class="SeatsCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="SeatsCondition_ActionRequired" class="SeatsCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Test the horn to ensure it is working 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="HornCondition" class="HornCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="HornCondition" class="HornCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="HornCondition" class="HornCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="HornCondition_ActionRequired" class="HornCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Verify that all controls (AC, heating, audio, etc.) are functioning correctly 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="AllControlsCondition" class="AllControlsCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="AllControlsCondition" class="AllControlsCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="AllControlsCondition" class="AllControlsCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="AllControlsCondition_ActionRequired" class="AllControlsCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist last">
                    <div class="item-checklist-inner">
                        Check the visibilty by cleaning the windshield and mirrors 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="MirrorVisibility" class="MirrorVisibility" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="MirrorVisibility" class="MirrorVisibility" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="MirrorVisibility" class="MirrorVisibility" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="MirrorVisibility_ActionRequired" class="MirrorVisibility_ActionRequired"> 
                    </div>
                </div>
                <h2>Fluid Levels</h2>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Check the engine oil level and add more if needed 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EngineOilCondition" class="EngineOilCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EngineOilCondition" class="EngineOilCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EngineOilCondition" class="EngineOilCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="EngineOilCondition_ActionRequired" class="EngineOilCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Verify the coolant level and top up if necessary
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="CoolantLevelCondition" class="CoolantLevelCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="CoolantLevelCondition" class="CoolantLevelCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="CoolantLevelCondition" class="CoolantLevelCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="CoolantLevelCondition_ActionRequired" class="CoolantLevelCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Check the brake fluid level and add more if required 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeFluidLevelCondition" class="BrakeFluidLevelCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeFluidLevelCondition" class="BrakeFluidLevelCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeFluidLevelCondition" class="BrakeFluidLevelCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="BrakeFluidLevelCondition_ActionRequired" class="BrakeFluidLevelCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Ensure the windshield washer fluid is filled 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WindshieldWasherFluidCondition" class="WindshieldWasherFluidCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WindshieldWasherFluidCondition" class="WindshieldWasherFluidCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WindshieldWasherFluidCondition" class="WindshieldWasherFluidCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="WindshieldWasherFluidCondition_ActionRequired" class="WindshieldWasherFluidCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist last">
                    <div class="item-checklist-inner">
                        Check the power steering fluid level and add more if needed 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PowerSteeringFluidLevelCondition" class="PowerSteeringFluidLevelCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PowerSteeringFluidLevelCondition" class="PowerSteeringFluidLevelCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PowerSteeringFluidLevelCondition" class="PowerSteeringFluidLevelCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="PowerSteeringFluidLevelCondition_ActionRequired" class="PowerSteeringFluidLevelCondition_ActionRequired"> 
                    </div>
                </div>
                <h2>Mechanical Inspection</h2>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Start the engine and listen for any unusual noises or vibrations 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EngineCondition" class="EngineCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EngineCondition" class="EngineCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EngineCondition" class="EngineCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="EngineCondition_ActionRequired" class="EngineCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Check the functionality of the brakes, accelerator, and clutch (if applicable)
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeCondition" class="BrakeCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeCondition" class="BrakeCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeCondition" class="BrakeCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="BrakeCondition_ActionRequired" class="BrakeCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Test the parking brake and ensure it engages and disengages properly 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeEngagingCondition" class="BrakeEngagingCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeEngagingCondition" class="BrakeEngagingCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BrakeEngagingCondition" class="BrakeEngagingCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="BrakeEngagingCondition_ActionRequired" class="BrakeEngagingCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Inspect the wiper blades for any signs of wear and replace if necessary 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WiperBladesCondition" class="WiperBladesCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WiperBladesCondition" class="WiperBladesCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="WiperBladesCondition" class="WiperBladesCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="WiperBladesCondition_ActionRequired" class="WiperBladesCondition_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist last">
                    <div class="item-checklist-inner">
                        Check the battery condition and terminals for corrosion 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BatteryCondition" class="BatteryCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BatteryCondition" class="BatteryCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="BatteryCondition" class="BatteryCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="BatteryCondition_ActionRequired" class="BatteryCondition_ActionRequired"> 
                    </div>
                </div>
                <h2>Safety Equipment</h2>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Ensure that a spare tire, jack, and lug wrench are present in the vehicle 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PresenceOfSpareTire" class="PresenceOfSpareTire" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PresenceOfSpareTire" class="PresenceOfSpareTire" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PresenceOfSpareTire" class="PresenceOfSpareTire" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="PresenceOfSpareTire_ActionRequired" class="PresenceOfSpareTire_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Verify the presence of a first aid kit and a fire extinguisher
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PresenceOfFirstAidKit" class="PresenceOfFirstAidKit" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PresenceOfFirstAidKit" class="PresenceOfFirstAidKit" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="PresenceOfFirstAidKit" class="PresenceOfFirstAidKit" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="PresenceOfFirstAidKit_ActionRequired" class="PresenceOfFirstAidKit_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist">
                    <div class="item-checklist-inner">
                        Check the functioning of all safety features, such as airbags and seatbelt pretensioners 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="FunctionalityOfAllSafetyFeatures" class="FunctionalityOfAllSafetyFeatures" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="FunctionalityOfAllSafetyFeatures" class="FunctionalityOfAllSafetyFeatures" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="FunctionalityOfAllSafetyFeatures" class="FunctionalityOfAllSafetyFeatures" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="FunctionalityOfAllSafetyFeatures_ActionRequired" class="FunctionalityOfAllSafetyFeatures_ActionRequired"> 
                    </div>
                </div>
                <div class="item-checklist last">
                    <div class="item-checklist-inner">
                        Test the operation of the emergency lights and warning triangle (if available)
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EmergencyLightsCondition" class="EmergencyLightsCondition" value="BAD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EmergencyLightsCondition" class="EmergencyLightsCondition" value="GOOD"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="radio" name="EmergencyLightsCondition" class="EmergencyLightsCondition" value="NO_ANSWER"> 
                    </div>
                    <div class="item-checklist-inner">
                        <input type="text" name="EmergencyLightsCondition_ActionRequired" class="EmergencyLightsCondition_ActionRequired"> 
                    </div>
                </div> 
            </div>
            <h1>Remarks</h1>
            <div class="additional-notes">
                <h2>Additional Notes</h2>
                <textarea name="AdditionalNotes" class="AdditionalNotes" placeholder="Type here..."></textarea>
            </div>
            <h1>Attachments</h1>
            <div class="attachment">
                <h2>Indicate if damage or any other fault is noted</h2>
                <input type="file" name="Attachment" class="Attachment">
            </div>
            <h1 class="h1-x">Status</h1>
            <div class="div">
                <h2>Indicate if the vehicle is Safe or Unsafe to drive</h2> <br>
                <input type="text" name="Status" class="Status" placeholder="Vehicle Safety...">
            </div>
            <h1 class="h1-x">Assigned Mechanic/Agent</h1>
            <div class="div">
                <h2>Mechanic or agent that is assigned to address individual defects in this vehicle</h2> <br>
                <input type="text" name="Mechanic" class="Mechanic" placeholder="Agent Name...">
            </div>
        </div>
        <input type="hidden" value="{{ date('W') }}" name="Week" class="Week">
        <input type="hidden" value="{{ date('h:i a') }}" name="SubmitTime" class="SubmitTime">
        <button class="EditInspectionButton">Edit Inspection</button> 
        <button class="DeleteInspectionButton">- Delete Inspection</button>
    </form>
</div>