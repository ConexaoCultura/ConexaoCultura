var escolha;

var a = 0;
var b = 0;
var c = 0;
var d = 0;
var e = 0;

// function select(alternativa, question) {
//   arr[question] = alternativa;
//   console.log(arr);
//   escolha = alternativa;
//   document.cookie = "escolha=" + JSON.stringify(arr);
// }

// function finalizar() {
//   let full = true;
//   arr.forEach((item) => {
//     if (item == null) full = false;
//   });
//   if (full) {
//     arr.forEach((resposta) => {
//       if (resposta == 0) a++;
//       else if (resposta == 1) b++;
//       else if (resposta == 2) c++;
//       else if (resposta == 3) d++;
//       else if (resposta == 4) e++;
//     });
//     let array = Array(a, b, c, d, e);
//     let maior = 0;
//     array.forEach((item) => {
//       if (item > maior) maior = item;
//     });
//     console.log(array);
//     console.log(maior);
//     if (a == maior) document.getElementById("resposta").value = 0;
//     else if (b == maior) document.getElementById("resposta").value = 1;
//     else if (c == maior) document.getElementById("resposta").value = 2;
//     else if (d == maior) document.getElementById("resposta").value = 3;
//     else if (e == maior) document.getElementById("resposta").value = 4;
//   } else {
//     // document.write(
//     //     `<div class="modal modal-sheet position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSheet">
//     //         <div class="modal-dialog" role="document">
//     //         <div class="modal-content rounded-6 shadow">
//     //             <div class="modal-header border-bottom-0">
//     //             <h5 class="modal-title">Atenção!</h5>
//     //             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//     //             </div>
//     //             <div class="modal-body py-0">
//     //             <p>É necessário responder todas as questões.</p>
//     //             </div>
//     //             <div class="modal-footer flex-column border-top-0">
//     //             <button type="button" class="btn btn-lg btn-light w-100 mx-0" data-bs-dismiss="modal">Fechar</button>
//     //             </div>
//     //         </div>
//     //         </div>
//     //     </div>`)
//     alert("deu ruim");
//     document.getElementById("resposta").value = -1;
//   }
// }

const alternativa = document.querySelectorAll(".alternativa");
const div_opcao = document.querySelectorAll(".div_opcao");
const questoes_lado = document.querySelectorAll(".quest");
const questoes = document.querySelectorAll(".questao");
let questao_ativa = "questao1";

alternativa.forEach((element) => {
  element.addEventListener("click", (event) => {
    let pai = element.parentNode;
    div_opcao.forEach((element) => {
      element.classList.remove("checked");
    });
    pai.classList.toggle("checked");
  });
});

questoes_lado.forEach((element) => {
  element.addEventListener("click", (event) => {
    questoes_lado.forEach((element) => {
      // element.classList.remove("questao-ativa");
      element.children[0].classList.remove("questButtonActive");
    });
    // element.classList.add("questao-ativa");
    element.children[0].classList.add("questButtonActive");
    questao_ativa = "questao" + element.children[0].children[0].textContent;
    questoes.forEach((element) => {
      if (element.classList.contains(questao_ativa)) {
        element.classList.add("questao-ativa");
      } else {
        element.classList.remove("questao-ativa");
      }
    });
  });
});
