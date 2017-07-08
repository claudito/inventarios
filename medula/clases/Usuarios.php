<?php 

class Usuarios
{


function __construct( )
{



}


function lista()
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM usuarios";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
  	  $dato[] = $fila;
  }
    
    return $dato;

}




}




 ?>