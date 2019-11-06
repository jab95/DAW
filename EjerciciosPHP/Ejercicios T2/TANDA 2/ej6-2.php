<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        El tiempo que tarda en caer el objeto es de

        <?php 

            $altura = $_POST['altura'];
            $g = 9.81;

            $tiempo = sqrt((2*$altura)/$g);

            print $tiempo
        ?>
    
</body>
</html>