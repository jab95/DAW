<!doctype html>
    <html lang="es">
        <head> 
            <meta charset="UTF-8">
            <title></title>
            <script type="text/javascript" src=""></script>
        </head>
        <body>
            <?php 
                
                print "EL total de la factura con el 21% IVA es = ".($_POST['baseImponible']*1.21);
            ?>
        </body>
    </html>