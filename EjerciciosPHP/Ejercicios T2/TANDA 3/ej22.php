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

        for ($i=2; $i <=100 ; $i++) { 
            $contador=0;
            for($j=1;$j<=100;$j++){
                if($i%$j==0) $contador++;
            }
            if($contador<=2) print $i."<br>";
        }
    
    ?>
</body>
</html>