let OpenDriverDocumentIcons = document.querySelectorAll('.OpenDriverDocumentIcon');
let Drivers = document.querySelectorAll('.report-inner .table td.td-x .x-inner-2');
let Drivers_ = document.querySelectorAll('.report-inner .table td.td-x .x-inner h1');

Drivers.forEach(Driver => {
    Driver.addEventListener('mouseover', () => {
        Driver.lastElementChild.classList.remove('Hide');
    });
    Driver.addEventListener('mouseout', () => {
        Driver.lastElementChild.classList.add('Hide');
    });
});

Drivers_.forEach(Driver => {
    Driver.addEventListener('click', () => {
        window.location = '/Cars?FilterValue=' + Driver.nextElementSibling.textContent;
    }); 
});

OpenDriverDocumentIcons.forEach(Icon => {
    Icon.addEventListener('click', () => {
        window.location = '/Cars/Documents?FilterValue=' + Icon.previousElementSibling.textContent;
    }); 
}); 