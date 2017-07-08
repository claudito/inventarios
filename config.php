<?php 
#error_reporting(0);
date_default_timezone_set('America/Lima');

//define("PATH", "http://".$_SERVER['SERVER_NAME'].substr(dirname(__FILE__).DIRECTORY_SEPARATOR,strlen($_SERVER['DOCUMENT_ROOT'])));
define("PATH","http://inventarios.perutec.com.pe/");
define("FOLDER","inventarios/");
define("RUTA", dirname(__FILE__).DIRECTORY_SEPARATOR);
define("SERVER","localhost");
define("USER", "root");
define("PASS", "userperutecdb");
define("BD", "inventarios");
define("FECHA",'d-m-Y');


$key  = date('Y-m-d').$_SERVER['SERVER_NAME'].FOLDER;
define("KEY",$key);

define("USUARIO", "usuario");
define("NOMBRES", "nombres");
define("APELLIDOS", "apellidos");
define("TIPO", "tipo");





 ?>
