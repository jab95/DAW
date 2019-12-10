<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="inicio.css">
</head>

<body>
    <nav class="d-flex justify-content-around nav-principal navbar navbar-expand-lg navbar-dark">
        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php"> Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tienda.php"> Tiendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="familia.php"> Familias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="producto.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stock.php"> Stock</a>
                </li>

            </ul>
        </div>
    </nav>
    <?php
    if (
        !isset($_POST['insertar']) && !isset($_POST['editar']) && !isset($_POST['leer'])
        && !isset($_POST['actualizar']) && !isset($_POST['eliminar'])
    ) {

        ?>

        <form action="tienda.php" method="post">

            <center>
                <button type="submit" name="insertar" class="btn btn-primary mt-5">Insertar</button>
            </center>

            <center>
                <button type="submit" name="editar" class="btn btn-primary mt-5">Editar</button>
            </center>

            <center>
                <button type="submit" name="leer" class="btn btn-primary mt-5">Leer</button>
            </center>

            <?php

            } else {

                $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
                $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123', $opciones);

                if (isset($_POST['insertar'])) {

                    if(isset($_POST['insertado'])){

                        $cod = $_POST['codigo'];
                        $nombre = $_POST['nombre'];
                        $nombre_corto = $_POST['tlf'];
                      
                         
                       
                        $ok = true;
                        $dwes->beginTransaction();
                        if ($dwes->exec("INSERT into tienda (cod,nombre,tlf) values('$cod','$nombre','$tlf')") == 0) $ok = false;

                        if ($ok) {
                            $dwes->commit();
                            print '<script type="text/javascript">
                            alert("Registro insertado con exito");
                            window.location.href="tienda.php";
                            </script>';
                        }  // Si todo fue bien confirma los cambios
                        else {
                            $dwes->rollback();   //  y si no, los revierte
                            print '<script type="text/javascript">
                            alert("El registro no se pudo insertar");
                            window.location.href="tienda.php";
                            </script>';
                        }
                }else{


                            ?>
                        <div class="container-fluid ">
                       
                        <form action="tienda.php" method="post">

                            <div class="row  justify-content-center mt-5 fila-inicio">
                                <div class="col-lg-3 col-inicio">
                                    <p>Código: <input type="text" name="codigo" id=""></p>
                                </div>
                                <div class="col-lg-3 col-inicio">
                                    <p>Nombre: <input type="text" name="nombre" id=""></p>
                                </div>
                                <div class="col-lg-3 col-inicio">

                                    <p>Telefono: <input type="text" name="tlf" id=""></p>
                                </div>
                            </div>
                              
                            <center> <input type="submit" value="Insertar" name="insertado" class="btn btn-primary mt-3"></center>
                            <input type="hidden" name="insertar">

                        </div>
                    </form>

            <?php
                    }
                } else if (isset($_POST['leer'])) {

                    $resultado = $dwes->query("SELECT * FROM tienda");

                    ?>

                <div class="row">
                    <div class="col-sm-12">
                        <center><h2>TABLA TIENDA</h2></center>
                        <table class="table table-hover table-condensed table-bordered">
                            <tr>
                                <td>Código</td>
                                <td>Nombre</td>
                                <td>Teléfono</td>
                            </tr>

                            <?php

                                    while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                                        ?>
                                <tr>
                                    <td><?php print $registro->cod ?></td>
                                    <td><?php print $registro->nombre ?></td>
                                    <td><?php print $registro->tlf ?></td>
                                </tr>
                            <?php

                                    }
                                    ?>
                        </table>
                    </div>
                </div>


                <?php

                    } else if (isset($_POST['editar'])) {

                        if (!isset($_POST['eliminar']) && !isset($_POST['actualizar'])) {

                            $resultado = $dwes->query("SELECT cod FROM tienda");

                            ?>
                    <div class="container-fluid ">

                        <form action="tienda.php" method="post">
                            <div class="row  justify-content-center  mt-5">
                                <div class="col-lg-3 col-inicio align-self-end">
                                    <p>Código:
                                        <select name="cod" id="">
                                            <?php

                                                        while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                                                            ?>
                                                <option value="<?php print $registro->cod ?>"><?php print $registro->cod ?></option>

                                            <?php
                                                        }
                                                        ?>
                                        </select>
                                    </p>
                                </div>
                                <div class="col-lg-3 col-inicio">
                                    <center> <input type="submit" value="Eliminar" name="eliminar" class="btn btn-primary mt-3"></center>
                                </div>
                                <div class="col-lg-3 col-inicio">
                                    <center> <input type="submit" value="Actualizar" name="actualizar" class="btn btn-primary mt-3"></center>
                                </div>
                                <input type="hidden" name="editar">

                            </div>
                        </form>
                    </div>
                    <?php
                            } else if (isset($_POST['eliminar'])) {

                                $codAEditar = $_POST['cod'];
                                $ok = true;
                                $dwes->beginTransaction();
                                if ($dwes->exec('DELETE FROM `stock` WHERE tienda="'.$codAEditar.'"') == 0) $ok = false;
                                if ($dwes->exec('DELETE FROM `tienda` WHERE cod="'.$codAEditar.'"') == 0) $ok = false;
                                if ($ok) {
                                    $dwes->commit();
                                    print '<script type="text/javascript">
                        alert("Registro eliminado junto a sus referencias en otras tablas");
                        window.location.href="tienda.php";
                        </script>';
                                }  // Si todo fue bien confirma los cambios
                                else {
                                    $dwes->rollback();   //  y si no, los revierte
                                    print '<script type="text/javascript">
                        alert("El registro no se pudo eliminar");
                        window.location.href="tienda.php";
                        </script>';
                                }
                            } else if (isset($_POST['actualizar'])) {

                                if (!isset($_POST['actualizado'])) {

                                    $codAEditar = $_POST['cod'];
                                    $resultado = $dwes->query('SELECT * FROM tienda where cod="' . $codAEditar . '"');
                                    $registro = $resultado->fetch(PDO::FETCH_OBJ);
                                    ?>

                                    <form action="tienda.php" method="post">
                                        <div class="container-fluid ">

                                            <div class="row  justify-content-center mt-5 fila-inicio">
                                                <div class="col-lg-3 col-inicio">
                                                    <p>Codigo: <input type="text" name="cod" value="<?php print $codAEditar ?>" id="" disabled></p>
                                                    <!-- NO SE PUEDEN PASAR CAMPOS DESABILITADOS EN EL FORM -->
                                                </div>
                                                <div class="col-lg-3 col-inicio">
                                                    <p>Nombre: <input type="text" name="nombre" id="" value="<?php print $registro->nombre ?>"></p>
                                                </div>
                                                <div class="col-lg-3 col-inicio">

                                                    <p>Teléfono: <input type="text" name="tlf" id="" value="<?php print $registro->tlf ?>"></p>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row  justify-content-center mt-5 fila-inicio">
                                                <div class="col-lg-3 col-inicio">
                                                    <center> <input type="submit" value="Actualizar" name="actualizado" class="btn btn-primary mt-3"></center>
                                                </div>

                                            </div>
                                            <input type="hidden" name="editar">
                                            <input type="hidden" name="actualizar">
                                            <input type="hidden" value="<?php print $codAEditar ?>" name="cod2">

                                    </form>
        <?php
                    } else {

                        $cod = $_POST['cod2'];
                        $nombre = $_POST['nombre'];
                        $nombre_corto = $_POST['tlf'];

                        $ok = true;
                        $dwes->beginTransaction();
                        if ($dwes->exec('UPDATE tienda set nombre="' . $nombre . '", tlf="' . $nombre_corto . '" where cod='.$cod) == 0) $ok = false;

                        if ($ok) {
                            $dwes->commit();
                            print '<script type="text/javascript">
                            alert("Registro actualizado con exito");
                            window.location.href="tienda.php";
                            </script>';
                        }  // Si todo fue bien confirma los cambios
                        else {
                            $dwes->rollback();   //  y si no, los revierte
                            print '<script type="text/javascript">
                            alert("El registro no se pudo actualizar");
                            window.location.href="tienda.php";
                            </script>';
                        }
                    }
                }
            }
        }
        ?>
        </form>

</body>

</html>