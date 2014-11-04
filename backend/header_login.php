<?php
$usr = $_POST ['usuario'];
$clave = $_POST ['clave'];

if ($usr == 'admin' && $clave == 'admin'){
header ('Location:../sed.php');

}
else 
header ('Location:login_presentacion_sed.php?error=1');
?>
