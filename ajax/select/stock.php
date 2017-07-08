<?php 

include'../../autoload.php';
include'../../session.php';

$codigo  = $_POST['elegido'];

$stock = new Stock($codigo);

$cantidad =  count($stock->consulta('cantidad'));

 ?>

<?php if ($cantidad>0): ?>
<div class="form-group">
 <label>CANTIDAD</label>
 <input type="number"  min='0.01'   step="any" name="cantidad" class="form-control" placeholder="Cantidad: <?php echo $cantidad; ?>" max="<?php echo $cantidad; ?>">
 </div>
<?php else: ?>
<p class="alert alert-warning">No hay Stock Disponible.</p>
<div class="form-group">
 <label>CANTIDAD</label>
 <input type="number"  min='0.01'   step="any" name="cantidad" class="form-control" placeholder="Cantidad: <?php echo $cantidad; ?>"   max="<?php echo $cantidad; ?>" value="<?php echo $cantidad; ?>">
 </div>
<?php endif ?>
 