let Arrow = document.querySelector('.arrow');
let MyRecords = document.querySelector('.my-records');
let CardManagement = document.querySelectorAll('.card-management');
let Inspections = document.querySelectorAll('.inspections');
let SubNavs = document.querySelectorAll('.sub-nav li');

MyRecords.addEventListener('click', (e) => {
    e.preventDefault();
    MyRecords.nextElementSibling.classList.toggle('Show');
});
CardManagement.forEach(NavWrapper => {
    NavWrapper.addEventListener('click', (e) => {
        e.preventDefault();
        NavWrapper.nextElementSibling.classList.toggle('Show');
    });
});
Inspections.forEach(NavWrapper => {
    NavWrapper.addEventListener('click', (e) => {
        e.preventDefault();
        NavWrapper.nextElementSibling.classList.toggle('Show');
    });
});

let ModalVehicleData = document.querySelector('.modal-vehicle-data');
let CancelModalIcons = document.querySelectorAll('.cancel-modal');
let ActionButtons = document.querySelectorAll('.show-record-button');
let OpenDocumentButtons = document.querySelectorAll('.open-document');
let OpenAnalyticsButtons = document.querySelectorAll('.open-analytics');

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
let BalanceBroughtForward_X = document.querySelector('.BalanceBroughtForward_X');
let Mileage_X = document.querySelector('.Mileage_X');
let Odometer_X = document.querySelector('.Odometer_X');
 
let Cars = document.querySelectorAll('.car-info'); 

Cars.forEach(Car => { 
    Car.addEventListener('click', () => {
        ModalVehicleData.style.display = 'flex';

        let Deposits_X_DATA = Car.nextElementSibling.textContent;
        let Refueling_X_DATA = Car.nextElementSibling.nextElementSibling.textContent;
        let Balance_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let UsedBy_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let RegistrationNo_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Maker_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Model_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let SubModel_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let EngineType_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let GearType_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let EngineNo_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let ChasisNo_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let PurchaseDate_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Supplier_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Price_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let CompanyCode_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let LicenceExpiryDate_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let InsuranceExpiryDate_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let CardNo_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let PinCode_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let FuelMonthly_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let FuelTankCapacity_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let EngineVolume_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let ModelYear_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let StopDate_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Driver_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Status_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let BalanceBroughtForward_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Mileage_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        let Odometer_X_DATA = Car.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    
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
        BalanceBroughtForward_X.textContent = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'NGN' }).format(BalanceBroughtForward_X_DATA); 
        Mileage_X.innerHTML = Mileage_X_DATA;  
        Odometer_X.textContent = Odometer_X_DATA;

        let PrintButton = document.querySelectorAll('.Print');
        let ExcelMaintenanceButton = document.querySelector('.modal-vehicle-data .inner .links .excel-maintenance');
        let ExcelDepositsButton = document.querySelector('.modal-vehicle-data .inner .links .excel-deposits');
        let ExcelFuelHistoryButton = document.querySelector('.modal-vehicle-data .inner .links .excel-fuel-history');
        let MaintenanceButton = document.querySelector('.modal-vehicle-data .inner .links .maintenance');
        let DepositsButton = document.querySelector('.modal-vehicle-data .inner .links .deposits');
        let FuelHistoryButton = document.querySelector('.modal-vehicle-data .inner .links .fuel-history');
        let InspectionsButton = document.querySelector('.modal-vehicle-data .inner .links .inspections');
        
        PrintButton.forEach(Button => {
            Button.addEventListener('click', () => { 
                window.open('/Cars/Report/' + RegistrationNo_X.textContent, '_blank');
            });
        });

        ExcelMaintenanceButton.addEventListener('click', (e) => {  
            e.stopPropagation();
            window.location = '/Maintenance/Export/' + RegistrationNo_X.textContent;
        });
        ExcelDepositsButton.addEventListener('click', (e) => {  
            e.stopPropagation();
            window.location = '/Deposits/Export/' + RegistrationNo_X.textContent;
        }); 
        ExcelFuelHistoryButton.addEventListener('click', (e) => {  
            e.stopPropagation();
            window.location = '/Refueling/Export/' + RegistrationNo_X.textContent;
        });
        MaintenanceButton.addEventListener('click', () => {  
            window.location = '/Maintenance?FilterValue=' + RegistrationNo_X.textContent;
        });
        DepositsButton.addEventListener('click', () => { 
            window.location = '/Deposits?FilterValue=' + RegistrationNo_X.textContent;
        });
        FuelHistoryButton.addEventListener('click', () => { 
            window.location = '/Refueling?FilterValue=' + RegistrationNo_X.textContent;
        });
        InspectionsButton.addEventListener('click', () => { 
            window.location = '/Cars/Inspections/General/Report?FilterValue=' + RegistrationNo_X.textContent;
        });
    }); 
    
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalVehicleData.style.display = 'none';
        });
    });
}); 

