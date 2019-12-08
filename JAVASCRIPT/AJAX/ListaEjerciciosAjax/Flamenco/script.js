addEventListener("load", function () {

    CreaTabla();

})


CreaTabla = () => {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {

                let espectaculos = JSON.parse(xhr.responseText);

                let tabla = `<table border="1">`;
                tabla += `<tr><th>Fecha</th><th>Espectaculos</th><th>Artistas</th><th>Votos</th><th></th><tr>`;

                for (let index = 0; index < espectaculos.length; index++) {

                    tabla += `<tr  onmouseover="Colorea(this)" id="${espectaculos[index].foto}"><td>${new Date(espectaculos[index].fecha).presentaCastellano()}</td><td>${espectaculos[index].espectaculo}</td><td>${espectaculos[index].artista}</td><td>${espectaculos[index].votos}</td><td><button value="${espectaculos[index].idespectaculo}" onclick="Votar(this)">Votar</button></td></tr>`;
                }

                tabla += `</table>`;
                document.getElementById("tabla").innerHTML += tabla;

            }
        }
    }

    xhr.open("GET", "espectaculos.php?nocache=" + Math.random(), true);
    xhr.send();

}

Colorea = (e) => {


    let trs = document.getElementsByTagName("tr");
    for (let index = 0; index < trs.length; index++) {
        trs[index].style.color = "black";

    }
    e.style.color = "red";

    let foto = "";
    e.id == "null" ? foto = "" : foto = `fotos/${e.id}`;
    document.getElementById("imagen").src = foto;
}

Votar = (e) => {

    var x = new XMLHttpRequest();

    x.onreadystatechange = () => {
        if (x.readyState == 4) {
            if (x.status == 200) {
                let respuesta = x.responseText;
                if (respuesta == 200) {
                    document.getElementById("tabla").innerHTML = "";
                    CreaTabla();
                } else {
                    alert("Fallado");
                }
            }
        }
    }

    x.open("POST", "votar.php");
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    x.send("id=" + e.value);
}

Date.prototype.presentaCastellano = function () {
    let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    return dias[this.getDay()] + ", " + this.getDate() + " de " + meses[this.getMonth()] + " de " + this.getFullYear();
}


