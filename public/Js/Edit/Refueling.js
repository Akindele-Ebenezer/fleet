let RefuelingModal_Edit = document.querySelector('.edit-refueling-form');
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit');

let VehicleNumber_X_DATA_Edit = document.querySelector('.VehicleNumber_X_DATA_Edit');
let Date_X_DATA_Edit = document.querySelector('.Date_X_DATA_Edit');
let Time_X_DATA_Edit = document.querySelector('.Time_X_DATA_Edit');
let Mileage_X_DATA_Edit = document.querySelector('.Mileage_X_DATA_Edit');
let TerminalNo_X_DATA_Edit = document.querySelector('.TerminalNo_X_DATA_Edit');
let CardNumber_X_DATA_Edit = document.querySelector('.CardNumber_X_DATA_Edit');
let Quantity_X_DATA_Edit = document.querySelector('.Quantity_X_DATA_Edit');
let Amount_X_DATA_Edit = document.querySelector('.Amount_X_DATA_Edit');
let ReceiptNo_X_DATA_Edit = document.querySelector('.ReceiptNo_X_DATA_Edit');
let KMLITER_X_DATA_Edit = document.querySelector('.KMLITER_X_DATA_Edit');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let Time_X = document.querySelector('.Time_X'); 
let TerminalNo_X = document.querySelector('.TerminalNo_X');
let CardNumber_X = document.querySelector('.CardNumber_X');
let Quantity_X = document.querySelector('.Quantity_X');
let Amount_X = document.querySelector('.Amount_X');
let ReceiptNo_X = document.querySelector('.ReceiptNo_X');
let KMLITER_X = document.querySelector('.KMLITER_X');
let RefuelingId_X = document.querySelector('.RefuelingId_X');

let EditRefuelingButton = document.querySelector('.EditRefueling');
let DeleteRefuelingButton = document.querySelector('.DeleteRefueling');
let ReverseRefuelingButton = document.querySelector('.ReverseRefueling');
let EditRefuelingForm = document.querySelector('.EditRefuelingForm');

let Error = document.querySelector('.error');


ShowRecord_X_Edit.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        RefuelingModal_Edit.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        Mileage_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        TerminalNo_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        CardNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Quantity_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Amount_X.value = BigInt(VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        ReceiptNo_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        RefuelingId_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        EditRefuelingButton.addEventListener('click', () => {
            EditRefuelingForm.setAttribute('action', '/Update/Refueling/' + RefuelingId_X.value);
            EditRefuelingForm.submit();
        });
 
        DeleteRefuelingButton.addEventListener('click', () => {
            window.location = '/Delete/Refueling/' + RefuelingId_X.value;   
        });
 
        ReverseRefuelingButton.addEventListener('click', () => {
            window.location = '/Reverse/Refueling/' + CardNumber_X.value + '/' + Amount_X.value + '/' + RefuelingId_X.value;   
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            RefuelingModal_Edit.style.display = 'none';
        });
    });
});

let ModalAddRefueling = document.querySelector('.add-refueling-form');
let AddRefuelingButton = document.querySelectorAll('.add-refueling'); 

let AddRefuelingForm = document.querySelector('.AddRefuelingForm');
let AddRefuelingButton_X = document.querySelector('.AddRefueling');
let VehicleNumber_REFUELING = document.querySelector('input[name="VehicleNumber_REFUELING"]');
AddRefuelingButton.forEach(Button => {
    Button.classList.remove('permission-denied');
    Button.addEventListener('click', () => {
        ModalAddRefueling.style.display = 'block';
         
        AddRefuelingButton_X.addEventListener('click', () => {  
            if (AddRefuelingForm.children[1].children[1].value === '') {
                Error.textContent = 'Please fill out vehicle number for new Refueling';
            } else {
                AddRefuelingForm.setAttribute('action', '/Add/Refueling/' + VehicleNumber_REFUELING.value);
                AddRefuelingForm.submit();
            }    
        });
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddRefueling.style.display = 'none';
        });
    });
});

let AlertComponent = document.querySelector('.alert');
let PermissionDeniedButton = document.querySelectorAll('.permission-denied');

PermissionDeniedButton.forEach(Button => {
    Button.addEventListener('click', () => {
        AlertComponent.style.display = 'flex';
        setTimeout(() => {
            AlertComponent.style.display = 'none';
        }, 5000);
    });
});
