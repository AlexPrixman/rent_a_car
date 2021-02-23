<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agregar un Vehiculo</h1>
</div>
    
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="<?php echo base_url().'admin/add_car_act' ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descripcion del Vehiculo</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="car_desc"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Chasis del Vehiculo</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="car_chasis"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero de Motor</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="car_engine"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tipo de Vehiculo</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="cat_id"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Marca del Vehiculo</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="brand_id"></div>
                <?php echo form_error('merk'); ?>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Modelo del Vehiculo</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="car_model"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Numero de Placa</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="car_plate"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tipo de Combustible</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="fuel_id"></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Estado del Vehiculo</label>
                <div class="col-sm-10">
                <select class="form-control" name="car_status">
                    <option value="D">Disponible</option>
                    <option value="R">Rentado</option>
                </select>
                </div>
                <?php echo form_error('cat_status'); ?>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>