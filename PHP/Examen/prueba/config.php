<?php

$user = 'root';
$pass = 'pp123';
$db = 'test_clients';
$servidor = 'localhost';
$dsn = "mysql:host=$servidor;dbname=$db";

$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$dwes = new PDO($dsn, $user, $pass, $opciones);
