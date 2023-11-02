let ShowDocument_X = document.querySelectorAll('.report-inner .table td.td-x .x-inner');
let DeleteCarDocumentButtons = document.querySelectorAll('.delete-document-btn');
let DeleteCarDocumentForm = document.querySelector('.DeleteCarDocumentForm');

ShowDocument_X[0].parentElement.classList.add('ActiveDocument');
ShowDocument_X[0].parentElement.parentElement.nextElementSibling.classList.add('TableRow'); 
ShowDocument_X[0].parentElement.parentElement.nextElementSibling.nextElementSibling.classList.add('TableRow');

ShowDocument_X.forEach(Element => {
    Element.addEventListener('click', () => { 
        Element.parentElement.classList.toggle('ActiveDocument');
        Element.parentElement.parentElement.nextElementSibling.classList.toggle('TableRow'); 
        Element.parentElement.parentElement.nextElementSibling.nextElementSibling.classList.toggle('TableRow');
    });
    
    DeleteCarDocumentButtons.forEach(Button => { 
        Button.addEventListener('click', () => {
            if (Button.nextElementSibling.nextElementSibling.textContent == '') {
                let AlertComponent = document.querySelector('.alert');
                AlertComponent.style.display = 'flex';
                AlertComponent.firstElementChild.textContent = 'Your attempt to delete an empty file is invalid.';
                setTimeout(() => {
                    AlertComponent.style.display = 'none';
                }, 5000);
            } else {
                Button.textContent = 'Deleting...';
                DeleteCarDocumentForm.setAttribute('action', '/Delete/Documents/Car/' + Button.nextElementSibling.textContent + '/' + Button.nextElementSibling.nextElementSibling.textContent);
                DeleteCarDocumentForm.setAttribute('method', 'POST');
                DeleteCarDocumentForm.submit(); 
            }
        }); 
    });
});
//  
let ModalCardDocument_Edit = document.querySelector('.edit-car-document-form'); 
let EditCarDocumentButton = document.querySelector('.EditCarDocument'); 
let EditCarDocumentForm = document.querySelector('.EditCarDocumentForm');
let ManageDocumentButtons = document.querySelectorAll('.manage-document'); 

let CarDocument_VehicleNumber = document.querySelector('.VehicleNumber_X'); 

ManageDocumentButtons.forEach(ManageDocumentButton => {
    ManageDocumentButton.addEventListener('click', () => {
        ModalCardDocument_Edit.style.display = 'flex';  

        CarDocument_VehicleNumber.value = ManageDocumentButton.nextElementSibling.textContent; 

        EditCarDocumentButton.addEventListener('click', () => {
            EditCarDocumentButton.textContent = '+ Updating...';
            EditCarDocumentButton.style.backgroundColor = '#21a911';
            EditCarDocumentForm.setAttribute('action', '/Update/Documents/Car/' + CarDocument_VehicleNumber.value);
            EditCarDocumentForm.setAttribute('enctype', 'multipart/form-data'); 
            EditCarDocumentForm.setAttribute('method', 'POST'); 
            EditCarDocumentForm.submit();
        }); 
    }); 

    let CancelModalIcons = document.querySelectorAll('.cancel-modal'); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalCardDocument_Edit.style.display = 'none';
        }); 
    });
});
  
let AlertComponent = document.querySelector('.alert');
let PermissionDeniedButton = document.querySelectorAll('.permission-denied');

PermissionDeniedButton.forEach(Button => {
    Button.addEventListener('click', () => {
        AlertComponent.style.display = 'flex';
        AlertComponent.firstElementChild.textContent = 'PERMISSION DENIED: Contact an Admin to grant you privilege to manage fleet documents.';
        setTimeout(() => {
            AlertComponent.style.display = 'none';
        }, 5000);
    });
});

let UpToDate_Button = document.querySelector('.up-to-date');
let Expired_Button = document.querySelector('.expired');
let NotRegistered_Button = document.querySelector('.not-registered');

UpToDate_Button.addEventListener('click', () => {
    window.location = '/Cars/Documents?UpToDate=';
});

Expired_Button.addEventListener('click', () => {
    window.location = '/Cars/Documents?Expired=';
});

NotRegistered_Button.addEventListener('click', () => {
    window.location = '/Cars/Documents?NotRegistered=';
});