OpenDocumentButtons.forEach(Button => {
    Button.addEventListener('click', (e) => {
        e.stopPropagation();
        window.location = '/Cars/Documents?FilterValue=' + Button.nextElementSibling.textContent;
    });
});

OpenAnalyticsButtons.forEach(Button => {
    Button.addEventListener('click', (e) => {
        e.stopPropagation();
        let CurrentDate = new Date().toJSON().slice(0, 10);
        window.location = '/Analytics?VehicleNo=' + Button.nextElementSibling.textContent + '&Date_From=2000-01-01&Date_To=' + CurrentDate + '&Filter__Range_Analytics=';
    });
});

let MaintenanceRouteButton = document.querySelectorAll('.maintenance-route');
let RepairRouteButton = document.querySelectorAll('.repair-route');
let AccidentRouteButton = document.querySelectorAll('.accident-route');
let RefuelingRouteButton = document.querySelectorAll('.refueling-route'); 
let DepositsRouteButton = document.querySelectorAll('.deposits-route');
let DepositsRouteEditButton = document.querySelectorAll('.deposits-route-edit');
let ActiveCarsRouteButton = document.querySelectorAll('.active-cars-route');
let InactiveCarsRouteButton = document.querySelectorAll('.inactive-cars-route');
let DriversRouteButton = document.querySelectorAll('.drivers-route');
let CarsRouteButton = document.querySelectorAll('.cars-route');
let DailyChecklistRouteButton = document.querySelectorAll('.daily-checklist-route');
let InspectionFormButton = document.querySelectorAll('.daily-vehicle-inspection-form');
let CarsRegistrationRouteButton = document.querySelectorAll('.cars-registration-route');

CarsRegistrationRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Cars/Registration';
    });
});

MaintenanceRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Maintenance';
    });
});

RepairRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Maintenance?FilterValue=repair';
    });
});

AccidentRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Maintenance?FilterValue=accident';
    });
});

RefuelingRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Refueling';
    });
}); 

DepositsRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Deposits';
    });
});

DepositsRouteEditButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Management/Fleet/Deposits/Entries';
        
        if (window.location.href === '/Management/Fleet/Deposits/Entries') {
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

DailyChecklistRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Cars/Inspections/Daily/Checklist';
    });
}); 

InspectionFormButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.open('/Cars/Inspections/Report/Form');
    });
}); 

ActiveCarsRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        if (
            window.location.pathname == '/Cars' ||
            window.location.pathname == '/Cars/Inspections/Daily/Checklist' ||
            window.location.pathname == '/Management/Fleet/Deposits/Entries' ||
            window.location.pathname == '/Users' ||
            window.location.pathname == '/Deposits'
        ) {
            window.location = '/Cars?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Inspections/Report') {
            window.location = '/Cars/Inspections/Report?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Inspections/General/Report') {
            window.location = '/Cars/Inspections/General/Report?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Documents') {
            window.location = '/Cars/Documents?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Registration') {
            window.location = '/Cars/Registration?FilterValue=active';
        }
        if (window.location.pathname == '/Edit/Maintenance') {
            window.location = '/Edit/Maintenance?FilterValue=active';
        }
        if (window.location.pathname == '/Edit/Refueling') {
            window.location = '/Edit/Refueling?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Report') {
            window.location = '/Cars/Report?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Owners') {
            window.location = '/Cars/Owners?FilterValue=active';
        }
        if (window.location.pathname == '/Cars/Drivers') {
            window.location = '/Cars/Drivers?FilterValue=active';
        }
        if (window.location.pathname == '/Management/Fleet/Cards') {
            window.location = '/Management/Fleet/Cards?FilterValue=active';
        }
        if (window.location.pathname == '/Maintenance') {
            window.location = '/Maintenance?FilterValue=active';
        }
        if (window.location.pathname == '/Refueling') {
            window.location = '/Refueling?FilterValue=active';
        }
    });
}); 

InactiveCarsRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        if (
            window.location.pathname == '/Cars' ||
            window.location.pathname == '/Cars/Inspections/Daily/Checklist' ||
            window.location.pathname == '/Management/Fleet/Deposits/Entries' ||
            window.location.pathname == '/Users' ||
            window.location.pathname == '/Deposits'
        ) {
            window.location = '/Cars?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Inspections/Report') {
            window.location = '/Cars/Inspections/Report?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Inspections/General/Report') {
            window.location = '/Cars/Inspections/General/Report?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Documents') {
            window.location = '/Cars/Documents?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Registration') {
            window.location = '/Cars/Registration?FilterValue=inactive';
        }
        if (window.location.pathname == '/Edit/Maintenance') {
            window.location = '/Edit/Maintenance?FilterValue=inactive';
        }
        if (window.location.pathname == '/Edit/Refueling') {
            window.location = '/Edit/Refueling?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Report') {
            window.location = '/Cars/Report?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Owners') {
            window.location = '/Cars/Owners?FilterValue=inactive';
        }
        if (window.location.pathname == '/Cars/Drivers') {
            window.location = '/Cars/Drivers?FilterValue=inactive';
        }
        if (window.location.pathname == '/Management/Fleet/Cards') {
            window.location = '/Management/Fleet/Cards?FilterValue=inactive';
        }
        if (window.location.pathname == '/Maintenance') {
            window.location = '/Maintenance?FilterValue=inactive';
        }
        if (window.location.pathname == '/Refueling') {
            window.location = '/Refueling?FilterValue=inactive';
        }
    });
}); 

DriversRouteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        window.location = '/Cars/Drivers';
    });
}); 

let CarOwnersX = document.querySelectorAll('.car-owners-x');

CarOwnersX.forEach(CarOwner => {
    CarOwner.addEventListener('click', () => { 
        window.location = '/Cars/Owners?FilterValue=' + CarOwner.textContent;
    });
}); 

let DriversX = document.querySelectorAll('.drivers-x');

DriversX.forEach(Driver => {
    Driver.addEventListener('click', (e) => { 
        e.stopPropagation();
        window.location = '/Cars/Drivers?FilterValue=' + Driver.textContent;
    });
}); 

let MakeX = document.querySelectorAll('.make-x');

MakeX.forEach(Make => {
    Make.addEventListener('click', (e) => { 
        e.stopPropagation();
        window.location = '/Cars/Report?FilterValue=' + Make.textContent;
    });
}); 

let ModelsX = document.querySelectorAll('.models-x');

ModelsX.forEach(Model => {
    Model.addEventListener('click', (e) => { 
        e.stopPropagation();
        window.location = '/Cars/Report?FilterValue=' + Model.textContent;
    });
}); 

let CardNumbersX = document.querySelectorAll('.card-numbers-x');

CardNumbersX.forEach(CardNumbers => {
    CardNumbers.addEventListener('click', (e) => { 
        e.stopPropagation();
        window.location = '/Deposits?FilterValue=' + CardNumbers.textContent;
    });
}); 

let DepositsX = document.querySelectorAll('.deposits-x');

DepositsX.forEach(Deposit => {
    Deposit.addEventListener('click', (e) => { 
        e.stopPropagation();
        window.location = '/Deposits?FilterValue=' + Deposit.nextElementSibling.textContent;
    });
}); 

let RefuelingsX = document.querySelectorAll('.refuelings-x');

RefuelingsX.forEach(Refueling => {
    Refueling.addEventListener('click', (e) => { 
        e.stopPropagation();
        window.location = '/Refueling?FilterValue=' + Refueling.nextElementSibling.textContent;
    });
}); 

let GearTypeX = document.querySelectorAll('.gear-type-x');

GearTypeX.forEach(GearType => {
    GearType.addEventListener('click', () => { 
        window.location = '/Cars/Report?FilterValue=' + GearType.textContent;
    });
}); 

let MaintenanceX = document.querySelectorAll('.maintenance-x');

MaintenanceX.forEach(Maintenance => {
    Maintenance.addEventListener('click', () => { 
        window.location = '/Maintenance?FilterValue=' + Maintenance.textContent.trim();
    });
}); 

let MaintenanceX2 = document.querySelectorAll('.maintenance-x-2');

MaintenanceX2.forEach(Maintenance => {
    Maintenance.addEventListener('click', () => { 
        window.location = '/Maintenance?FilterValue=' + Maintenance.nextElementSibling.textContent.trim();
    });
}); 

let TodayHistory = document.querySelectorAll('.Today');
let ThisWeekHistory = document.querySelectorAll('.ThisWeek');
let OneWeekAgoHistory = document.querySelectorAll('.OneWeekAgo');
let TwoWeeksAgoHistory = document.querySelectorAll('.TwoWeeksAgo');
let ThreeWeeksAgoHistory = document.querySelectorAll('.ThreeWeeksAgo');
let OneMonthAgoHistory = document.querySelectorAll('.OneMonthAgo');
let TwoMonthsAgoHistory = document.querySelectorAll('.TwoMonthsAgo');
let Older = document.querySelectorAll('.Older');

let DistanceTraveled_Today = document.querySelectorAll('.DistanceTraveled_Today');
let Cost_Today = document.querySelectorAll('.Cost_Today');
let Quantity_Today = document.querySelectorAll('.Quantity_Today');
let FuelConsumption_Today = document.querySelectorAll('.FuelConsumption_Today');

