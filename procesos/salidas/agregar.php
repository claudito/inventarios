<?php 

include'../../autoload.php';
include'../../session.php';

$funciones     = new Funciones();
$correlativos  = new Correlativos('NS');


$fecha          =  $funciones->validar_xss($_POST['fecha']);
$documento      =  $funciones->validar_xss($_POST['documento']);
$centrocostos   =  $funciones->validar_xss($_POST['centrocostos']);
$tipo           =  'NS';
$proveedor      =  $funciones->validar_xss($_POST['proveedor']);
$comentario     =  $funciones->validar_xss($_POST['comentario']);
$objproveedor   = new Proveedor($proveedor);
$ruc            = $objproveedor->consulta('ruc');
$razon_social   = $objproveedor->consulta('razon_social');
$direccion      = $objproveedor->consulta('direccion');
$usuario        = $_SESSION[KEY.USUARIO];

$ingresos  = new Ingresos($fecha,$documento,$centrocostos,$tipo,$ruc,$razon_social,$direccion,$comentario,$usuario);

$valor  =  $ingresos->agregar();



if ($valor == 'existe') 
{
	echo '<script>
    swal({
    title: "Registro duplicado",
    text: "Intente de Nuevo",
    type:"warning",
    timer: 2000,
    showConfirmButton: false
    });
     </script>';
} 
else if ($valor == 'ok') 
{

	$correlativos->sumarcorrelativo();
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Nota de Ingreso Registrada",
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