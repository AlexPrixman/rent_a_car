<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar Cliente</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?php echo base_url().'admin/add_customer_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="customer_name"></div>
                <?php echo form_error('customer_name'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero de Cedula</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="customer_cedula"></div>
                <?php echo form_error('customer_cedula'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tarjeta de Credito</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="customer_cc"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Limite de Credito</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="customer_credit_limit"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tipo de Persona</label>
                <div class="col-sm-10 pt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="customer_type" value="1">
                        <label class="form-check-label">Fisica</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="customer_type" value="2">
                        <label class="form-check-label">Juridica</label>
                    </div>
                </div>
                <?php echo form_error('customer_type'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                <select class="form-control" name="employee_status">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
                </div>
                <?php echo form_error('customer_status'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>