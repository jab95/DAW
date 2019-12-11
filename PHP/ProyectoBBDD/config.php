<?php 

    $user= 'dwes';
    $pass = 'abc123';
    $db='dwes';
    $servidor='localhost';
    $dsn = "mysql:host=$servidor;dbname=$db";

    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dwes = new PDO($dsn, $user, $pass, $opciones);

?>