<?php 

include'../../autoload.php';
include'../../session.php';

$funciones  = new Funciones();

$id         = $funciones->validar_xss($_POST['id']);
$ingresosdet  = new Ingresosdet();

$valor  = $ingresosdet->eliminar($id);

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
	text: "Intente de nuevo.",
	type:"error",
	timer: 2000,
	showConfirmButton: false
	});
	</script>';
}

 ?>