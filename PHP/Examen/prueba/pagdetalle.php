<?php 

    $id = $_GET['id'];

    require "config.php";

    $resultado = $dwes->query("SELECT * FROM TEST_CLIENTS where id=$id");

    while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {

        echo "Identificador: ".$registro->id."<br />";
        echo "Nane: ".$registro->name."<br />";
        echo "Direction: ".$registro->description."<br />";
        echo "Address: ".$registro->address."<br />";
        echo "type: ".$registro->type."<br /><br />";
    
    }
    echo "<a href='ej5.php'>Volver</a>";
    




?>