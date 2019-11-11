addEventListener("load", main);

function main() {

    var binario = document.getElementById("Binario");
    var octal = document.getElementById("Octal");
    var hexa = document.getElementById("Hexadecimal");
    var numero = document.getElementById("numero");

    binario.onclick = function () {
        convertir(numero, 1);
    }

    octal.onclick = function () {
        convertir(numero, 2);
    }
    hexa.onclick = function () {
        convertir(numero, 3);
    }
}

function convertir(numeroAConvertir, numeroOpcion) {

    var resultado;

    switch (numeroOpcion) {
        case 1:
            resultado = Number(numeroAConvertir.value).toString(2);
            break;
        case 2:
            resultado = Number(numeroAConvertir.value).toString(8);
            break;
        case 3:
            resultado = Number(numeroAConvertir.value).toString(16);
            break;
    }

    document.getElementById("resultado").innerHTML = resultado;

}