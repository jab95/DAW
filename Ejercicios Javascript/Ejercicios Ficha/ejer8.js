window.addEventListener("load", main);

function main() {

    var entradaNumero = document.getElementById("numero");
    var entradaLetra = document.getElementById("letra");
    var botonComprobar = document.getElementById("comprobar");

    botonComprobar.onclick = function () {
        restoDivision(entradaNumero, entradaLetra)
    };
}

function restoDivision(numero, letra) {

    var cadena = "TRWAGMYFPDXBNJZSQVHLCKE";

    var resto = numero.value % 23;

    if (cadena.charAt(resto) == letra.value.toUpperCase()) alert("Si es igual")
    else alert("No");


}