<?php 
include('../autoload.php');
include('../session.php');
$assets =  new Assets();
$html   = new Html();
$assets -> principal('NOTA DE INGRESO DETALLE');
$assets -> datatables();
$assets -> selectize();
$assets -> sweetalert();
$html ->header();
include('../templates/modal/ingresosdet/agregar.php');
include('../templates/modal/ingresosdet/eliminar.php');
$_SESSION['documento'] = $_GET['documento'];
$_SESSION['tipo']      = $_GET['tipo'];

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
		<a href="<?php echo PATH; ?>pages/ingresos">NOTA DE INGRESO # <?php echo $_GET['documento']?></a>
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


<script src="../ajax/app/ingresosdet.js"></script>
<script>
$(document).ready(function(){
loadTabla(1);
});
</script>


<?php 
$html ->footer();
 ?>