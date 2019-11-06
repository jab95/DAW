<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    La nota media de las 3 notas es de 
    <?php 
            $notaMedia = (($_POST['nota1']+$_POST['nota2']+$_POST['nota3'])/3);

            print $notaMedia;
    ?>
</body>
</html>