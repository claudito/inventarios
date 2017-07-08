<?php 


class Stock
{

protected $codigo;
protected $cantidad;
protected $precio;
protected $max;
protected $min;

function __construct($codigo='',$cantidad='',$precio='',$max='',$min='')
{
 $this->codigo   = $codigo;
 $this->cantidad = $cantidad;
 $this->precio   = $precio;
 $this->max      = $max;
 $this->min      = $min;

}




function ingresos()
{

$conexion = new Conexion();
$query    =  "SELECT  * FROM stock WHERE articulo_codigo='".$this->codigo."'";
$result   = $conexion->query($query);
if ($result->num_rows > 0) 
{

$query    =  "UPDATE stock SET 
cantidad=cantidad+'".$this->cantidad."',
precio='".$this->precio."',
max='".$this->max."',
min='".$this->min."'
 WHERE articulo='".$this->codigo."'";
$result   = $conexion->query($query);
if ($result) 
{
   return "ok";
} 
else 
{
 return "error update";
}



} 
else 
{
  

$query    =  "INSERT INTO stock(articulo_codigo,cantidad,precio,max,min)
VALUES('".$this->codigo."','".$this->cantidad."','".$this->precio."','".$this->max."','".$this->min."')";
$result   = $conexion->query($query);
if ($result) 
{
   return "ok";
} 
else 
{
 return "error registar";
}


}


}



function salidas()
{

$conexion = new Conexion();
$query    =  "UPDATE stock SET cantidad = cantidad -'".$this->cantidad."'
 WHERE articulo_codigo='".$this->codigo."'";
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
  $query    = "SELECT a.codigo,a.descripcion,a.unidad_codigo,a.familia_codigo,s.cantidad,s.precio,s.max,s.min FROM stock as s 
INNER JOIN articulo as a ON  s.articulo_codigo=a.codigo
";
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
  $query    = "SELECT  * FROM stock WHERE  articulo_codigo='".$this->codigo."'";
  $result   = $conexion->query($query);
  $dato     = mysqli_fetch_array($result);
  return $dato[$campo];

}

}




 ?>