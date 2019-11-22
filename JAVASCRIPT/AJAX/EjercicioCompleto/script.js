let tabla = null;
let alumnos;

const DIAS = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];

const Main = () => {

    tabla = document.getElementById("tabla");

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                alumnos = JSON.parse(xhr.responseText);
                TratarAlumnos();
                OrdenarAlumnos();
                CreaTabla();
            }
        }
    }
    xhr.open("GET", "alumnos.json?nocache=" + Math.random(), true);
    xhr.send();

}


TratarAlumnos = () => {


    for (let index = 0; index < alumnos.length; index++) {

        let media = 0;

        alumnos[index].diaNacimiento = DIAS[new Date(alumnos[index].fechanac).getDay()];

        for (let j = 0; j < alumnos[index].notas.length; j++) {
            !alumnos[index].notas[j].convalida ? media += alumnos[index].notas[j].nota : media += 5;
        }

        alumnos[index].notaMedia = media / alumnos[index].notas.length;

    }
}


OrdenarAlumnos = () => {

    alumnos.sort((a, b) => {
        if (a.notaMedia > b.notaMedia) return 1;
        else return -1;
    })
}

CreaTabla = () => {


    for (let index = 0; index < alumnos.length; index++) {
        tabla.innerHTML +=
            `<tr>
            <td>${alumnos[index].nombre}</td>
            <td>${alumnos[index].diaNacimiento}</td>
            <td>${alumnos[index].notaMedia}</td>
        </tr>`;
    }
}


addEventListener("load", Main);