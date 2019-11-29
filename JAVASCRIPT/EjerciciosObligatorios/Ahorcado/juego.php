<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Proyecto Ahorcado</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
    integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <script src="script.js" type="text/javascript"></script>
  <link rel="stylesheet" href="juego.css" />

  </head>


<!-- EJECUTAR INDEX.PHP PRIMERO, YA QUE ES EL MENU DEL JUEGO -->


<body>

    <?php 
    
    session_start();
    if(!isset($_SESSION['categoria'])){
  
      $_SESSION['categoria'] = $_POST['categoria'];
      $categoria = $_SESSION['categoria'];
  
    }else{
      $categoria = $_SESSION['categoria'];
    }

     ?>

    <input type="hidden" name="" id="cat" value="<?php echo $categoria ?>">

    <div class="container">
      <center>
        <h1>Adivina la palabra secreta</h1>
        <h3>Pulsa una letra con el teclado</h2>
       <h4 id="categoria"></h4>
</center>


      <div class="row  justify-content-center">
        <div class="col-md mt-5">

          <center>
            <p id="palabra"></p>
          </center>

        </div>
      </div>
      <div class="row  justify-content-center mt-5 ">
        <div class="col-md-5">

          <img src="img1Ahor.png" alt="" class="border border-primary" ></img>

        </div>
        <div class="col-md-5 " >

          <p id="letrasUsadas">Letras falladas <br></p>

        </div>
      </div>
      <div class="row  justify-content-center mt-5 ">
        <div class="col-md-2  " >

          <button id="reiniciarMenu" onclick="ReiniciarJuego(this)" style="display: none;">Volver a menu inicio</button>

        </div>

        <div class="col-md-2 ">

          <button id="reiniciar" onclick="ReiniciarJuego(this)" style="display: none;">Reintentar</button>

        </div>
      </div>
      <div class="row  justify-content-center mt-5 ">
        <div class="col-md  " >

        <center><h2></h2></center>

        </div>
      </div>
    </div>

  <script src=" https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js"
    integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P"
    crossorigin="anonymous"></script>

</body>

</html>