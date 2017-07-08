<?php 


class Articulos
{

protected $codigo;
protected $descripcion;
protected $familia;
protected $unidad;
protected $estado;




function __construct($codigo='',$descripcion='',$familia='',$unidad='',$estado='')
{

	$this->codigo      = $codigo;
	$this->descripcion = $descripcion;
	$this->familia     = $familia;
	$this->unidad      = $unidad;
  $this->estado      = $estado;

}


function agregar()
{

  $conexion = new Conexion();
  $query    = "SELECT * FROM articulo WHERE codigo='".$this->codigo."'";
  $result   = $conexion->query($query);
  if ($result->num_rows>0) 
  {
     return "existe";
  } 
  else 
  {

  $query    = "INSERT INTO articulo(codigo,descripcion,familia_codigo,unidad_codigo)
  VALUES('".$this->codigo."','".$this->descripcion."','".$this->familia."','".$this->unidad."')";
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



function actualizar()
{
  $conexion = new Conexion();
  $query    = "UPDATE articulo  SET descripcion='".$this->descripcion."',familia_codigo='".$this->familia."',unidad_codigo='".$this->unidad."',estado='".$this->estado."'  WHERE 
   codigo='".$this->codigo."'";
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


function eliminar()
{
  $conexion = new Conexion();
  $query    = "DELETE FROM articulo   WHERE 
   codigo='".$this->codigo."'";
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



function lista()
{
  
  $conexion = new Conexion();
  $query    = "SELECT * FROM articulo";
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
  $query    = "SELECT * FROM articulo WHERE codigo='".$this->codigo."'";
  $result   = $conexion->query($query);
  $dato     = mysqli_fetch_array($result);
  return $dato[$campo];
}


}


 ?>