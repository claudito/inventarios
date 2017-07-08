<?php 

include'../../autoload.php';
include'../../session.php';

$funciones   =  new Funciones();

$documento   = $funciones->validar_xss($_POST['documento']);
$tipo        = $funciones->validar_xss($_POST['tipo']);
$codigo      = $funciones->validar_xss($_POST['articulos']);
$cantidad    = $funciones->validar_xss($_POST['cantidad']);
  

$articulos   = new Articulos($codigo); 
$stock       = new Stock($codigo);

$descripcion =  $articulos->consulta('descripcion');
$unidad      =  $articulos->consulta('unidad_codigo');
$familia     =  $articulos->consulta('familia_codigo');
$precio      =  $stock->consulta('precio');
$ingresosdet  =  new Ingresosdet($documento,$tipo,'?',$codigo,$descripcion,$unidad,$familia,$cantidad,$precio);

$valor  = $ingresosdet->agregar();

if ($valor=='ok')
{
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Registro Agregado",
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
	text: "Intente de nuevo.",
	type:"error",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}
 ?>