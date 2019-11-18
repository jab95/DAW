<?php
$f = fopen("datos.txt","a");
fputs($f,$_REQUEST['email'].
         "-".
         md5($_REQUEST['pass']).
         "-".
         $_REQUEST['provincia'].
         "-".
         $_REQUEST['dia'].
         "/".
         $_REQUEST['mes'].
         "/".
         $_REQUEST['anio'].
         "\n");
echo "OK";
?>