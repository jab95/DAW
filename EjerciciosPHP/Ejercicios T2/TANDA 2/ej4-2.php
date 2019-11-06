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
        $horasTrabajo = $_POST['horasTrabajo'];
        $saldoTotal=0;
            if($horasTrabajo>=41)
                $saldoTotal += (40*12)+($horasTrabajo-40)*16;
            else
                $saldoTotal = $horasTrabajo*12;

    
    print "EL saldo semanal por ".$_POST["horasTrabajo"]." horas trabajadas es de  ".$saldoTotal." euros"?>  
</body>
</html>