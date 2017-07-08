<?php 


class Salidas
{

protected $fecha_registro;
protected $documento;
protected $centro_costo;
protected $tipo;
protected $ruc;
protected $razon_social;
protected $direccion;
protected $comentario;
protected $usuario;

function __construct($fecha_registro='',$documento='',$centro_costo='',$tipo='',$ruc='',$razon_social='',$direccion='',$comentario='',$usuario='')
{

 $this->fecha_registro  = $fecha_registro;
 $this->documento       = $documento;
 $this->centro_costo    = $centro_costo;  
 $this->tipo            = $tipo;
 $this->ruc             = $ruc;
 $this->razon_social    = $razon_social; 
 $this->direccion       = $direccion;
 $this->comentario      = $comentario;
 $this->usuario         = $usuario;


}


function agregar()
{
	$conexion = new Conexion();
    $query    = "SELECT * FROM movalmcab WHERE documento='".$this->documento."' AND tipo='".$this->tipo."'";
    $result   = $conexion->query($query);
	if ($result->num_rows>0)
	{
	 return "existe";
	} 
	else
	{
	
	$query    = "INSERT INTO movalmcab(fecha_registro,documento,centro_costo,tipo,ruc,razon_social,direccion,comentario,usuarios_idusuarios)VALUES('".$this->fecha_registro."','".$this->documento."','".$this->centro_costo."','".$this->tipo."','".$this->ruc."','".$this->razon_social."','".$this->direccion."','".$this->comentario."','".$this->usuario."')";
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


function actualizar($estado)
{
	$conexion = new Conexion();

	$query    = "UPDATE movalmcab SET estado='".$estado."' WHERE documento='".$this->documento."' AND 	tipo='".$this->tipo."'";
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
  $query    = "SELECT c.idmovalcamb,c.documento,c.fecha_registro,c.centro_costo,c.tipo,c.ruc,c.razon_social,
  c.direccion,c.comentario,u.nombres,u.apellidos,c.estado FROM movalmcab as c  INNER JOIN usuarios as u ON c.usuarios_idusuarios=u.idusuarios WHERE c.tipo='NS'";
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
  $query    = "SELECT  * FROM movalmcab WHERE  documento='".$this->documento."' AND 
  tipo='".$this->tipo."'";
  $result   = $conexion->query($query);
  $dato     = mysqli_fetch_array($result);
  return $dato[$campo];


}


}



 ?>