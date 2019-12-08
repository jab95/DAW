let btnDes;
let palabra;


Main = () => {

    btnDes = document.getElementById("btnDesorganiza");
    palabra = document.getElementById("palabra");

    btnDes.addEventListener("click", Desorganiza);
}


Desorganiza = () => {

    document.getElementById("resultado").innerHTML = palabra.value.Desorganizador();

}


String.prototype.Desorganizador = function () {

    if (/\w{4,}/.test(palabra.value)) {
        let arrayPalabra;
        let primeraLetra;
        let ultimaletra;
        let palabraReferencia;

        if (palabra.value.trim().indexOf(' ') != -1) {
            arrayPalabra = palabra.value.split(" ");

            for (let index = 0; index < arrayPalabra.length; index++) {
                primeraLetra = arrayPalabra[index][0]
                ultimaletra = arrayPalabra[index][arrayPalabra[index].length - 1];
                let arrayPalabraEnArray = arrayPalabra[index].split("");
                arrayPalabraEnArray.pop();
                arrayPalabraEnArray.shift();
                palabraReferencia = arrayPalabraEnArray.slice()

                do {
                    arrayPalabraEnArray = arrayPalabraEnArray.sort(function () { return Math.random() - 0.5 })
                } while (CompararArrays(arrayPalabraEnArray, palabraReferencia));

                arrayPalabraEnArray.push(ultimaletra);
                arrayPalabraEnArray.unshift(primeraLetra);
                arrayPalabraEnArray.join("");
                arrayPalabra[index] = arrayPalabraEnArray.join("");
            }

            return arrayPalabra.join(" ");
        } else {
            arrayPalabra = palabra.value.split("")
            primeraLetra = arrayPalabra[0]
            ultimaletra = arrayPalabra[arrayPalabra.length - 1];
            arrayPalabra.pop();
            arrayPalabra.shift();
            palabraReferencia = arrayPalabra.slice()

            do {
                arrayPalabra = arrayPalabra.sort(function () { return Math.random() - 0.5 })
            } while (CompararArrays(arrayPalabra, palabraReferencia));

            arrayPalabra.push(ultimaletra);
            arrayPalabra.unshift(primeraLetra);
            return arrayPalabra.join("");
        }

    } else {
        return palabra.value;

    }
}

CompararArrays = (arr1, arr2) => {
    if (arr1.length !== arr2.length)
        return false;
    for (var i = arr1.length; i--;) {
        if (arr1[i] !== arr2[i])
            return false;
    }

    return true;
}



addEventListener("load", Main);
