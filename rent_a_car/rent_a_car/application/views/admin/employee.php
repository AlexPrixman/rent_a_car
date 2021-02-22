<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Informacion del Cliente</h1>
    <a href="<?php echo base_url().'admin/add_customer'; ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Agregar Cliente</a>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de Cliente</th>
                        <th>Numero de Cedula</th>
                        <th>Tanda Laboral</th>
                        <th>% de Comision</th>
                        <th>Fecha de Ingreso</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $no=1;
                foreach($customer as $k){
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k->employee_name ?></td>
                        <td><?php echo $k->employee_cedula ?></td>
                        <td><?php echo $k->employee_schedule ?></td>
                        <td><?php echo $k->employee_commission ?></td>
                        <td><?php echo $k->employee_hiring_date ?></td>
                        <div class="col-sm-10">
                            <select class="form-control" name="employee_status">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <td>
                            <a class="btn btn-info btn-sm" href="<?php echo base_url().'admin/edit_employee/'.$k->customer_id; ?>">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a class="btn btn-danger btn-sm btn-delete" href="<?php echo base_url().'admin/delete_employee/'.$k->customer_id; ?>">
                                <i class="fas fa-trash"></i> Borrar
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
$('.btn-delete').on("click", function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  swal({
      title: "Seguro que deseas borrar la informacion?",
      text: "Recuerda que la informacion no puede ser recuperada despues de borrarla!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#DD6B55',
      confirmButtonText: 'Si, borrar!',
      cancelButtonText: "No, cancelar!",
      confirmButtonClass: "btn-danger",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("Borrada! "," Informacion del cliente borrada!", "success");
        setTimeout(function(){ window.location.replace = url; }, 2000);
        //window.location.replace(url);
      } else {
        swal("Canceled "," Information del cliente guardada. :)", "error");
      }
    });
});
</script>