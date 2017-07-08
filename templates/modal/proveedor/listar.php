<?php

include "../../../autoload.php";
include "../../../session.php";

$proveedor  = new Proveedor();
?>


<?php if (count($proveedor->lista())>0): ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">LISTA DE PROVEEDORES</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
  <table id="consulta"  class="table table-bordered table-hover ">
  <thead>
    <tr class="active">
      <th>CÓDIGO</th>
      <th>RUC</th>
      <th>RAZÓN SOCIAL</th>
      <th>DIRECCIÓN</th>
      <th>CONTACTO</th>
      <th>TELEFÓNO</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     
  foreach ($proveedor->lista() as $key => $value) 
  {
  ?>
  <tr>
  <td><?php echo $value['codigo']; ?></td>
  <td><?php echo $value['ruc']; ?></td>
  <td><?php echo $value['razon_social']; ?></td>
  <td><?php echo $value['direccion']; ?></td>
  <td><?php echo $value['contacto']; ?></td>
  <td><?php echo $value['telefono']; ?></td>
  <td style="width:150px;">
    <a data-codigo="<?php echo $value['codigo']; ?>" class="btn btn-edit btn-sm btn-info">
    <i class="glyphicon glyphicon-edit"></i>
    </a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['codigo'];  ?>">
    <i class="glyphicon glyphicon-trash"></i>
    </button>
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
      codigo   = $(this).data("codigo");
      $.get("../templates/modal/proveedor/actualizar.php","codigo="+codigo,function(data){
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
          <h4 class="modal-title">ACTUALIZAR INFORMACIÓN</h4>
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

