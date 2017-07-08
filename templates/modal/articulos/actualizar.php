<?php 

include'../../../autoload.php';
include'../../../session.php';

$codigo  = $_GET['codigo'];

$articulos = new Articulos($codigo);

 ?>


<form role="form" method="post" id="actualizar" autocomplete="Off">

<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" class="form-control"  maxlength="20" required="" 
 value="<?php echo $articulos->consulta('codigo'); ?>" readonly>
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" class="form-control"  maxlength="20" required="" value="<?php echo $articulos->consulta('descripcion'); ?>">
</div>

<div class="form-group">
<label>UNIDAD</label>
<select name="unidad" id="unidad" class="demo-default" required="">
<option value="<?php echo $articulos->consulta('unidad_codigo'); ?>"><?php echo $articulos->consulta('unidad_codigo'); ?></option>
<?php 

$unidad = new Unidad();
foreach ($unidad->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['descripcion']."</option>";
}


 ?>

</select>
 <script >
$('#unidad').selectize({
maxItems: 1
});
</script>
</div>


<div class="form-group">
<label>FAMILIA</label>
<select name="familia" id="familia" class="demo-default" required="">
<option value="<?php echo $articulos->consulta('familia_codigo'); ?>"><?php echo $articulos->consulta('familia_codigo'); ?></option>
<?php 

$familia = new Familia();
foreach ($familia->lista() as $key => $value) 
{
  echo "<option value='".$value['codigo']."'>".$value['codigo'].' - '.$value['descripcion']."</option>";
}


 ?>

</select>
 <script >
$('#familia').selectize({
maxItems: 1
});
</script>
</div>

<div class="form-group">
<label>ESTADO</label>
<select name="estado" class="form-control" required="">
<option value="<?php echo $articulos->consulta('estado'); ?>"><?php echo $articulos->consulta('estado'); ?></option>
<?php 
if ($articulos->consulta('estado')=='V')
{
 echo "<option value='F'>F</option>";
} 
else
{
 echo "<option value='V'>V</option>";
}

?>
</select>
</div>


 
<button type="submit" class="btn btn-primary">Agregar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../procesos/articulos/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>
