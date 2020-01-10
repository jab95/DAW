<?php 

    header("Access-Control-Allow-Origin: *");
    $c = new MySQLI("localhost","root","madre","provincias");
    $c -> query("SET NAMES utf8");

    $r = $c->query("select * from autonomias");
    echo json_encode($r->fetch_all(MYSQLI_ASSOC));

?>