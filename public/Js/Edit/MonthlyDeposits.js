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
let ReverseDepositsButton = document.querySelector('.ReverseDeposits');
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
 
        ReverseDepositsButton.addEventListener('click', () => {
            window.location = '/Reverse/Deposits/' + DepositsId_X.value + '/' + CardNumber.value + '/' + Amount_X.value;  
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
    Button.classList.remove('permission-denied');
    Button.addEventListener('click', () => {
        ModalAddMonthlyDeposits.style.display = 'block';
         
        AddDepositsButton_X.addEventListener('click', () => {  
            if (AddDepositsForm.children[1].children[1].value === '') {
                Error.textContent = 'Please fill out vehicle number for new Deposits';
            } else {
                Error.style.backgroundColor = '#21a911';
                Error.textContent = 'Processing transaction.. Please wait!';
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

let AddMasterCardDepositsForm = document.querySelector('.AddMasterCardDepositsForm');
let AddMasterCardDepositsButton_X = document.querySelector('.AddMasterCardDeposits');
let CardNumber_MasterCard_DEPOSITS = document.querySelector('.CardNumber_MasterCard_DEPOSITS'); 

let MasterCardMonthlyDepositsModal_Edit = document.querySelector('.edit-master-card-deposits-form');
let EditMasterCardDepositsForm = document.querySelector('.EditMasterCardDepositsForm');
let ShowMasterCardRecord_X_Edit = document.querySelectorAll('.show-master-card-record-x-edit');
let EditMasterCardDepositsButton = document.querySelector('.EditMasterCardDeposits');
let ReverseMasterCardDepositsButton = document.querySelector('.ReverseMasterCardDeposits');

let Date_MasterCard_X = document.querySelector('.Date_MasterCard_X');
let CardNumber_MasterCard_X = document.querySelector('.CardNumber_MasterCard_X');
let  Amount_MasterCard_X = document.querySelector('.Amount_MasterCard_X');
let Year_MasterCard_X = document.querySelector('.Year_MasterCard_X'); 
let Week_MasterCard_X = document.querySelector('.Week_MasterCard_X');
let Month_MasterCard_X = document.querySelector('.Month_MasterCard_X');
let DepositsId_MasterCard_X = document.querySelector('.DepositsId_MasterCard_X');

AddMasterCardDepositsButton_X.addEventListener('click', () => {  
    if (AddMasterCardDepositsForm.children[1].children[1].value === '') {
        Error.textContent = 'Please fill out card number for Master Card Deposits';
    } else {
        Error.style.backgroundColor = '#21a911';
        Error.textContent = 'Processing transaction.. Please wait!';
        AddMasterCardDepositsForm.setAttribute('action', '/Add/Deposits/Master/Cards/' + CardNumber_MasterCard_DEPOSITS.value);
        AddMasterCardDepositsForm.submit();
    }   
});
    
ShowMasterCardRecord_X_Edit.forEach(CardNumber => {
    CardNumber.addEventListener('click', () => { 
        MasterCardMonthlyDepositsModal_Edit.style.display = 'block';
 
        CardNumber_MasterCard_X.value = CardNumber.nextElementSibling.nextElementSibling.textContent;
        Date_MasterCard_X.value = CardNumber.nextElementSibling.textContent; 
        Amount_MasterCard_X.value = BigInt(CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        Year_MasterCard_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_MasterCard_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_MasterCard_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        DepositsId_MasterCard_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
 
        EditMasterCardDepositsButton.addEventListener('click', () => {
            EditMasterCardDepositsForm.setAttribute('action', '/Update/Deposits/Master/Cards/' + DepositsId_MasterCard_X.value);
            EditMasterCardDepositsForm.submit();
        });
 
        ReverseMasterCardDepositsButton.addEventListener('click', () => {
            window.location = '/Reverse/Deposits/Master/Cards/' + DepositsId_MasterCard_X.value + '/' + CardNumber_MasterCard_X.value + '/' + Amount_MasterCard_X.value;  
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MasterCardMonthlyDepositsModal_Edit.style.display = 'none';
        });
    });
});
