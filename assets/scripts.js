const nav = document.getElementById('navbar');
const burger = document.getElementById('burger');
const links = document.getElementById('links');

const burgerHandler = () => {
    if(nav.classList.contains('open-menu'))
    {
        nav.classList.remove('open-menu');
    }
    else
    {
        nav.classList.add('open-menu');
    }
}

burger.addEventListener("click", burgerHandler);
links.addEventListener("click", burgerHandler);