
const DIAS_SEMANA_1 = ["D", "L", "M", "X", "J", "V", "S"];
const DIAS_SEMANA_2 = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];

let usuario;
let pass;
let btnLogin;

const Main = () => {

    usuario = document.getElementById("usuario");
    pass = document.getElementById("password");
    btnLogin = document.getElementById("login");


    btnLogin.addEventListener("click", Login);
}

Login = () => {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {

                let usuarioLogueado = JSON.parse(xhr.responseText);
                if (usuarioLogueado.length == 0) {
                    alert("Usuario o password desconocido")
                } else {

                    document.getElementById("lista-usuario").innerHTML = "Lista de clase de los "
                        + DIAS_SEMANA_2[new Date().getDay()] + " de " + usuarioLogueado[0].nombre;

                    CreaTabla(usuarioLogueado[0].codigo, DIAS_SEMANA_1[new Date().getDay()]);


                }

            }
        }
    }

    xhr.open("POST", "servidor/login.php?nocache=" + Math.random(), true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("usuario=" + usuario.value + "&password=" + pass.value);

}

CreaTabla = (id, dia) => {

    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {

                let alumnos = JSON.parse(xhr.responseText);

                if (alumnos.length == 0) document.getElementById("tabla").innerHTML = "!! Usted no tiene clases hoy !!";
                else {

                    let tabla = `<table border="1"><th>Nombre</th><th>Instrumento</th><th>Hora</th>`;
                    let horaDiferente = 1;
                    for (let index = 0; index < alumnos.length; index++) {

                        if (horaDiferente != 1 && horaDiferente != alumnos[index].hora) {
                            tabla += `<tr><td colspan="4" style="height: 20px;"></td></tr>`;

                        }
                        tabla += `<tr onmouseover="MuestraTelefono(this,${alumnos[index].telefono})" onmouseout="Descolorea(this)"><td>${alumnos[index].nombre}</td><td>${alumnos[index].instrumento}</td><td>${alumnos[index].hora}</td><td><button id="btnFalta" 
                        onclick="PonerFalta(${alumnos[index].id},
                                            '${new Date().formateaFecha()}',
                                            '${alumnos[index].hora}')">
                                Poner falta
                        </button></td>
                        </tr>`;

                        horaDiferente = alumnos[index].hora;
                    }

                    tabla += `</table>`;
                    // ${new Date().formateaFecha()}
                    document.getElementById("tabla").innerHTML = tabla;
                }


            }
        }
    }


    xhr.open("GET", "servidor/lista.php?profesor=" + id + "&dia=" + dia + "&nocache=" + Math.random(), true);
    xhr.send();


}


MuestraTelefono = (e, telefono) => {


    let trs = document.getElementsByTagName("tr");


    for (let index = 0; index < trs.length; index++) {
        trs[index].style.backgroundColor = "black";

    }


    e.style.backgroundColor = "blue";

    document.getElementById("telefono").innerHTML = "Teléfono: " + telefono;

}

Descolorea = (e) => {

    e.style.color = "Black";

    document.getElementById("telefono").innerHTML = "";
}


PonerFalta = (id, fecha, hora) => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = () => {

        if (xhr.readyState == 4) {
            if (xhr.status == 200) {



                if (xhr.responseText == "ok") {
                    alert("Falta registrada con exito");
                } else {
                    alert("La falta ya esta registrada");
                }


            }
        }
    }

    xhr.open("POST", "servidor/falta.php?nocache=" + Math.random(), true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("alumno=" + id + "&fecha=" + fecha + "&hora=" + hora);

}


Date.prototype.formateaFecha = function () {

    var dd = this.getDate();
    var mm = this.getMonth() + 1;

    var yyyy = this.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    var today = yyyy + '/' + mm + '/' + dd;

    return today;

}



addEventListener("load", Main);