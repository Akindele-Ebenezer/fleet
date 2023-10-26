let AutomaticFilterButton = document.querySelector('.automatic-filter'); 
let CarsFilterWrapper = document.querySelector('.cars-filter-wrapper');
let ClearFilterButton = document.querySelector('.clear-filter');

AutomaticFilterButton.addEventListener('click', () => {
    CarsFilterWrapper.classList.toggle('Show'); 
    
    ClearFilterButton.addEventListener('click', () => {
        CarsFilterWrapper.classList.remove('Show'); 
    });
});

ClearFilterButton.addEventListener('click', () => {
    window.location = '/Analytics'; 
});
 
let Maintenance_CustomChart = document.querySelectorAll('.analytics .inner-4 .x--inner .custom-chart-inner .Maintenance');
let Repairs_CustomChart = document.querySelectorAll('.analytics .inner-4 .x--inner .custom-chart-inner .Repairs');
let Refueling_CustomChart = document.querySelectorAll('.analytics .inner-4 .x--inner .custom-chart-inner .Refueling');
let Deposits_CustomChart = document.querySelectorAll('.analytics .inner-4 .x--inner .custom-chart-inner .Deposits');

Maintenance_CustomChart.forEach(Maintenance => {
    Maintenance.addEventListener('click', () => {
        DateFrom = Maintenance.firstElementChild.nextElementSibling.textContent;
        DateTo = Maintenance.firstElementChild.nextElementSibling.nextElementSibling.textContent;
        window.location = '/Maintenance?Date_From=' + DateFrom + '&Date_To=' + DateTo + '&Filter_All_Maintenance=';
    });
});

Repairs_CustomChart.forEach(Repairs => {
    Repairs.addEventListener('click', () => {
        DateFrom = Repairs.firstElementChild.nextElementSibling.textContent;
        DateTo = Repairs.firstElementChild.nextElementSibling.nextElementSibling.textContent;
        window.location = '/Maintenance?FilterValue=repair&Filter=';
    });
});

Deposits_CustomChart.forEach(Deposits => {
    Deposits.addEventListener('click', () => {
        DateFrom = Deposits.firstElementChild.nextElementSibling.textContent;
        DateTo = Deposits.firstElementChild.nextElementSibling.nextElementSibling.textContent;
        window.location = '/Deposits?Date_From=' + DateFrom + '&Date_To=' + DateTo + '&Filter_All_Deposits=';
    });
});

Refueling_CustomChart.forEach(Refueling => {
    Refueling.addEventListener('click', () => {
        DateFrom = Refueling.firstElementChild.nextElementSibling.textContent;
        DateTo = Refueling.firstElementChild.nextElementSibling.nextElementSibling.textContent;
        window.location = '/Refueling?Date_From=' + DateFrom + '&Date_To=' + DateTo + '&Filter_All_Refueling=';
    });
});