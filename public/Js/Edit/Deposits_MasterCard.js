let MonthlyDepositsModal_Edit = document.querySelector('.edit-master-card-deposits-form');
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

let Error = document.querySelector('.error');

ShowRecord_X_Edit.forEach(CardNumber => {
    CardNumber.addEventListener('click', () => {
        MonthlyDepositsModal_Edit.style.display = 'block';

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
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            MonthlyDepositsModal_Edit.style.display = 'none';
        });
    });
});

let ModalAddMonthlyDeposits = document.querySelector('.add-master-card-deposits-form');
let AddMonthlyDepositsButton = document.querySelectorAll('.add-master-card-deposits'); 

let AddDepositsForm = document.querySelector('.AddDepositsForm');
let AddDepositsButton_X = document.querySelector('.AddDeposits');
let CardNumber_DEPOSITS = document.querySelector('input[name="CardNumber_DEPOSITS"]');

AddMonthlyDepositsButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddMonthlyDeposits.style.display = 'block';
         
        AddDepositsButton_X.addEventListener('click', () => {   
            if (AddDepositsForm.children[1].children[1].value === '') {
                Error.textContent = 'Please fill out card number for new Deposits';
            } else {
                AddDepositsForm.setAttribute('action', '/Add/Deposits/Master/Cards/' + CardNumber_DEPOSITS.value);
                AddDepositsForm.submit();
            }   
        });
    }); 
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
  
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddMonthlyDeposits.style.display = 'none';
        });
    });
});
