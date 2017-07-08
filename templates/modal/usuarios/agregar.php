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

<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" class="form-control"  maxlength="20" required="">
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" class="form-control"  maxlength="20" required="">
</div>

<div class="form-group">
<label>UNIDAD</label>
<select name="unidad" id="idunidad" class="demo-default" required="">
<option value="">[ SELECCIONAR]</option>
<?php 

$unidad = new Unidad();
foreach ($unidad->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['descripcion']."</option>";
}


 ?>

</select>
 <script >
$('#idunidad').selectize({
maxItems: 1
});
</script>
</div>


<div class="form-group">
<label>FAMILIA</label>
<select name="familia" id="idfamilia" class="demo-default" required="">
<option value="">[ SELECCIONAR]</option>
<?php 

$familia = new Familia();
foreach ($familia->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['descripcion']."</option>";
}


 ?>

</select>
 <script >
$('#idfamilia').selectize({
maxItems: 1
});
</script>
</div>


 
<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->