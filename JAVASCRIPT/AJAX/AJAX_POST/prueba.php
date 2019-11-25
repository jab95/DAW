<?php
if ($_FILES['foto']['type'] != "image/jpeg") echo "Error";
else {
    move_uploaded_file($_FILES["foto"]["tmp_name"], "archivos_subidos/" . $_POST['nombre'] . " - " . $_FILES['foto']['name']);
    echo "archivos_subidos/" . $_POST['nombre'] . "-" . $_FILES['foto']['name'];
}
