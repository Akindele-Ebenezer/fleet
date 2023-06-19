let RefuelingModal = document.querySelector('.refueling-readonly');
let ShowRecord_X = document.querySelectorAll('.show-record-x');

let VehicleNumber_X_DATA = document.querySelector('.VehicleNumber_X_DATA');
let Date_X_DATA = document.querySelector('.Date_X_DATA');
let Time_X_DATA = document.querySelector('.Time_X_DATA');
let Mileage_X_DATA = document.querySelector('.Mileage_X_DATA');
let TerminalNo_X_DATA = document.querySelector('.TerminalNo_X_DATA');
let CardNumber_X_DATA = document.querySelector('.CardNumber_X_DATA');
let Quantity_X_DATA = document.querySelector('.Quantity_X_DATA');
let Amount_X_DATA = document.querySelector('.Amount_X_DATA');
let ReceiptNo_X_DATA = document.querySelector('.ReceiptNo_X_DATA');
let KMLITER_X_DATA = document.querySelector('.KMLITER_X_DATA');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let Time_X = document.querySelector('.Time_X'); 
let TerminalNo_X = document.querySelector('.TerminalNo_X');
let CardNumber_X = document.querySelector('.CardNumber_X');
let Quantity_X = document.querySelector('.Quantity_X');
let Amount_X = document.querySelector('.Amount_X');
let ReceiptNo_X = document.querySelector('.ReceiptNo_X'); 
let KMLITER_X = document.querySelector('.KMLITER_X');

ShowRecord_X.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        RefuelingModal.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        Mileage_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        TerminalNo_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        CardNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Quantity_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Amount_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReceiptNo_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            RefuelingModal.style.display = 'none';
        });
    });
    
    let PrintRefuelingButton = document.querySelector('.PrintRefueling');

    PrintRefuelingButton.addEventListener('click', () => {
        window.open('/Cars/Refueling/Report/' + VehicleNumber_X.value + '?Date=' + Date_X.value + '&Time=' + Time_X.value + '&Mileage=' + Mileage_X.value + '&TerminalNo=' + TerminalNo_X.value + '&CardNumber=' + CardNumber_X.value + '&Quantity=' + Quantity_X.value + '&ReceiptNo=' + ReceiptNo_X.value + '&Amount=' + Amount_X.value, '_blank');
    });
});
