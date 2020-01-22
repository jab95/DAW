<?php 
    require "conexion.req.php";
    $c = new MySQLi($host,$user,$pass,$db);
    $c->query("SET NAMES utf8");

    if(isset($_POST['nombre']) && isset($_POST['fecha_nacimiento'])){
        $nombre = htmlspecialchars($_POST['nombre']);
        $fecha_nacimiento = htmlspecialchars($_POST['fecha_nacimiento']);

        $sql = "INSERT gato values(null,'$nombre','$fecha_nacimiento',null)";
        if($c->query($sql)) echo json_encode(array("success"=>"registro insertado"));
        else echo json_encode(array("error"=>"registro no insertado"));

    }else{
        echo json_encode(array("error"=>"faltan datos"));

    }