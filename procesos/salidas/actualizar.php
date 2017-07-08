<?php 


include'../../autoload.php';
include'../../session.php';

$funciones  = new Funciones();

$documento = $funciones->validar_xss($_POST['documento']);
$tipo      = $funciones->validar_xss($_POST['tipo']);
$estado    = $funciones->validar_xss($_POST['estado']);

$salidasdet = new Salidasdet($documento,$tipo);

foreach ($salidasdet->listaagrupada() as $key => $value) 
{
	$stock  = new Stock($value['codigo'],$value['cantidad']);

	$stock->salidas();
}


$salidas  = new Salidas('',$documento,'',$tipo);
$valor    = $salidas->actualizar($estado);

if ($valor == 'ok') 
{
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Salida Registrado",
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