ValidarDatos = () => {

    if(ValidaContraseñas()==false || ValidaIncidio()==false) return false;
    else return true;

}

ValidaContraseñas = ()=>{

    let contra1 = document.getElementById("contra1");
    let contra2 = document.getElementById("contra2");
    let errorContra2 = document.getElementById("errorContra2");
    let errorContra1 = document.getElementById("errorContra");
    let exprContra = /^[A-Z](?=.*\d)\w{5,}$/;
    let valido = true;

    if (/\s/.test(contra1.value) || !exprContra.test(contra1.value)) {
        valido = false;
        errorContra1.innerHTML = "La contraseña debe empezar por una letra mayúscula, tener un mínimo de 6 caracteres y contener, al menos, un dígito";
        contra1.focus();
    } else errorContra1.innerHTML = "";


    if (contra2.value != contra1.value) {
        valido = false;
        errorContra2.innerHTML = "Las contraseñas escritas no coinciden. Vuelve a intentarlo";
        contra1.focus();
        contra1.select();
    } else errorContra2.innerHTML = "";

    return valido;
}

ValidaIncidio = () =>{
    let indicio = document.getElementById("indicio");
    let contra1 = document.getElementById("contra1");
    let errorIndicio = document.getElementById("errorIndicio");
    let exprREg = new RegExp(contra1.value);
    let valido=true;

    if(exprREg.test(indicio.value)){
        errorIndicio.innerHTML = "El indicio de contraseña no puede contener la contraseña";  
        valido=false; 
    }else errorIndicio.innerHTML = "";   
    
    return valido;

}