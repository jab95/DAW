<?php 
    // var_dump($_POST);
    // var_dump($_FILES); 
    // $_FILES es un array cuyos elementos son los siguientes:
    // $_FILES["foto"]["name"]
    // $_FILES["foto"]["tmp_name"] ---> lo almacena en una carpeta temporal, hemos de moverlo a donde queramos => move_uploaded_file(desde,hasta)
    // $_FILES["foto"]["type"]
    // $_FILES["foto"]["size"]
    // move_uploaded_file($_FILES["foto"]["tmp_name"],"archivos_subidos/".$_FILES["foto"]["name"]);
    if($_FILES["foto"]["type"] != "image/jpeg") {
        echo "ERROR";
    } else {
        move_uploaded_file($_FILES["foto"]["tmp_name"],"archivos_subidos/".$_POST["nombre"]."-".$_FILES["foto"]["name"]);
        echo "archivos_subidos/".$_POST["nombre"]."-".$_FILES["foto"]["name"];
    }
   
?>