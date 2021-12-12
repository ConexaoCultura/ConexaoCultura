const btn_VerMais = document.querySelectorAll(".verMais");
const vermais = document.querySelectorAll(".vermais");

btn_VerMais.forEach((element) => {
  element.addEventListener("click", (event) => {
    vermais.forEach((element) => {
      element.classList.toggle("vermais_none");
    });
  });
});
