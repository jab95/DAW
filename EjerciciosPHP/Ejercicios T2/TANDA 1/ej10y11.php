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
    if(!empty($_POST['mbAConvertir']))
        print $_POST['mbAConvertir'] ." MB son ".($_POST['mbAConvertir']*1000)." KB"; 
    else if(!empty($_POST['kbAConvertir']))
        print $_POST['kbAConvertir'] ." KB son ".($_POST['kbAConvertir']/1000)." MB"; 
    ?>
    
</body>
</html>