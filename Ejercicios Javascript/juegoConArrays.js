addEventListener("load", main);

var etiquetas2;
var jugadas = 0;
var acabado = false;
var fallos = 0;

var etiquetas = `[{
"etiqueta": "b",
"definicion": "Define texto en negrita"
}, {
"etiqueta": "link",
"definicion": "Define la relaci\u00f3 entre un documento y un recurso externo (generalmente con hojas de estilo)"
}, {
"etiqueta": "ruby",
"definicion": "Define una notacion de ruby"
}, {
"etiqueta": "s",
"definicion": "Define texto que no es correcto"
}, {
"etiqueta": "sub",
"definicion": "Define un texto que es sub\u00edndice"
}, {
"etiqueta": "option",
"definicion": "Define una opci\u00f3n en una lista desplegable"}]`;

function convierteJSON() {
  etiquetas = JSON.parse(etiquetas);

  //recibimos el JSON de la web en forma de string, ahora lo convertimos a array;

  etiquetas2 = etiquetas.map(function(elemento) {
    return {
      etiqueta: elemento.etiqueta,
      definicion: elemento.definicion,
      mostrada: false
    };
  });
}

function main() {
  var botones = document.getElementById("botones");
  var definicion = document.getElementById("definicion");
  var acertados = document.getElementById("acertados");

  convierteJSON();

  etiquetas2.forEach(elemento => {
    botones.innerHTML += ` <button id="${elemento.definicion}" onclick="comprobarDefinicion(this)">${elemento.etiqueta}</button>`;
  });

  definicion.innerHTML = definicionAleatoria();
}

function definicionAleatoria() {
  var definicion = "";

  do {
    var numero = Math.floor(Math.random() * 6);
  } while (etiquetas2[numero].mostrada && acabado == false);

  etiquetas2[numero].mostrada = true;
  definicion = etiquetas2[numero].definicion;

  return definicion;
}

function comprobarDefinicion(elemento) {
  for (var i = 0; i < etiquetas2.length; i++) {
    if (etiquetas2[i].etiqueta == elemento.innerHTML) {
      if (definicion.innerHTML == etiquetas2[i].definicion) {
        elemento.disabled = true;
        break;
      } else fallos++;
    }
  }
  jugadas++;

  if (jugadas == etiquetas2.length) {
    acabado = true;
    definicion.innerHTML = "";
    acertados.innerHTML = `Has cometido ${fallos} fallos`;
    acabarPartida();
  } else {
    definicion.innerHTML = definicionAleatoria();
  }
}

function acabarPartida() {
  var botones = document.getElementsByTagName("button");

  for (var i = 0; i < botones.length; i++) {
    botones[i].disabled = true;
  }
}
