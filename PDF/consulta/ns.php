<?php 

include'../../medula/clases/Salidas.php';
include'../../medula/clases/Salidasdet.php';


$salidas    = new Salidas('',$_GET['numero'],'',$_GET['tipo']);
$salidasdet = new Salidasdet($_GET['numero'],$_GET['tipo']);


 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nota de Salida</title>
	<link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>

<h3>INVENTARIOS <?php echo date('Y'); ?></h3>	
    <!-- Cabecera -->

	<table class="table-cabecera" >
	<tr>
	<td class="td_th_cab">
	<strong>
	NOTA DE SALIDA
	</strong>
	</td>
	<td class="td_th_cab"><?php echo $_GET['numero']; ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>CENTRO DE COSTO</strong></td>
	<td class="td_th_cab"><?php echo  $salidas->consulta('centro_costo'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>RUC</strong></td>
	<td class="td_th_cab"><?php echo  $salidas->consulta('ruc'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>RAZÓN SOCIAL</strong></td>
	<td class="td_th_cab"><?php echo  $salidas->consulta('razon_social'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>DIRECCIÓN</strong></td>
	<td class="td_th_cab"><?php echo  $salidas->consulta('direccion'); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>COMENTARIO</strong></td>
	<td class="td_th_cab"><?php echo  $salidas->consulta('comentario'); ?></td>
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
	 <?php foreach ($salidasdet->lista() as $key => $value): ?>
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