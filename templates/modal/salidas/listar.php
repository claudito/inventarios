<?php

include "../../../autoload.php";
include "../../../session.php";

$salidas  = new Salidas();
?>


<?php if (count($salidas->lista())>0): ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">LISTA DE SALIDAS</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
  <table id="consulta"  class="table table-bordered table-hover ">
  <thead>
    <tr class="active">
      <th>NÚMERO</th>
      <th>FECHA</th>
      <th>TIPO</th>
      <th>CENTRO DE COSTO</th>
      <th>RUC</th>
      <th>RAZÓN SOCIAL</th>
      <th>DIRECCIÓN</th>
      <th>USUARIO</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     
  foreach ($salidas->lista() as $key => $value) 
  {
  ?>
  <tr>
  <td>
  <?php if ($value['estado']=='00'): ?>
   <a href="salidasdet?documento=<?php echo $value['documento']; ?>&tipo=NS"><?php echo $value['documento']; ?>
  </a> 
  <?php else: ?>
  <a href="../PDF/reporte/ns?numero=<?php echo $value['documento']; ?>&tipo=NS" target="_blank"><?php echo $value['documento']; ?>
  <?php endif ?>
  </td>
  <td><?php echo date_format(date_create($value['fecha_registro']), 'd/m/Y');?></td>
  <td><?php echo $value['tipo']; ?></td>
  <td><?php echo $value['centro_costo']; ?></td>
  <td><?php echo $value['ruc']; ?></td>
  <td><?php echo $value['razon_social']; ?></td>
  <td><?php echo $value['direccion']; ?></td>
  <td><?php echo $value['nombres'].' '.$value['apellidos']; ?></td>
  <td style="text-align: center;">
  <?php if ($value['estado']=='00'): ?>
   <a data-documento="<?php echo $value['documento'];?>" data-tipo="<?php echo $value['tipo'];?>" class="btn btn-edit btn-sm btn-info">
  <i class="glyphicon glyphicon-edit"></i>
  </a> 
  <?php else: ?>
  <button class="btn btn-warning btn-info">
  <i class="glyphicon glyphicon-ok-circle"></i>
  </button>
  <?php endif ?>
  </td>
  </tr>
  <?php

  }

  ?>
  </tbody>
 </table>
</div>
  </div>
</div>
<?php else: ?>
  <p class="alert alert-warning">No hay resultados</p>
<?php endif ?>

<!-- Modal -->
  <script>
    $(".btn-edit").click(function(){
      documento   = $(this).data("documento");
      tipo        = $(this).data("tipo");
      $.get("../templates/modal/salidas/actualizar.php","documento="+documento+"&tipo="+tipo,function(data){
        $("#form-edit").html(data);
      });
      $('#editModal').modal('show');
    });
  </script>
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Confirmar Salida</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


   <script>
 $(document).ready(function(){
    $('#consulta').DataTable();
});
 </script>

