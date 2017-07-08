<?php 

include'../../autoload.php';
include'../../session.php';

$funciones    = new Funciones();

$codigo       = $funciones->validar_xss($_POST['codigo']);
$descripcion  = $funciones->validar_xss($_POST['descripcion']);
$unidad       = $funciones->validar_xss($_POST['unidad']);
$familia      = $funciones->validar_xss($_POST['familia']);
$estado       = $funciones->validar_xss($_POST['estado']);


$articulos  = new Articulos($codigo,$descripcion,$familia,$unidad,$estado);

$valor  = $articulos->actualizar();

if ($valor=='ok') 
{
	echo '<script>
	swal({
	title: "Buen Trabajo",
	text: "Registro Actualizado",
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
	title: "Error al Actualizar",
	text: "Consulte al Área de Soporte.",
	type:"error",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}

 ?>