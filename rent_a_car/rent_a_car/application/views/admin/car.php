<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informacion del Vehiculo</h1>
    <a href="<?php echo base_url().'admin/add_car'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar un Vehiculo</a>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripcion de Vehiculo</th>
                        <th>Numero de Chasis</th>
                        <th>Numero de Motor</th>
                        <th>Numero de Placa</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Marca del Vehiculo</th>
                        <th>Modelo del Vehiculo</th>
                        <th>Tipo de Combustible</th>
                        <th>Estado del Vehiculo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($car as $m){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m->car_desc ?></td>
                        <td><?php echo $m->car_chasis ?></td>
                        <td><?php echo $m->car_engine ?></td>
                        <td><?php echo $m->car_plate ?></td>
                        <td><?php echo $m->cat_id ?></td>
                        <td><?php echo $m->car_brand ?></td>
                        <td><?php echo $m->car_model ?></td>
                        <td><?php echo $m->fuel_id ?></td>
                        <td><?php echo $m->car_status ?></td>
                        <td>
                        <?php
                        if($m->car_status == 1){
                            echo 'Disponible';
                        } else {
                            echo 'Rentado';
                        }
                        ?>
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url().'admin/edit_car/'.$m->car_id; ?>">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a class="btn btn-danger btn-sm btn-hapus" href="<?php echo base_url().'admin/delete_car/'.$m->car_id; ?>">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$('.btn-hapus').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  swal({
      title: "Seguro que desea eliminar la informacion?",
      text: "Recuerde que luego de borrarla no podra ser recuperada!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: "No, cancelar!",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("¡Eliminado! "," Los datos del automóvil se han eliminado!", "success");
        setTimeout(function(){ window.location.replace = url; }, 2000);
        //window.location.replace(url);
      } else {
        swal("Cancelado", "Su informacion sigue a salvo :)", "error");
      }
    });
});
</script>