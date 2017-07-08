<?php 

include'../../medula/clases/Ingresos.php';
include'../../medula/clases/Ingresosdet.php';


$ingresos    = new Ingresos('',$_GET['numero'],'',$_GET['tipo']);
$ingresosdet = new Ingresosdet($_GET['numero'],$_GET['tipo']);


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nota de Ingreso</title>
	<link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>

<h3>INVENTARIOS <?php echo date('Y'); ?></h3>	
    <!-- Cabecera -->

	<table class="table-cabecera" >
	<tr>
	<td class="td_th_cab">
	<strong>
	NOTA DE INGRESO	
	</strong>
	</td>
	<td class="td_th_cab"><?php echo $_GET['numero']; ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>CENTRO DE COSTO</strong></td>
	<td class="td_th_cab"><?php echo  $ingresos->consulta('centro_costo'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>RUC</strong></td>
	<td class="td_th_cab"><?php echo  $ingresos->consulta('ruc'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>RAZÓN SOCIAL</strong></td>
	<td class="td_th_cab"><?php echo  $ingresos->consulta('razon_social'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>DIRECCIÓN</strong></td>
	<td class="td_th_cab"><?php echo  $ingresos->consulta('direccion'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>COMENTARIO</strong></td>
	<td class="td_th_cab"><?php echo  $ingresos->consulta('comentario'); ?></td>
	</tr>
	</table>
    
    <p></p>


<!-- Detalle -->
	<table class="table-detalle">
	<thead>
	<tr>
	<th class="td_th_det th_det">IT</th>
	<th class="td_th_det th_det">CÓDIGO</th>
	<th class="td_th_det th_det">DESCRIPCIÓN</th>
	<th class="td_th_det th_det">UND</th>
	<th class="td_th_det th_det">FAM</th>
	<th class="td_th_det th_det">CANT</th>
	<th class="td_th_det th_det">PRECIO</th>
	</tr>
	</thead>
	<tbody>
	 <?php foreach ($ingresosdet->lista() as $key => $value): ?>
	 <tr>
	 <td class="td_th_det"><?php echo $value['item']; ?></td>
	 <td class="td_th_det"><?php echo $value['codigo']; ?></td>
	 <td class="td_th_det"><?php echo $value['descripcion']; ?></td>
	 <td class="td_th_det"><?php echo $value['unidad']; ?></td>
	 <td class="td_th_det"><?php echo $value['familia']; ?></td>
	 <td class="td_th_det"><?php echo $value['cantidad']; ?></td>
	 <td class="td_th_det"><?php echo $value['precio']; ?></td>
	 </tr>
	 <?php endforeach ?>
	</tbody>
	</table>




</body>
</html>