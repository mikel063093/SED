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
        $this->ValidarCampo($this->registro->Add($position,$data,$tyeDate,$boolean));

        //var_dump($this->registro);
    }
    function ValidarCampo($obj){
       // $this->Estado=$obj->getEstado();
        $obJson=json_decode( $obj->getEstado(),true);

        switch ($obJson["type_error"]) {
            case 'valido':
                if(count($this->registro->getReglas()) < $this->registro->getNumeroCampos()) {
                    $reglas = $this->registro->getReglas();

                    echo "valido \n ";
                    array_push($reglas, $obj);

                    $this->registro->setReglas($reglas);
                }
                else{
                    echo "muchas reglas :( \n ";
                }

                break;
            case 'invalido':

                //log
                echo " invalido \n";
                break;
            case 'vacio':
                //log
                echo " vaico \n ";
                break;
            case 'NULL':
                //log
                echo " NULL ";
                break;
        }
    }




}
$admin = new Admin(10);
$admin->validar();