<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<?php 

    $puntos = $_POST['pregunta1']+$_POST['pregunta2']+$_POST['pregunta3']+$_POST['pregunta4']
    +$_POST['pregunta5']+$_POST['pregunta6']+$_POST['pregunta7']+$_POST['pregunta8']+
    $_POST['pregunta9']+$_POST['pregunta10'];

    if($puntos>=0 && $puntos <=10) print "¡Enhorabuena! tu pareja parece ser totalmente fiel.";
    if($puntos>=11 && $puntos <=21) print "Quizás exista el peligro de otra persona en su vida o en su mente, 
    aunque seguramente será algo sin importancia. No bajes la guardia.";
    if($puntos>=22 && $puntos <=30) print "Tu pareja tiene todos los ingredientes de estar viviendo un romance 
    con otra persona. Te aconsejamos que indagues un poco más y averigües qué es lo que está pasando 
    por su cabeza.";


?>

</body>
</html>