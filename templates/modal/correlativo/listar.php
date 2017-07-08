<?php

include "../../../autoload.php";
include "../../../session.php";

$correlativos  = new Correlativos();
?>


<?php if (count($correlativos->lista())>0): ?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">LISTA DE CORRELATIVOS</h3>
  </div>
  <div class="panel-body">
    <div class="table-responsive">
  <table id="consulta"  class="table table-bordered table-hover ">
  <thead>
    <tr class="active">
      <th>TIPO</th>
      <th>NÚMERO</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     
  foreach ($correlativos->lista() as $key => $value) 
  {
  ?>
  <tr>
  <td><?php echo utf8_encode($value['tipo']); ?></td>
  <td><?php echo $value['numero']; ?></td>
  <td style="width:150px;">
    <a data-codigo="<?php echo utf8_encode($value['idcorrelativos']); ?>" class="btn btn-edit btn-sm btn-info">
    <i class="glyphicon glyphicon-edit"></i>
    </a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo utf8_encode($value['idcorrelativos']);  ?>">
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
      $.get("../templates/modal/correlativo/actualizar.php","codigo="+codigo,function(data){
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

