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
let activo = true;
let btnStart;
let btnStop;
let btnReset;
let parrafoVueltas;
let vueltas = new Array();


Main = () => {
    tiempoCrono = document.getElementById("tiempoCrono");
    CreaIntervalos();


    btnStart = document.getElementById("start");
    btnStop = document.getElementById("stop");
    btnReset = document.getElementById("reset");
    parrafoVueltas = document.getElementById("vueltas");

    btnStart = addEventListener("click", Controlar);
    btnStop = addEventListener("click", Controlar);
    btnReset = addEventListener("click", Controlar);

}


CreaIntervalos = () => {


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

Controlar = (e) => {

    if (e.target.id == "start") {

        isPaused = false;
        if (activo == false) {
            CreaIntervalos();
            horaInicial = new Date();
        };
        activo = true;
    } else if (e.target.id == "stop") {

        activo = true;
        isPaused = true;


    } else if (e.target.id == "vuelta") {

        if (!isPaused) {
            if (!vueltas.includes(tiempoCrono.innerHTML)) vueltas.push(tiempoCrono.innerHTML);
            MuestraVueltas();
        }

    } else if (e.target.id == "reset") {

        if (activo != false) {
            clearInterval(intervalMilisec);

            tiempoCrono.innerHTML = "00:00:00:00";
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
            parrafoVueltas.innerHTML = "";
            vueltas = [];
        }
    }

}

MuestraVueltas = () => {
    parrafoVueltas.innerHTML = "";

    for (let index = 0; index < vueltas.length; index++) {
        parrafoVueltas.innerHTML += vueltas[index] + "<br>";


    }

}

addEventListener("load", Main);






