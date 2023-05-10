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
let DepositsId_X = document.querySelector('.DepositsId_X');

let EditDepositsButton = document.querySelector('.EditDeposits');
let DeleteDepositsButton = document.querySelector('.DeleteDeposits');
let EditDepositsForm = document.querySelector('.EditDepositsForm');

let Error = document.querySelector('.error');

ShowRecord_X_Edit.forEach(VehicleNumber => {
    VehicleNumber.addEventListener('click', () => {
        MonthlyDepositsModal_Edit.style.display = 'block';

        VehicleNumber_X.value = VehicleNumber.textContent;
        Date_X.value = VehicleNumber.nextElementSibling.textContent;
        CardNumber.value = VehicleNumber.nextElementSibling.nextElementSibling.textContent;
        Amount_X.value = BigInt(VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        Year_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        DepositsId_X.value = VehicleNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
 
        EditDepositsButton.addEventListener('click', () => {
            EditDepositsForm.setAttribute('action', '/Update/Deposits/' + DepositsId_X.value);
            EditDepositsForm.submit();
        });
 
        DeleteDepositsButton.addEventListener('click', () => {
            window.location = '/Delete/Deposits/' + DepositsId_X.value;  
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MonthlyDepositsModal_Edit.style.display = 'none';
        });
    });
});

let ModalAddMonthlyDeposits = document.querySelector('.add-monthly-deposits-form');
let AddMonthlyDepositsButton = document.querySelectorAll('.add-monthly-deposits'); 

let AddDepositsForm = document.querySelector('.AddDepositsForm');
let AddDepositsButton_X = document.querySelector('.AddDeposits');
let VehicleNumber_DEPOSITS = document.querySelector('input[name="VehicleNumber_DEPOSITS"]');

AddMonthlyDepositsButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddMonthlyDeposits.style.display = 'block';
         
        AddDepositsButton_X.addEventListener('click', () => {  
            if (AddDepositsForm.children[1].lastElementChild.value === '') {
                Error.textContent = 'Please fill out vehicle number for new Deposits';
            } else {
                AddDepositsForm.setAttribute('action', '/Add/Deposits/' + VehicleNumber_DEPOSITS.value);
                AddDepositsForm.submit();
            }   
        });
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddMonthlyDeposits.style.display = 'none';
        });
    });
});
