<?php
class Campo{
    var $campo;
    var $type;

    function Campo($campo,$type){
        $this->campo=$campo;
        $this->type=$type;
        var_dump($this->type);

    }
    public function validar(){
        $result=false;
        switch ($this->type){
            case "s":
                if($this->validarString()){
                    $result=true;
                };


            default:

                break;
        }
        //
        echo $this->validarString();
        echo var_dump($this->validarString());
        return $result;
    }
    function  validarString(){
        if($this->campo!=null){

            return true;
        }
        else{

            return false;
        }

    }


}
$obj= new Campo("hola",'s');

 var_dump($obj->validar());

?>