const PALABRAS = [
  "APROBAR",
  "APTO",
  "CATEAR",
  "CERO",
  "EXAMEN",
  "NOTA",
  "NOTABLE",
  "TEST"
];

let primeraVezPulsado = -1;
let segundaVezPulsado = -1;

const ABECEDARIO = [
  "A",
  "B",
  "C",
  "D",
  "E",
  "F",
  "G",
  "H",
  "I",
  "J",
  "K",
  "L",
  "M",
  "N",
  "O",
  "P",
  "Q",
  "R",
  "S",
  "T",
  "U",
  "V",
  "W",
  "X",
  "Y",
  "Z"
];

let sopaLetras = new Array(10);

let interval = null;
let contenido = null;
let parrafoPalabras = null;
let parrafoNuevo = "";
let contadorAcertadas = 0;
let reloj = null;
let contadorHoras = 0;
let contadorSegundos = 0;
let contadorMinutos = 0;
let ss = 0;
let mm = 0;
let hh = 0;
let isPaused = false;

Main = () => {
  contenido = document.getElementById("contenido");
  parrafoPalabras = document.getElementById("palabras");
  reloj = document.getElementById("reloj");

  ColocaPalabras();

  for (let index = 0; index < sopaLetras.length; index++) {
    for (let j = 0; j < sopaLetras[index].length; j++) {
      if (sopaLetras[index][j] == undefined)
        sopaLetras[index][j] =
          ABECEDARIO[Math.floor(Math.random() * (ABECEDARIO.length - 0))];
    }
  }

  for (let index = 0; index < sopaLetras.length; index++) {
    for (let j = 0; j < sopaLetras[index].length; j++) {
      contenido.innerHTML += `<button id="btn${index}${j}" value="${index}${j}" onclick="CompruebaPalabra(this)" style="width: 30px; height: 30px;">${sopaLetras[index][j]}</button>`;
    }
    contenido.innerHTML += "<br>";
  }

  ComienzaReloj();
};

ColocaPalabras = () => {
  sopaLetras[0] = new Array(8);
  sopaLetras[1] = new Array(8);
  sopaLetras[2] = new Array(8);
  sopaLetras[3] = new Array(8);
  sopaLetras[4] = new Array(8);
  sopaLetras[5] = new Array(8);
  sopaLetras[6] = new Array(8);
  sopaLetras[7] = new Array(8);
  sopaLetras[8] = new Array(8);
  sopaLetras[9] = new Array(8);
  sopaLetras[10] = new Array(8);

  sopaLetras[0][0] = "R";
  sopaLetras[1][0] = "A";
  sopaLetras[2][0] = "E";
  sopaLetras[3][0] = "T";
  sopaLetras[4][0] = "A";
  sopaLetras[5][0] = "C";

  sopaLetras[3][6] = "E";
  sopaLetras[4][6] = "L";
  sopaLetras[5][6] = "B";
  sopaLetras[6][6] = "A";
  sopaLetras[7][6] = "T";
  sopaLetras[8][6] = "O";
  sopaLetras[9][6] = "N";

  sopaLetras[1][1] = "A";
  sopaLetras[2][2] = "P";
  sopaLetras[3][3] = "R";
  sopaLetras[4][4] = "O";
  sopaLetras[5][5] = "B";
  sopaLetras[6][6] = "A";
  sopaLetras[7][7] = "R";
};

