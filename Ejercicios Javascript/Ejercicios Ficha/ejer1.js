function main() {

    var btnNum = document.getElementsByTagName("button")[0]
    var btnLimp = document.getElementsByTagName("button")[1];
    var tabla = document.getElementById("tablaM");
    var inputNum = document.getElementById("numero");


    btnNum.onclick = function () {
        tabla.innerHTML = tablaM(inputNum.value);
    }

    btnLimp.onclick = function () {
        tabla.innerHTML = "";
    }
}

window.addEventListener("load", main);

function tablaM(numero) {

    var cadena = "";
    for (var i = 0; i <= 9; i++) {
        cadena += `${numero} x ${i} = ${numero*i}<br>` 
    }
    return cadena;
}