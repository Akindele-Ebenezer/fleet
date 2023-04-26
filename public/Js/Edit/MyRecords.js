let ModalVehicleData_Edit = document.querySelector('.edit-modal-vehicle-data');
 
let Deposits_X_Edit = document.querySelector('input.Deposits_X');
let Refueling_X_Edit = document.querySelector('input.Refueling_X');
let Balance_X_Edit = document.querySelector('input.Balance_X');
let UsedBy_X_Edit = document.querySelector('input.UsedBy_X');
let RegistrationNo_X_Edit = document.querySelector('input.RegistrationNo_X');
let Maker_X_Edit = document.querySelectorAll('.Maker_X');
let Model_X_Edit = document.querySelector('input.Model_X');
let SubModel_X_Edit = document.querySelector('input.SubModel_X');
let EngineType_X_Edit = document.querySelectorAll('.EngineType_X');
let GearType_X_Edit = document.querySelectorAll('.GearType_X');
let EngineNo_X_Edit = document.querySelector('input.EngineNo_X');
let ChasisNo_X_Edit = document.querySelector('input.ChasisNo_X');
let PurchaseDate_X_Edit = document.querySelector('input.PurchaseDate_X');
let Supplier_X_Edit = document.querySelector('input.Supplier_X');
let Price_X_Edit = document.querySelector('input.Price_X');
let CompanyCode_X_Edit = document.querySelectorAll('.CompanyCode_X');
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
let Comment_X_Edit = document.querySelector('input.Comment_X');
let Status_X_Edit = document.querySelectorAll('.Status_X');
let CarId_X = document.querySelector('.CarId_X');

let EditCarButton = document.querySelector('.EditCar'); 
let EditCarForm = document.querySelector('.EditCarForm');

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
        let Status_X_DATA_X = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Comments_X_DATA = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        Deposits_X_Edit.value = BigInt(Deposits_X_DATA.replace(/₦/g, '').replace(/,/g, ''));
        Refueling_X_Edit.value = BigInt(Refueling_X_DATA.replace(/₦/g, '').replace(/,/g, ''));
        Balance_X_Edit.value = BigInt(Balance_X_DATA.replace(/₦/g, '').replace(/,/g, ''));
        UsedBy_X_Edit.value = UsedBy_X_DATA;
        RegistrationNo_X_Edit.value = RegistrationNo_X_DATA;
        Maker_X_Edit.forEach(Maker => {
            Maker.value = Maker_X_DATA;
        });
        Model_X_Edit.value = Model_X_DATA;  
        SubModel_X_Edit.value = SubModel_X_DATA;
        EngineType_X_Edit.forEach(EngineType => {
            EngineType.value = EngineType_X_DATA;
        }); 
        GearType_X_Edit.forEach(GearType => {
            GearType.value = GearType_X_DATA;
        }); 
        EngineNo_X_Edit.value = EngineNo_X_DATA;
        ChasisNo_X_Edit.value = ChasisNo_X_DATA;
        PurchaseDate_X_Edit.value = PurchaseDate_X_DATA;
        Supplier_X_Edit.value = Supplier_X_DATA;
        Price_X_Edit.value = BigInt(Price_X_DATA.replace(/₦/g, '').replace(/,/g, '')); 
        CompanyCode_X_Edit.forEach(CompanyCode => {
            CompanyCode.value = CompanyCode_X_DATA;
        }); 
        LicenceExpiryDate_X_Edit.value = LicenceExpiryDate_X_DATA;
        InsuranceExpiryDate_X_Edit.value = InsuranceExpiryDate_X_DATA;
        CardNo_X_Edit.value = CardNo_X_DATA;
        PinCode_X_Edit.value = PinCode_X_DATA;
        FuelMonthly_X_Edit.value = BigInt(FuelMonthly_X_DATA.replace(/₦/g, '').replace(/,/g, ''));
        FuelTankCapacity_X_Edit.value = FuelTankCapacity_X_DATA;
        EngineVolume_X_Edit.value = EngineVolume_X_DATA;
        ModelYear_X_Edit.value = ModelYear_X_DATA;
        StopDate_X_Edit.value = StopDate_X_DATA;
        Driver_X_Edit.value = Driver_X_DATA; 
        Status_X_Edit.innerHTML = Status_X_DATA;  
        Status_X_Edit.forEach(Status => {
            Status.value = Status_X_DATA_X;
        }); 
        Comment_X_Edit.value = Comments_X_DATA; 
        CarId_X.value = ActionButton.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        
        EditCarButton.addEventListener('click', () => {
            EditCarForm.setAttribute('action', '/Update/Car/' + CarId_X.value);
            EditCarForm.submit();
        });
 
        let DeleteCarButton = document.querySelector('.DeleteCar');
        
        DeleteCarButton.addEventListener('click', () => {
            window.location = '/Delete/Car/' + CarId_X.value;
        }); 
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
let AddCarForm = document.querySelector('.AddCarForm');
let AddCarButton_X = document.querySelector('.AddCar');
let AddCarButton = document.querySelectorAll('.add-car'); 
let VehicleNumber_CAR = document.querySelector('input[name="VehicleNumber_CAR"]');

let Error = document.querySelector('.error');

AddCarButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddCar.style.display = 'block';
           
        AddCarButton_X.addEventListener('click', () => {     
            if (AddCarForm.children[0].lastElementChild.value === '') {
                Error.textContent = 'Please fill out vehicle number for new Car';
            } else {
                AddCarForm.setAttribute('action', '/Add/Car/' + VehicleNumber_CAR.value);
                AddCarForm.submit();
            }
        });
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddCar.style.display = 'none';
        });
    });
});
