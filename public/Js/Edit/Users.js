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
let UserId_X_X = document.querySelectorAll('.UserId_X');

let Email_USER_X = document.querySelector('.Email_USER_X');
let Name_X = document.querySelector('.Name_X');
let Role_X = document.querySelector('.Role_X');
let Password_X = document.querySelector('.Password_X');

let Privileges_X = document.querySelector('.privileges');
let AllPrivilegesButton = document.querySelector('.AllPrivileges');
let EnableUserButton = document.querySelector('.EnableUser');
let DisableUserButton = document.querySelector('.DisableUser');
let UpdatePrivilegesButton = document.querySelector('.UpdatePrivileges');
let AllPrivilegesCheckbox = document.querySelectorAll('input[type=checkbox]');
let CarRegistration_PRIVILEGES = document.querySelector('.CarRegistration_PRIVILEGES');
let AddMaintenance_PRIVILEGE = document.querySelector('.AddMaintenance_PRIVILEGES');
let FuelManagement_PRIVILEGE = document.querySelector('.FuelManagement_PRIVILEGES');
let MakeDeposits_PRIVILEGE = document.querySelector('.MakeDeposits_PRIVILEGES');
let CardManagement_PRIVILEGES = document.querySelector('.CardManagement_PRIVILEGES');
let DocumentManagement_PRIVILEGES = document.querySelector('.DocumentManagement_PRIVILEGES');
let CreateInspections_PRIVILEGES = document.querySelector('.CreateInspections_PRIVILEGES');
let PrivilegeMessage = document.querySelector('.privilege-message')

ShowRecord_X_Edit.forEach(Email => {
    Email.addEventListener('click', () => {
        UserModal_Edit.style.display = 'block';
 
        Email_USER_X.value = Email.firstElementChild.children[1].textContent;
        Name_X.value = Email.nextElementSibling.textContent;
        Role_X.value = Email.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.textContent.trim(); 
        Password_X.value = Email.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        UserId_X_X.forEach(UserId_X => {
            UserId_X.value = Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent;

            EnableUserButton.addEventListener('click', e => {
                if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'Disabled') { 
                    Privileges_X.setAttribute('action', '/Privileges/Enable/' + UserId_X.value);
                    Privileges_X.submit();
                }
            });
            DisableUserButton.addEventListener('click', () => {
                if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'Enabled') { 
                    Privileges_X.setAttribute('action', '/Privileges/Disable/' + UserId_X.value);
                    Privileges_X.submit();
                } 
            });
            AllPrivilegesButton.addEventListener('click', () => {
                if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'Disabled') { 
                    AllPrivilegesButton.addEventListener('click', e => {
                        e.preventDefault();
                    }); 
                } else {
                    AllPrivilegesCheckbox.forEach(Checkbox => {
                        Checkbox.setAttribute('checked', true);
                    });
                    Privileges_X.setAttribute('action', '/Privileges/Add/' + UserId_X.value);
                    setTimeout(() => {
                        Privileges_X.submit();
                    }, 1000);  
                }
            });
            UpdatePrivilegesButton.addEventListener('click', () => {
                if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'Disabled') { 
                    UpdatePrivilegesButton.addEventListener('click', e => {
                        e.preventDefault();
                    }); 
                } else {
                    Privileges_X.setAttribute('action', '/Privileges/Update/' + UserId_X.value);
                    Privileges_X.submit();
                }
            });

            EditUserButton.addEventListener('click', () => {
                EditUserButton.style.backgroundColor = '#21a911';
                EditUserButton.textContent = '+ Updating..';
                EditUserForm.setAttribute('action', '/Update/User/' + UserId_X.value);
                EditUserForm.submit();
            });

            DeleteUserButton.addEventListener('click', () => {
                DeleteUserButton.style.backgroundColor = '#DF2E38';
                DeleteUserButton.textContent = '- Deleting..';
                window.location = '/Delete/User/' + UserId_X.value;  
            });
        });

        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            CarRegistration_PRIVILEGES.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            CarRegistration_PRIVILEGES.removeAttribute('checked');
        }
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            AddMaintenance_PRIVILEGE.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            AddMaintenance_PRIVILEGE.removeAttribute('checked');
        } 
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            FuelManagement_PRIVILEGE.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            FuelManagement_PRIVILEGE.removeAttribute('checked');
        }  
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            MakeDeposits_PRIVILEGE.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            MakeDeposits_PRIVILEGE.removeAttribute('checked');
        }  
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            CardManagement_PRIVILEGES.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            CardManagement_PRIVILEGES.removeAttribute('checked');
        }   
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'Disabled') {
            DisableUserButton.textContent = '- Disabled';
            EnableUserButton.style.background = '#3034b5';
            DisableUserButton.style.background = '#333';
            PrivilegeMessage.classList.remove('user-enabled');
            PrivilegeMessage.classList.add('user-disabled');
            PrivilegeMessage.textContent = 'User is disabled. Permmissions cannot be assigned.';
            DisableUserButton.addEventListener('click', e => {
                e.preventDefault();
            });
        } else if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'Enabled') {
            EnableUserButton.textContent = '+ Enabled';
            EnableUserButton.style.background = '#333';
            DisableUserButton.style.background = '#DF2E38'; 
            PrivilegeMessage.classList.remove('user-disabled');
            PrivilegeMessage.classList.add('user-enabled');
            PrivilegeMessage.textContent = 'User is enabled. Permmissions can be assigned.';
            EnableUserButton.addEventListener('click', e => {
                e.preventDefault();
            });
        } else {
            DisableUserButton.style.background = '#333';
        }   
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            DocumentManagement_PRIVILEGES.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            DocumentManagement_PRIVILEGES.removeAttribute('checked');
        }
        if (Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent == 'on') {
            CreateInspections_PRIVILEGES.setAttribute('checked', Email.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.textContent);
        } else {
            CreateInspections_PRIVILEGES.removeAttribute('checked');
        }      
     });

    let CancelModalIcons = document.querySelectorAll('.cancel-modal');
    
    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            UserModal_Edit.style.display = 'none';
            EnableUserButton.textContent = '+ Enable User';
            DisableUserButton.textContent = '- Disable User';
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
                Error.style.backgroundColor = '#21a911';
                Error.textContent = 'Adding User.. Please wait!';
                AddUserButton_X.style.backgroundColor = '#DF2E38';
                AddUserButton_X.textContent = '+ Processing..';
                AddUserForm.submit();
            }
        });
    }); 
    let CancelModalIcons = document.querySelectorAll('.cancel-modal');

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalAddUser.style.display = 'none';
        });
    }); 
});
