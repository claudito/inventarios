  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">AGREGAR ARTÍCULO</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="Off">

<input type="hidden" name="documento" value="<?php echo $_GET['documento']; ?>">
<input type="hidden" name="tipo"      value="<?php echo $_GET['tipo']; ?>">

<div class="form-group">
<label>ARTÍCULO</label>
<select name="articulos" id="idarticulos" class="demo-default" required="">
<option value="">[ SELECCIONAR]</option>
<?php 

$articulos = new Articulos();
foreach ($articulos->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['descripcion']."</option>";
}


 ?>

</select>
 <script >
$('#idarticulos').selectize({
maxItems: 1
});
</script>
</div>


<div class="form-group">
<label>CANTIDAD</label>
<input type="number" name="cantidad" min="0.01"  step="any" class="form-control" required="">
</div>

<div class="form-group">
<label>PRECIO</label>
<input type="number" name="precio" min="0.01"  step="any" class="form-control" required="">
</div>


 
<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->