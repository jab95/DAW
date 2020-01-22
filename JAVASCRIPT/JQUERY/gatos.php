<?php 
    require "conexion.req.php";
    $c = new MySQLi($host,$user,$pass,$db);
    $c->query("SET NAMES utf8");
    //si recibe un parámetro por GET
    if (isset($_GET['id'])){
        $consulta = "SELECT * FROM gato WHERE id = ".$_GET['id'];
    } else {
        $consulta = "SELECT * FROM gato";
    }
    $resultado = $c->query($consulta);
    echo json_encode($resultado->fetch_all(MYSQLI_ASSOC));
?>