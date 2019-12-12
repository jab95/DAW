
Main = () => {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        let canales = JSON.parse(xhr.responseText);

        for (let index = 0; index < canales.length; index++) {
            document.getElementById("imagenes").innerHTML += `<img src="logos/${canales[index].}`

        }

    }
    xhr.open("GET", "canales.php", true);
    xhr.send();
}




addEventListener("load", Main);