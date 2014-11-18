<?php
/**
 * Created by PhpStorm.
 * User: mikealegria
 * Date: 11/18/14
 * Time: 11:47 AM
 */
include ('../../lib/adodb/adodb-active-record.inc.php');
include ('../../bin/base_sistema.php');
ADODB_Active_Record::SetDatabaseAdapter(base_sistema::$base);
class estudiantes extends  ADODB_Active_Record {


}