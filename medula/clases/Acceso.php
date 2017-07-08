<?php 


class  Acceso{


protected $user;
protected $pass;


function __construct($user,$pass)
{

	 $this->user  = $user;
	 $this->pass  = $pass;

}


function Login()
{
   
  $conexion = new Conexion();

   $query = "SELECT  * FROM usuarios WHERE usuario='".$this->user."' AND 
     pass='".$this->pass."'";
   $result = $conexion->query($query);
   $dato   = mysqli_fetch_array($result);
	if (mysqli_num_rows($result)>0) 
	{
	session_start();
	$_SESSION[KEY.USUARIO]=$dato['idusuarios'];;
	$_SESSION[KEY.NOMBRES]=$dato['nombres'];
	$_SESSION[KEY.APELLIDOS]=$dato['apellidos'];
	$_SESSION[KEY.TIPO]=$dato['tipo'];


	return "true";


	} 
	else
	{
	return "error";
	}

   
}


function Logout()
{

session_start();
if (!isset($_SESSION[KEY.USUARIO]))
{
 header('Location: '.PATH.'');
} 
else 
{
	unset($_SESSION[KEY.USUARIO]);
	unset($_SESSION[KEY.NOMBRES]);
	unset($_SESSION[KEY.APELLIDOS]);
	unset($_SESSION[KEY.TIPO]);
    header('Location: '.PATH.'');
    
}
 


	
}



}







 ?>