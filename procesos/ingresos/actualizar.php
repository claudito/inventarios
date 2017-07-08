<?php 


include'../../autoload.php';
include'../../session.php';

$funciones  = new Funciones();

$documento = $funciones->validar_xss($_POST['documento']);
$tipo      = $funciones->validar_xss($_POST['tipo']);
$estado    = $funciones->validar_xss($_POST['estado']);

$ingresosdet = new Ingresosdet($documento,$tipo);

foreach ($ingresosdet->listaagrupada() as $key => $value) 
{
	$stock  = new Stock($value['codigo'],$value['cantidad'],$value['precio'],0,0);

	$valor_d = $stock->ingresos();
}

$ingresos  = new Ingresos('',$documento,'',$tipo);
$valor_c    = $ingresos->actualizar($estado);

if ($valor_c == 'ok') 
{
	echo '<script>
    swal({
    title: "Buen Trabajo",
    text: "Ingreso Registrado",
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