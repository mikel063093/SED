<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
	<link rel='stylesheet' type='text/css' href='styles.css' />

<title>EVALUACION DOCENTE</title>

</head>

<body>
<?php
if (isset($_GET['error'])){
if($_GET['error'] == 1){
echo '<h1> CLAVE NO VALIDA </h1> ';
}
}


?>

<form id="form1" name="form1" method="post" action="backend/header_login.php">
  <label>
  <p align="center"><strong>SISTEMA DE EVALUACIÓN DOCENTE</strong></p>
  <p align="center"><strong>CORPORACIÓN UNIVERSITARIA AUTONOMA DEL CAUCA </strong></p>
  <div align="center"><strong>USUARIO</strong>
    <input name="usuario" type="text" id="usuario" />
  </div>

  </label>
  <p align="center">
    <label><strong>CONTRASE&Ntilde;A</strong>
    <input name="clave" type="password" id="clave" />
    </label>
  </p>
 

  <p align="center">
    <input type="submit" name="Submit" value="Enviar" />
  </p>
  <p>
    <label></label>
  </p>
  <p>&nbsp;</p>
</form>
</body>
</html>


