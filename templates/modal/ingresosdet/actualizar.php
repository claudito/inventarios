<?php 

include'../../../autoload.php';
include'../../../session.php';

$id  = $_GET['id'];

$ingresosdet = new Ingresosdet();

 ?>



<form role="form" id="actualizar" autocomplete="Off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" value="<?php echo $ingresosdet->consulta($id,'codigo') ;?>" class="form-control" readonly>
</div>


<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" value="<?php echo $ingresosdet->consulta($id,'descripcion') ;?>" class="form-control" readonly>
</div>


<div class="form-group">
<label>CANTIDAD</label>
<input type="number" name="cantidad" min="0.01"  step="any" class="form-control" required="" 
 value="<?php echo round($ingresosdet->consulta($id,'cantidad'),2) ;?>">
</div>

<div class="form-group">
<label>PRECIO</label>
<input type="number" name="precio" min="0.01"  step="any" class="form-control" required="" 
 value="<?php echo round($ingresosdet->consulta($id,'precio'),2) ;?>">
</div>



<button type="submit" class="btn btn-primary">Actualizar</button>
</form>



<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../procesos/ingresosdet/actualizar.php",
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