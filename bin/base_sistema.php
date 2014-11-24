<?php
 include_once 'base.php';
 include_once 'Configuration.php';
 
 class base_sistema
 {
  public static $base;
 } 
 
  $base = new base();
  $base->setup(Configuration::$host, Configuration::$user, Configuration::$pass, Configuration::$base);
  $base->record_style('fields');
  
  base_sistema::$base = $base;
  $base->debug_on(true);
  
?>
