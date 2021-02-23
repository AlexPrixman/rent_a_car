<!DOCTYPE html>
<html>

<head>
    <title>Renta Car Proyecto de exoneracion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Renta Car Proyecto de exoneracion</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">Registrese</div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url(); ?>register/validation">
                    <div class="form-group">
                        <label>Nombre de usuario</label>
                        <input type="text" name="user_name" class="form-control" value="<?php echo set_value('user_name'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_name'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Introduzca su correo electronico</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Introduzca la contrasena</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" value="Register" class="btn btn-info" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>