let DistanceTraveled_ThisWeek = document.querySelectorAll('.DistanceTraveled_ThisWeek');
let Cost_ThisWeek = document.querySelectorAll('.Cost_ThisWeek');
let Quantity_ThisWeek = document.querySelectorAll('.Quantity_ThisWeek');
let FuelConsumption_ThisWeek = document.querySelectorAll('.FuelConsumption_ThisWeek');

let DistanceTraveled_LastWeek = document.querySelectorAll('.DistanceTraveled_LastWeek');
let Cost_LastWeek = document.querySelectorAll('.Cost_LastWeek');
let Quantity_LastWeek = document.querySelectorAll('.Quantity_LastWeek');
let FuelConsumption_LastWeek = document.querySelectorAll('.FuelConsumption_LastWeek');

let DistanceTraveled_TwoWeeksAgo = document.querySelectorAll('.DistanceTraveled_TwoWeeksAgo');
let Cost_TwoWeeksAgo = document.querySelectorAll('.Cost_TwoWeeksAgo');
let Quantity_TwoWeeksAgo = document.querySelectorAll('.Quantity_TwoWeeksAgo');
let FuelConsumption_TwoWeeksAgo = document.querySelectorAll('.FuelConsumption_TwoWeeksAgo');

let DistanceTraveled_ThreeWeeksAgo = document.querySelectorAll('.DistanceTraveled_ThreeWeeksAgo');
let Cost_ThreeWeeksAgo = document.querySelectorAll('.Cost_ThreeWeeksAgo');
let Quantity_ThreeWeeksAgo = document.querySelectorAll('.Quantity_ThreeWeeksAgo');
let FuelConsumption_ThreeWeeksAgo = document.querySelectorAll('.FuelConsumption_ThreeWeeksAgo');

let DistanceTraveled_OneMonthAgo = document.querySelectorAll('.DistanceTraveled_OneMonthAgo');
let Cost_OneMonthAgo = document.querySelectorAll('.Cost_OneMonthAgo');
let Quantity_OneMonthAgo = document.querySelectorAll('.Quantity_OneMonthAgo');
let FuelConsumption_OneMonthAgo = document.querySelectorAll('.FuelConsumption_OneMonthAgo');

let DistanceTraveled_TwoMonthsAgo = document.querySelectorAll('.DistanceTraveled_TwoMonthsAgo');
let Cost_TwoMonthsAgo = document.querySelectorAll('.Cost_TwoMonthsAgo');
let Quantity_TwoMonthsAgo = document.querySelectorAll('.Quantity_TwoMonthsAgo');
let FuelConsumption_TwoMonthsAgo = document.querySelectorAll('.FuelConsumption_TwoMonthsAgo');

let DistanceTraveled_Older = document.querySelectorAll('.DistanceTraveled_Older');
let Cost_Older = document.querySelectorAll('.Cost_Older');
let Quantity_Older = document.querySelectorAll('.Quantity_Older');
let FuelConsumption_Older = document.querySelectorAll('.FuelConsumption_Older');

let HistoryArr = [
    TodayHistory,
    ThisWeekHistory,
    OneWeekAgoHistory,
    TwoWeeksAgoHistory,
    ThreeWeeksAgoHistory,
    OneMonthAgoHistory,
    TwoMonthsAgoHistory,
    Older,
    DistanceTraveled_Today,
    Cost_Today,
    Quantity_Today,
    FuelConsumption_Today, 
    DistanceTraveled_ThisWeek,
    Cost_ThisWeek,
    Quantity_ThisWeek,
    FuelConsumption_ThisWeek, 
    DistanceTraveled_LastWeek,
    Cost_LastWeek,
    Quantity_LastWeek,
    FuelConsumption_LastWeek, 
    DistanceTraveled_TwoWeeksAgo,
    Cost_TwoWeeksAgo,
    Quantity_TwoWeeksAgo,
    FuelConsumption_TwoWeeksAgo, 
    DistanceTraveled_ThreeWeeksAgo,
    Cost_ThreeWeeksAgo,
    Quantity_ThreeWeeksAgo,
    FuelConsumption_ThreeWeeksAgo, 
    DistanceTraveled_OneMonthAgo,
    Cost_OneMonthAgo,
    Quantity_OneMonthAgo,
    FuelConsumption_OneMonthAgo, 
    DistanceTraveled_TwoMonthsAgo,
    Cost_TwoMonthsAgo,
    Quantity_TwoMonthsAgo,
    FuelConsumption_TwoMonthsAgo, 
    DistanceTraveled_Older,
    Cost_Older,
    Quantity_Older,
    FuelConsumption_Older, 
];
 
HistoryArr.forEach(History => {
    if (History[0] !== undefined) {
        History[0].classList.remove('Hide'); 
        History[0].style.display = 'inline-block !important';
    }
});