let alfabetoElegido = 0;
let selectAlfabetos = null;
let textoADescifrar = null;
let rotado = null;


const ALFABETOS = [
  { "idioma": "castellano", "letras": "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ" },
  { "idioma": "ingles", "letras": "ABCDEFGHIJKLMNOPQRSTUVWXYZ" }]


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
    selectAlfabetos.innerHTML += `<option value="${index}">${ALFABETOS[index].idioma}</option>`;
  }
};

Descifrar = () => {
  let arrayNuevo = [];

  let valorRotacion = parseInt(rotado.value);

  let textoNuevo = textoADescifrar.value.eliminarAcentosTipoGraficos();

  for (let index = 0; index < textoNuevo.length; index++) {
    for (let j = 0; j < ALFABETOS[alfabetoElegido].letras.length; j++) {
      if (textoNuevo[index] == ALFABETOS[alfabetoElegido].letras[j]) {
        let indiceRotado = j - valorRotacion;

        if (indiceRotado < 0) indiceRotado = ALFABETOS[alfabetoElegido].letras.length + indiceRotado;

        arrayNuevo[index] = ALFABETOS[alfabetoElegido].letras[indiceRotado];
        break;
      } else if (textoNuevo[index] == " ") {
        arrayNuevo[index] = " ";
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