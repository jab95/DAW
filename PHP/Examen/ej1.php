<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="ej4script.js"></script>
</head>

<body>



    <?php

    require "config.php";

    $resultado = $dwes->query("SELECT * FROM TEST_CLIENTS");

    ?>

    <div id="tabla">
        <table border="1">
            <tr>
                <td>NAME</td>
                <td>ADDRESS</td>
                <td>TEL</td>
            </tr>

            <?php



            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {


                if ($registro->type == "P") {
            ?>
                    <tr>
                        <td style="color: red"><?php print $registro->name ?></td>
                        <td style="color: red"><?php print $registro->address ?></td>
                        <td style="color: red"><?php print $registro->telf ?></td>
                        <td> <a href="detalle.php?" +<?php print $registro->id ?>>Detalles</a> </td>

                    </tr>

                <?php } else { ?>
                    <tr>
                        <td><?php print $registro->name ?></td>
                        <td><?php print $registro->address ?></td>
                        <td><?php print $registro->telf ?></td>
                    </tr>
            <?php
                }
            }

            ?>
        </table>
    </div>
    </div>



    <div id="formulario" class="mt-5">

        <form action="ej4.php" onsubmit="return EnviaFormulario()" method="post">


            <p>Name: <input type="text" name="name" id="nombre"></p>

            <p>Address: <input type="text" name="address" id="address"></p>


            <p>Description: <input type="text" name="description" id="description"></p>

            <p>Telf: <input type="text" name="telf" id="telf"></p>

            <p>Type:
                <select name="type" id="n">
                    <option value="N">N</option>
                    <option value="P">P</option>
                </select>

            </p>


            <input type="submit" value="Enviar">
            <input type="hidden" name="insertado">

            <?php

            if (isset($_POST['insertado'])) {
                $name = $_POST['name'];
                $address = $_POST['address'];
                $description = $_POST['description'];
                $telf = $_POST['telf'];
                $type = $_POST['type'];

                $ok = true;

                $dwes->beginTransaction();
                if ($dwes->exec("INSERT into TEST_CLIENTS (name,address,description,telf,type) values('$name','$address','$description','$telf','$type')") == 0) $ok = false;

                if ($ok) {
                    $dwes->commit();
                    print '<script type="text/javascript">
                    alert("Registro insertado con exito");
                    window.location.href="ej4.php";
                    </script>';
                }  // Si todo fue bien confirma los cambios
                else {
                    $dwes->rollback();   //  y si no, los revierte
                    print '<script type="text/javascript">
                    alert("El registro no se pudo insertar");
                    </script>';
                }
            }

            ?>

    </div>
    </form>




    </div>

</body>

</html>