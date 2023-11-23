let OpenFleetCardVendorForm_Button = document.querySelector('.open-fleet-card-vendor-form-button');
let AddFleetCardVendor = document.querySelector('.add-fleet-card-vendor');
let AddFleetCardVendorForm = document.querySelector('.AddFleetCardVendorForm');
let ManageFleetCardVendor_Button = document.querySelector('.manage-fleet-card-vendor-button');

OpenFleetCardVendorForm_Button.addEventListener('click', () => {
    AddFleetCardVendor.style.display = 'block';

    let CancelModalIcons = document.querySelectorAll('.cancel-modal');

    CancelModalIcons.forEach(CancelModalIcon => {
        CancelModalIcon.addEventListener('click', () => {
            AddFleetCardVendor.style.display = 'none';
        });
    });

    ManageFleetCardVendor_Button.addEventListener('click', () => { 
        AddFleetCardVendorForm.setAttribute('method', 'POST');
        AddFleetCardVendorForm.setAttribute('action', 'Add/Fuel/Vendors');
        AddFleetCardVendorForm.submit(); 
    });
}); 

let FleetCardVendor_EditButton = document.querySelectorAll('.fleet-card-vendor-table .edit');
let FleetCardVendor_DeleteButton = document.querySelectorAll('.fleet-card-vendor-table .delete');
let FleetCardVendor_EditModal = document.querySelector('.edit-fleet-card-vendor-wrapper');
let FleetCardVendor_EditModal_CloseIcon = document.querySelectorAll('.FleetCardVendor_EditModal_CloseIcon');
let FleetCardVendorModal_Title = document.querySelector('.EditFleetCardVendorModal_Title');
let FleetCardVendor_EditModal_Id = document.querySelector('.edit-fleet-card-vendor-wrapper input[name=EditFleetCardVendorModal_Id]');
let FleetCardVendor_EditModal_Name = document.querySelector('.edit-fleet-card-vendor-wrapper input[name=EditFleetCardVendorModal_Name]');
let UpdateFleetCardVendor = document.querySelector('.edit-fleet-card-vendor-wrapper button[name=UpdateFleetCardVendor]');
let EditFleetCardVendorForm = document.querySelector('.EditFleetCardVendorForm');

FleetCardVendor_EditButton.forEach(Button => {
    Button.addEventListener('click', () => {
        FleetCardVendor_EditModal.style.display = 'flex';
        console.log()
        FleetCardVendorModal_Title.textContent = 'Edit ' + Button.nextElementSibling.nextElementSibling.nextElementSibling.textContent;
        FleetCardVendor_EditModal_Id.value = Button.nextElementSibling.textContent;
        FleetCardVendor_EditModal_Name.value = Button.nextElementSibling.nextElementSibling.textContent; 

        FleetCardVendor_EditModal_CloseIcon.forEach(CloseButton => {
            CloseButton.addEventListener('click', (e) => {
                e.preventDefault();
                FleetCardVendor_EditModal.style.display = 'none'; 
            });
        });

        UpdateFleetCardVendor.addEventListener('click', (e) => {
            UpdateFleetCardVendor.textContent = 'Updating...';
            UpdateFleetCardVendor.style.backgroundColor = '#21a911';
            e.preventDefault();
            EditFleetCardVendorForm.setAttribute('action', '/Update/Fuel/Vendors/' + FleetCardVendor_EditModal_Id.value);             
            EditFleetCardVendorForm.submit();
        });
    });
});

FleetCardVendor_DeleteButton.forEach(Button => {
    Button.addEventListener('click', () => {
        Button.textContent = 'Deleting...';
        Button.style.width = 'fit-content';

        let FleetCardVendor_DeleteModal_Id = Button.nextElementSibling.textContent;
        EditFleetCardVendorForm.setAttribute('action', '/Delete/Fuel/Vendors/' + FleetCardVendor_DeleteModal_Id);             
        EditFleetCardVendorForm.submit(); 
    });
});