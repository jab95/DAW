let recursoURL;
let contenido;
let datos;
let estados;
const ESTADOS = ["No inicializado", "Cargando", "Cargado", "Interactivo", "Completo"];

const Main = () => {

    //Campo recursos coloca la URL de la página
    recursoURL = document.getElementById("recurso");
    estados = document.getElementById("estados");;

    recursoURL.value = window.location;

}
const MuestraContenidos = () => {

    contenido = document.getElementById("contenidos");
    estados.innerHTML = "";

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        estados.innerHTML += ESTADOS[xhr.readyState] + "<br>";

        if (xhr.readyState == 4) {
            document.getElementById("codigo").innerHTML = xhr.status + " " + xhr.statusText;
            if (xhr.status == 200) {
                datos = xhr.responseText;
                contenido.innerHTML = datos.eliminaHTML();
                document.getElementById("cabeceras").innerHTML = xhr.getAllResponseHeaders();

            }
        }
    }
    xhr.open("GET", recursoURL.value + "?nocache=" + Math.random(), true);
    xhr.send();
}

String.prototype.eliminaHTML = function () {
    return this.replace(/</g, "&lt;").replace(/>/g, "&gt;");
}


/*

CUANDO SE MODIFICO POR ULTIMA VEZ EL ARCHIVO 

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    document.getElementById("demo").innerHTML =
    this.getResponseHeader("Last-Modified");
  }
};
xhttp.open("GET", "ajax_info.txt", true);
xhttp.send();



*/


addEventListener("load", Main);