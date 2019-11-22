
let instituto;

const Main = () => {


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

}


addEventListener("load", Main);