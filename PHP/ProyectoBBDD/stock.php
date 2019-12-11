<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="inicio.css">
</head>

<body>
    <nav id="navbarNav" class="d-flex justify-content-around nav-principal navbar navbar-expand-lg navbar-dark">

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
    </nav>
    <?php

    require "config.php";


    if (
        !isset($_POST['insertar']) && !isset($_POST['editar']) && !isset($_POST['leer'])
        && !isset($_POST['actualizar']) && !isset($_POST['eliminar'])
    ) {

        ?>

        <form action="stock.php" method="post">

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
               
                if (isset($_POST['insertar'])) {

                    if (isset($_POST['insertado'])) {

                        $producto = $_POST['producto'];
                        $tienda = $_POST['tienda'];
                        $unidades = $_POST['unidades'];

                        $ok = true;
                        $dwes->beginTransaction();
                        if ($dwes->exec("INSERT into stock (producto,tienda,unidades) values('$producto',$tienda,$unidades')") == 0) $ok = false;

                        if ($ok) {
                            $dwes->commit();
                            print '<script type="text/javascript">
                            alert("Registro insertado con exito");
                            window.location.href="stock.php";
                            </script>';
                        }  // Si todo fue bien confirma los cambios
                        else {
                            $dwes->rollback();   //  y si no, los revierte
                            print '<script type="text/javascript">
                            alert("El registro no se pudo insertar");
                            window.location.href="stock.php";
                            </script>';
                        }
                    } else {

                        $resultadoTiendas = $dwes->query('SELECT * FROM tienda');
                        $resultadoProducto = $dwes->query('SELECT * FROM producto');

                        ?>
                    <div class="container-fluid ">

                        <form action="stock.php" method="post">

                            <div class="row  justify-content-center mt-5 fila-inicio">
                                <div class="col-lg-3 col-inicio">
                                    <p>Producto: <select name="producto" id="">
                                            <?php

                                                        while ($registro = $resultadoProducto->fetch(PDO::FETCH_OBJ)) {
                                                            ?>

                                                <option value="<?php print $registro->cod ?>"><?php print $registro->cod ?></option>

                                            <?php

                                                        }
                                                        ?>
                                        </select> </p>
                                </div>
                                <div class="col-lg-3 col-inicio">
                                    <p>Tienda: <select name="tienda" id="">
                                            <?php

                                                        while ($registro2 = $resultadoTiendas->fetch(PDO::FETCH_OBJ)) {
                                                            ?>

                                                <option value="<?php print $registro2->cod ?>"><?php print $registro2->nombre ?></option>

                                            <?php

                                                        }
                                                        ?>
                                        </select> </p>
                                </div>
                                <div class="col-lg-3 col-inicio">

                                    <p>Unidades: <input type="text" name="unidades" id=""></p>
                                </div>
                            </div>

                            <center> <input type="submit" value="Insertar" name="insertado" class="btn btn-primary mt-3"></center>
                            <input type="hidden" name="insertar">

                    </div>
        </form>

    <?php
            }
        } else if (isset($_POST['leer'])) {

            $resultado = $dwes->query("SELECT * FROM stock");

            ?>

    <div class="row">
        <div class="col-sm-12">
            <center>
                <h2>TABLA STOCK</h2>
            </center>
            <table class="table table-hover table-condensed table-bordered">
                <tr>
                    <td>Producto</td>
                    <td>Tienda</td>
                    <td>Unidades</td>
                </tr>

                <?php

                        while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                            ?>
                    <tr>
                        <td><?php print $registro->producto ?></td>
                        <td><?php print $registro->tienda ?></td>
                        <td><?php print $registro->unidades ?></td>
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

                $resultadoTiendas = $dwes->query('SELECT * FROM tienda');
                $resultadoProducto = $dwes->query('SELECT * FROM producto');

                ?>
        <div class="container-fluid ">

            <form action="stock.php" method="post">
                <div class="row  justify-content-center  mt-5">
                    <div class="col-lg-3 col-inicio align-self-end">
                        <p>Producto: <select name="producto" id="">
                                <?php

                                            while ($registro = $resultadoProducto->fetch(PDO::FETCH_OBJ)) {
                                                ?>

                                    <option value="<?php print $registro->cod ?>"><?php print $registro->cod ?></option>

                                <?php

                                            }
                                            ?>
                            </select> </p>
                    </div>
                    <div class="col-lg-3 col-inicio align-self-end">
                        <p>Tienda: <select name="tienda" id="">
                                <?php

                                            while ($registro2 = $resultadoTiendas->fetch(PDO::FETCH_OBJ)) {
                                                ?>

                                    <option value="<?php print $registro2->cod ?>"><?php print $registro2->nombre ?></option>

                                <?php

                                            }
                                            ?>
                            </select> </p>
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

                    $codAEditar1 = $_POST['producto'];
                    $codAEditar2 = $_POST['tienda'];
                    $ok = true;
                    $dwes->beginTransaction();
                    if ($dwes->exec('DELETE FROM `stock`  where producto="' . $codAEditar1 . '" and tienda=' . $codAEditar2 . '') == 0) $ok = false;
                    if ($ok) {
                        $dwes->commit();
                        print '<script type="text/javascript">
                        alert("Registro eliminado con exito");
                        window.location.href="stock.php";
                        </script>';
                    }  // Si todo fue bien confirma los cambios
                    else {
                        $dwes->rollback();   //  y si no, los revierte
                        print '<script type="text/javascript">
                        alert("El registro no se pudo eliminar, compruebe que no tenga claves foraneas o que el producto exista en esa tienda");
                        window.location.href="stock.php";
                        </script>';
                    }
                } else if (isset($_POST['actualizar'])) {

                    if (!isset($_POST['actualizado'])) {

                        $codAEditar1 = $_POST['producto'];
                        $codAEditar2 = $_POST['tienda'];

                        $resultado = $dwes->query('SELECT unidades FROM stock where producto="' . $codAEditar1 . '" and tienda=' . $codAEditar2 . '');
                        if ($resultado->fetch(PDO::FETCH_OBJ) == false) {

                            print '<script type="text/javascript">
                                        alert("El producto no esta en esta tienda");
                                        window.location.href="stock.php";
                                        </script>';
                        } else {

                            $resultado = $dwes->query('SELECT * FROM stock where producto="' . $codAEditar1 . '" and tienda=' . $codAEditar2 . '');
                            $registro = $resultado->fetch(PDO::FETCH_OBJ);
                            ?>

                <form action="stock.php" method="post">
                    <div class="container-fluid ">

                        <div class="row  justify-content-center mt-5 fila-inicio">
                            <div class="col-lg-3 col-inicio">
                                <p>Producto: <input type="text" name="producto" value="<?php print $codAEditar1 ?>" id="" disabled></p>
                                <!-- NO SE PUEDEN PASAR CAMPOS DESABILITADOS EN EL FORM -->
                            </div>
                            <div class="col-lg-3 col-inicio">
                                <p>Tienda: <input type="text" name="tienda" id="" value="<?php print $codAEditar2 ?>" disabled></p>
                            </div>
                            <div class="col-lg-3 col-inicio">

                                <p>Unidades: <input type="text" name="unidades" id="" value="<?php print $registro->unidades ?>"></p>
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
                    <input type="hidden" value="<?php print $codAEditar1 ?>" name="cod1">
                    <input type="hidden" value="<?php print $codAEditar2 ?>" name="cod2">

                </form>
<?php
                }
            } else {

                $cod1 = $_POST['cod1'];
                $cod2 = $_POST['cod2'];
                $unidades = $_POST['unidades'];

                $ok = true;
                $dwes->beginTransaction();
                if ($dwes->exec('UPDATE stock set unidades="' . $unidades . '" where producto="' . $cod1 . '" and tienda=' . $cod2 . '') == 0) $ok = false;

                if ($ok) {
                    $dwes->commit();
                    print '<script type="text/javascript">
                                    alert("Registro actualizado con exito");
                                    window.location.href="stock.php";
                                    </script>';
                }  // Si todo fue bien confirma los cambios
                else {
                    $dwes->rollback();   //  y si no, los revierte
                    print '<script type="text/javascript">
                                    alert("El registro no se pudo actualizar");
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