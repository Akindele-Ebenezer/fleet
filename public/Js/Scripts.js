let Arrow = document.querySelector('.arrow');
let MyRecords = document.querySelector('.my-records');
let SubNavs = document.querySelectorAll('.sub-nav li');

MyRecords.addEventListener('click', (e) => {
    e.preventDefault();
    MyRecords.nextElementSibling.classList.toggle('Show');
});

let ModalVehicleData = document.querySelector('.modal-vehicle-data');
let CancelModalIcons = document.querySelectorAll('.cancel-modal');
let ActionButtons = document.querySelectorAll('.show-record-button');

let Deposits_X = document.querySelector('.Deposits_X');
let Refueling_X = document.querySelector('.Refueling_X');
let Balance_X = document.querySelector('.Balance_X');
let UsedBy_X = document.querySelector('.UsedBy_X');
let RegistrationNo_X = document.querySelector('.RegistrationNo_X');
let Maker_X = document.querySelector('.Maker_X');
let Model_X = document.querySelector('.Model_X');
let SubModel_X = document.querySelector('.SubModel_X');
let EngineType_X = document.querySelector('.EngineType_X');
let GearType_X = document.querySelector('.GearType_X');
let EngineNo_X = document.querySelector('.EngineNo_X');
let ChasisNo_X = document.querySelector('.ChasisNo_X');
let PurchaseDate_X = document.querySelector('.PurchaseDate_X');
let Supplier_X = document.querySelector('.Supplier_X');
let Price_X = document.querySelector('.Price_X');
let CompanyCode_X = document.querySelector('.CompanyCode_X');
let LicenceExpiryDate_X = document.querySelector('.LicenceExpiryDate_X');
let InsuranceExpiryDate_X = document.querySelector('.InsuranceExpiryDate_X');
let CardNo_X = document.querySelector('.CardNo_X');
let PinCode_X = document.querySelector('.PinCode_X');
let FuelMonthly_X = document.querySelector('.FuelMonthly_X');
let FuelTankCapacity_X = document.querySelector('.FuelTankCapacity_X');
let EngineVolume_X = document.querySelector('.EngineVolume_X');
let ModelYear_X = document.querySelector('.ModelYear_X');
let StopDate_X = document.querySelector('.StopDate_X');
let Driver_X = document.querySelector('.Driver_X');
let Status_X = document.querySelector('.Status_X');

ActionButtons.forEach(ActionButton => {
    ActionButton.addEventListener('click', () => {
        ModalVehicleData.style.display = 'flex';

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

        Deposits_X.textContent = Deposits_X_DATA;
        Refueling_X.textContent = Refueling_X_DATA;
        Balance_X.textContent = Balance_X_DATA;
        UsedBy_X.textContent = UsedBy_X_DATA;
        RegistrationNo_X.textContent = RegistrationNo_X_DATA;
        Maker_X.textContent = Maker_X_DATA;
        Model_X.textContent = Model_X_DATA;
        SubModel_X.textContent = SubModel_X_DATA;
        EngineType_X.textContent = EngineType_X_DATA;
        GearType_X.textContent = GearType_X_DATA;
        EngineNo_X.textContent = EngineNo_X_DATA;
        ChasisNo_X.textContent = ChasisNo_X_DATA;
        PurchaseDate_X.textContent = PurchaseDate_X_DATA;
        Supplier_X.textContent = Supplier_X_DATA;
        Price_X.textContent = Price_X_DATA;
        CompanyCode_X.textContent = CompanyCode_X_DATA;
        LicenceExpiryDate_X.textContent = LicenceExpiryDate_X_DATA;
        InsuranceExpiryDate_X.textContent = InsuranceExpiryDate_X_DATA;
        CardNo_X.textContent = CardNo_X_DATA;
        PinCode_X.textContent = PinCode_X_DATA;
        FuelMonthly_X.textContent = FuelMonthly_X_DATA;
        FuelTankCapacity_X.textContent = FuelTankCapacity_X_DATA;
        EngineVolume_X.textContent = EngineVolume_X_DATA;
        ModelYear_X.textContent = ModelYear_X_DATA;
        StopDate_X.textContent = StopDate_X_DATA;
        Driver_X.textContent = Driver_X_DATA; 
        Status_X.innerHTML = Status_X_DATA; 

        let PrintButton = document.querySelectorAll('.Print');
        
        PrintButton.forEach(Button => {
            Button.addEventListener('click', () => { 
                window.open('/CarReport/' + RegistrationNo_X.textContent, '_blank');
            });
        });
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalVehicleData.style.display = 'none';
        });
    });
});

let MaintenanceRouteButton = document.querySelectorAll('.maintenance-route');
let RefuelingRouteButton = document.querySelectorAll('.refueling-route');
let RepairsRouteButton = document.querySelectorAll('.repairs-route');
let DepositsRouteButton = document.querySelectorAll('.deposits-route');
let DepositsRouteEditButton = document.querySelectorAll('.deposits-route-edit');
let CarsRouteButton = document.querySelectorAll('.cars-route');

MaintenanceRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Maintenance';
    });
});

RefuelingRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Refueling';
    });
});

RepairsRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Repairs';
    });
});

DepositsRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Deposits';
    });
});

DepositsRouteEditButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Edit/Deposits';
        
        if (window.location.href === '/Edit/Deposits') {
            let ModalAddMonthlyDeposits = document.querySelector('.add-monthly-deposits-form');
            ModalAddMonthlyDeposits.style.display = 'block';
        }
    });
});

CarsRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Cars';
    });
});