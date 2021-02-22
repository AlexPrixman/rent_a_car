<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cambio de Contrasena</h1>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <?php
        if(isset($_GET['message'])){
            if($_GET['message'] == 'succeeded'){
                echo '<div class="alert alert-success">Cambio exitoso.</div>';
            }
        }
        ?>
        <form action="<?php echo base_url().'admin/change_password_act'; ?>" method="post">
            <div class="form-group">
                <label>Nueva Constrasena</label>
                <input class="form-control" type="password" name="new_pass">
                <?php echo form_error('new_pass'); ?>
            </div>
            <div class="form-group">
                <label>Repita la nueva constrasena</label>
                <input class="form-control" type="password" name="repeat_pass">
                <?php echo form_error('repeat_pass'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>