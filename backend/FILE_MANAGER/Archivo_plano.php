<?php

class Archivo_plano
{
    public $num;
    public $fila = 1;

    function leer_csv()
    {

        $fp = fopen("test/csv.txt", "r");
        //$linea = fgets($fp);
        // echo $linea;
        while ($data = fgetcsv($fp, 1000, "\t")) {
            $this->num = count($data);

            echo "<p> $this->num campos en la linea $this->fila: <br/></p>\n";
             // var_dump($data);
            $this->fila++;
              for($c=0; $c < $this->num; $c++){
                    echo $data[$c]."\n";
              }

        }
        fclose($fp);

    }

    /**
     * @param $num_campo
     */

    function  validar($num_campo)
    {
        if ($this->num == $num_campo) {
            echo "correctoo en el campo $this->num: en la fila $this->fila:";

        } else {
            echo "es invalido porque tiene $this->num campo en  la linea: $this->fila ";
        }
    }


}

$obj = new Archivo_plano();
$obj->leer_csv();
$obj->validar(9);
var_dump($obj);
?>
