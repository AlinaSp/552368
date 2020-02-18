'use strict'
let burgerBtn = document.querySelector("#burger");
let burgerNav = document.querySelector(".burger-nav");

console.log(burgerBtn);
console.log(burgerNav);

function animateBurger () {
  burgerBtn.classList.toggle("open");
}
function slideNav () {
  burgerNav.classList.toggle("open");
}

burgerBtn.addEventListener("click", animateBurger);
burgerBtn.addEventListener("click", slideNav);