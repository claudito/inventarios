<?php 

include'../../../autoload.php';
include'../../../session.php';

$documento  = $_GET['documento'];
$tipo       = $_GET['tipo'];
$ingresosdet  =  new Ingresosdet($documento,$tipo);

 ?>


 <?php if (count($ingresosdet->lista())>0): ?>
 
<form role="form" id="actualizar" autocomplete="Off">

<input type="hidden" name="documento" value="<?php echo $documento; ?>">
<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">
<input type="hidden" name="estado" value="01">
<button type="submit" class="btn btn-warning">Confirmar Salida</button>

</form>

 <?php else: ?>
<p class="alert alert-warning">Agregar artículos para confirmar el ingreso.</p>
 <?php endif ?>


 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../procesos/salidas/actualizar.php",
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