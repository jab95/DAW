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
                    <a class="nav-link" href="#">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Stock</a>
                </li>

            </ul>
        </div>
    </nav>
    <?php
    if (!isset($_POST['insertar']) && !isset($_POST['editar']) && !isset($_POST['leer'])) {

        ?>


        <form action="producto.php" method="post">

            <?php

                ?>

            <center>
                <button type="submit" name="insertar" class="btn btn-primary">Insertar</button>
            </center>

            <center>
                <a name="editar" id="" class="btn btn-primary mt-5" href="producto.php" role="button">EDITAR</a>
            </center>

            <center>
                <a name="leer" id="" class="btn btn-primary mt-5" href="producto.php" role="button">LEER</a>
            </center>

        <?php
        }
        ?>

        </form>

</body>

</html>