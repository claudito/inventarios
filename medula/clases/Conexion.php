<?php 
class Conexion extends mysqli
{
	
	public function __construct()
	{
		parent::__construct(SERVER,USER,PASS,BD);
		$this->query("SET NAMES 'utf8'");
		$this->connect_errno ? die('Error con la conexion') : $x = 'Conectado';
		//echo $x;
		unset($x);
	}
    
 }
 ?>