<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/connexionStyle.css">
</head>
<body>
    <div class="container">
        <br /><br /><br />
        <h3 align="center">Connexion</h3>
        <br />
        <form method="post" action="<?php /*echo base_url();*/ ?>connexion/validation">
            <div class="form-group">
                <label>Enter Username</label>
                <input type="text" name="username" class="form-control" value="<?php /* echo set_value('username');*/ ?>" />
                <span class="text-danger"><?php /*echo form_error('username');*/ ?></span>
            </div>
            <div class="form-group">
                <label>Enter Password</label>
                <input type="password" name="password" class="form-control" value="<?php /* echo set_value('password');*/ ?>" />
                <span class="text-danger"><?php /*echo form_error('password');*/ ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="login" value="Login" class="btn btn-info" />
            </div>
        </form>
    </div>
</body>
</html>