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