<?php
//*******************************************************************
// Clase Base
// Desarrollada por Jimmy Andr�s Campo
// Todos los derechos reservados
// 06-07-2009
// http://www.renacersantaclara.org/academico
//
//*******************************************************************
include '../../activeRecord/adodb/adodb.inc.php';
 class base 
 {
 		private $server; 
		private $user;         
		private $password;					
		private $database;
		private $sql_instruction;
		protected $adodb;
		public $rs; 
		
		function __construct()
		{
		   $this->adodb = ADONewConnection('mysql'); 
		}
		
		function debug_on($value)
		{
		 $this->adodb->debug = $value;
		}
		
 		function setup($server, $user, $pass, $db)
		{
		    $this->adodb->connect($server, $user, $pass, $db);
		  
		} 
		function dosql($sql_instruction)
		{		
		   $this->rs = $this->adodb->Execute($sql_instruction);
		   $this->cerrar();
		   return($this->rs);		
		}
		
 		function dosql_limit($sql_instruction, $limit=1)
		{		
		   $this->rs = $this->adodb->SelectLimit($sql_instruction, $limit);
		   return($this->rs);		
		}		
		
		function get_data($sql, $field='')
		{		 
	     $rs = $this->dosql($sql);
	     // print_r($rs);
	     if ($field == '')
	       { 
		    reset($rs->fields);
		    $res = current($rs->fields);
		   }
     	 else
	      $res = $rs->fields[$field];
	     // die("res - $res");		 
	     return($res); 
		}
		
		function GetPK($table)
		{
		$pk = $this->adodb->MetaPrimaryKeys($table);
		// die($pk[0]);
		return($pk[0]);
		}
		
		function Insert($table, $record, $where=false)
		{
		 $this->adodb->AutoExecute($table, $record, 'INSERT', $where);
		}

		function Update($table, $record, $where=false)
		{
		 $this->adodb->AutoExecute($table, $record,'UPDATE', $where);
		}	
		
		function InsUpd($table, $record, $key, $autoquote=false)
		{
		  $this->adodb->Replace($table, $record, $key, $autoquote);
		}
		
		function ErrorNo()
		{
		 return($this->adodb->ErrorNo());
		}
		
		function ErrorMsg()
		{
		 return($this->adodb->ErrorMsg());
		}
		
		function record_style($style)
		{if ($style=='fields') $this->adodb->SetFetchMode(ADODB_FETCH_ASSOC);
		 if ($style=='numbers') $this->adodb->SetFetchMode(ADODB_FETCH_NUM);
		 if ($style=='both') $this->adodb->SetFetchMode(ADODB_FETCH_BOTH);
	     if ($style=='default') $this->adodb->SetFetchMode(ADODB_FETCH_DEFAULT);
		}
		
		function cerrar(){
		 // $this->rs->Close();
	     // $this->adodb->Close(); # optional
		}
}
?>
