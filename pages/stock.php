<?php 

include('../autoload.php');
include('../session.php');
$assets = new Assets();
$html   = new Html();
$assets ->principal('Stock Actual');
$assets->datatables();
$html->header();
?>


<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<?php 
 $stock = new Stock();
 if (count($stock->lista())>0): ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">STOCK ACTUAL DE ARTÍCULOS</h3>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
        <table  id="consulta"  class="table table-bordered table-condensed">
            <thead>
                <tr class="active">
                    <th>CÓDIGO</th>
                    <th>DESCRIPCIÓN</th>
                    <th>UND</th>
                    <th>FAM</th>
                    <th>CANT</th>
                    <th>PRECIO</th>
                    <th>MAX</th>
                    <th>MIN</th>

                </tr>
            </thead>
            <tbody>
            <?php 
             foreach ($stock->lista() as $key => $value): ?>
             <tr>
             <td><?php echo $value['codigo']; ?></td>
             <td><?php echo $value['descripcion']; ?></td>
             <td><?php echo $value['unidad_codigo']; ?></td>
             <td><?php echo $value['familia_codigo']; ?></td>
             <td><?php echo $value['cantidad']; ?></td>
             <td><?php echo $value['precio']; ?></td>
             <td><?php echo $value['max']; ?></td>
             <td><?php echo $value['min']; ?></td>
             </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No hay Registros</p>   
<?php endif ?>
</div>
</div>


   <script>
 $(document).ready(function(){
    $('#consulta').DataTable();
});
 </script>


<?php $html -> footer(); ?>