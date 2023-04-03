let Arrow = document.querySelector('.arrow');
let MyRecords = document.querySelector('.my-records');
let SubNavs = document.querySelectorAll('.sub-nav li');

MyRecords.addEventListener('click', (e) => {
    e.preventDefault();
    MyRecords.nextElementSibling.classList.toggle('Show');
});

