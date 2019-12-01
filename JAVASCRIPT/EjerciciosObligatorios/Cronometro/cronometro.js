let intervalMilisec;
let isPaused = true;
let tiempoCrono;
let contadorSegundos = 0;
let contadorMinutos = 0;
let contadorHoras = 0;
let contadorMilisegundos = 0;
let activo = false;
let parrafoVueltas;
let vueltas = [];
let btnStart;
let btnStop;
let btnReset;
let btnVueltas;



Main = () => {
    tiempoCrono = document.getElementById("tiempoCrono");
    parrafoVueltas = document.getElementById("vueltas");

    btnStart = document.getElementById("start");
    btnStop = document.getElementById("stop");
    btnReset = document.getElementById("reset");
    btnVueltas = document.getElementById("vuelta");

    btnStart.addEventListener("click", Controlar);
    btnStop.addEventListener("click", Controlar);
    btnReset.addEventListener("click", Controlar);
    btnVueltas.addEventListener("click", Controlar);
}


function cronometro() {
    if (!isPaused) {
        if (contadorMilisegundos < 99) {
            contadorMilisegundos++;
            if (contadorMilisegundos < 10) { contadorMilisegundos = "0" + contadorMilisegundos }
            document.getElementById("c").innerHTML = ":" + contadorMilisegundos;
        }
        if (contadorMilisegundos == 99)
            contadorMilisegundos = -1;

        if (contadorMilisegundos == 0) {
            contadorSegundos++;
            if (contadorSegundos < 10) contadorSegundos = "0" + contadorSegundos
            document.getElementById("s").innerHTML = ":" + contadorSegundos;
        }
        if (contadorSegundos == 59)
            contadorSegundos = -1;

        if (contadorMilisegundos == 0 && contadorSegundos == 0) {
            contadorMinutos++;
            if (contadorMinutos < 10) contadorMinutos = "0" + contadorMinutos
            document.getElementById("m").innerHTML = ":" + contadorMinutos;
        }
        if (contadorMinutos == 59)
            contadorMinutos = -1;

        if (contadorMilisegundos == 0 && contadorSegundos == 0 && contadorMinutos == 0) {
            contadorHoras++;
            if (contadorHoras < 10) contadorHoras = "0" + contadorHoras
            document.getElementById("h").innerHTML = contadorHoras;
        }
    }
}

Controlar = (e) => {

    if (e.target.id == "start") {

        isPaused = false;
        if (activo == false)
            intervalMilisec = setInterval(cronometro, 10);
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

            document.getElementById("h").innerHTML = "00";
            document.getElementById("m").innerHTML = ":00";
            document.getElementById("s").innerHTML = ":00";
            document.getElementById("c").innerHTML = ":00";
            activo = false;
            contadorMinutos = 0;
            contadorSegundos = 0;
            contadorHoras = 0;
            contadorMilisegundos = 0;
            parrafoVueltas.innerHTML = "";
            vueltas = [];
        }
    }

}

MuestraVueltas = () => {
    parrafoVueltas.innerHTML = "";

    for (let index = 0; index < vueltas.length; index++) {
        parrafoVueltas.innerHTML += vueltas[index];
    }
}

addEventListener("load", Main);






