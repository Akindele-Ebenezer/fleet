let MaintenanceModal = document.querySelector('.maintenance-readonly');
let ShowRecord_X = document.querySelectorAll('.show-record-x');
let VehicleNumber_X_DATA = document.querySelector('.VehicleNumber_X_DATA');
let Date_X_DATA = document.querySelector('.Date_X_DATA');
let Time_X_DATA = document.querySelector('.Time_X_DATA');
let IncidentAction_X_DATA = document.querySelector('.IncidentAction_X_DATA');
let ReleaseDate_X_DATA = document.querySelector('.ReleaseDate_X_DATA');
let ReleaseTime_X_DATA = document.querySelector('.ReleaseTime_X_DATA');
let Cost_X_DATA = document.querySelector('.Cost_X_DATA');
let InvoiceNumber_X_DATA = document.querySelector('.InvoiceNumber_X_DATA');
let Week_X_DATA = document.querySelector('.Week_X_DATA');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let Time_X = document.querySelector('.Time_X');
let IncidentType_X = document.querySelector('.IncidentType_X');
let IncidentAction_X = document.querySelector('.IncidentAction_X');
let ReleaseDate_X = document.querySelector('.ReleaseDate_X');
let ReleaseTime_X = document.querySelector('.ReleaseTime_X');
let Cost_X = document.querySelector('.Cost_X');
let InvoiceNumber_X = document.querySelector('.InvoiceNumber_X');
let Week_X = document.querySelector('.Week_X');
let IncidentAttachment_FILE = document.querySelector('.IncidentAttachment_FILE');
let IncidentAttachment_Link = document.querySelector('.IncidentAttachment_Link');
let IncidentAttachment_X = document.querySelector('.IncidentAttachment_X');

ShowRecord_X.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MaintenanceModal.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        IncidentType_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent.trim();
        IncidentAction_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseDate_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseTime_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Cost_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        InvoiceNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        
        if (
            VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent === ""
        ) {
            IncidentAttachment_Link.setAttribute('href', '/Images/no-attachment.png');
            IncidentAttachment_X.setAttribute('src', '/Images/no-attachment.png');
        } else {
            IncidentAttachment_Link.setAttribute('href', '/Images/Maintenance/' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
                
            IncidentAttachment_X.setAttribute('src', '/Images/Maintenance/' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        }

        IncidentAttachment_FILE.textContent = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MaintenanceModal.style.display = 'none';
        });
    });
    
    let PrintMaintenanceButton = document.querySelector('.PrintMaintenance');

    PrintMaintenanceButton.addEventListener('click', () => {
        window.open('/Cars/Maintenance/Report/' + VehicleNumber_X.value + '?Date=' + Date_X.value + '&Time=' + Time_X.value + '&IncidentAction=' + IncidentAction_X.value + '&ReleaseDate=' + ReleaseDate_X.value + '&ReleaseTime=' + ReleaseTime_X.value + '&Cost=' + Cost_X.value + '&InvoiceNo=' + InvoiceNumber_X.value + '&Week=' + Week_X.value, '_blank');
    });
});
