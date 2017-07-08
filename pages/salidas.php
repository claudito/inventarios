<?php 
include('../autoload.php');
include('../session.php');
$assets =  new Assets();
$html   = new Html();
$assets -> principal('SALIDAS');
$assets -> datatables();
$assets -> selectize();
$assets -> sweetalert();
$html ->header();
//include('../templates/modal/salidas/agregar.php');
 ?>


<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>
</div>
</div>




<div class="row">
<div class="col-md-12">
<div class="pull-right">

<a data-toggle="modal" href="#newModal" class="btn btn-primary">REGISTRAR NUEVA SALIDA</a>


</div>
</div>
</div>


<!-- A que deberia carga el modal registrar -->
<div class="row">
<div class="col-md-12">
<div id="mensaje-modal-agregar"></div><!-- Datos ajax Final -->
<div id="tabla-modal-agregar"></div><!-- Datos ajax Final -->

</div>
</div>




<div class="row">
<div class="col-md-12">
<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>


<script src="../ajax/app/salidas.js"></script>
<script>
$(document).ready(function(){
loadTabla(1);
});
$(document).ready(function(){
CargarModalAgregar(1);
});
</script>



<?php 
$html ->footer();
 ?>