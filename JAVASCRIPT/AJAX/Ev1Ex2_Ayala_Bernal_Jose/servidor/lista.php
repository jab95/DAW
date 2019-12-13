<?php
/* Script que recibe por GET el código de un profesor (profesor) y la letra del día de la semana (dia)
y devuelve en formato JSON un array formado por id, nombre, telefono, hora e instrumento. 
Este array tendrá tantos elementos como alumnos tenga ese profesor ese día.
Si ese día el profesor no tiene ningún alumno el array estará vacío */

include "conexion.inc.php";
$profesor = $_GET['profesor'];
$dia = $_GET['dia'];
$c = new MySQLi($host,$user,$pass,$bd);
$c->query("SET NAMES utf8");
$sql = "SELECT alumno.id AS id, 
               CONCAT(alumno.apellidos,', ',alumno.nombre) AS nombre, 
               alumno.telefono AS telefono,
               alumno_has_instrumento.hora AS hora, 
               instrumento.nombre AS instrumento 
        FROM alumno_has_instrumento 
        JOIN alumno ON alumno_has_instrumento.alumno_id = alumno.id 
        JOIN instrumento ON alumno_has_instrumento.instrumento_id = instrumento.id 
        JOIN profesor ON profesor.codigo = instrumento.profesor_codigo 
        WHERE profesor.codigo = '$profesor' AND dia_semana = '$dia' 
        ORDER BY 4,2";
$resultado = $c->query($sql);
echo json_encode($resultado->fetch_all(MYSQLI_ASSOC));
$c->close();
?>