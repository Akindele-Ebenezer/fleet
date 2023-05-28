let ModalAddMasterCard = document.querySelector('.add-master-card-form');
let AddMasterCardButton = document.querySelectorAll('.add-master-card'); 

let AddMasterCardForm = document.querySelector('.AddMasterCardForm');
let AddMasterCardButton_X = document.querySelector('.AddMasterCard');
let Error = document.querySelector('.error');

AddMasterCardButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddMasterCard.style.display = 'block';
         
        AddMasterCardButton_X.addEventListener('click', () => {  
            if (AddMasterCardForm.children[1].children[1].value === '') {
                Error.textContent = 'Please fill out CARD number for new Master Card';
            } else {
                let CardNumber_MasterCard = AddMasterCardForm.children[1].children[1].value;
                AddMasterCardForm.setAttribute('action', '/Add/Master/Cards/' + CardNumber_MasterCard);
                AddMasterCardForm.submit();
            }   
        });
    }); 
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddMasterCard.style.display = 'none';
        });
    });
});

let MasterCardModal_Edit = document.querySelector('.edit-master-card-deposits-form');
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
        MasterCardModal_Edit.style.display = 'block';

        CardNumber_X.value = CardNumber.textContent;
        Date_X.value = CardNumber.nextElementSibling.textContent; 
        Amount_X.value = BigInt(CardNumber.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        Year_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        DepositsId_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
 
        EditDepositsButton.addEventListener('click', () => {
            EditDepositsForm.setAttribute('action', '/Update/Deposits/Master/Cards/' + DepositsId_X.value);
            EditDepositsForm.submit();
        });
 
        DeleteDepositsButton.addEventListener('click', () => {
            window.location = '/Delete/Deposits/Master/Cards/' + DepositsId_X.value + '/' + CardNumber_X.value + '/' + Amount_X.value;  
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MasterCardModal_Edit.style.display = 'none';
        });
    });
});  

let ManageButton = document.querySelectorAll('.manage');
let EditMasterCardForm = document.querySelector('.edit-master-card-form');
let EditMasterCardForm_X = document.querySelector('.EditMasterCardForm');

let MonthlyBudget_X = document.querySelector('.MonthlyBudget_X');
let MasterCardId_X = document.querySelector('.MasterCardId_X');
let EditMasterCard = document.querySelector('.EditMasterCard');
let DeleteMasterCard = document.querySelector('.DeleteMasterCard');
 
ManageButton.forEach(Button => {
    Button.addEventListener('click', () => {
        EditMasterCardForm.style.display = 'block';

        CardNumber_X.value = Button.nextElementSibling.textContent;
        Date_X.value = Button.nextElementSibling.nextElementSibling.textContent;
        MonthlyBudget_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Balance_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Status_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        MasterCardId_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    }); 

    EditMasterCard.addEventListener('click', () => {
        EditMasterCardForm_X.setAttribute('action', '/Management/Update/Master/Cards/' + CardNumber_X.value);
        EditMasterCardForm_X.submit(); 
    });

    DeleteMasterCard.addEventListener('click', () => { 
        EditMasterCardForm_X.setAttribute('action', '/Management/Delete/Master/Cards/' + MasterCardId_X.value);
        EditMasterCardForm_X.submit(); 
    });
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            EditMasterCardForm.style.display = 'none';
        });
    });
});
