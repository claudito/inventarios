<?php 


class Salidasdet
{

protected $documento;
protected $tipo;
protected $item;
protected $codigo;
protected $descripcion;
protected $unidad;
protected $familia;
protected $cantidad;
protected $precio;

function __construct($documento='',$tipo='',$item='',$codigo='',$descripcion='',$unidad='',$familia='',$cantidad=0,$precio=0)
{

$this->documento  = $documento;
$this->tipo       = $tipo;
$this->item       = $item; 
$this->codigo     = $codigo;
$this->descripcion= $descripcion;
$this->unidad     = $unidad;
$this->familia    = $familia;
$this->cantidad   = $cantidad;
$this->precio     = $precio;


}


function agregar_item()
{
  $conexion =  new Conexion();
  $query   = "SELECT item FROM movalmdet WHERE documento='".$this->documento."' 
  AND tipo='".$this->tipo."' AND codigo='".$this->codigo."'";
  $result  = $conexion->query($query);
  $dato    = mysqli_fetch_array($result);
  if ($result->num_rows > 0) 
  {
     $query   = "SELECT item FROM movalmdet WHERE documento='".$this->documento."' AND tipo='".$this->tipo."' 
     AND codigo='".$this->codigo."'";
     $result  = $conexion->query($query);
     $dato    = mysqli_fetch_array($result);
     return $dato['item']+1;
  } 
  else 
  {
    $query   = "SELECT item FROM movalmdet WHERE documento='".$this->documento."' AND tipo='".$this->tipo."'";
     $result  = $conexion->query($query);
     $dato    = mysqli_fetch_array($result);
     if ($result->num_rows > 0) 
     {
    $query   = "SELECT item FROM movalmdet WHERE documento='".$this->documento."' AND tipo='".$this->tipo."' ORDER BY item DESC";
     $result  = $conexion->query($query);
     $dato    = mysqli_fetch_array($result);
    return $dato['item']+1;
     } 
     else 
     {
       return "1";
     }
     
  }
  
}





function agregar()
{
	$conexion = new Conexion();
	$query   = "INSERT INTO movalmdet(documento,tipo,item,codigo,descripcion,unidad,familia,cantidad,precio)
	VALUES('".$this->documento."','".$this->tipo."',".$this->agregar_item().",'".$this->codigo."','".$this->descripcion."','".$this->unidad."','".$this->familia."','".$this->cantidad."','".$this->precio."')";
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



function actualizar($id)
{
  $conexion = new Conexion();
  $query   = "UPDATE movalmdet SET cantidad='".$this->cantidad."'
  WHERE idmovalmdet ='".$id."'";
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

function eliminar($id)
{
  $conexion = new Conexion();
  $query   = "DELETE FROM  movalmdet  WHERE idmovalmdet ='".$id."'";
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
  $query    = "SELECT  * FROM movalmdet  WHERE documento='".$this->documento."' AND tipo='".$this->tipo."'";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
  	  $dato[] = $fila;
  }
    
    return $dato;

}


function listaagrupada()
{

  $conexion = new Conexion();
  $query    = "SELECT codigo,sum(cantidad)as cantidad,avg(precio)as precio FROM movalmdet  WHERE documento='".$this->documento."' AND tipo='".$this->tipo."' GROUP BY codigo";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
      $dato[] = $fila;
  }
    
    return $dato;

}


function consulta($id,$campo)
{
  
  $conexion = new Conexion();
  $query    = "SELECT  * FROM movalmdet  WHERE  idmovalmdet='".$id."'";
  $result   = $conexion->query($query);
  $dato     = mysqli_fetch_array($result);
  return $dato[$campo];

}


}



 ?>