<?php 

class Menu
{

protected $item;
protected $descripcion;


function __construct($item='',$descripcion='')
{

	$this->item         = $item;
	$this->descripcion  = $descripcion;

}


function lista()
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM menu ORDER BY item";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
  	  $dato[] = $fila;
  }
    
    return $dato;

}




}




 ?>