let array = null;
let mensaje;
let primeraVezPulsada = false;
let aSidoMayor = false;
let aSidoMenor = false;
let btnReset = null;
let parrafoIntentos;
let intentos;

main = () => {
  let parrafoRefran = document.getElementById("contenido");
  mensaje = document.getElementById("mensaje");
  btnReset = document.getElementById("reset");
  parrafoIntentos = document.getElementById("intentos");

  parrafoRefran.innerHTML = `<p>`;
  btnReset.innerHTML = "";

  for (let i = 1; i <= 100; i++) {
    parrafoRefran.innerHTML += `<button type="button" id="boton${i}" class="btn btn-info botones" onclick="ComprobarNumero(this)">${i}</button>`
    if (i % 10 == 0) parrafoRefran.innerHTML += `</p><p>`;
  }

  numAAdivinar = Math.round(Math.random() * (100 - 1) + parseInt(1));
  mensaje.innerHTML = "";
  intentos = 0;
  parrafoIntentos.innerHTML = "";
  //   numAAdivinar = 100;
};

ComprobarNumero = e => {
  let numeroPulsado = e.innerHTML;
  if (numeroPulsado != numAAdivinar) {

    intentos++;

    if (numeroPulsado < numAAdivinar) {
      aSidoMayor = true;
      numeroMenorAnterior = e.innerHTML;

      if (!primeraVezPulsada && !aSidoMenor) {
        mensaje.innerHTML =
          "El numero secreto esta entre " +
          (parseInt(numeroPulsado) + 1) +
          " y 100";
        if (aSidoMenor) primeraVezPulsada = true;
      } else {
        mensaje.innerHTML =
          "El numero secreto esta entre " +
          (parseInt(numeroPulsado) + 1) +
          " y " +
          (parseInt(numeroMayorAnterior) - 1);
      }
      for (let index = numeroPulsado; index >= 1; index--) {
        let boton = document.getElementById("boton" + index);
        // boton.style.borderColor = "red";
        boton.className = "btn btn-secondary botones";

      }
    } else {
      aSidoMenor = true;
      numeroMayorAnterior = e.innerHTML;

      if (!primeraVezPulsada && !aSidoMayor) {
        mensaje.innerHTML =
          "El numero secreto esta entre 1 y " + +(parseInt(numeroPulsado) - 1);
        if (aSidoMayor) primeraVezPulsada = true;
      } else
        mensaje.innerHTML =
          "El numero secreto esta entre " +
          (parseInt(numeroMenorAnterior) + 1) +
          " y " +
          (parseInt(numeroPulsado) - 1);

      for (let index = numeroPulsado; index <= 100; index++) {
        let boton = document.getElementById("boton" + index);
        // boton.style.borderColor = "red";
        // boton.style.borderWidth = "0.2rem";
        boton.className = "btn btn-secondary botones";

      }
    }

    parrafoIntentos.innerHTML = "Has realizado " + intentos + " intentos";

  } else {
    intentos++;
    e.style.borderColor = "yellow";
    e.style.background = "orange";

    mensaje.innerHTML = "¡¡Enhorabuena, has acertado el numero secreto!!<br> ";
    btnReset.innerHTML = `<button type="button" id="btnReset" onclick="main()" class="btn btn-warning">Volver a jugar</button>`

    parrafoIntentos.innerHTML = "Has realizado " + intentos + " intentos";

  }
};

window.addEventListener("load", main, false);
