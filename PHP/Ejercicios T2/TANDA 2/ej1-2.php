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
    
    $asignatura ="";

    switch( strtoupper($_POST['dia'])){
        case "LUNES":         
            $asignatura="DWES"; 
            break;
        case "MARTES": 
             $asignatura="EIE"; 
            break;
        case "MIERCOLES": 
             $asignatura="DIW"; 
            break;
        case "JUEVES": 
            $asignatura="DIW"; 
            break;
        case "VIERNES": 
            $asignatura="DWES"; 
            break;
    }
    
    print "La primera asignatura del ".strtolower($_POST['dia'])." es ".$asignatura;   ?>
</body>
</html>