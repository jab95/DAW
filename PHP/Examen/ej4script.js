
Main = () => {
}

EnviaFormulario = () => {

    let envia = true;

    if (
        document.getElementById("nombre").value.length == 0
        ||
        document.getElementById("address").value.length == 0
        ||
        document.getElementById("description").value.length == 0
        ||
        document.getElementById("telf").value.length == 0
    ) {
        envia = false;
        alert("Todos los datos son obligatorios");
    } else {

        var regex = /^[a-zA-Z]+$/;
        if (document.getElementById("telf").value.match(regex)) {
            alert("El campo de telefono debe de ser numerico");
            envia = false;
        }
    }


    return envia;
}

addEventListener("load", Main);