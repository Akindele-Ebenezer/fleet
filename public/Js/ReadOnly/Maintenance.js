let MaintenanceModal = document.querySelector('.maintenance-readonly');
let ShowRecord_X = document.querySelectorAll('.show-record-x');
let VehicleNumber_X_DATA = document.querySelector('.VehicleNumber_X_DATA');
let Date_X_DATA = document.querySelector('.Date_X_DATA');
let Time_X_DATA = document.querySelector('.Time_X_DATA');
let MaintenanceAction_X_DATA = document.querySelector('.MaintenanceAction_X_DATA');
let ReleaseDate_X_DATA = document.querySelector('.ReleaseDate_X_DATA');
let ReleaseTime_X_DATA = document.querySelector('.ReleaseTime_X_DATA');
let Cost_X_DATA = document.querySelector('.Cost_X_DATA');
let InvoiceNumber_X_DATA = document.querySelector('.InvoiceNumber_X_DATA');
let Week_X_DATA = document.querySelector('.Week_X_DATA');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let Time_X = document.querySelector('.Time_X');
let MaintenanceAction_X = document.querySelector('.MaintenanceAction_X');
let ReleaseDate_X = document.querySelector('.ReleaseDate_X');
let ReleaseTime_X = document.querySelector('.ReleaseTime_X');
let Cost_X = document.querySelector('.Cost_X');
let InvoiceNumber_X = document.querySelector('.InvoiceNumber_X');
let Week_X = document.querySelector('.Week_X');

ShowRecord_X.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MaintenanceModal.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        console.log(VehicleNumber_X)
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        MaintenanceAction_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseDate_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseTime_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Cost_X.value = '₦ ' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        InvoiceNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MaintenanceModal.style.display = 'none';
        });
    });
});
