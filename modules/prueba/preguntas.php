<?php
 include_once '../../bin/base_sistema.php';
 
 $db = base_sistema::$base;
 $sql = "select descripcion from preguntas 
         where id_cuestionario = 1 
		 order by indice";

 $rs = $db->dosql($sql);
 while(!$rs->EOF)
  {
    echo $rs->fields['descripcion'].'<br/>';
	$rs->MoveNext();
  }
 
?>