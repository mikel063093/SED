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
            $this->getLinea($arrayLinea[$i]);
            // gettype($this->getLinea($arrayLinea[$i]));


        }


    }

    public function  cargar(){
        //save bd
    }
    public function  getLinea($arraysito){
        //echo count($arraysito);
        for ($c=0;$c<count($arraysito);$c++){
            //echo $c;
            //var_dump($arraysito);
            //var_dump($arraysito[$c]);
            //return $arraysito[$c];
            switch(gettype($arraysito[$c])){
                case "string":
                    $this->setValidate("s",$arraysito[$c],$c);
                    break;
                case "integer":
                    $this->setValidate("i",$arraysito[$c],$c);
                    break;
                default:
                    echo "(:";
                    break;
            }

        }
    }
    public function setValidate($tyeDate, $data, $position,$boolean=true){
        $this->registro-> Add($position,$data,$tyeDate,$boolean);
        //var_dump($this->registro);
    }


}
$admin = new Admin(10);
$admin->validar();