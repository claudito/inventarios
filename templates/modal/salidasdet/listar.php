<?php

include "../../../autoload.php";
include "../../../session.php";

$ingresosdet  = new Ingresosdet($_SESSION['documento_s'],$_SESSION['tipo_s']);
?>

  <div class="pull-right">
  <a data-toggle="modal" href="#newModal" class="btn btn-primary">AGREGAR ARTÍCULO</a>
  </div>
<?php if (count($ingresosdet->lista())>0): ?>
<div class="panel panel-default">
  <div class="panel-heading">
  DETALLE


  </div>
  <div class="panel-body">
    <div class="table-responsive">
  <table id="consulta"  class="table table-bordered table-hover ">
  <thead>
    <tr class="active">
      <th>ITEM</th>
      <th>CÓDIGO</th>
      <th>DESCRIPCIÓN</th>
      <th>UNIDAD</th>
      <th>FAMILIA</th>
      <th>CANTIDAD</th>
      <th>PRECIO</th>
      <th>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     
  foreach ($ingresosdet->lista() as $key => $value) 
  {
  ?>
  <tr>
  <td><?php echo $value['item']; ?></td>
  <td><?php echo $value['codigo']; ?></td>
  <td><?php echo $value['descripcion']; ?></td>
  <td><?php echo $value['unidad']; ?></td>
  <td><?php echo $value['familia']; ?></td>
  <td><?php echo $value['cantidad']; ?></td>
  <td><?php echo $value['precio']; ?></td>
  <td style="width:150px;">
    <a data-id="<?php echo $value['idmovalmdet'];?>" class="btn btn-edit btn-sm btn-info">
    <i class="glyphicon glyphicon-edit"></i>
    </a>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['idmovalmdet']; ?>">
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
      id   = $(this).data("id");
      $.get("../templates/modal/salidasdet/actualizar.php","id="+id,function(data){
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
          <h4 class="modal-title">Actualizar</h4>
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

