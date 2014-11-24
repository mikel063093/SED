<?php
include ('activeRecord/ActiveRecord.php');
//require_once  'activeRecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('../../testMike/model');
    $cfg->set_connections(array('development' => 'mysql://root:@127.0.0.1/evadocente'));
    var_dump($cfg);

});
