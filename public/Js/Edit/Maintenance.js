let MaintenanceModal_Edit = document.querySelector('.edit-maintenance-form');
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit'); 
let VehicleNumber_X_DATA_Edit = document.querySelector('.VehicleNumber_X_DATA_Edit');
let Date_X_DATA_Edit = document.querySelector('.Date_X_DATA_Edit');
let Time_X_DATA_Edit = document.querySelector('.Time_X_DATA_Edit');
let IncidentAction_X_DATA_Edit = document.querySelector('.IncidentAction_X_DATA_Edit');
let ReleaseDate_X_DATA_Edit = document.querySelector('.ReleaseDate_X_DATA_Edit');
let ReleaseTime_X_DATA_Edit = document.querySelector('.ReleaseTime_X_DATA_Edit');
let Cost_X_DATA_Edit = document.querySelector('.Cost_X_DATA_Edit');
let InvoiceNumber_X_DATA_Edit = document.querySelector('.InvoiceNumber_X_DATA_Edit');
let Week_X_DATA_Edit = document.querySelector('.Week_X_DATA_Edit');

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
let MaintenanceId_X = document.querySelector('.MaintenanceId_X');
let IncidentAttachment_X = document.querySelector('.IncidentAttachment_X');
let IncidentAttachment_FILE = document.querySelector('.IncidentAttachment_FILE');
let IncidentAttachment_Link = document.querySelector('.IncidentAttachment_Link');

let EditMaintenanceButton = document.querySelector('.EditMaintenance');
let DeleteMaintenanceButton = document.querySelector('.DeleteMaintenance');
let EditMaintenanceForm = document.querySelector('.EditMaintenanceForm');

let Error = document.querySelector('.error');

ShowRecord_X_Edit.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MaintenanceModal_Edit.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        IncidentType_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent.trim();
        IncidentAction_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseDate_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseTime_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Cost_X.value = BigInt(VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        InvoiceNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        MaintenanceId_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        
        if (
            VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent === ""
        ) {
            IncidentAttachment_Link.setAttribute('href', '/Images/no-attachment.png');
            IncidentAttachment_X.setAttribute('src', '/Images/no-attachment.png');
        } else {
            IncidentAttachment_Link.setAttribute('href', '/Images/Maintenance/' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
                
            IncidentAttachment_X.setAttribute('src', '/Images/Maintenance/' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        }
 
        IncidentAttachment_FILE.textContent = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        EditMaintenanceButton.addEventListener('click', () => {
            EditMaintenanceButton.style.backgroundColor = '#21a911';
            EditMaintenanceButton.textContent = '+ Updating..';
            EditMaintenanceForm.setAttribute('action', '/Update/Maintenance/' + MaintenanceId_X.value);
            EditMaintenanceForm.setAttribute('enctype', 'multipart/form-data'); 
            EditMaintenanceForm.setAttribute('method', 'POST'); 
            EditMaintenanceForm.submit();
        });
 
        DeleteMaintenanceButton.addEventListener('click', () => {
            DeleteMaintenanceButton.style.backgroundColor = '#DF2E38';
            DeleteMaintenanceButton.textContent = '+ Deleting..';
            window.location = '/Delete/Maintenance/' + MaintenanceId_X.value; 
        });
    });
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MaintenanceModal_Edit.style.display = 'none';
        });
    });
});

let ModalAddMaintenance = document.querySelector('.add-maintenance-form');
let AddMaintenanceButton = document.querySelectorAll('.add-maintenance'); 

let AddMaintenanceForm = document.querySelector('.AddMaintenanceForm');
let AddMaintenanceButton_X = document.querySelector('.AddMaintenance');
let VehicleNumber_MAINTENANCE = document.querySelector('input[name="VehicleNumber_MAINTENANCE"]');

AddMaintenanceButton.forEach(Button => {
    Button.classList.remove('permission-denied');
    Button.addEventListener('click', () => {
        ModalAddMaintenance.style.display = 'block';
         
        AddMaintenanceButton_X.addEventListener('click', () => {   
            if (AddMaintenanceForm.children[2].children[1].value === '') {
                Error.textContent = 'Please fill out vehicle number for new Maintenance';
            } else {
                Error.style.backgroundColor = '#21a911';
                AddMaintenanceButton_X.style.backgroundColor = '#DF2E38';
                Error.textContent = 'Processing maintenance.. Please wait!';
                AddMaintenanceButton_X.textContent = '+ Processing..';
                AddMaintenanceForm.setAttribute('action', '/Add/Maintenance/' + VehicleNumber_MAINTENANCE.value); 
                AddMaintenanceForm.setAttribute('enctype', 'multipart/form-data'); 
                AddMaintenanceForm.setAttribute('method', 'POST'); 
                AddMaintenanceForm.submit(); 
            }  
        });
    }); 
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddMaintenance.style.display = 'none';
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