
let instituto;
let tablaHTML;

const Main = () => {

    tablaHTML = document.getElementById("tabla");

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {


        if (xhr.readyState == 4) {

            if (xhr.status == 200) {
                instituto = JSON.parse(xhr.responseText);
                MuestraDatosIntituto();
                MuestraTotalAlumnos();
                MuestraTabla();
            }
        }
    }

    xhr.open("GET", "datos.json?nocache=" + Math.random(), true);
    xhr.send();

}

const MuestraDatosIntituto = () => {

    document.getElementById("instituto").innerHTML = `Instituto: ${instituto.nombre}, Código: ${instituto.codigo}`;
}

const MuestraTotalAlumnos = () => {

    let total = 0;

    for (let index = 0; index < instituto.grupos.length; index++) {
        total += instituto.grupos[index].numalumnos;
    }

    document.getElementById("total-alumnos").innerHTML = `Total alumnos de informatica: ${total}`;
}

const MuestraTabla = () => {

    let tabla = `<table border="1"><tr><th>Grupo</th><th>Profesores</th></tr>`;
    let gruposJuana = 0;
    let grupos = new Array();

    for (let index = 0; index < instituto.grupos.length; index++) {

        tabla += `<tr><td>${instituto.grupos[index].nombre}</td><td>${instituto.grupos[index].profesores}</td></tr>`;

        if (instituto.grupos[index].profesores.includes("Juana")) {
            gruposJuana++;
            grupos.push(instituto.grupos[index].nombre);
        }
    }

    tabla += `</table>`;
    tablaHTML.innerHTML = tabla;

    document.getElementById("grupos-juana").innerHTML += `${gruposJuana} y los grupos son ${grupos}`;


}



addEventListener("load", Main);