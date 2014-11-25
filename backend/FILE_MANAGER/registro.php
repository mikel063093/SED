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
        //var_dump($obj);
        $obj->validarCampo();

        $this->Validar($obj);
        return $obj;

    }
    function Validar($obj){
        $this->Estado=$obj->getEstado();
        $obJson=json_decode($this->Estado,true);
        switch ($obJson["type_error"]) {
            case 'valido':
                echo "contador reglas ". count($this->getReglas(),  COUNT_NORMAL)."     ";
                if(sizeof($this->Reglas) <= $this->NumeroCampos){
                    echo "valido \n ";
                    //var_dump($obj);
                    array_push($this->Reglas, $obj);

                    if(sizeof($this->Reglas) == $this->NumeroCampos+1){

                        $this->Reglas=array();
                    }

                }
                else{
                   // $this->Reglas=array();
                    echo count($this->Reglas);
                   // echo "muchas reglas :( \n ";
                }
                break;
            case 'invalido':
                //log
                echo " invalido \n";
                break;
            case 'vacio':
                //log
              //  echo " vaico \n ";
                break;
            case 'NULL':
                //log
               // echo " NULL ";
                break;
        }


    }
    /**
     * @return array
     */
    public function getReglas()
    {
        return $this->Reglas;
    }
    /**
     * @param array $Reglas
     */
    public function setReglas($Reglas)
    {
        $this->Reglas = $Reglas;
    }
    /**
     * @return mixed
     */
    public function getNumeroCampos()
    {
        return $this->NumeroCampos;
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