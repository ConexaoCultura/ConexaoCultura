const btn_menu = document.querySelector(".navbar-toggler-icon");
const body = document.querySelector(".body");

btn_menu.addEventListener("click", (event) => {
  body.classList.toggle("overflow");
});