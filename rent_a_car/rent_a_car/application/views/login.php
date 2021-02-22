<!DOCTYPE html>
<html>
<head>
    <title>Renta car proyecto exoneracion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <br />
        <h3 align="center">Renta car proyecto exoneracion</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">Inicio de Sesion</div>
            <div class="panel-body">
                <?php
                if($this->session->flashdata('message'))
                {
                    echo '
                    <div class="alert alert-success">
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
                ?>
                <pre>
                <?php echo base_url().'welcome/login'; ?>
                </pre>
                <form method="post" action="<?php echo base_url(); ?>welcome/login">
                    <div class="form-group">
                        <label>Introduzca su correoo</label>
                        <input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Introduzca su contrasena</label>
                        <input type="password" name="user_password" class="form-control" value="<?php echo set_value('user_password'); ?>" />
                        <span class="text-danger"><?php echo form_error('user_password'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>register">Registrarse</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>