<?php
include ('Registro.php');
include ('Archivo_plano.php');
class  Admin {
    private  $numerCampos;


    private  $registro;
    private  $archivoPlano;
    function  __construct($numeroCampos){

        $this->numerCampos=$numeroCampos;
        $this->archivoPlano= new Archivo_plano($this->numerCampos);
        $this->archivoPlano->leer_csv();
        $this->config();
    }

    public function config(){
        $this->registro= new Registro($this->numerCampos);
        //configura cmapos

    }

    public function   validar(){
        //ya teniendo la configuraciond e los campos se validad la linea del archivo plano
         $arrayLinea= $this->archivoPlano->getArrayLinas();
        //var_dump($arrayLinea);
        for($i=0;$i<count($arrayLinea); $i++){
            // gettype($this->getLinea($arrayLinea[$i]));
            switch(gettype($this->getLinea($arrayLinea[$i]))){
                case "string":
                    $this->setValidate("s",$this->getLinea($arrayLinea[$i]),$i);
                    break;
                case "integer":
                    $this->setValidate("i",$this->getLinea($arrayLinea[$i]),$i);
                    break;
                default:
                    echo "(:";
                    break;
            }

        }


    }

    public function  cargar(){
        //save bd
    }
    public function  getLinea($arraysito){
        for ($i=0; $i<count($arraysito); $i++){
            return $arraysito[$i];
        }
    }
    public function setValidate($tyeDate, $data, $position,$boolean=true){
        $this->registro-> Add($position,$data,$tyeDate,$boolean);
        var_dump($this->registro);
    }


}
$admin = new Admin(10);
$admin->validar();