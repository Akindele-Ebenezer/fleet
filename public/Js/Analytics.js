let AutomaticFilterButton = document.querySelector('.automatic-filter'); 
let CarsFilterWrapper = document.querySelector('.cars-filter-wrapper');

AutomaticFilterButton.addEventListener('click', () => {
    CarsFilterWrapper.classList.toggle('Show'); 
});