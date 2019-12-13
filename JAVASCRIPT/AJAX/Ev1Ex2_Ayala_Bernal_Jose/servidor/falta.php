<?php
/* Script que recibe por POST el identificador del alumno, la fecha de la falta y la hora e 
inserta un nuevo registro en la tabla falta.
Si el registro ya existe devolverá la cadena "error", si no existe, lo insertará y devolverá
la cadena "ok", en minúsculas */

include "conexion.inc.php";
$alumno = $_POST['alumno'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$c = new MySQLi($host,$user,$pass,$bd);
$sql = "SELECT id FROM falta WHERE 
               alumno_id = $alumno AND fecha='$fecha' AND hora='$hora'";
$resultado = $c->query($sql);
if ($resultado->num_rows>0){
    echo "error";
}else{
    $c->query("INSERT falta VALUES (NULL,'$fecha','$hora',$alumno)");
    echo "ok";
}
$c->close();
?>