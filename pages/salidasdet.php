<?php 
include('../autoload.php');
include('../session.php');
$assets =  new Assets();
$html   = new Html();
$assets -> principal('NOTA DE SALIDA DETALLE');
$assets -> datatables();
$assets -> selectize();
$assets -> sweetalert();?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idarticulos").change(function () {
$("#idarticulos option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/stock.php", { elegido: elegido }, function(data){
$("#idstock").html(data);
});     
});
});    
});
</script>
<?php
$html ->header();
include('../templates/modal/salidasdet/agregar.php');
include('../templates/modal/salidasdet/eliminar.php');
$_SESSION['documento_s'] = $_GET['documento'];
$_SESSION['tipo_s']      = $_GET['tipo'];

$ingresos = new Ingresos('',$_GET['documento'],'',$_GET['tipo']);

 ?>


<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-12">


<div class="panel panel-default">
	<div class="panel-heading">
		<a href="<?php echo PATH; ?>pages/salidas">NOTA DE SALIDA # <?php echo $_GET['documento']?></a>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>CENTRO DE COSTO</th>
					<th>RUC</th>
					<th>RAZÓN SOCIAL</th>
					<th>DIRECCIÓN</th>
					<th>COMENTARIO</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $ingresos->consulta('centro_costo'); ?></td>
					<td><?php echo $ingresos->consulta('ruc'); ?></td>
					<td><?php echo $ingresos->consulta('razon_social'); ?></td>
					<td><?php echo $ingresos->consulta('direccion'); ?></td>
					<td><?php echo $ingresos->consulta('comentario'); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
	</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>


<script src="../ajax/app/salidasdet.js"></script>
<script>
$(document).ready(function(){
loadTabla(1);
});
</script>


<?php 
$html ->footer();
 ?>