let interval = null;
let intervalMilisec = null;
let isPaused = true;
let tiempoCrono = null;
let contadorSegundos = 0;
let contadorMinutos = 0;
let contadorHoras = 0;
let contadorMilisegundos = 0;
let ss = "00";
let mm = "00";
let hh = "00";
let ms = "00";
let interval2 = null;
let x = null;
let activo = true;

onload = () => {
  x = document.getElementById("flecha");
  tiempoCrono = document.getElementById("tiempoCrono");
  CreaIntervalos();
  document.onclick = ComprobarCoordenadas;

};

CreaIntervalos = () => {

  let contador = 5;

  interval = setInterval(() => {
    if (!isPaused) {
      x.style.transform = "rotate(" + contador + "deg)";
      contador += 0.5;
    }
  }, 84);

  intervalMilisec = setInterval(() => {

    if (!isPaused) {

      ms = contadorMilisegundos;
      if (ms < 10) ms = "0" + ms;

      if (contadorMilisegundos > 59) { contadorMilisegundos = 0; contadorSegundos++; }

      contadorMilisegundos++;

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

      tiempoCrono.innerHTML = hh + ":" + mm + ":" + ss + ":" + ms;
    }

  }, 16.6);

};

ComprobarCoordenadas = (evento) => {
  var evento = evento || window.event;
  var coordenadaX = evento.clientX;
  var coordenadaY = evento.clientY;


  //SI SE PULSA EL BOTON DE START

  if ((coordenadaX > 738 && coordenadaY > 184) && (coordenadaX < 806 && coordenadaY < 248)) {
    isPaused = false;
    if (activo == false) {
      CreaIntervalos();
      horaInicial = new Date();
    };
    activo = true;

    //SI SE PULSA EL BOTON STOP

  } else if ((coordenadaX > 436 && coordenadaY > 184) && (coordenadaX < 500 && coordenadaY < 248)) {
    activo = true;
    isPaused = true;

    //SI SE PULSA EL BOTON RESET

  } else if ((coordenadaX > 579 && coordenadaY > 125) && (coordenadaX < 661 && coordenadaY < 169)) {
    if (activo != false) {
      clearInterval(interval);
      clearInterval(intervalMilisec);

      tiempoCrono.innerHTML = "00:00:00:00";
      x.style.transform = "rotate(" + 0 + "deg)";
      activo = false;
      ss = "00";
      mm = "00";
      hh = "00";
      ms = "00";
      contadorMinutos = 0;
      contadorSegundos = 0;
      contadorHoras = 0;
      contadorMilisegundos = 0;
      tiempoAcumulado = 0;
      tiempoAcumulado2 = 0;
    }
  }
}








