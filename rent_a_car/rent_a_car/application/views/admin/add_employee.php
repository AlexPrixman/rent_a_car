<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar un Empleado</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?php echo base_url().'admin/add_employee_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="employee_name"></div>
                <?php echo form_error('employee_name'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cedula</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="employee_cedula"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanda Laboral</label>
                <div class="col-sm-10 pt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="employee_schedule" value="1">
                        <label class="form-check-label">Matutina</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="employee_schedule" value="2">
                        <label class="form-check-label">Vespertina</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="employee_schedule" value="3">
                        <label class="form-check-label">Nocturna</label>
                    </div>
                </div>
                <?php echo form_error('employee_status'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Por ciento por Comision</label>
                <div class="col-sm-10"><input type="number" class="form-control" name="employee_commission"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fecha de Ingreso</label>
                <div class="col-sm-10"><input type="date" class="form-control" name="employee_hiring_date"></div>
                <?php echo form_error('employee_id'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Estado del Vehiculo</label>
                <div class="col-sm-10">
                <select class="form-control" name="employee_status">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                </div>
                <?php echo form_error('employee_status'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>