CompruebaPalabra = e => {
  switch (parseInt(e.value)) {
    case 00:
    case 50:
      if (primeraVezPulsado == -1) primeraVezPulsado = e.value;
      else {
        segundaVezPulsado = e.value;
        if (primeraVezPulsado == 00) {
          if (segundaVezPulsado == 50) {
            PintaLetras(primeraVezPulsado, segundaVezPulsado, "vertical");
            parrafoNuevo = parrafoPalabras.innerHTML.replace("CATEAR", "X");
            contadorAcertadas++;
          }
        } else if (primeraVezPulsado == 50) {
          if (segundaVezPulsado == 00) {
            PintaLetras(primeraVezPulsado, segundaVezPulsado, "vertical");
            parrafoNuevo = parrafoPalabras.innerHTML.replace("CATEAR", "X");
            contadorAcertadas++;
          }
        }
        parrafoPalabras.innerHTML = parrafoNuevo;
        primeraVezPulsado = -1;
        segundaVezPulsado = -1;
      }
      break;
    case 36:
    case 96:
      if (primeraVezPulsado == -1) primeraVezPulsado = e.value;
      else {
        segundaVezPulsado = e.value;
        if (primeraVezPulsado == 36) {
          if (segundaVezPulsado == 96) {
            PintaLetras(primeraVezPulsado, segundaVezPulsado, "vertical");
            parrafoNuevo = parrafoPalabras.innerHTML.replace("NOTABLE", "X");
            contadorAcertadas++;
          }
        } else if (primeraVezPulsado == 96) {
          if (segundaVezPulsado == 36) {
            parrafoNuevo = parrafoPalabras.innerHTML.replace("NOTABLE", "X");
            PintaLetras(primeraVezPulsado, segundaVezPulsado, "vertical");
            contadorAcertadas++;
          }
        }

        parrafoPalabras.innerHTML = parrafoNuevo;
        primeraVezPulsado = -1;
        segundaVezPulsado = -1;
      }
      break;
    case 11:
    case 77:
      if (primeraVezPulsado == -1) primeraVezPulsado = e.value;
      else {
        segundaVezPulsado = e.value;
        if (primeraVezPulsado == 11) {
          if (segundaVezPulsado == 77) {
            PintaLetras(primeraVezPulsado, segundaVezPulsado, "dia2");
            parrafoNuevo = parrafoPalabras.innerHTML.replace("APROBAR", "X");
            contadorAcertadas++;
          }
        } else if (primeraVezPulsado == 77) {
          if (segundaVezPulsado == 11) {
            parrafoNuevo = parrafoPalabras.innerHTML.replace("APROBAR", "X");
            PintaLetras(primeraVezPulsado, segundaVezPulsado, "dia2");
            contadorAcertadas++;
          }
        }
        parrafoPalabras.innerHTML = parrafoNuevo;
        primeraVezPulsado = -1;
        segundaVezPulsado = -1;
      }
      break;

    default:
      primeraVezPulsado = -1;
      segundaVezPulsado = -1;
      break;
  }

  if (contadorAcertadas == 3) {
    alert("Has acertado todas las palabras, has ganado!");
    isPaused = true;
    clearInterval(interval);
    reloj.innerHTML =
      "Tu tiempo en acabar la partida ha sido de " + reloj.innerHTML;
  }
};

PintaLetras = (primera, segunda, orientacion) => {
  switch (orientacion) {
    case "dia1":
      break;
    case "dia2":
      if (primera > segunda) {
        for (let j = primera; j >= segunda; ) {
          if (j == 0) j = "00";
          document.getElementById("btn" + j).style.background = "red";
          j = parseInt(j) - 11;
        }
      } else {
        for (let j = primera; j <= segunda; ) {
          document.getElementById("btn" + j).style.background = "red";
          j = parseInt(j) + 11;
        }
      }
      break;
    case "vertical":
      if (primera > segunda) {
        for (let j = primera; j >= segunda; ) {
          if (j == 0) j = "00";
          document.getElementById("btn" + j).style.background = "red";
          j = parseInt(j) - 10;
        }
      } else {
        for (let j = primera; j <= segunda; ) {
          document.getElementById("btn" + j).style.background = "red";
          j = parseInt(j) + 10;
        }
      }
      break;
    case "horiz":
      break;
  }
};

ComienzaReloj = () => {
  interval = setInterval(() => {
    if (!isPaused) {
      contadorSegundos++;
      if (contadorSegundos > 59) {
        contadorMinutos++;
        contadorSegundos = 0;
      }
      if (contadorMinutos > 59) {
        contadorHoras++;
        contadorMinutos = 0;
      }
      if (contadorHoras > 24) {
        contadorHoras = 0;
      }

      ss = contadorSegundos;
      mm = contadorMinutos;
      hh = contadorHoras;

      if (ss < 10) ss = "0" + ss;
      if (mm < 10) mm = "0" + mm;
      if (hh < 10) hh = "0" + hh;

      reloj.innerHTML = hh + ":" + mm + ":" + ss;
    }
  }, 1000);
};

// addEventListener("load", Main);
Main();
