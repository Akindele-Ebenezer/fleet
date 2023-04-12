let ModalVehicleData_Edit = document.querySelector('.edit-modal-vehicle-data');
 
let Deposits_X_Edit = document.querySelector('input.Deposits_X');
let Refueling_X_Edit = document.querySelector('input.Refueling_X');
let Balance_X_Edit = document.querySelector('input.Balance_X');
let UsedBy_X_Edit = document.querySelector('input.UsedBy_X');
let RegistrationNo_X_Edit = document.querySelector('input.RegistrationNo_X');
let Maker_X_Edit = document.querySelector('.Maker_X');
let Model_X_Edit = document.querySelector('input.Model_X');
let SubModel_X_Edit = document.querySelector('input.SubModel_X');
let EngineType_X_Edit = document.querySelector('.EngineType_X');
let GearType_X_Edit = document.querySelector('.GearType_X');
let EngineNo_X_Edit = document.querySelector('input.EngineNo_X');
let ChasisNo_X_Edit = document.querySelector('input.ChasisNo_X');
let PurchaseDate_X_Edit = document.querySelector('input.PurchaseDate_X');
let Supplier_X_Edit = document.querySelector('input.Supplier_X');
let Price_X_Edit = document.querySelector('input.Price_X');
let CompanyCode_X_Edit = document.querySelector('input.CompanyCode_X');
let LicenceExpiryDate_X_Edit = document.querySelector('input.LicenceExpiryDate_X');
let InsuranceExpiryDate_X_Edit = document.querySelector('input.InsuranceExpiryDate_X');
let CardNo_X_Edit = document.querySelector('input.CardNo_X');
let PinCode_X_Edit = document.querySelector('input.PinCode_X');
let FuelMonthly_X_Edit = document.querySelector('input.FuelMonthly_X');
let FuelTankCapacity_X_Edit = document.querySelector('input.FuelTankCapacity_X');
let EngineVolume_X_Edit = document.querySelector('input.EngineVolume_X');
let ModelYear_X_Edit = document.querySelector('input.ModelYear_X');
let StopDate_X_Edit = document.querySelector('input.StopDate_X');
let Driver_X_Edit = document.querySelector('input.Driver_X');
let Status_X_Edit = document.querySelector('.Status_X');
let Comment_X_Edit = document.querySelector('input.Comment_X');

ActionButtons.forEach(ActionButton => {
    ActionButton.addEventListener('click', () => {
        ModalVehicleData_Edit.style.display = 'flex';

        let Deposits_X_DATA = ActionButton.nextElementSibling.textContent;
        let Refueling_X_DATA = ActionButton.nextElementSibling.nextElementSibling.textContent;
        let Balance_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let UsedBy_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let RegistrationNo_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Maker_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Model_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let SubModel_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let EngineType_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let GearType_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let EngineNo_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let ChasisNo_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let PurchaseDate_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Supplier_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Price_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let CompanyCode_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let LicenceExpiryDate_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let InsuranceExpiryDate_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let CardNo_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let PinCode_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let FuelMonthly_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let FuelTankCapacity_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let EngineVolume_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let ModelYear_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let StopDate_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Driver_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Status_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        Deposits_X_Edit.value = Deposits_X_DATA;
        Refueling_X_Edit.value = Refueling_X_DATA;
        Balance_X_Edit.value = Balance_X_DATA;
        UsedBy_X_Edit.value = UsedBy_X_DATA;
        RegistrationNo_X_Edit.value = RegistrationNo_X_DATA;
        Maker_X_Edit.value = Maker_X_DATA;
        Model_X_Edit.value = Model_X_DATA;
        SubModel_X_Edit.value = SubModel_X_DATA;
        EngineType_X_Edit.value = EngineType_X_DATA;
        GearType_X_Edit.value = GearType_X_DATA;
        EngineNo_X_Edit.value = EngineNo_X_DATA;
        ChasisNo_X_Edit.value = ChasisNo_X_DATA;
        PurchaseDate_X_Edit.value = PurchaseDate_X_DATA;
        Supplier_X_Edit.value = Supplier_X_DATA;
        Price_X_Edit.value = Price_X_DATA;
        CompanyCode_X_Edit.value = CompanyCode_X_DATA;
        LicenceExpiryDate_X_Edit.value = LicenceExpiryDate_X_DATA;
        InsuranceExpiryDate_X_Edit.value = InsuranceExpiryDate_X_DATA;
        CardNo_X_Edit.value = CardNo_X_DATA;
        PinCode_X_Edit.value = PinCode_X_DATA;
        FuelMonthly_X_Edit.value = FuelMonthly_X_DATA;
        FuelTankCapacity_X_Edit.value = FuelTankCapacity_X_DATA;
        EngineVolume_X_Edit.value = EngineVolume_X_DATA;
        ModelYear_X_Edit.value = ModelYear_X_DATA;
        StopDate_X_Edit.value = StopDate_X_DATA;
        Driver_X_Edit.value = Driver_X_DATA; 
        Status_X_Edit.innerHTML = Status_X_DATA; 
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalVehicleData_Edit.style.display = 'none';
        });
    });
});

let Edit_INPUTS = document.querySelectorAll('.inner ul li input');
let Edit_SELECTS = document.querySelectorAll('.inner ul li select');
let Edit_INPUTS_AND_SELECTS_Arr = [
    Edit_INPUTS,
    Edit_SELECTS,
];

Edit_INPUTS_AND_SELECTS_Arr.forEach(Inputs_And_Selects => {
    Inputs_And_Selects.forEach(Inputs_And_Select => {
        Inputs_And_Select.addEventListener('focus', () => {
            Inputs_And_Select.parentElement.style.borderBottom = '3px solid #4146d3'; 
        });

        Inputs_And_Select.addEventListener('focusout', () => {
            Inputs_And_Select.parentElement.style.borderBottom = '1px solid #d6d7f4'; 
        });
    });
});

let ModalAddCar = document.querySelector('.add-vehicle-form');
let AddCarButton = document.querySelectorAll('.add-car'); 

AddCarButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddCar.style.display = 'block';
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddCar.style.display = 'none';
        });
    });
});
