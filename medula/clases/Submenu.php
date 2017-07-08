<?php 

class Submenu
{

protected $item;
protected $descripcion;


function __construct($item='',$descripcion='')
{

	$this->item         = $item;
	$this->descripcion  = $descripcion;

}


function lista_menu($menu,$usuario)
{
  
  $conexion = new Conexion();
  $query    = "
SELECT  sm.id,sm.nombre,sm.url,sm.item,sm.menu_idmenu,pm.estado FROM sub_menu AS sm INNER JOIN
permisos_submenu AS pm ON sm.id=pm.sub_menu_id  WHERE sm.menu_idmenu='".$menu."' AND  pm.usuarios_idusuarios='".$usuario."'
";
  $result   = $conexion->query($query);
  while ($fila = mysqli_fetch_assoc($result)) 
  {
  	  $dato[] = $fila;
  }
    
    return $dato;

}




}




 ?>