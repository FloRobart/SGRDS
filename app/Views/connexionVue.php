<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Codeigniter Login with Email/Password Example</title>
    </head>

    <style>
    .btn-link {
        border: none;
        outline: none;
        background: none;
        cursor: pointer;
        color: #0000EE;
        padding: 0;
        text-decoration: underline;
        font-family: inherit;
        font-size: inherit;
    }
    </style>

    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-5">
                    
                    <h2>Connexion</h2>
                    
                    <?php if(session()->getFlashdata('msg')):?>
                        <div class="alert alert-warning">
                            <?= session()->getFlashdata('msg') ?>
                        </div>
                    <?php endif;?>
                    <form action="<?php echo base_url(); ?>connexion/validationConnexion" method="post" id="connexionForm">
                        <div class="form-group mb-3">
                            <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>

                        <div class="d-grid mb-3">
                            <a href="#" id="forgotPasswordLink" class="btn btn-link">Mot de passe oublié ?</a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Connexion</button>
                        </div>
                    </form>

                    <script>
                        document.getElementById('forgotPasswordLink').addEventListener('click', function() {
                            var emailValue = document.getElementById('email').value;
                            var forgotPasswordUrl = "<?php echo base_url(); ?>forgot_password/sendResetLink?email=" + encodeURIComponent(emailValue);
                            window.location.href = forgotPasswordUrl;
                        });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>