let error1 = null;
let error2 = null;
let error3 = null;
let error4 = null;
let contadorAcertados;
let intentos = 0;
let acierto;
let btnReinicio = null;
let parrafoAciertos = null;
let preguntas;


Main = () => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {

                preguntas = JSON.parse(xhr.responseText);

                RellenarPreguntasYRespuestas();

            }
        }
    }

    xhr.open("GET", "datos.json?nocache=" + Math.random(), true);
    xhr.send();
}

RellenarPreguntasYRespuestas = () => {

    for (let index = 0; index < preguntas.length; index++) {
        document.getElementById("pregunta" + (index + 1)).innerHTML = preguntas[index].pregunta
            + document.getElementById("pregunta" + (index + 1)).innerHTML;
    }

    for (let index = 0; index < preguntas[0].respuestas.length; index++) {
        document.getElementById("respuestas1").innerHTML += `<input type="checkbox" name="cb" id="cb${index + 1}" />
        ${preguntas[0].respuestas[index]}`;
    }
    for (let index = 0; index < preguntas[1].respuestas.length; index++) {
        document.getElementById("respuestas2").innerHTML += `<input type="radio" name="radio" value="${index + 1}" id="r${index + 1}" />
        ${preguntas[1].respuestas[index]} <br>`;
    }

    let cadena = "";
    cadena = '<select name="select" id="select">';
    for (let index = 0; index < preguntas[2].respuestas.length; index++) {
        cadena += `<option value="${index}">
        ${preguntas[2].respuestas[index]} </option>`;
    }

    cadena += "</select>";
    document.getElementById("respuestas3").innerHTML = cadena;

}

Corregir = e => {
    error1 = document.getElementById("error1");
    error2 = document.getElementById("error2");
    error3 = document.getElementById("error3");
    error4 = document.getElementById("error4");
    parrafoAciertos = document.getElementById("aciertos");
    btnReinicio = document.getElementById("repetir");
    contadorAcertados = 0;
    acierto = 0;

    CompruebaChB();
    CompruebaRadios();
    CompruebaCombo();
    CompruebaSuma();

    if (contadorAcertados != 4) {
        intentos++;
        e.innerHTML = "Reintentar";
    } else e.disabled = true;

    if (acierto < 0) acierto = 0;
    parrafoAciertos.innerHTML =
        intentos != 1
            ? acierto + "% de preguntas acertadas, llevas " + intentos + " intentos"
            : acierto + "% de preguntas acertadas, llevas " + intentos + " intento";

    if (acierto == 100) {
        parrafoAciertos.innerHTML =
            intentos != 1
                ? "Felicidades, has terminado el test con el " +
                acierto +
                "% acertado y " +
                intentos +
                " intentos."
                : "Felicidades, has terminado el test con el " +
                acierto +
                "% acertado y " +
                intentos +
                " intento.";

        btnReinicio.style.display = "inline";
    }
};

CompruebaChB = () => {
    let cb1 = document.getElementById("cb1");
    let cb2 = document.getElementById("cb2");
    let cb3 = document.getElementById("cb3");
    let acertado = true;

    if (cb1.checked && cb3.checked && !cb2.checked) {
        acertado = true;
        acierto += 25;
    } else if (cb2.checked && cb1.checked && cb3.checked) {
        acierto += 12.5;
        acertado = false;
    } else if ((cb1.checked || cb3.checked) && !cb2.checked) {
        acierto += 12.5;
        acertado = false;
    } else {
        acierto += 0;
        acertado = false;
    }

    if (acertado == false) {
        error1.innerHTML = "X";
        contadorAcertados--;
    } else {
        contadorAcertados++;
        error1.innerHTML = "";
    }
};

CompruebaRadios = () => {
    let radios = document.getElementsByName("radio");
    let acertado = true;

    if (!radios[3].checked) acertado = false;
    CompruebaAcertado(acertado, error2);
};

CompruebaCombo = () => {
    let combo = document.getElementById("select");
    let acertado = true;

    if (combo.value != 3) acertado = false;
    CompruebaAcertado(acertado, error3);
};

CompruebaSuma = () => {
    let suma = document.getElementById("suma");
    let acertado = true;

    if (suma.value != "57") acertado = false;
    CompruebaAcertado(acertado, error4);
};

CompruebaAcertado = (acertado, parrafoError) => {
    if (acertado == false) {
        parrafoError.innerHTML = "X";
        contadorAcertados--;
    } else {
        contadorAcertados++;
        acierto += 25;
        parrafoError.innerHTML = "";
    }
};

Reiniciar = e => {
    parrafoAciertos.innerHTML = "";
    document.getElementById("corregir").disabled = false;
    e.style.display = "none";

    let elements = document.getElementById("select").options;
    elements[0].selected = true;

    let radios = document.getElementsByName("radio");
    for (let index = 0; index < radios.length; index++) {
        radios[index].checked = false;
    }

    let checkboxs = document.getElementsByName("cb");
    for (let index = 0; index < checkboxs.length; index++) {
        checkboxs[index].checked = false;
    }

    document.getElementById("suma").value = "";

    intentos = 0;
};


addEventListener("load", Main);