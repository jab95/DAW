let parrafoImg;
const FECHAPROG = "2018-03-07";
let resultadoCanales;

Main = () => {
    document.getElementById("fecha-h1").innerHTML += new Date(FECHAPROG).presentaCastellano();
    parrafoImg = document.getElementById("imagenes");

    let x = new XMLHttpRequest();
    x.addEventListener("load", function () {
        resultadoCanales = JSON.parse(x.responseText);
        if (resultadoCanales.estado == 404) alert("Imposible cargar la página");
        else {
            MostrarCanales(resultadoCanales);

            document.getElementById("0").addEventListener("click", PulsaCanal);
            document.getElementById("1").addEventListener("click", PulsaCanal);
            document.getElementById("2").addEventListener("click", PulsaCanal);
            document.getElementById("3").addEventListener("click", PulsaCanal);
            document.getElementById("4").addEventListener("click", PulsaCanal);
            document.getElementById("5").addEventListener("click", PulsaCanal);

        }
    })

    x.open("GET", "http://172.30.12.10/examenanteriorjs/canales.php", true);
    x.send();



}

//PRESENTA CASTELLANO LA FECHA

Date.prototype.presentaCastellano = function () {
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    return this.getDate() + " de " + meses[this.getMonth()] + " de " + this.getFullYear();
}

MostrarCanales = (canales) => {
    cadena = "";
    for (let index = 0; index < canales.data.length; index++) {
        cadena += `<img src="logos/${canales.data[index].url}" id="${index}" />`;
    }

    parrafoImg.innerHTML = cadena;

}


PulsaCanal = (e) => {
    let id = e.target.id;
    switch (id) {
        case "0":
            MostrarProgramas(id, resultadoCanales.data[id].nombre);
            break;
        case "1":
            MostrarProgramas(id, resultadoCanales.data[id].nombre);
            break;
        case "2":
            MostrarProgramas(id, resultadoCanales.data[id].nombre);
            break;
        case "3":
            MostrarProgramas(id, resultadoCanales.data[id].nombre);
            break;
        case "4":
            MostrarProgramas(id, resultadoCanales.data[id].nombre);
            break;
        case "5":
            MostrarProgramas(id, resultadoCanales.data[id].nombre);
            break;
    }
}


MostrarProgramas = (id, nombreCanal) => {
    let x = new XMLHttpRequest();
    x.onreadystatechange = () => {
        if (x.readyState == 4 && x.status == 200) {
            if (x.responseText == "error") alert("No se puede acceder a los programas");
            else {
                let programas = JSON.parse(x.responseText);
                MostrarTabla(programas, nombreCanal);
            }
        }
    }

    x.open("POST", "http://172.30.12.10/examenanteriorjs/programas.php", true);
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    x.send("id=" + id + "&fecha=" + FECHAPROG);
}

MostrarTabla = (programas, nombreCanal) => {
    programas.sort(function (a, b) {
        if (a.hora < b.hora) return -1;
        if (a.hora > b.hora) return 1;
    })

    let cadena = `<h2>${nombreCanal}</h2>`;
    cadena += `<table border="1"><tr><th>Hora</th><th>Programa</th></tr>`;
    programas.forEach(programa => {
        cadena += `<tr><td>${programa.hora}</td><td onclick="Resalta(this)">${programa.nombre}<br><span style="display: none;";>${programa.descripcion}</span></td><tr>`
    });

    document.getElementById("tabla").innerHTML = cadena;

}

Resalta = (e) => {
    let spans = document.getElementsByTagName("span");
    for (let index = 0; index < spans.length; index++) {
        spans[index].style.display = "none";

    }
    for (let index = 0; index < spans.length; index++) {
        spans[index].style.color = "red";

    }
    e.childNodes[2].style.display = "block";
    e.childNodes[2].style.color = "red";

}

addEventListener("load", Main);