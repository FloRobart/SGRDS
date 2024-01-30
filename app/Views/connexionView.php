<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Codeigniter Login with Email/Password Example</title>
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-5">
                    
                    <h2>Login in</h2>
                    
                    <?php if(session()->getFlashdata('msg')):?>
                        <div class="alert alert-warning">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif;?>
                    <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                        <div class="form-group mb-3">
                            <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control" >
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Signin</button>
                        </div>     
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>
<!--
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta charset="utf-8">
        <meta http-equiv="refresh" content="3">
    </head>

    <body>
        <?php /* echo isset($error) ? $error : ''; */ ?>
        <form method="post" action="<?php /* echo site_url('Login/process'); */ ?>">
            <table cellpadding="2" cellspacing="2">
                <tr>
                    <td><th>Username</th></td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td><th>Password</th></td>
                    <td><input type="password" name="password" required="required"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="login" name="login" required="required"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
-->