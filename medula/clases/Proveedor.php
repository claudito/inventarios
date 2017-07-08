<?php 

class Proveedor
{

protected $codigo;
protected $ruc;
protected $razon_social;
protected $direccion;
protected $contacto;
protected $telefono;


function __construct($codigo='',$ruc='',$razon_social='',$direccion='',$contacto='',$telefono='')
{
  
  $this->codigo       = $codigo;
  $this->ruc          = $ruc;
  $this->razon_social = $razon_social;
  $this->direccion    = $direccion;
  $this->contacto     = $contacto;
  $this->telefono     = $telefono;

}


function lista()
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM proveedor";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
  	  $dato[] = $fila;
  }
    
    return $dato;

}




function consulta($campo)
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM proveedor WHERE codigo='".$this->codigo."'";
  $result   = $conexion->query($query);
  $dato     = mysqli_fetch_array($result);
  return $dato[$campo];
}



}



 ?>