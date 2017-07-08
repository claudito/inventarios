<?php 

class Correlativos
{


protected $tipo;
protected $numero;

function __construct($tipo='',$numero='')
{

  $this->tipo   = $tipo;
  $this->numero = $numero;

}


function lista()
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM correlativos";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
  	  $dato[] = $fila;
  }
    
    return $dato;

}


function numero($campo)
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM correlativos WHERE tipo='".$this->tipo."'";
  $result   = $conexion->query($query);
  $dato     = mysqli_fetch_array($result);
  return  $dato[$campo];

}


function sumarcorrelativo()
{
  
  $conexion = new Conexion();
  $query    = "UPDATE correlativos SET numero=numero+1 WHERE tipo='".$this->tipo."'";
  $result   = $conexion->query($query);
  if ($result) 
  {
  return "ok";
  } 
  else
  {
  return "error";
  }
  
}



}




 ?>