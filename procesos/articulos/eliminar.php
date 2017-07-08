<?php 

include'../../autoload.php';
include'../../session.php';

$funciones    = new Funciones();

$codigo       = $funciones->validar_xss($_POST['codigo']);


$articulos  = new Articulos($codigo);

$valor  = $articulos->eliminar();

if ($valor=='ok') 
{
	echo '<script>
	swal({
	title: "Buen Trabajo",
	text: "Registro Eliminado",
	type:"success",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}
else 
{
	echo '<script>
	swal({
	title: "Error al Eliminar",
	text: "Consulte al área de Soporte.",
	type:"error",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}

 ?>