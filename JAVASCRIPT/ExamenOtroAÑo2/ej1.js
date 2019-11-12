ValidarDatos = () => {
  if (
    ValidarNombre() == false ||
    ValidaContraseñas() == false ||
    ValidaMunicipios() == false
  )
    return false;
  else return true;
};

ValidarNombre = () => {
  let nombre = document.getElementById("nombreUsu");
  let errorNombre = document.getElementById("errorNombre");
  let exprContra = /\w{8,}/;
  let valido = true;

  if (/\s/.test(nombre.value) || !exprContra.test(nombre.value)) {
    errorNombre.innerHTML =
      "El nombre debe de tener al menos 8 caracteres y no puede tener espaciose en blanco";
    nombre.focus();
    valido = false;
  } else errorNombre.innerHTML = "";

  return valido;
};

ValidaContraseñas = () => {
  let contra1 = document.getElementById("contra1");
  let contra2 = document.getElementById("contra2");
  let errorContra2 = document.getElementById("errorContra2");
  let errorContra1 = document.getElementById("errorContra");
  let exprContra = /(?=.*[A-Z])(?=.*\d)\w{6,10}/;
  let valido = true;

  if (!exprContra.test(contra1.value)) {
    valido = false;
    errorContra1.innerHTML =
      "La contraseña debe contener al menos una mayuscula y un digito y tener entre 6 y 10 caracteres";
    contra1.focus();
  } else errorContra1.innerHTML = "";

  if (contra2.value != contra1.value) {
    valido = false;
    errorContra2.innerHTML =
      "Las contraseñas escritas no coinciden. Vuelve a intentarlo";
    contra1.focus();
    contra1.select();
  } else errorContra2.innerHTML = "";

  return valido;
};

ValidaMunicipios = () => {
  let municipios = document.getElementById("select");
  let errorMunicipios = document.getElementById("errorMunicipio");
  let valido = true;

  if (municipios.value == 0) {
    valido = false;
    errorMunicipios.innerHTML = "Debe de seleccionar un municipio de la lista";
  } else errorMunicipios.innerHTML = "";
  return valido;
};
