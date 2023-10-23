let ModalAddFleetCard = document.querySelector('.add-fleet-card-form');
let AddFleetCardButton = document.querySelectorAll('.add-fleet-card'); 

let AddFleetCardForm = document.querySelector('.AddFleetCardForm');
let AddFleetCardButton_X = document.querySelector('.AddFleetCard');
let Error = document.querySelector('.error');

AddFleetCardButton.forEach(Button => {
    Button.classList.remove('permission-denied');
    Button.addEventListener('click', () => {
        ModalAddFleetCard.style.display = 'block';
         
        AddFleetCardButton_X.addEventListener('click', () => {  
            if (AddFleetCardForm.children[1].children[1].value === '') {
                Error.textContent = 'Please fill out CARD number for new Fleet Card';
            } else {
                let CardNumber_FleetCard = AddFleetCardForm.children[1].children[1].value;
                AddFleetCardForm.setAttribute('action', '/Add/Car/' + CardNumber_FleetCard);
                AddFleetCardForm.submit();
            }   
        });
    }); 
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddFleetCard.style.display = 'none';
        });
    });
});

let FleetCardModal_Edit = document.querySelector('.edit-fleet-card-deposits-form');
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit');
 
let Date_X_DATA_Edit = document.querySelector('.Date_X_DATA_Edit');
let CardNumber_DATA_Edit = document.querySelector('.CardNumber_X_DATA_Edit');
let  Amount_X_DATA_Edit = document.querySelector('.Amount_X_DATA_Edit');
let Year_X_DATA_Edit = document.querySelector('.Year_X_DATA_Edit'); 
let Week_X_DATA_Edit = document.querySelector('.Week_X_DATA_Edit');
 
let CardNumber_X = document.querySelector('.CardNumber_X');
let Date_X = document.querySelector('.Date_X');
let Amount_X = document.querySelector('.Amount_X');
let Year_X = document.querySelector('.Year_X'); 
let Week_X = document.querySelector('.Week_X');
let Month_X = document.querySelector('.Month_X');
let DepositsId_X = document.querySelector('.DepositsId_X');

let EditDepositsButton = document.querySelector('.EditDeposits');
let DeleteDepositsButton = document.querySelector('.DeleteDeposits');
let EditDepositsForm = document.querySelector('.EditDepositsForm');
 
ShowRecord_X_Edit.forEach(CardNumber => {
    CardNumber.addEventListener('click', () => {
        FleetCardModal_Edit.style.display = 'block';

        CardNumber_X.value = CardNumber.textContent;
        Date_X.value = CardNumber.nextElementSibling.textContent; 
        Amount_X.value = BigInt(CardNumber.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        Year_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        DepositsId_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
 
        EditDepositsButton.addEventListener('click', () => {
            EditDepositsButton.style.backgroundColor = '#21a911';
            EditDepositsButton.textContent = '+ Updating..';
            EditDepositsForm.setAttribute('action', '/Update/Deposits/Fleet/Cards/' + DepositsId_X.value);
            EditDepositsForm.submit();
        });
 
        DeleteDepositsButton.addEventListener('click', () => {
            DeleteDepositsButton.style.backgroundColor = '#DF2E38';
            DeleteDepositsButton.textContent = '- Deleting..';
            window.location = '/Delete/Deposits/Fleet/Cards/' + DepositsId_X.value + '/' + CardNumber_X.value + '/' + Amount_X.value;  
        });
    });
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            FleetCardModal_Edit.style.display = 'none';
        });
    });
});  

let ManageButton = document.querySelectorAll('.manage');
let EditFleetCardForm = document.querySelector('.edit-fleet-card-form');
let EditFleetCardForm_X = document.querySelector('.EditFleetCardForm');

let MonthlyBudget_X = document.querySelector('.MonthlyBudget_X');
let FleetCardId_X = document.querySelector('.FleetCardId_X');
let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let CardVendor_X = document.querySelector('.CardVendor_X');
let EditFleetCard = document.querySelector('.EditFleetCard');
let DeleteFleetCard = document.querySelector('.DeleteFleetCard');
 
