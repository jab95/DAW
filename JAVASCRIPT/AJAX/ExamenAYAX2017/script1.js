let nif;
let pass;


ComprobarDatos = () => {


    nif = document.getElementById("nif");
    pass = document.getElementById("pass");

    if (ValidaNif()) {
        alert("a");
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            console.log(xhr.responseText);
        }

        xhr.open("POST", "grabar.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("nif=" + nif.value + "&password=" + pass.value);
    }

}


ValidaNif = () => {

    let letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    let valido = true;

    if (!/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/.test(nif.value)) {
        document.getElementById("errorNif").innerHTML = "NIF no válido: No cumple los requisitos indicados";
        valido = false;
    } else {
        let numeros = nif.value.substring(0, 8);
        if (letras[parseInt(nif.value.substring(0, 8)) % 23] != nif.value.substring(8, 9)) {
            document.getElementById("errorNif").innerHTML = "NIF no válido: Número y letra no se corresponden";
            valido = false;

        } else {
            alert("SI FUNCIONA");
        }
    }

    return valido;
}

