let MonthlyDepositsModal_Edit = document.querySelector('.edit-monthly-deposits-form');
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit');

let VehicleNumber_X_DATA_Edit = document.querySelector('.VehicleNumber_X_DATA_Edit');
let Date_X_DATA_Edit = document.querySelector('.Date_X_DATA_Edit');
let Time_X_DATA_Edit = document.querySelector('.Time_X_DATA_Edit');
let MonthlyDepositsAction_X_DATA_Edit = document.querySelector('.MonthlyDepositsAction_X_DATA_Edit');
let ReleaseDate_X_DATA_Edit = document.querySelector('.ReleaseDate_X_DATA_Edit');
let ReleaseTime_X_DATA_Edit = document.querySelector('.ReleaseTime_X_DATA_Edit');
let Cost_X_DATA_Edit = document.querySelector('.Cost_X_DATA_Edit');
let InvoiceNumber_X_DATA_Edit = document.querySelector('.InvoiceNumber_X_DATA_Edit');
let Week_X_DATA_Edit = document.querySelector('.Week_X_DATA_Edit');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let Time_X = document.querySelector('.Time_X');
let MonthlyDepositsAction_X = document.querySelector('.MonthlyDepositsAction_X');
let ReleaseDate_X = document.querySelector('.ReleaseDate_X');
let ReleaseTime_X = document.querySelector('.ReleaseTime_X');
let Cost_X = document.querySelector('.Cost_X');
let InvoiceNumber_X = document.querySelector('.InvoiceNumber_X');
let Week_X = document.querySelector('.Week_X');

ShowRecord_X_Edit.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MonthlyDepositsModal_Edit.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        MonthlyDepositsAction_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseDate_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseTime_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Cost_X.value = '₦ ' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        InvoiceNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MonthlyDepositsModal_Edit.style.display = 'none';
        });
    });
});
