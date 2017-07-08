<?php 
include('../autoload.php');
include('../session.php');
$assets =  new Assets();
$html   = new Html();
$assets -> principal('LISTA DE CORRELATIVOS');
$assets -> datatables();
$assets -> selectize();
$assets -> sweetalert();
$html ->header();

 ?>


<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>
</div>
</div>



<div class="row">
<div class="col-md-12">
<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>


<script src="../ajax/app/correlativo.js"></script>
<script>
$(document).ready(function(){
loadTabla(1);
});
</script>


<?php 
$html ->footer();
 ?>