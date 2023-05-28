let ModalAddCreditCard = document.querySelector('.add-credit-card-form');
let AddCreditCardButton = document.querySelectorAll('.add-credit-card'); 

let AddCreditCardForm = document.querySelector('.AddCreditCardForm');
let AddCreditCardButton_X = document.querySelector('.AddCreditCard');
let Error = document.querySelector('.error');

AddCreditCardButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddCreditCard.style.display = 'block';
         
        AddCreditCardButton_X.addEventListener('click', () => {  
            if (AddCreditCardForm.children[1].children[1].value === '') {
                Error.textContent = 'Please fill out CARD number for new Credit Card';
            } else {
                let CardNumber_CreditCard = AddCreditCardForm.children[1].children[1].value;
                AddCreditCardForm.setAttribute('action', '/Add/Car/' + CardNumber_CreditCard);
                AddCreditCardForm.submit();
            }   
        });
    }); 
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddCreditCard.style.display = 'none';
        });
    });
});

let CreditCardModal_Edit = document.querySelector('.edit-credit-card-deposits-form');
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
        CreditCardModal_Edit.style.display = 'block';

        CardNumber_X.value = CardNumber.textContent;
        Date_X.value = CardNumber.nextElementSibling.textContent; 
        Amount_X.value = BigInt(CardNumber.nextElementSibling.nextElementSibling.textContent.replace(/₦/g, '').replace(/,/g, ''));
        Year_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Week_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Month_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
        DepositsId_X.value = CardNumber.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent; 
 
        EditDepositsButton.addEventListener('click', () => {
            EditDepositsForm.setAttribute('action', '/Update/Deposits/Credit/Cards/' + DepositsId_X.value);
            EditDepositsForm.submit();
        });
 
        DeleteDepositsButton.addEventListener('click', () => {
            window.location = '/Delete/Deposits/Credit/Cards/' + DepositsId_X.value + '/' + CardNumber_X.value + '/' + Amount_X.value;  
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            CreditCardModal_Edit.style.display = 'none';
        });
    });
});  

let ManageButton = document.querySelectorAll('.manage');
let EditCreditCardForm = document.querySelector('.edit-credit-card-form');
let EditCreditCardForm_X = document.querySelector('.EditCreditCardForm');

let MonthlyBudget_X = document.querySelector('.MonthlyBudget_X');
let CreditCardId_X = document.querySelector('.CreditCardId_X');
let VehicleNumber_X = document.querySelector('.VehicleNumber_X');
let EditCreditCard = document.querySelector('.EditCreditCard');
let DeleteCreditCard = document.querySelector('.DeleteCreditCard');
 
ManageButton.forEach(Button => {
    Button.addEventListener('click', () => {
        EditCreditCardForm.style.display = 'block';

        CardNumber_X.value = Button.nextElementSibling.textContent;
        Date_X.value = Button.nextElementSibling.nextElementSibling.textContent;
        MonthlyBudget_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Balance_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        Status_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        CreditCardId_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        VehicleNumber_X.value = Button.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
    }); 

    EditCreditCard.addEventListener('click', () => {
        EditCreditCardForm_X.setAttribute('action', '/Update/Car/' + CardNumber_X.value);
        EditCreditCardForm_X.submit(); 
    });

    DeleteCreditCard.addEventListener('click', () => { 
        EditCreditCardForm_X.setAttribute('action', '/Delete/Car/' + CreditCardId_X.value);
        EditCreditCardForm_X.submit(); 
    });
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            EditCreditCardForm.style.display = 'none';
        });
    });
});
