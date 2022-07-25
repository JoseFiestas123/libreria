const bdark = document.querySelector('#bdark');
const body = document.querySelector('body');
const p = document.querySelector('p');


bdark.addEventListener('click', e => {
    body.classList.toggle("darkmode");
    p.classList.toggle("darkmode");
})