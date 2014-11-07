<?php
include ('Campo.php');

/**
* 
*/
class Registro 
{
	
	var $Estado;
	var $NumeroCampos;
	var $Separador;
	var $Reglas;

	function __construct($numerCampos)
	{
		$this->NumeroCampos=$numerCampos;
		$this->Reglas=array();

	}
	function Add($posicion, $campo, $tipodato, $oblig ){
		$obj = new campo($posicion, $campo, $tipodato, $oblig);
		$obj->validarCampo();
		
		$this->Validar($obj);
		
	}
	function Validar($obj){
		$this->Estado=$obj->getEstado();
		$obJson=json_decode($this->Estado,true);

		switch ($obJson["type_error"]) {
			case 'valido':
				if(count($this->Reglas) < $this->NumeroCampos){

						echo "valido \n ";
						array_push($this->Reglas, $obj);
				}
				else{
					echo "muchas reglas :( \n ";
				}
				
				break;
			case 'invalido':
				echo " invalido \n";
				break;
			case 'vacio':
				echo " vaico \n ";
				break;	
		    case 'NULL':
				echo " NULL ";
				break;
		}

		

		 
	}

}
/**
$registro = new Registro(2);


$registro->Add(1,'mike', "s", true);
$registro->Add(1,'mike', "i", true);
$registro->Add(1,'mike', "f", true);
$registro->Add(1,'mike', "s", true);
$registro->Add(1,'mike', "s", true);

*/



