let adivinanzasMostradas = [];
let btnVer;
let btnPista;
let btnSolu;
let numeroAdivinanza;
let pista;
let adivinanzas;

Main = () => {

    btnVer = document.getElementById("ver");
    btnPista = document.getElementById("pista");
    btnSolu = document.getElementById("solucion");

    btnVer.addEventListener("click", MostrarAdivinanza);
    btnPista.addEventListener("click", MostrarPista);
    btnSolu.addEventListener("click", MostrarSolu);


}

MostrarAdivinanza = () => {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {

                adivinanzas = JSON.parse(xhr.responseText);

                if (adivinanzasMostradas.length == adivinanzas.length) {

                    alert("Se han mostrado todas las adivinanzas");

                } else {

                    do {

                        numeroAdivinanza = Math.floor(Math.random() * adivinanzas.length);

                    } while (adivinanzasMostradas.includes(numeroAdivinanza));

                    adivinanzasMostradas.push(numeroAdivinanza);

                    adivinanzaAMostrar = adivinanzas[numeroAdivinanza].versos;

                    document.getElementById("adivinanza").innerHTML = adivinanzaAMostrar;
                    btnPista.style.display = "inline";
                    btnSolu.style.display = "inline";

                }
            }
        }
    }

    xhr.open("GET", "datos.json?nocache=" + Math.random(), true);
    xhr.send();
}

MostrarPista = () => {

    alert(adivinanzas[numeroAdivinanza].pista);

}

MostrarSolu = () => {
    document.getElementById("adivinanza").innerHTML += `<h2 style='color:red;'>${adivinanzas[numeroAdivinanza].solucion}</h2>`
    btnSolu.style.display = "none";
    btnPista.style.display = "none";
}


addEventListener("load", Main);
