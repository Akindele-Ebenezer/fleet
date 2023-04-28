let MonthlyDepositsModal = document.querySelector('.monthly-deposits-readonly');
let ShowRecord_X = document.querySelectorAll('.show-record-x');

let VehicleNumber_X_DATA = document.querySelector('.VehicleNumber_X_DATA');
let Date_X_DATA = document.querySelector('.Date_X_DATA');
let CardNumber_DATA = document.querySelector('.CardNumber_X_DATA');
let  Amount_X_DATA = document.querySelector('.Amount_X_DATA');
let Year_X_DATA = document.querySelector('.Year_X_DATA'); 
let Week_X_DATA = document.querySelector('.Week_X_DATA');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let CardNumber = document.querySelector('.CardNumber_X');
let  Amount_X = document.querySelector('.Amount_X');
let Year_X = document.querySelector('.Year_X'); 
let Week_X = document.querySelector('.Week_X');
let Month_X = document.querySelector('.Month_X');

ShowRecord_X.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MonthlyDepositsModal.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        CardNumber.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        Amount_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Year_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MonthlyDepositsModal.style.display = 'none';
        });
    });
    
    let PrintDepositButton = document.querySelector('.PrintDeposit');

    PrintDepositButton.addEventListener('click', () => {
        window.open('/Cars/Deposits/Report/' + VehicleNumber_X.value + '?Date=' + Date_X.value + '&CardNumber=' + CardNumber.value + '&Amount=' + Amount_X.value + '&Year=' + Year_X.value + '&Week=' + Week_X.value + '&Month=' + Month_X.value, '_blank');
    });
});
