let interval = null;
let isPaused = true;
let tiempoCrono = null;
let contadorSegundos = 0;
let contadorMinutos = 0;
let contadorHoras = 0;
let ss = 0;
let mm = 0;
let hh = 0;
let interval2 = null;
let x = null;
let activo = true;

onload = () => {
  x = document.getElementById("flecha");
  tiempoCrono = document.getElementById("tiempoCrono");
  CreaIntervalos();
};
Manipula = e => {
  if (e.getAttribute("id") == "start") {
    isPaused = false;
    if (activo == false) CreaIntervalos();
    activo = true;
  } else if (e.getAttribute("id") == "stop") {
    activo = true;
    isPaused = true;
  } else if (e.getAttribute("id") == "reset") {
    if (activo != false) {
      clearInterval(interval2);
      clearInterval(interval);
      tiempoCrono.innerHTML = "00:00:00";
      x.style.transform = "rotate(" + 0 + "deg)";
      activo = false;
      ss = 0;
      mm = 0;
      hh = 0;
      contadorMinutos = 0;
      contadorSegundos = 0;
      contadorHoras = 0;
    }
  }
};

CreaIntervalos = () => {
  let contador = 5;

  interval = setInterval(() => {
    if (!isPaused) {
      x.style.transform = "rotate(" + contador + "deg)";
      contador += 0.5;
    }
  }, 84);

  interval2 = setInterval(() => {
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

      tiempoCrono.innerHTML = hh + ":" + mm + ":" + ss;
    }
  }, 1000);
};
