<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Ahorcado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="juego.css" />
</head>

<body>
    
        <?php 

        session_start();

        if(isset($_SESSION['categoria'])){
  
            session_destroy();
           
        }
        
        ?>

      <form action="juego.php" method="post">
        <div class="container body-inicio mt-5 border border-primary">
            <center>
                <h1 class="mt-5">JUEGO DEL AHORCADO</h1>
                <h3>Elija una categoria de las siguiente</h2>
            </center>
            <br>
            <br>
            <br>
            <center>
            <button class="btn btn-primary" name="categoria" value="0" type="submit">JAVASCRIPT</button>


            </center>

            <br>

            <center>
            <button class="btn btn-primary" name="categoria" value="1" type="submit">PHP</button>



            </center>

            <br>

            <center>
            <button class="btn btn-primary mb-5" name="categoria" value="2" type="submit">DIW</button>



            </center>

        </div>
    </form>
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