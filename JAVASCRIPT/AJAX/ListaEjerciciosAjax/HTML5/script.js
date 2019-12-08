let etiquetas;
let numDefi;
let defisMostradas = [];
let aciertos = 0;
let errores = 0;
let pulsadas = 0;

addEventListener("load", function () {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                etiquetas = JSON.parse(xhr.responseText);

                etiquetas.sort(function (a, b) {
                    var x = a.etiqueta; var y = b.etiqueta;
                    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
                });

                let contenido = "";

                for (let index = 0; index < etiquetas.length; index++) {

                    contenido += `<button id="${index}" onclick="ComparaDefinicion(this)">&lt;${etiquetas[index].etiqueta}&gt;</button>`
                    if (index != 0 && index % 12 == 0) contenido += "<br>";

                }

                document.getElementById("contenido").innerHTML = contenido;

                numDefi = DefineDefinicion();

                document.getElementById("definicion").innerHTML = etiquetas[numDefi].definicion;

            }
        }
    }

    xhr.open("GET", "etiquetas_html5.json?nocache=" + Math.random(), true);
    xhr.send();


})


ComparaDefinicion = e => {
    if (etiquetas[e.id].definicion == etiquetas[numDefi].definicion) {
        e.style.color = "green";
        aciertos++;
    }
    else {
        e.style.color = "red";
        errores++;
    }
    e.disabled = true;
    pulsadas++;

    numDefi = DefineDefinicion();
    document.getElementById("definicion").innerHTML = etiquetas[numDefi].definicion;
    let porcentaje = ((aciertos / pulsadas) * 100);
    document.getElementById("aciertos").innerHTML = "Aciertos: " + aciertos + " " + porcentaje + "%";

}

DefineDefinicion = () => {
    do {

        numDefi = Math.floor(Math.random() * etiquetas.length);

    } while (defisMostradas.includes(numDefi));
    defisMostradas.push(numDefi);

    return numDefi;
}