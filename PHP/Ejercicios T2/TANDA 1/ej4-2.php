<!doctype html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src=""></script>
</head>

<body>
    <?php

    $resultado = "";

    switch ($_POST['operacion']) {

        case 'Multiplicacion':
            $resultado = $_POST['numero1'] . " * " . $_POST['numero2'] . " = " . $_POST['numero1'] * $_POST['numero2'];
            break;
        case 'Division':
            $resultado = $_POST['numero1'] . " / " . $_POST['numero2'] . " = " . $_POST['numero1'] / $_POST['numero2'];

            break;
        case 'Suma':
            $resultado = $_POST['numero1'] . " + " . $_POST['numero2'] . " = " . ($_POST['numero1'] + $_POST['numero2']);
            break;
        case 'Resta':
            $resultado = $_POST['numero1'] . " - " . $_POST['numero2'] . " = " . ($_POST['numero1'] - $_POST['numero2']);

            break;
    }

    print $resultado;

    ?>
</body>

</html>