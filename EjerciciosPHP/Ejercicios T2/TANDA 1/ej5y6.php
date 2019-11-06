<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src=""></script>
</head>

<body>
    <?php

    $resultado = "";

    if (!empty($_POST['ladoCuad']))
        $resultado = "El area del rectangulo es " . ($_POST['ladoCuad'] * $_POST['ladoCuad']) . " metros cuadrados";
    else if (!empty($_POST['baseTria']) && !empty($_POST['alturaTria']))
        $resultado = "El area del triangulo es " . (($_POST['baseTria'] * $_POST['alturaTria']) / 2) . " metros cuadrados";

    print  $resultado ?>
</body>

</html>