const refran = "no sabes hablar ingles";
let araryRefran = Array.from(refran);
let interval = null;
let botonIniciar = null;
let usados = new Array(refran.length);
let numerosDados = 0;
let repe = true;
let enlaceARecargar =
  '<a href="ej2.html">La partida a terminado, da click aqui para recargar</a>';

window.onload = () => {
  let parrafoRefran = document.getElementById("refran");

  for (let i = 0; i < araryRefran.length; i++) {
    if (araryRefran[i] == " ") parrafoRefran.innerHTML += "&nbsp;";
    else parrafoRefran.innerHTML += `<button  id="boton${i}">&nbsp;</button>`;
  }
};

ManipularContador = e => {
  if (e.innerHTML == "Iniciar") {
    e.disabled = true;
    botonIniciar = e;

    interval = setInterval(() => {
      let contador = aleatorio(0, refran.length - 1);
      if (araryRefran[contador] != " ") {
        let boton = document.getElementById(`boton${contador}`);
        boton.innerHTML = araryRefran[contador];
      }
    }, 1000);
  } else if (e.innerHTML == "Parar") {
    clearInterval(interval);
    botonIniciar.disabled = false;
  }
};

function aleatorio(min, max) {
  if (usados.length != max - min) {
    while (repe != false && interval != null) {
      var num = Math.floor(Math.random() * (max - min + 1)) + min;
      var repe = repetido(num);

      if (numerosDados == araryRefran.length) {
        clearInterval(interval);
        interval = null;
        repe = false;
        document.getElementById("botones").innerHTML = enlaceARecargar;
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
