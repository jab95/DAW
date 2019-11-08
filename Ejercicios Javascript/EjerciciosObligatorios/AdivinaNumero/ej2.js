let array = null;
let mensaje;
let primeraVezPulsada = false;
let aSidoMayor = false;
let aSidoMenor = false;
let btnReset=null;

main = () => {
  let parrafoRefran = document.getElementById("contenido");
  mensaje = document.getElementById("mensaje");
  btnReset = document.getElementById("reset");
  
  parrafoRefran.innerHTML = `<p>`;
  btnReset.innerHTML="";
  
  for (let i = 1; i <= 100; i++) {
    parrafoRefran.innerHTML += `<button class="botones" id="boton${i}" onclick="ComprobarNumero(this)">${i}</button>`;
    if(i%10==0) parrafoRefran.innerHTML += `</p><p>`;
  }

  numAAdivinar = Math.round(Math.random() * (100 - 1) + parseInt(1));
  mensaje.innerHTML="";
  //   numAAdivinar = 100;
};

ComprobarNumero = e => {
  let numeroPulsado = e.innerHTML;
  if (numeroPulsado != numAAdivinar) {
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
          (parseInt(numeroMayorAnterior) - 1) +
          " y " +
          (parseInt(numeroPulsado) + 1);
      }
      for (let index = numeroPulsado; index >= 1; index--) {
        let boton = document.getElementById("boton" + index);
        boton.style.borderColor = "red"; 
      }
    } else {
      aSidoMenor = true;
      numeroMayorAnterior = e.innerHTML;

      if (!primeraVezPulsada && !aSidoMayor) {
        mensaje.innerHTML =
          "El numero secreto esta entre " +
          (parseInt(numeroPulsado) - 1) +
          " y 1";

        if (aSidoMayor) primeraVezPulsada = true;
      } else
        mensaje.innerHTML =
          "El numero secreto esta entre " +
          (parseInt(numeroMenorAnterior) + 1) +
          " y " +
          (parseInt(numeroPulsado) - 1);

      for (let index = numeroPulsado; index <= 100; index++) {
        let boton = document.getElementById("boton" + index);
        boton.style.borderColor = "red";       }
    }
  } else {
    e.style.borderColor = "yellow";
    mensaje.innerHTML = "Enhorabuena, has acertado el numero secreto!!<br> ";
    btnReset.innerHTML = "<button onclick='main()'>Volver a jugar</button>";
  }
};

window.addEventListener("load", main, false);
