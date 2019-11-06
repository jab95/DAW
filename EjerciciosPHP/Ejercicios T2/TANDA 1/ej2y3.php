<!doctype html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src=""></script>
</head>

<body>
    <?php 
            
            $pesetas= 166.38;
            $resultado="";

            if (!empty($_POST['euros'])) 
                $resultado =$_POST['euros']." euros son ".$_POST['euros']*$pesetas." pesetas"; 
            else if(!empty($_POST['pesetas']))
                $resultado =$_POST['pesetas']." pesetas son ".$_POST['pesetas']/$pesetas." euros"; 

            print  $resultado ?>
</body>

</html>