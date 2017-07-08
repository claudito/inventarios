 <?php 
include'../../../autoload.php';
#include'../../../session.php';
  ?>

  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <?php 
           $correlativos = new Correlativos('NI');
           ?>
          <h4 class="modal-title">NOTA DE INGRESO # <?php echo $correlativos->numero('numero')+1; ?> </h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="Off">

<input type="hidden" name="documento" value="<?php echo $correlativos->numero('numero')+1; ?>">

<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha" class="form-control" required="">
</div>


<div class="form-group">
<label>CENTRO DE COSTOS</label>
<select name="centrocostos" id="idcentrocostos" class="demo-default" required="">
<option value="">[ SELECCIONAR]</option>
<?php 

$centrocostos = new Centrocostos();
foreach ($centrocostos->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['descripcion']."</option>";
}


 ?>

</select>
 <script >
$('#idcentrocostos').selectize({
maxItems: 1
});
</script>
</div>


<div class="form-group">
<label>PROVEEDOR</label>
<select name="proveedor" id="idproveedor" class="demo-default" required="">
<option value="">[ SELECCIONAR]</option>
<?php 

$proveedor = new Proveedor();
foreach ($proveedor->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['razon_social']."</option>";
}


 ?>

</select>
 <script >
$('#idproveedor').selectize({
maxItems: 1
});
</script>
</div>


<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario"  rows="3" class="form-control" required="" onchange="Mayusculas(this)"></textarea>
</div>

 
<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<script>
$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
type: "POST",
url: "../procesos/ingresos/agregar.php",
data: parametros,
beforeSend: function(objeto){
$("#mensaje").html("Mensaje: Cargando...");
},
success: function(datos){
$("#mensaje").html(datos);
//$("#actualizar")[0].reset();  //resetear inputs
$('#agregar').modal('hide'); //ocultar modal
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
loadTabla(1);
CargarModalAgregar(1);
}
});
event.preventDefault();
});
</script>