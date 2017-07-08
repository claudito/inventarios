<?php 


class Familia {

protected $codigo;
protected $descripcion;





function __construct($codigo='',$descripcion='')
{

  $this->codigo      = $codigo;
  $this->descripcion = $descripcion;

}





function lista()
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM familia";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
      $dato[] = $fila;
  }
    
    return $dato;

}



}


 ?>