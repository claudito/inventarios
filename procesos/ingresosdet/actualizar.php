<?php 

include'../../autoload.php';
include'../../session.php';

$funciones  = new Funciones();

$id         = $funciones->validar_xss($_POST['id']);
$cantidad   = $funciones->validar_xss($_POST['cantidad']);
$precio     = $funciones->validar_xss($_POST['precio']);

$ingresosdet  = new Ingresosdet('','','','','','','',$cantidad,$precio);

$valor  = $ingresosdet->actualizar($id);

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
	text: "Intente de nuevo.",
	type:"error",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}

 ?>