ManageButton.forEach(Button => {
    Button.classList.remove('permission-denied');
    Button.addEventListener('click', () => {
        EditFleetCardForm.style.display = 'block';

        CardNumber_X.value = Button.nextElementSibling.textContent;
        Date_X.value = Button.nextElementSibling.nextElementSibling.textContent;
        MonthlyBudget_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Balance_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Status_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        FleetCardId_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        VehicleNumber_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        CardVendor_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
    }); 

    EditFleetCard.addEventListener('click', () => {
        EditFleetCard.style.backgroundColor = '#21a911';
        EditFleetCard.textContent = '+ Updating..';
        EditFleetCardForm_X.setAttribute('action', '/Update/Car/' + CardNumber_X.value);
        EditFleetCardForm_X.submit(); 
    });

    DeleteFleetCard.addEventListener('click', () => { 
        DeleteFleetCard.style.backgroundColor = '#DF2E38';
        DeleteFleetCard.textContent = '- Deleting..';
        EditFleetCardForm_X.setAttribute('action', '/Delete/Car/' + FleetCardId_X.value);
        EditFleetCardForm_X.submit(); 
    });
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            EditFleetCardForm.style.display = 'none';
        });
    });
});


let CardNumber_MasterCard_X = document.querySelector('.CardNumber_MasterCard_X');
let Date_MasterCard_X = document.querySelector('.Date_MasterCard_X');
let MonthlyBudget_MasterCard_X = document.querySelector('.MonthlyBudget_MasterCard_X');
let Balance_MasterCard_X = document.querySelector('.Balance_MasterCard_X');
let Status_MasterCard_X = document.querySelector('.Status_MasterCard_X');

let ManageMasterCardButton = document.querySelectorAll('.manage-master-card');
let EditMasterCardForm = document.querySelector('.edit-master-card-form');
let EditMasterCardForm_X = document.querySelector('.EditMasterCardForm');
 
let MasterCardId_X = document.querySelector('.MasterCardId_X');
let CardVendor_MasterCard_X = document.querySelector('.CardVendor_MasterCard_X');
let EditMasterCard = document.querySelector('.EditMasterCard');
let DeleteMasterCard = document.querySelector('.DeleteMasterCard');

let ModalAddMasterCard = document.querySelector('.add-master-card-form');
let AddMasterCardButton = document.querySelectorAll('.add-master-card'); 

let AddMasterCardForm = document.querySelector('.AddMasterCardForm');
let AddMasterCardButton_X = document.querySelector('.AddMasterCard');
let Error_MasterCard = document.querySelector('.error-master-card');

AddMasterCardButton_X.addEventListener('click', () => {  
    if (AddMasterCardForm.children[1].children[1].value === '') {
        Error.textContent = 'Please fill out CARD number for new Master Card';
    } else {
        let CardNumber_MasterCard = AddMasterCardForm.children[1].children[1].value;
        AddMasterCardForm.setAttribute('action', '/Add/Master/Cards/' + CardNumber_MasterCard);
        AddMasterCardForm.submit();
    }   
});

ManageMasterCardButton.forEach(Button => {
    Button.classList.remove('permission-denied');
    Button.addEventListener('click', () => {
        EditMasterCardForm.style.display = 'block';
 
        CardNumber_MasterCard_X.value = Button.nextElementSibling.textContent;
        Date_MasterCard_X.value = Button.nextElementSibling.nextElementSibling.textContent;
        MonthlyBudget_MasterCard_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Balance_MasterCard_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Status_MasterCard_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        MasterCardId_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        CardVendor_MasterCard_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
    }); 

    EditMasterCard.addEventListener('click', () => {
        EditMasterCard.style.backgroundColor = '#21a911';
        EditMasterCard.textContent = '+ Updating..';
        EditMasterCardForm_X.setAttribute('action', '/Management/Update/Master/Cards/' + CardNumber_MasterCard_X.value);
        EditMasterCardForm_X.submit(); 
    });

    DeleteMasterCard.addEventListener('click', () => { 
        DeleteMasterCard.style.backgroundColor = '#DF2E38';
        DeleteMasterCard.textContent = '- Deleting..';
        EditMasterCardForm_X.setAttribute('action', '/Management/Delete/Master/Cards/' + MasterCardId_X.value);
        EditMasterCardForm_X.submit(); 
    });
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            EditMasterCardForm.style.display = 'none';
        });
    });
});

let CardNumber_ = document.querySelectorAll('.card-number');
CardNumber_.forEach(CardNumber => {
    CardNumber.addEventListener('click', () => {
        window.location = '/Deposits?FilterValue=' + CardNumber.textContent.trim();
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
