const ALFABETOS = ["Castellano", "Inglés"];
let alfabetoElegido = 0;
let selectAlfabetos = null;
let textoADescifrar = null;
let rotado = null;
let ALFABETOESPAÑOL = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

let ALFABETOINGLES = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

Main = () => {
  selectAlfabetos = document.getElementById("selectAlfabetos");
  textoADescifrar = document.getElementById("textoADescifrar");
  rotado = document.getElementById("rotado");
  document.getElementById("rotado").max = 27;
  document.getElementById("rotado").min = 1;

  RellenarAlfabetos();
};

RellenarAlfabetos = () => {
  for (let index = 0; index < ALFABETOS.length; index++) {
    selectAlfabetos.innerHTML += `<option value="${index}">${ALFABETOS[index]}</option>`;
  }
};

Descifrar = () => {
  let arrayNuevo = [];

  let valorRotacion = parseInt(rotado.value);

  let textoNuevo = textoADescifrar.value.eliminarAcentosTipoGraficos();

  for (let index = 0; index < textoNuevo.length; index++) {
    if (alfabetoElegido == 0) {
      for (let j = 0; j < ALFABETOESPAÑOL.length; j++) {
        if (textoNuevo[index] == ALFABETOESPAÑOL[j]) {
          let indiceRotado = j - valorRotacion;

          if (indiceRotado < 0) indiceRotado = 27 + indiceRotado;

          arrayNuevo[index] = ALFABETOESPAÑOL[indiceRotado];
          break;
        } else if (textoNuevo[index] == " ") {
          arrayNuevo[index] = " ";
        }
      }
    } else {
      for (let j = 0; j < ALFABETOINGLES.length; j++) {
        if (textoNuevo[index] == ALFABETOINGLES[j]) {
          if (valorRotacion > 24) valorRotacion = 25 - 24;

          let indiceRotado = j + valorRotacion;

          if (indiceRotado > 25) indiceRotado = indiceRotado - 26;

          arrayNuevo[index] = ALFABETOINGLES[indiceRotado];
          break;
        } else if (textoNuevo[index] == " ") {
          arrayNuevo[index] = " ";
        }
      }
    }
  }

  document.getElementById("resultado").innerHTML = arrayNuevo.join("");
};

String.prototype.eliminarAcentosTipoGraficos = function () {
  return this.normalize("NFD")
    .replace(
      /([^n\u0300-\u036f]|n(?!\u0303(?![\u0300-\u036f])))[\u0300-\u036f]+/gi,
      "$1"
    )
    .normalize();
};

SeleccionarAlfabeto = e => {
  switch (parseInt(e)) {
    case 0:
      alfabetoElegido = 0;
      document.getElementById("rotado").max = 27;

      break;
    case 1:
      alfabetoElegido = 1;
      document.getElementById("rotado").max = 26;
      break;
  }
};

addEventListener("load", Main);