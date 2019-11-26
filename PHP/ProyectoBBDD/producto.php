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
                    <a class="nav-link" href="#"> Tiendas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Familias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="producto.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Stock</a>
                </li>

            </ul>
        </div>
    </nav>
    <?php
    if (!isset($_POST['insertar']) && !isset($_POST['editar']) && !isset($_POST['leer'])
            && !isset($_POST['actualizar']) && !isset($_POST['eliminar'])) {

        ?>

        <form action="producto.php" method="post">

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
        }else{

            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dwes = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123', $opciones);                            
            $resultado = $dwes->query("SELECT * FROM producto");


            if(isset($_POST['insertar'])){

        ?>
            <div class="container-fluid ">

                <div class="row  justify-content-center mt-5 fila-inicio">
                        <div class="col-lg-3 col-inicio">
                            <p>Código: <input type="text" name="codigo" id=""></p>
                        </div>
                            <div class="col-lg-3 col-inicio">
                            <p>Nombre: <input type="text" name="nombre" id=""></p>
                        </div>
                            <div class="col-lg-3 col-inicio">

                            <p>Nombre corto: <input type="text" name="nombre-corto" id=""></p>
                        </div>
                </div>
                <div class="row  justify-content-center mt-5 fila-inicio">
                        <div class="col-lg-3 col-inicio">
                            <p>Descripción: <input type="text" name="descripcion" id=""></p>
                        </div>
                            <div class="col-lg-3 col-inicio">
                            <p>PVP: <input type="text" name="pvp" id=""></p>
                        </div>
                        <div class="col-lg-3 col-inicio">
                            <p>Familia: <input type="text" name="familia" id=""></p>
                        </div>
                </div>


            <center><button name="aceptar" class="btn btn-primary mt-3">Insertar</button></center>
           </div>

        <?php 
            }else if(isset($_POST['leer'])){

                $resultado = $dwes->query("SELECT * FROM producto");

        ?>

                <div class="row">
                <div class="col-sm-12">
                <h2>Tabla dinamica facultad autodidacta</h2>
                    <table class="table table-hover table-condensed table-bordered">
                        <tr>
                            <td>Cod</td>
                            <td>Nombre</td>
                            <td>Nombre_corto</td>
                            <td>Descripción</td>
                            <td>PVP</td>
                            <td>Familia</td>
                        </tr>
            
                        <?php 
                     
                            while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                        ?>
                            <tr>
                                <td><?php print $registro->cod?></td>
                                <td><?php print $registro->nombre?></td>
                                <td><?php print $registro->nombre_corto?></td>
                                <td><?php print $registro->descripcion?></td>
                                <td><?php print $registro->PVP?></td>
                                <td><?php print $registro->familia?></td>
                            </tr>
                        <?php 

                             }
                         ?>
                    </table>
                </div>
            </div>


            <?php
               
            }else if(isset($_POST['editar'])){

                if(!isset($_POST['eliminar']) && !isset($_POST['actualizar'])){

                    $resultado = $dwes->query("SELECT cod FROM producto");

            ?>
                <div class="container-fluid ">

                 <form action="producto.php" method="post">
                    <div class="row  justify-content-center  mt-5 fila-inicio">
                            <div class="col-lg-3 col-inicio align-self-end">
                                <p >Código: 
                                    <select name="cod"  id="">
                                            <?php 
                                    
                                                while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                                <option value="<?php print $registro->cod ?>"><?php print $registro->cod?></option>
                                            
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
                }else if(isset($_POST['eliminar'])){

                    $codAEditar = $_POST['cod'];
                    $ok = true;
                    $dwes->beginTransaction();
                    if($dwes->exec('DELETE * FROM producto where producto.cod="'.$codAEditar.'"') == 0) $ok = false;
                    if ($ok){ 
                        $dwes->commit();
                        print '<script type="text/javascript">
                        alert("Registro eliminado con exito");
                        window.location.href="producto.php";
                        </script>';   
                    }  // Si todo fue bien confirma los cambios
                    else{ 
                        $dwes->rollback();   //  y si no, los revierte
                        print '<script type="text/javascript">
                        alert("El registro no se pudo eliminar, compruebe que no tenga claves foraneas");
                        window.location.href="producto.php";
                        </script>';    }
                   
                                   
                }else if(isset($_POST['actualizar'])){

                    if(!isset($_POST['actualizado'])){

                        $codAEditar = $_POST['cod'];
                        $resultado = $dwes->query('SELECT * FROM producto where producto.cod="'.$codAEditar.'"');
                        $resultadoFamilias = $dwes->query('SELECT * FROM familia');
                        $registro = $resultado->fetch(PDO::FETCH_OBJ);
                        ?>

                                <form action="producto.php" method="post">
                                        <div class="container-fluid ">

                                    <div class="row  justify-content-center mt-5 fila-inicio">
                                            <div class="col-lg-3 col-inicio">
                                                <p>Codigo: <input type="text" name="cod" value="<?php print $codAEditar ?>" id="" disabled></p>
                                                <!-- NO SE PUEDEN PASAR CAMPOS DESABILITADOS EN EL FORM -->
                                            </div>
                                                <div class="col-lg-3 col-inicio">
                                                <p>Nombre: <input type="text" name="nombre" id="" value="<?php print $registro->nombre ?>" ></p>
                                            </div>
                                                <div class="col-lg-3 col-inicio">

                                                <p>Nombre corto: <input type="text" name="nombre_corto" id="" value="<?php print $registro->nombre_corto ?>"></p>
                                            </div>
                                    </div>
                                    <div class="row  justify-content-center mt-5 fila-inicio">
                                            <div class="col-lg-3 col-inicio">
                                                <p>Descripción: <input type="text" name="descripcion" id="" value="<?php print $registro->descripcion ?>"></p>
                                            </div>
                                                <div class="col-lg-3 col-inicio">
                                                <p>PVP: <input type="text" name="pvp" id="" value="<?php print $registro->PVP ?>"></p>
                                            </div>
                                            <div class="col-lg-3 col-inicio">
                                                <p>Familia: <select name="familia" id="">
                                                                <?php 
                                                        
                                                                    while ($registro2 = $resultadoFamilias->fetch(PDO::FETCH_OBJ)) {
                                                                        var_dump($registro2->familia == $registro->familia);
                                                                        if($registro2->cod == $registro->familia){

                                                                ?>
                                                                            <option value="<?php print $registro2->cod ?>" selected><?php print $registro2->nombre?></option>
                                                                
                                                                <?php
                                                                        }else{ 
                                                                ?>
                                                                            <option value="<?php print $registro2->cod ?>"><?php print $registro2->nombre?></option>

                                                                <?php
                                                                        }
                                                                    }
                                                                ?>
                                                        </select> </p>
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
                    }else{

                        $cod = $_POST['cod2'];
                        $nombre = $_POST['nombre'];
                        $nombre_corto = $_POST['nombre_corto'];
                        $descripcion = $_POST['descripcion'];
                        $pvp = $_POST['pvp'];
                        $familia = $_POST['familia'];

                        $ok = true;
                        $dwes->beginTransaction();
                        if($dwes->exec('UPDATE producto set nombre="'.$nombre.'", nombre_corto="'.$nombre_corto.'" , 
                        descripcion="'.$descripcion.'", pvp="'.$pvp.'" , familia ="'.$familia.'"
                         where cod="'.$cod.'"') == 0) $ok = false;
                      
                         if ($ok){ 
                            $dwes->commit();
                            print '<script type="text/javascript">
                            alert("Registro actualizado con exito");
                            window.location.href="producto.php";
                            </script>';   
                        }  // Si todo fue bien confirma los cambios
                        else{ 
                            $dwes->rollback();   //  y si no, los revierte
                            print '<script type="text/javascript">
                            alert("El registro no se pudo actualizar");
                            window.location.href="producto.php";
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



