let MonthlyDepositsModal_Edit = document.querySelector('.edit-monthly-deposits-form');
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit');

let VehicleNumber_X_DATA_Edit = document.querySelector('.VehicleNumber_X_DATA_Edit');
let Date_X_DATA_Edit = document.querySelector('.Date_X_DATA_Edit');
let CardNumber_DATA_Edit = document.querySelector('.CardNumber_X_DATA_Edit');
let  Amount_X_DATA_Edit = document.querySelector('.Amount_X_DATA_Edit');
let Year_X_DATA_Edit = document.querySelector('.Year_X_DATA_Edit'); 
let Week_X_DATA_Edit = document.querySelector('.Week_X_DATA_Edit');

let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let Date_X = document.querySelector('.Date_X');
let CardNumber = document.querySelector('.CardNumber_X');
let  Amount_X = document.querySelector('.Amount_X');
let Year_X = document.querySelector('.Year_X'); 
let Week_X = document.querySelector('.Week_X');
let Month_X = document.querySelector('.Month_X');

ShowRecord_X_Edit.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MonthlyDepositsModal_Edit.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        CardNumber.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        Amount_X.value = '₦ ' + VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Year_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MonthlyDepositsModal_Edit.style.display = 'none';
        });
    });
});

let ModalAddMonthlyDeposits = document.querySelector('.add-monthly-deposits-form');
let AddMonthlyDepositsButton = document.querySelectorAll('.add-monthly-deposits'); 

AddMonthlyDepositsButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddMonthlyDeposits.style.display = 'block';
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddMonthlyDeposits.style.display = 'none';
        });
    });
});
