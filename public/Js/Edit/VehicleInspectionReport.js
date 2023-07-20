let EditVehicleDailyChecklist = document.querySelector('.EditVehicleDailyChecklist');
let EditVehicleDailyChecklistForm = document.querySelector('.daily-checklist.edit');
let InspectionNumbers = document.querySelectorAll('.inspection-number');
let EditInspectionButton = document.querySelector('.EditInspectionButton');
let DeleteInspectionButton = document.querySelector('.DeleteInspectionButton');

let VehicleNumber = document.querySelector('.VehicleNumber');
let InspectionNumber = document.querySelector('.InspectionNumber');
let Mileage = document.querySelector('.Mileage');
let DateInspected = document.querySelector('.DateInspected');
let InspectedBy = document.querySelector('.InspectedBy');
// EXTERIOR INSPECTION
let BodyDamages = document.querySelectorAll('.BodyDamages');
let TireConditions = document.querySelectorAll('.TireCondition');
let WindshieldConditions = document.querySelectorAll('.WindshieldCondition');
let LightsConditions = document.querySelectorAll('.LightsCondition');
let MirrorConditions = document.querySelectorAll('.MirrorCondition');
let BodyDamages_ActionRequired = document.querySelector('.BodyDamages_ActionRequired');
let TireConditions_ActionRequired = document.querySelector('.TireCondition_ActionRequired');
let WindshieldConditions_ActionRequired = document.querySelector('.WindshieldCondition_ActionRequired');
let LightsConditions_ActionRequired = document.querySelector('.LightsCondition_ActionRequired');
let MirrorConditions_ActionRequired = document.querySelector('.MirrorCondition_ActionRequired');
// INTERIOR INSPECTION
let SeatBeltsConditions = document.querySelectorAll('.SeatBeltsCondition');
let SeatsConditions = document.querySelectorAll('.SeatsCondition');
let HornConditions = document.querySelectorAll('.HornCondition');
let AllControlsConditions = document.querySelectorAll('.AllControlsCondition');
let MirrorVisibilitys = document.querySelectorAll('.MirrorVisibility');
let SeatBeltsConditions_ActionRequired = document.querySelector('.SeatBeltsCondition_ActionRequired');
let SeatsConditions_ActionRequired = document.querySelector('.SeatsCondition_ActionRequired');
let HornConditions_ActionRequired = document.querySelector('.HornCondition_ActionRequired');
let AllControlsConditions_ActionRequired = document.querySelector('.AllControlsCondition_ActionRequired');
let MirrorVisibilitys_ActionRequired = document.querySelector('.MirrorVisibility_ActionRequired');
// FLUIDS LEVELS
let EngineOilConditions = document.querySelectorAll('.EngineOilCondition');
let CoolantLevelConditions = document.querySelectorAll('.CoolantLevelCondition');
let BrakeFluidLevelConditions = document.querySelectorAll('.BrakeFluidLevelCondition');
let WindshieldWasherFluidConditions = document.querySelectorAll('.WindshieldWasherFluidCondition');
let PowerSteeringFluidLevelConditions = document.querySelectorAll('.PowerSteeringFluidLevelCondition');
let EngineOilConditions_ActionRequired = document.querySelector('.EngineOilCondition_ActionRequired');
let CoolantLevelConditions_ActionRequired = document.querySelector('.CoolantLevelCondition_ActionRequired');
let BrakeFluidLevelConditions_ActionRequired = document.querySelector('.BrakeFluidLevelCondition_ActionRequired');
let WindshieldWasherFluidConditions_ActionRequired = document.querySelector('.WindshieldWasherFluidCondition_ActionRequired');
let PowerSteeringFluidLevelConditions_ActionRequired = document.querySelector('.PowerSteeringFluidLevelCondition_ActionRequired');
// MECHANICAL INSPECTION
let EngineConditions = document.querySelectorAll('.EngineCondition');
let BrakeConditions = document.querySelectorAll('.BrakeCondition');
let BrakeEngagingConditions = document.querySelectorAll('.BrakeEngagingCondition');
let WiperBladesConditions = document.querySelectorAll('.WiperBladesCondition');
let BatteryConditions = document.querySelectorAll('.BatteryCondition');
let EngineConditions_ActionRequired = document.querySelector('.EngineCondition_ActionRequired');
let BrakeConditions_ActionRequired = document.querySelector('.BrakeCondition_ActionRequired');
let BrakeEngagingConditions_ActionRequired = document.querySelector('.BrakeEngagingCondition_ActionRequired');
let WiperBladesConditions_ActionRequired = document.querySelector('.WiperBladesCondition_ActionRequired');
let BatteryConditions_ActionRequired = document.querySelector('.BatteryCondition_ActionRequired');
// SAFETY EQUIPMENT
let PresenceOfSpareTires = document.querySelectorAll('.PresenceOfSpareTire');
let PresenceOfFirstAidKits = document.querySelectorAll('.PresenceOfFirstAidKit');
let FunctionalityOfAllSafetyFeaturess = document.querySelectorAll('.FunctionalityOfAllSafetyFeatures');
let EmergencyLightsConditions = document.querySelectorAll('.EmergencyLightsCondition');
let PresenceOfSpareTires_ActionRequired = document.querySelector('.PresenceOfSpareTire_ActionRequired');
let PresenceOfFirstAidKits_ActionRequired = document.querySelector('.PresenceOfFirstAidKit_ActionRequired');
let FunctionalityOfAllSafetyFeaturess_ActionRequired = document.querySelector('.FunctionalityOfAllSafetyFeatures_ActionRequired');
let EmergencyLightsConditions_ActionRequired = document.querySelector('.EmergencyLightsCondition_ActionRequired');

