let palabras = ["hola", "como", "estas"];
let palabra = 0;
let palabraElegida = "";
let resultado = "";
let parrafo = null;
let letras;
let contadorFallados;
let imagen = null;
let parrafoResultado = null;
let terminado;

Main = () => {
  palabra = Math.floor(Math.random() * (palabras.length - 0)) + 0;
  parrafo = document.getElementById("palabra");
  palabraElegida = palabras[palabra];
  imagen = document.getElementsByTagName("img")[0];
  parrafoResultado = document.getElementsByTagName("h2")[0];
  terminado = false;
  contadorFallados = 1;
  letras = [];

  for (let index = 0; index < palabraElegida.length; index++) {
    parrafo.innerHTML += `<span>&nbsp;</span>`;
    parrafo.innerHTML += `&nbsp;`;
  }

  window.addEventListener("keyup", PulsaLetra);
};

PulsaLetra = e => {
  let letraPulsada = e.key.toLowerCase();
  if (!terminado) {
    if (!palabraElegida.includes(letraPulsada)) {
      contadorFallados++;
      imagen.src = `img${contadorFallados}Ahor.png`;
      document.getElementById("letrasUsadas").innerHTML += letraPulsada + " ";
    }
    if (contadorFallados < 6) {
      resultado = "";
      for (let index = 0; index < palabraElegida.length; index++) {
        if (palabraElegida.charAt(index) == letraPulsada) {
          letras[index] = "" + letraPulsada;
        } else if (letras[index] == undefined) {
          letras[index] = "&nbsp;";
        }
      }

      for (let index = 0; index < letras.length; index++) {
        if (letras[index] != "&nbsp;")
          resultado += `<span>${letras[index]}</span>`;
        else resultado += `<span>&nbsp;</span>`;
        resultado += "&nbsp;";
      }
      parrafo.innerHTML = resultado;
    } else {
      parrafoResultado.innerHTML = "HAS MUERTO, JUEGO TERMINADO";
      imagen.src = `img6Ahor.png`;
      terminado = true;
      document.getElementById("reiniciar").style.display = "inline";
    }

    if (!letras.includes("&nbsp;")) {
      parrafoResultado.innerHTML = "HAS ACERTADO LA PALABRA, FELICIDADES!!";
      terminado = true;
      document.getElementById("reiniciar").style.display = "inline";
    }
  }
};

ReiniciarJuego = e => {
  imagen.src = "img1Ahor.png";
  document.getElementById("letrasUsadas").innerHTML = "Letras usadas<br>";
  e.style.display = "none";
  parrafoResultado.innerHTML = "";
  parrafo.innerHTML = "";
  Main();
};

addEventListener("load", Main);
