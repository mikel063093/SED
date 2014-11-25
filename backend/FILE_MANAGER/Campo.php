<?php
class campo
{
    var $type_error;
    var $type_error_campo_invalido = "invalido";
    var $type_error_campo_valido = "valido";
    var $type_error_campo_campo_puede_ser_vacio = "vacio";
    var $type_data_string = "s";
    var $type_data_int = "i";
    var $type_data_float = "f";
    var $type_data_date = "d";
    var $type_data_boolean = "b";
    var $posicion;
    var $campo;
    var $tipo_dato;
    var $obligatorio;
    var $estado;
    function Campo($posicion, $campo, $dato, $oblig)
    {
        $this->posicion = $posicion;
        $this->campo = $campo;
        $this->tipo_dato = $dato;
        $this->obligatorio = $oblig;
    }
    public function   validarCampo()
    {
        //var_dump($this->tipo_dato);
        switch ($this->tipo_dato) {
            case $this->type_data_string:
                $this->validarString();
                break;
            case $this->type_data_int:
                $this->validarInt();
                break;
            case $this->type_data_float:
                $this->validarFloat();
                break;
        }
        $this->setEstado();
    }
    public function validarString()
    {
        if ($this->campo != null ) {
            $this->type_error = $this->type_error_campo_valido;
            return true;
        } else {
            if (!$this->esCampoObligatorio()) {
                $this->type_error = $this->type_error_campo_campo_puede_ser_vacio;
                return true;
            } else {
                $this->type_error = $this->type_error_campo_invalido;
                return false;
            }
        }
    }
    public function validarInt()
    {
        if ($this->campo != 0) {
            $this->type_error = $this->type_error_campo_valido;
            return true;
        } else {
            if (!$this->esCampoObligatorio()) {
                $this->type_error = $this->type_error_campo_campo_puede_ser_vacio;
                return true;
            } else {
                $this->type_error = $this->type_error_campo_invalido;
                return false;
            }
        }
    }
    public function validarFloat()
    {
        if ($this->campo != 0) {
            return true;
        } else {
            if (!$this->esCampoObligatorio()) {
                $this->type_error = $this->type_error_campo_campo_puede_ser_vacio;
                return true;
            } else {
                $this->type_error = $this->type_error_campo_invalido;
                return false;
            }
        }
    }
    public function esCampoObligatorio()
    {
        if ($this->obligatorio) {
            return true;
        } else {
            return false;
        }
    }
    function setEstado()
    {
        $this->estado = array('posicion' => $this->posicion, 'valor' => $this->campo, 'type_error' => $this->type_error);
        // var_dump($this->estado);
    }
    public function getEstado()
    {
        return json_encode($this->estado);
    }
}
/*
$obj = new campo(1, "hola", "s", true);
$obj1 = new campo(4,4,"i",true);
$obj->validarCampo();
$obj1->validarCampo();
var_dump($obj->getEstado());
var_dump($obj1->getEstado());
*/