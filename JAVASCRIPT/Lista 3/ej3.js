let palabras = ["ejemplo", "prueba", "otramas"];
let usados = new Array(palabras.length);
let numerosDados = 0;
let repe = true;
let porcentaje = 0;
let contadorPalabras = 0;
let contadorPalabra = 0;
let contadorAcertadas = 0;
let contadorFallados = 0;
let finalizado = false;
let espacioAyuda = null;
let espacioPalabra = null;
const FRASEJUEGOTERMINADO = "Juego terminado!";
let btnNuevaPalabra = null;
let espacioPorcentaje = null;
let btnAyuda = null;
let btnFinalizar = null;
let contadorPistas = 0;

NuevaPalabra = () => {
  espacioPalabra = document.getElementById("letras");
  espacioAyuda = document.getElementById("palabra");
  btnNuevaPalabra = document.getElementById("nuevaPalabra");
  espacioPorcentaje = document.getElementById("porcentaje");
  btnFinalizar = document.getElementById("finalizar");
  btnAyuda = document.getElementById("resultado");

  if (espacioPalabra.value != "") {
    contadorPalabras++;
    if (espacioPalabra.value == palabras[contadorPalabra]) contadorAcertadas++;

    porcentaje = (contadorAcertadas * 100) / contadorPalabras;

    espacioPorcentaje.innerHTML =
      "Porcentaje de aciertos " +
      porcentaje.toFixed(2) +
      "%<br>Has utilizado " +
      contadorPistas +
      " pistas";
  }

  contadorPalabra = aleatorio(0, palabras.length - 1);
  let palabraAMostrar = palabras[contadorPalabra];

  let arrayPalabra = Array.from(palabraAMostrar);
  let arrayDesordenado = arrayPalabra.sort(() => {
    return Math.random() - 0.5;
  });
  let palabraDesordenada = arrayDesordenado.join("");

  espacioPalabra.value = palabraDesordenada;

  btnAyuda.disabled = false;
  espacioAyuda.value = "";
  btnFinalizar.disabled = false;
  espacioPalabra.disabled = false;

  if (finalizado) {
    espacioPalabra.value = FRASEJUEGOTERMINADO;
    btnNuevaPalabra.disabled = true;
    btnAyuda.disabled = true;
  }
};

FinalizarJuego = () => {
  espacioPalabra.value = FRASEJUEGOTERMINADO;
  btnNuevaPalabra.disabled = true;
  porcentaje = (contadorAcertadas * 100) / palabras.length;
  espacioPorcentaje.innerHTML =
    "Porcentaje de aciertos en total " +
    porcentaje.toFixed(2) +
    "%<br>Has utilizado " +
    contadorPistas +
    " pistas";
  btnAyuda.disabled = true;
  espacioAyuda.value = "";
};

VerPalabra = e => {
  contadorPistas++;
  espacioAyuda.value = palabras[contadorPalabra];
  e.disabled = true;
  btnFinalizar.disabled = true;
};

function aleatorio(min, max) {
  if (usados.length != max - min) {
    while (repe != false) {
      var num = Math.floor(Math.random() * (max - min + 1)) + min;
      var repe = repetido(num);

      if (numerosDados == palabras.length) {
        repe = false;
        finalizado = true;
      }
    }
    numerosDados++;

    usados.push(num);
    return num;
  } else {
    return null;
  }
}

function repetido(num) {
  var repe = false;
  for (i = 0; i < usados.length; i++) {
    if (num == usados[i]) {
      repe = true;
    }
  }
  return repe;
}
