<?php
include('Registro.php');
include('Archivo_plano.php');
include('log.php');
include('../../testMike/DBconfig.php');

//include ('../../testMike/model/estudiantes.php');
class  Admin
{
    private $numerCampos;
    private $Log;
    private $registro;
    private $archivoPlano;
    private $reglasValidas;
    private $reglasTemp = array();

    function  __construct($numeroCampos)
    {
        $this->numerCampos = $numeroCampos;
        $this->archivoPlano = new Archivo_plano($this->numerCampos);
        $this->archivoPlano->leer_csv();
        $this->config();
        $this->Log = new log();
        $this->reglasValidas = array();
    }

    public function config()
    {
        $this->registro = new Registro($this->numerCampos);
        //configura cmapos
    }

    public function   validar()
    {
        //ya teniendo la configuraciond e los campos se validad la linea del archivo plano
        $arrayLinea = $this->archivoPlano->getArrayLinas();
        //var_dump($arrayLinea);
        for ($i = 0; $i < count($arrayLinea); $i++) {

            $this->getLinea($arrayLinea[$i]);
            // gettype($this->getLinea($arrayLinea[$i]));
        }
    }

    public function  cargar()
    {
        //save bd
    }

    public function  getLinea($arraysito)
    {
        //echo count($arraysito);
        for ($c = 0; $c < count($arraysito); $c++) {
            //echo $c;
            //var_dump($arraysito);
            //var_dump($arraysito[$c]);
            //return $arraysito[$c];
            switch (gettype($arraysito[$c])) {
                case "string":
                    $this->setValidate("s", $arraysito[$c], $c);
                    break;
                case "integer":
                    $this->setValidate("i", $arraysito[$c], $c);
                    break;
                default:
                    echo "(:";
                    break;
            }
        }
    }

    public function setValidate($tyeDate, $data, $position, $boolean = true)
    {
        $this->ValidarCampo($this->registro->Add($position, $data, $tyeDate, $boolean));
        //var_dump($this->registro);
    }

    function ValidarCampo($obj)
    {
        // $this->Estado=$obj->getEstado();
        $obJson = json_decode($obj->getEstado(), true);

        switch ($obJson["type_error"]) {
            case 'valido':
                if (count($this->registro->getReglas()) <= $this->registro->getNumeroCampos()) {
                    // $reglas = $this->registro->getReglas();
                    // var_dump($obj);
                    // echo "valido \n ";


                    array_push($this->reglasTemp, $obj);
                    echo "cantidad temp " . count($this->reglasTemp);

                    if (count($this->reglasTemp) == $this->registro->getNumeroCampos() + 1) {
                        array_push($this->reglasValidas, $this->reglasTemp);
                        echo "reglas ADMIN VALIDAD :::::";
                        var_dump($this->reglasTemp[0]->{'campo'});

                        $info = array(
                            "nombre" => $this->reglasTemp[0]->{'campo'},

                            "codigo" => NULL,
                            "identificacion" => NULL,
                            "email" => NULL,
                            "foto" => NULL,
                            "login" => NULL,
                            "identificador" =>NULL);
                        $es = new estudiantes($info);
                        $es->save();
                     /*   for($i=0; $i<count($this->reglasTemp);$i++){
                            var_dump(($this->reglasTemp[0]->{'campo'} ));
                            $info = array(
                                "nombre" => $this->reglasTemp[$i]->{'campo'},

                                "codigo" => NULL,
                                "identificacion" => NULL,
                                "email" => NULL,
                                "foto" => NULL,
                                "login" => NULL,
                                "identificador" =>NULL);
                            $es = new estudiantes($info);
                            $es->save();

                        }
                        */



                        //var_dump($this->reglasValidas);
                        $this->reglasTemp = array();


                    }
                } else {
                    // var_dump($obj);
                    echo "muchas reglas :( \n ";
                }
                break;
            case 'invalido':
                $this->Log->load($obj->getEstado() . " EN LA LINEA " . count($this->archivoPlano->getArrayLinas()));
                //log
                echo " invalido \n";
                break;
            case 'vacio':
                $this->Log->load($obj->getEstado());
                //log
                echo " vaico \n ";
                break;
            case 'NULL':
                $this->Log->load($obj->getEstado());
                //log
                echo " NULL ";
                break;
        }
    }

}

$admin = new Admin(8);
$admin->validar();
$es = new estudiantes();
var_dump($es);

$doce = new docentes();
var_dump($doce);