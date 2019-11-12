let contenido = null;
let contadorFallos = 0;
let contadorAciertos = 0;
let parrafoFallos = null;
let reloj = null;
let interval = null;
let segundos = 60;
let terminado = false;

Main = () => {
  let botones = "";
  contenido = document.getElementsByClassName("contenido")[0];
  fallos = document.getElementsByClassName("fallos")[0];
  reloj = document.getElementsByClassName("reloj")[0];

  for (let index = 1; index <= 50; index++) {
    botones += `<button id="btn${index}" onclick="ValidaPrimo(this)">${index}</button>`;
    if (index % 10 == 0) botones += "<br>";
  }

  contenido.innerHTML = botones;
};

ValidaPrimo = e => {
  let contadorPrimos = 0;
  if (contadorAciertos <= 15 && terminado != true) {
    interval = setInterval(() => {
      segundos--;
      reloj.innerHTML = "Te quedan " + segundos + " segundos";

      if (segundos == 0) {
        clearInterval(interval);
        terminado = true;
        alert("Tu tiempo se ha acabado, ahora la pagina se va a recargar");
        location.reload(true);
      }
    }, 1000);

    for (let i = 1; i <= e.innerHTML; i++) {
      if (e.innerHTML % i == 0) contadorPrimos++;
    }
    if (contadorPrimos <= 2) {
      e.innerHTML = "__";
      e.disabled = true;
      contadorAciertos++;
    } else {
      e.style.color = "red";
      contadorFallos++;
    }
  }

  if (contadorAciertos > 15) {
    fallos.innerHTML = "Has cometido " + contadorFallos + " fallos";
    clearInterval(interval);
  }
};

addEventListener("load", Main);
