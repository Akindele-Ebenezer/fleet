let RepairModal_Edit = document.querySelector('.edit-repair-form');
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit');

let VehicleNumber_X_DATA_Edit = document.querySelector('.VehicleNumber_X_DATA_Edit');
let Date_X_DATA_Edit = document.querySelector('.Date_X_DATA_Edit');
let Time_X_DATA_Edit = document.querySelector('.Time_X_DATA_Edit');
let RepairAction_X_DATA_Edit = document.querySelector('.RepairAction_X_DATA_Edit');
let ReleaseDate_X_DATA_Edit = document.querySelector('.ReleaseDate_X_DATA_Edit');
let ReleaseTime_X_DATA_Edit = document.querySelector('.ReleaseTime_X_DATA_Edit');
let Cost_X_DATA_Edit = document.querySelector('.Cost_X_DATA_Edit');
let InvoiceNumber_X_DATA_Edit = document.querySelector('.InvoiceNumber_X_DATA_Edit');
let Week_X_DATA_Edit = document.querySelector('.Week_X_DATA_Edit');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let Time_X = document.querySelector('.Time_X');
let RepairAction_X = document.querySelector('.RepairAction_X');
let ReleaseDate_X = document.querySelector('.ReleaseDate_X');
let ReleaseTime_X = document.querySelector('.ReleaseTime_X');
let Cost_X = document.querySelector('.Cost_X');
let InvoiceNumber_X = document.querySelector('.InvoiceNumber_X');
let Week_X = document.querySelector('.Week_X');
let RepairId_X = document.querySelector('.RepairId_X');


let EditRepairButton = document.querySelector('.EditRepair');
let DeleteRepairButton = document.querySelector('.DeleteRepair');
let EditRepairForm = document.querySelector('.EditRepairForm');

ShowRecord_X_Edit.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        RepairModal_Edit.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        Time_X.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        RepairAction_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseDate_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        ReleaseTime_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Cost_X.value = BigInt(VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        InvoiceNumber_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        RepairId_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
 
        EditRepairButton.addEventListener('click', () => {
            EditRepairForm.setAttribute('action', '/Update/' + RepairId_X.value);
            EditRepairForm.submit();
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            RepairModal_Edit.style.display = 'none';
        });
    });
});

let ModalAddRepair = document.querySelector('.add-repair-form');
let AddRepairButton = document.querySelectorAll('.add-repair'); 

let AddRepairForm = document.querySelector('.AddRepairForm');
let AddRepairButton_X = document.querySelector('.AddRepair');
let VehicleNumber_REPAIR = document.querySelector('input[name="VehicleNumber_REPAIR"]');

AddRepairButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddRepair.style.display = 'block';
         
        AddRepairButton_X.addEventListener('click', () => {  
            AddRepairForm.setAttribute('action', '/Add/' + VehicleNumber_REPAIR.value);
            AddRepairForm.submit();
        });
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddRepair.style.display = 'none';
        });
    });

});
