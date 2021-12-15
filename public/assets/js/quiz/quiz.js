const alternativa = document.querySelectorAll(".alternativa");
const div_opcao = document.querySelectorAll(".div_opcao");
const questoes_lado = document.querySelectorAll(".quest");
const questoes = document.querySelectorAll(".questao");

var soma_a = 0;
var soma_b = 0;
var soma_c = 0;
var soma_d = 0;
var soma_e = 0;
var questao_ativa = "questao1";

var questoes_respondidas = Array(15);
for (var i = 0; i < 15; i++) {
  questoes_respondidas[i] = 0;
}

function navegar() {
  alternativa.forEach((element) => {
    element.addEventListener("click", (event) => {
      let pai = element.parentNode.parentNode;
      let filhos = pai.children;

      for (var i = 0; i < 5; i++) {
        filhos[i].children[0].classList.remove("checked");
      }
      element.classList.add("checked");
    });
  });

  questoes_lado.forEach((element) => {
    element.addEventListener("click", (event) => {
      questoes_lado.forEach((element) => {
        element.children[0].classList.remove("questButtonActive");
      });
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
}

function armazenarRespostas() {
  let alternativas = document.querySelectorAll(".alternativa");
  alternativas.forEach((element) => {
    element.addEventListener("click", (event) => {
      let alternativa_escolhida = event.target.parentNode.children[1].value;
      let id_questao = event.target.getAttribute("id_questao");
      questoes_respondidas[id_questao - 1] = alternativa_escolhida;

      //verificar se o array está todo preenchido
      // se o array estiver todo preenchida, habilitar o botão
      if (questoes_respondidas.indexOf(0) == -1) {
        document.getElementById("finalizar").removeAttribute("disabled");
      }
    })
  })
}

function finalizar() {
  questoes_respondidas.forEach((resposta) => {
    if (resposta == "A")
      soma_a++;
    else
      if (resposta == "B") {
        soma_b++;
      }
      else
        if (resposta == "C")
          soma_c++;
        else
          if (resposta == "D")
            soma_d++;
          else
            if (resposta == "E")
              soma_e++;
  })

  let array = Array(soma_a, soma_b, soma_c, soma_d, soma_e);
  let maior = Math.max(...array);

  console.log(maior)

  if (soma_a == maior) document.getElementById("resposta").value = "1";
  else if (soma_b == maior) document.getElementById("resposta").value = "2";
  else if (soma_c == maior) document.getElementById("resposta").value = "3";
  else if (soma_d == maior) document.getElementById("resposta").value = "4";
  else if (soma_e == maior) document.getElementById("resposta").value = "5";
}
navegar();
armazenarRespostas();

document.getElementById('finalizar').addEventListener("click", finalizar);