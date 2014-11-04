<!DOCTYPE html>
<head>
<title>EVALUACI&Oacute;N DOCENTE</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/sedController.js" type="text/javascript"></script> 

<script>
$(document).ready(function(){


    
    TotalQuestions( );


  $(document).ajaxStart(function(){
  $("#wait").css("display","block");
  });
  $(document).ajaxComplete(function(){
    $("#wait").css("display","none");
  });
  $("button").click(function(){
    $("#txt").load("demo_ajax_load.php");
  });
});
</script>
</head>

<body>

  <p align="center"><strong>  SISTEMAS DE EVALUACI&Oacute;N DOCENTE</strong></p>
  <p align="center"><strong>CORPORACI&Oacute;N UNIVERSITARIA AUTONOMA DEL CAUCA </strong></p>
  <p align="center"><strong> NOMBRE</strong>: JULIAN DAVID GARCIA PAZ</p>
  <p align="center"><strong>CODIGO: </strong>1213112011 </p>
  <p align="left"><strong>Nota:</strong> el sistema evaluativo no interfiere en la contrataci&oacute;n del docente......... </p>
 
  <p align="left">

<form action="backend/muestra.php" method="post" name="form1" id="container">
 
  <div id="txt">
    <h2>Si ya realizaste la evaluaci&oacute;n pulsa enviar. Gracias</h2>
  </div>
  
</form>

<div id="wait" 
  style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img 
  src='demo_wait.gif' width="64" height="64" />
  <br>Loading..</div>
</body>
</html>
