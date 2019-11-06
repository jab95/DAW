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

        $dia = $_POST['dia'];
        $mes = $_POST['mes'];
        $horoscopo="";

        switch ($mes) {
            case 1:
                   if($dia<21) $horoscopo="capricornio";
                   else $horoscopo = "acuario";
                break;
            case 2:
            if($dia<=19) $horoscopo="acuario";
            else $horoscopo = "piscis";
            break;
            case 3:
            if($dia<=20) $horoscopo="piscis";
            else $horoscopo = "aries";
            break;
            case 4:
            if($dia<=20) $horoscopo="aries";
            else $horoscopo = "tauro";
            break;
            case 5:
            if($dia<=20) $horoscopo="tauro";
            else $horoscopo = "geminis";
            break;
            case 6:
            if($dia<=21) $horoscopo="geminis";
            else $horoscopo = "cancer";
            break;
            case 7:
            if($dia<=20) $horoscopo="cancer";
            else $horoscopo = "leo";
            break;
            case 8:
            if($dia<=23) $horoscopo="leo";
            else $horoscopo = "virgo";
            break;
            case 9:
            if($dia<=20) $horoscopo="virgo";
            else $horoscopo = "libra";
            break;
            case 10:
            if($dia<=20) $horoscopo="libra";
            else $horoscopo = "escorpio";
            break;
            case 11:
            if($dia<=22) $horoscopo="escorpio";
            else $horoscopo = "sagitario";
            break;
            case 12:
            if($dia<=21) $horoscopo="sagitario";
            else $horoscopo = "capricornio";
            break;
            
          
        }

        print "Tu horoscopo es ".$horoscopo;


    ?>
</body>

</html>