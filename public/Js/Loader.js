let Loader = document.querySelector('.loader');
let Links = document.querySelectorAll('.report-inner ul a:not(.action-x)');
let Buttons = document.querySelectorAll('button:not(.action-x)');
let RequestLinks = [
    Links,
    Buttons,
];

RequestLinks.forEach(RequestLinks_ => {
    RequestLinks_.forEach(RequestLink => {
        RequestLink.addEventListener('click', () => { 
            Loader.style.display = 'flex';

            setTimeout(() => {
                Loader.style.display = 'none';
            }, 8000);
        });
    });
});
