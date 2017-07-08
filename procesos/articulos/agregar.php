<?php 

include'../../autoload.php';
include'../../session.php';

$funciones    = new Funciones();

$codigo       = $funciones->validar_xss($_POST['codigo']);
$descripcion  = $funciones->validar_xss($_POST['descripcion']);
$unidad       = $funciones->validar_xss($_POST['unidad']);
$familia      = $funciones->validar_xss($_POST['familia']);


$articulos  = new Articulos($codigo,$descripcion,$familia,$unidad);

$valor  = $articulos->agregar();

if ($valor=='existe') 
{
	echo '<script>
    swal({
    title: "Registro Duplicado",
    text: "Intente con otro Código",
    type:"warning",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
} 
else if ($valor=='ok') 
{
	echo '<script>
	swal({
	title: "Buen Trabajo",
	text: "Registro Exitoso",
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
	title: "Error al Registrar",
	text: "Consulte al área de Soporte.",
	type:"error",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}

 ?>