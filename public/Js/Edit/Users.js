let UserModal_Edit = document.querySelector('.edit-user-form'); 
 
let EditUserButton = document.querySelector('.EditUser');
let DeleteUserButton = document.querySelector('.DeleteUser');
let EditUserForm = document.querySelector('.EditUserForm');
 
let ModalAddUser = document.querySelector('.add-user-form');
let AddUserButton = document.querySelectorAll('.add-user'); 
let ShowRecord_X_Edit = document.querySelectorAll('.show-record-x-edit');

let AddUserForm = document.querySelector('.AddUserForm');
let Error = document.querySelector('.error');
let AddUserButton_X = document.querySelector('.AddUser');
let Email_USER = document.querySelector('input[name="Email_USER"]');
let UserId_X = document.querySelector('.UserId_X');

let Email_USER_X = document.querySelector('.Email_USER_X');
let Name_X = document.querySelector('.Name_X');
let Role_X = document.querySelector('.Role_X');
let Password_X = document.querySelector('.Password_X');

ShowRecord_X_Edit.forEach(Email => {
    Email.addEventListener('click', () => {
        UserModal_Edit.style.display = 'block';

        Email_USER_X.value = Email.textContent;
        Name_X.value = Email.nextElementSibling.textContent;
        Role_X.value = Email.nextElementSibling.nextElementSibling.textContent;
        Password_X.value = Email.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        UserId_X.value = Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

        EditUserButton.addEventListener('click', () => {
            EditUserForm.setAttribute('action', '/Update/User/' + UserId_X.value);
            EditUserForm.submit();
        });
 
        DeleteUserButton.addEventListener('click', () => {
            window.location = '/Delete/User/' + UserId_X.value;  
        });
    });
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            UserModal_Edit.style.display = 'none';
        });
    });
});

AddUserButton.forEach(Button => {
    Button.addEventListener('click', () => {
        ModalAddUser.style.display = 'block';
         
        AddUserButton_X.addEventListener('click', () => {  
            AddUserForm.setAttribute('action', '/Add/User/' + Email_USER.value);

            if (AddUserForm.children[1].lastElementChild.value === '') {
                Error.textContent = 'Please fill out email for new user';
            } else if (AddUserForm.children[4].lastElementChild.value === '') {
                Error.textContent = 'Assign a password to new user';
            } else {
                AddUserForm.submit();
            }
        });
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddUser.style.display = 'none';
        });
    }); 
});
