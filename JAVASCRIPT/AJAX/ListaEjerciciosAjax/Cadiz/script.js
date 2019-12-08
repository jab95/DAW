let selectComarcas;
let selectMunicipios;
let municipios;

addEventListener("load", function () {
    CargaComarcas();
    selectComarcas = document.getElementById("comarca");
    selectMunicipios = document.getElementById("municipio");

    selectComarcas.addEventListener("change", CargaMunicipios);
    selectMunicipios.addEventListener("change", CargaDatos);
})


CargaComarcas = () => {


    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {

                let comarcas = JSON.parse(xhr.responseText);

                let options = "";

                for (let index = 0; index < comarcas.length; index++) {
                    options += `<option value="${comarcas[index].id}" >${comarcas[index].nombre}</option>`;
                }

                document.getElementById("comarca").innerHTML += options;

            }
        }
    }

    xhr.open("GET", "comarcas.php?nocache=" + Math.random(), true);
    xhr.send();


}

CargaMunicipios = (e) => {

    if (e.target.id != "-1") {
        var x = new XMLHttpRequest();


        x.onreadystatechange = () => {
            if (x.readyState == 4) {
                if (x.status == 200) {
                    municipios = JSON.parse(x.responseText);
                    console.log(municipios);

                    let options = "";
                    options = `<option value="-1">--Elegir--</option>`;

                    for (let index = 0; index < municipios.length; index++) {
                        options += `<option value = "${index}" > ${municipios[index].nombre}</option > `;
                    }

                    document.getElementById("municipio").innerHTML = options;
                }
            }
        }

        x.open("POST", "municipios.php");
        x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        x.send("comarca=" + e.target.value);

    }

}

CargaDatos = (e) => {

    document.getElementById("nombreMuni").innerHTML = municipios[e.target.value].nombre;

    let datos = "";

    datos = "Población: " + municipios[e.target.value].poblacion + "<br>";
    datos += "Superficie: " + municipios[e.target.value].superficie + "km2 <br>";
    datos += "Densidad de población: " + (municipios[e.target.value].poblacion / municipios[e.target.value].superficie) + " habitantes km2<br>";
    datos += "Altitud: " + municipios[e.target.value].altitud + " metros sobre el nivel del mar<br>";
    datos += "Gentilicio: " + municipios[e.target.value].gentilicio + "<br>";
    datos += "Gentilicio: " + municipios[e.target.value].pedanias + "<br>";

    document.getElementById("datos").innerHTML = datos;
}

