<?php
    $aResult = array();

    if( !isset($_POST['functioncase']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['functioncase']) {
            case 'totalquestions':

            	$aResult['result'] = '4';// llamar funcion bd para traer preguntas
              $aResult['NombreDocente']= $arrayName = array('Jose vicente','Jimmy campo','Henrry cordoba','Marta Elena');
               break;

            default:
               $aResult['error'] = 'Not found function '.$_POST['functioncase'].'!';
               break;
        }

    }

  echo  json_encode($aResult);
?>