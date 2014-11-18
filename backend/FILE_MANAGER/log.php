<?php

class log{
    public  $message;


    function  add($error)
{
    $error = new log();

}

    function  load($message)
    {
        $this->message = $message;
        $error = fopen("log.txt","a") or
        die("Problemas en la creacion");
        fputs($error,$message);
        fputs($error,"\n");
        fclose($error);
    }


}
// casi que no
//$nuevo = new log();
//$nuevo->load("hola que mas jajajaj kkkkkk");
