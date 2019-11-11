<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <table border="1">
        <tr>
            <th><?php echo "Lunes" ?> </th>
            <th><?php echo "Horario" ?> </th>
            <th><?php echo "Martes" ?></th>
            <th><?php echo "Miercoles" ?></th>
            <th><?php echo "Jueves" ?></th>
            <th><?php echo "Viernes" ?></th>
        </tr>
        <tr>
            <td><?php echo "8:20" ?> </td>
            <td rowspan="3"><?php echo "DWES" ?> </td>
            <td rowspan="2"><?php echo "EIE" ?> </td>
            <td rowspan="2"><?php echo "DIW" ?> </td>
            <td rowspan="3"><?php echo "DIW" ?> </td>
            <td rowspan="2"><?php echo "DWES" ?> </td>
        </tr>
        <tr>

           <td><?php echo "9:20" ?></td>
        </tr>
        <tr>

            <td ><?php echo "10:20" ?> </td>
            <td><?php echo "DAW" ?></td>
            <td ><?php echo "DWES" ?></td>
            <td><?php echo "DWEC" ?></td>
        </tr>
        <tr>
            <td ><?php echo "11:50" ?> </td>
            <td rowspan="3"><?php echo "DWEC" ?></td>
            <td rowspan="3"><?php echo "DIW" ?></td>
            <td rowspan="2"><?php echo "DWES" ?></td>
            <td rowspan="2"><?php echo "DAW" ?></td>
            <td rowspan="2"><?php echo "DWEC" ?></td>

        </tr>
        <tr>
        <td><?php echo "12:50" ?></td>
        </tr>
        <tr>
            <td ><?php echo "13:50" ?> </td>
            <td ><?php echo "EIE" ?></td>
            <td ><?php echo "EIE" ?></td>
            <td><?php echo "DIW" ?></td>
        </tr>
       

    </table>
</body>

</html>