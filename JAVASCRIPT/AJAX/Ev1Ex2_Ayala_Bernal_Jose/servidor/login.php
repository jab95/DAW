<?php
/* Script que recibe por POST un nombre de usuario (nombre) y una contraseña (password)
y devuelve en formato JSON un array con el código y el nombre del profesor. 
Este array tendrá un solo elemento, si los datos son correctos, o estará vacío en caso contrario */

include "conexion.inc.php";
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$c = new MySQLi($host,$user,$pass,$bd);
$c->query("SET NAMES utf8");
$sql = "SELECT codigo,nombre FROM profesor WHERE usuario = '$usuario' AND password = MD5('$password')";
$resultado = $c->query($sql);
echo json_encode($resultado->fetch_all(MYSQLI_ASSOC));
$c->close();
?>