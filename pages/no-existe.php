<?php 

include('../autoload.php');
include('../session.php');
$assets = new Assets();
$html   = new Html();
$assets ->principal('No existe');
$html->header();
?>


<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<h1>No existe</h1>
</div>
</div>


<?php $html -> footer(); ?>