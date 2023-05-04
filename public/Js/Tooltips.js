let Tooltips_X = document.querySelectorAll('.tooltip-x');
 
Tooltips_X.forEach(Tooltip => { 
    Tooltip.addEventListener('mouseover', () => {
        Tooltip.firstElementChild.style.display = 'block';
    });
    Tooltip.addEventListener('mouseout', () => {
        Tooltip.firstElementChild.style.display = 'none';
    });
});