let AdditionalNotes = document.querySelector('.AdditionalNotes');
let Attachment = document.querySelector('.Attachment');
let Attachment_ = document.querySelector('.Attachment_');
let Status = document.querySelector('.Status');
let Mechanic = document.querySelector('.Mechanic');

InspectionNumbers.forEach(InspectionNumber_ => {
    InspectionNumber_.addEventListener('click', () => {
        EditVehicleDailyChecklistForm.style.display = "flex";

        VehicleNumber.value = InspectionNumber_.nextElementSibling.textContent;
        InspectionNumber.value = InspectionNumber_.nextElementSibling.nextElementSibling.textContent;
        Mileage.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        DateInspected.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        InspectedBy.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        let RemoveAttribute = (Element) => {
            CancelModalIcons.forEach(CancelModalIcon => {
                CancelModalIcon.addEventListener('click', () => {
                    EditVehicleDailyChecklistForm.style.display = 'none';
                    Element.removeAttribute('checked');
                });
            });
        }
   
        // EXTERIOR INSPECTION
        BodyDamages.forEach(BodyDamage => {
            if (
                BodyDamage.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                BodyDamage.setAttribute('checked', true);
                RemoveAttribute(BodyDamage);
            }
        });
        
        TireConditions.forEach(TireCondition => {
            if (
                TireCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                TireCondition.setAttribute('checked', true);
                RemoveAttribute(TireCondition);
            }
        });

        WindshieldConditions.forEach(WindshieldCondition => {
            if (
                WindshieldCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                WindshieldCondition.setAttribute('checked', true);
                RemoveAttribute(WindshieldCondition);
            }
        });

        LightsConditions.forEach(LightsCondition => {
            if (
                LightsCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                LightsCondition.setAttribute('checked', true);
                RemoveAttribute(LightsCondition);
            }
        });

        MirrorConditions.forEach(MirrorCondition => {
            if (
                MirrorCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                MirrorCondition.setAttribute('checked', true);
                RemoveAttribute(MirrorCondition);
            }
        });

        BodyDamages_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        TireConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        WindshieldConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        LightsConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        MirrorConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        // INTERIOR INSPECTION
        SeatBeltsConditions.forEach(SeatBeltsCondition => {
            if (
                SeatBeltsCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                SeatBeltsCondition.setAttribute('checked', true);
                RemoveAttribute(SeatBeltsCondition);
            }
        });
        
        SeatsConditions.forEach(SeatsCondition => {
            if (
                SeatsCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                SeatsCondition.setAttribute('checked', true);
                RemoveAttribute(SeatsCondition);
            }
        });

        HornConditions.forEach(HornCondition => {
            if (
                HornCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                HornCondition.setAttribute('checked', true);
                RemoveAttribute(HornCondition);
            }
        });

        AllControlsConditions.forEach(AllControlsCondition => {
            if (
                AllControlsCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                AllControlsCondition.setAttribute('checked', true);
                RemoveAttribute(AllControlsCondition);
            }
        });

        MirrorVisibilitys.forEach(MirrorVisibility => {
            if (
                MirrorVisibility.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                MirrorVisibility.setAttribute('checked', true);
                RemoveAttribute(MirrorVisibility);
            }
        });

        SeatBeltsConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        SeatsConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        HornConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        AllControlsConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        MirrorVisibilitys_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        // FLUIDS LEVEL
        EngineOilConditions.forEach(EngineOilCondition => {
            if (
                EngineOilCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                EngineOilCondition.setAttribute('checked', true);
                RemoveAttribute(EngineOilCondition);
            }
        });
        
        CoolantLevelConditions.forEach(CoolantLevelCondition => {
            if (
                CoolantLevelCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                CoolantLevelCondition.setAttribute('checked', true);
                RemoveAttribute(CoolantLevelCondition);
            }
        });

        BrakeFluidLevelConditions.forEach(BrakeFluidLevelCondition => {
            if (
                BrakeFluidLevelCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                BrakeFluidLevelCondition.setAttribute('checked', true);
                RemoveAttribute(BrakeFluidLevelCondition);
            }
        });

        WindshieldWasherFluidConditions.forEach(WindshieldWasherFluidCondition => {
            if (
                WindshieldWasherFluidCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                WindshieldWasherFluidCondition.setAttribute('checked', true);
                RemoveAttribute(WindshieldWasherFluidCondition);
            }
        });

        PowerSteeringFluidLevelConditions.forEach(PowerSteeringFluidLevelCondition => {
            if (
                PowerSteeringFluidLevelCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                PowerSteeringFluidLevelCondition.setAttribute('checked', true);
                RemoveAttribute(PowerSteeringFluidLevelCondition);
            }
        });

        EngineOilConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        CoolantLevelConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        BrakeFluidLevelConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        WindshieldWasherFluidConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        PowerSteeringFluidLevelConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        // MECHANICAL INSPECTION
        EngineConditions.forEach(EngineCondition => {
            if (
                EngineCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                EngineCondition.setAttribute('checked', true);
                RemoveAttribute(EngineCondition);
            }
        });
        
        BrakeConditions.forEach(BrakeCondition => {
            if (
                BrakeCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                BrakeCondition.setAttribute('checked', true);
                RemoveAttribute(BrakeCondition);
            }
        });

        BrakeEngagingConditions.forEach(BrakeEngagingCondition => {
            if (
                BrakeEngagingCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                BrakeEngagingCondition.setAttribute('checked', true);
                RemoveAttribute(BrakeEngagingCondition);
            }
        });

        WiperBladesConditions.forEach(WiperBladesCondition => {
            if (
                WiperBladesCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                WiperBladesCondition.setAttribute('checked', true);
                RemoveAttribute(WiperBladesCondition);
            }
        });

        BatteryConditions.forEach(BatteryCondition => {
            if (
                BatteryCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                BatteryCondition.setAttribute('checked', true);
                RemoveAttribute(BatteryCondition);
            }
        });

        EngineConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        BrakeConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        BrakeEngagingConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        WiperBladesConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        BatteryConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        // SAFETY EQUIPMENT
        PresenceOfSpareTires.forEach(PresenceOfSpareTire => {
            if (
                PresenceOfSpareTire.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                PresenceOfSpareTire.setAttribute('checked', true);
                RemoveAttribute(PresenceOfSpareTire);
            }
        });
        
        PresenceOfFirstAidKits.forEach(PresenceOfFirstAidKit => {
            if (
                PresenceOfFirstAidKit.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                PresenceOfFirstAidKit.setAttribute('checked', true);
                RemoveAttribute(PresenceOfFirstAidKit);
            }
        });

        FunctionalityOfAllSafetyFeaturess.forEach(FunctionalityOfAllSafetyFeatures => {
            if (
                FunctionalityOfAllSafetyFeatures.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                FunctionalityOfAllSafetyFeatures.setAttribute('checked', true);
                RemoveAttribute(FunctionalityOfAllSafetyFeatures);
            }
        });

        EmergencyLightsConditions.forEach(EmergencyLightsCondition => {
            if (
                EmergencyLightsCondition.value === 
                InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent) {
                EmergencyLightsCondition.setAttribute('checked', true);
                RemoveAttribute(EmergencyLightsCondition);
            }
        }); 

        PresenceOfSpareTires_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        PresenceOfFirstAidKits_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        FunctionalityOfAllSafetyFeaturess_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        EmergencyLightsConditions_ActionRequired.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        // OTHERS
        AdditionalNotes.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        
        if (
            InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent === ""
        ) {
            Attachment.setAttribute('href', '/Images/no-attachment.png');
            Attachment_.setAttribute('src', '/Images/no-attachment.png');
        } else {
            Attachment.setAttribute('href', '/Inspections/' + VehicleNumber.value + '/' + InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
                
            Attachment_.setAttribute('src', '/Inspections/' + VehicleNumber.value + '/' + InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        }
        
        Attachment.firstElementChild.textContent = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        
        Status.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Mechanic.value = InspectionNumber_.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        EditVehicleDailyChecklist.setAttribute('method', 'POST');
        EditVehicleDailyChecklist.setAttribute('action', '/Update/Cars/Inspections/Report/' + InspectionNumber.value);

        DeleteInspectionButton.addEventListener('click', (e) => {
            EditVehicleDailyChecklist.setAttribute('action', '/Delete/Cars/Inspections/Report/' + InspectionNumber.value);
        });

        CancelModalIcons.forEach(CancelModalIcon => {
            CancelModalIcon.addEventListener('click', () => {
                EditVehicleDailyChecklistForm.style.display = 'none';
            });
        });
    });
});



