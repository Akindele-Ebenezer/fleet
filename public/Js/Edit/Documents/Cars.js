let ShowDocument_X = document.querySelectorAll('.report-inner .table td.td-x .x-inner');

ShowDocument_X.forEach(Element => {
    Element.addEventListener('click', () => { 
        Element.parentElement.parentElement.nextElementSibling.classList.toggle('TableRow'); 
        Element.parentElement.parentElement.nextElementSibling.nextElementSibling.classList.toggle('TableRow');
    });
});
//  
let ModalCardDocument_Edit = document.querySelector('.edit-car-document-form'); 
let EditCarDocumentButton = document.querySelector('.EditCarDocument'); 
let EditCarDocumentForm = document.querySelector('.EditCarDocumentForm');
let ManageDocumentButtons = document.querySelectorAll('.manage-document'); 
let CancelModalIcons = document.querySelectorAll('.cancel-modal'); 

let CarDocument_VehicleNumber = document.querySelector('.VehicleNumber_X'); 

ManageDocumentButtons.forEach(ManageDocumentButton => {
    ManageDocumentButton.addEventListener('click', () => {
        ModalCardDocument_Edit.style.display = 'flex'; 

        CarDocument_VehicleNumber.value = ManageDocumentButton.nextElementSibling.textContent; 

        EditCarDocumentButton.addEventListener('click', () => {
            EditCarDocumentForm.setAttribute('action', '/Update/Documents/Car/' + CarDocument_VehicleNumber.value);
            EditCarDocumentForm.submit();
        });
 
        let DeleteCarDocumentButton = document.querySelector('.DeleteCarDocument');
        
        DeleteCarDocumentButton.addEventListener('click', () => {
            window.location = '/Delete/Documents/Car/' + CarDocument_VehicleNumber.value;
        }); 
    }); 

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            ModalCardDocument_Edit.style.display = 'none';
        }); 
    });
});
  
// let AlertComponent = document.querySelector('.alert');
// let PermissionDeniedButton = document.querySelectorAll('.permission-denied');

// PermissionDeniedButton.forEach(Button => {
//     Button.addEventListener('click', () => {
//         AlertComponent.style.display = 'flex';
//         setTimeout(() => {
//             AlertComponent.style.display = 'none';
//         }, 5000);
//     });
// });
