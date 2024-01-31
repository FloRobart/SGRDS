    <?php echo view('header'); ?>
    <div class="container py-5 px-md-5 text-bg-light w-75 w-md-50  ">
    <form action="<?php echo base_url(); ?>inscription/validationInscription" method="post" class="rounded border py-5 px-md-5 text-bg-white text-center">
        <h1>Inscrire un nouveau directeur des études</h1>
        <?php if(isset($validation)):?>
            <div class="alert alert-warning">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>
        <input type="text" id="username" name="nom_admin" placeholder="Nom d'utilisateur" value="<?= set_value('nom_admin') ?>" class="my-2 py-1 w-sm-75 "><br>
        <input type="email" id="email" name="email" placeholder="Adresse e-mail" value="<?= set_value('email') ?>" class="my-2 py-1 w-sm-75 "><br>

        <input type="password" id="password" name="mdp_admin" placeholder="Mot de passe" class="my-2 py-1 w-sm-75">
        <i class="bi bi-eye-slash" id="togglePassword"></i><br />
        <input type="password" id="passwordConfirm" name="confirmpassword" placeholder="Confirmer le mot de passe" class="my-2 py-1 w-sm-75">
        <i class="bi bi-eye-slash" id="togglePasswordConfirm"></i><br />

        <input type="submit" class="btn btn-primary my-2 py-1" value="S'inscrire">
    </form> 
    </div>
    <script>
    window.onload = function() {
        const togglePassword = document.getElementById('togglePassword');
        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('passwordConfirm');
        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('bi-eye');
        });

        togglePasswordConfirm.addEventListener('click', () => {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            togglePasswordConfirm.classList.toggle('bi-eye');
        });
    }
    </script>
    <?php echo view('footer'); ?>

<!-- TODO : on perd la session quand on arrive sur cette page -->
<?php if(session()->get('isLoggedIn')): ?>
<?php else: ?>
    <?php if(!session()->get('isLoggedIn')): ?>
        <?php echo view('header'); ?>
        <h1 class="text-center">Vous n'avez pas accès à cette page</h1>
        <div class="text-center">
            <a href="<?php echo base_url(); ?>/" class="btn btn-primary">Retourner à l'accueil</a>
        </div>
        <?php echo view('footer'); ?>
    <?php endif; ?>
<?php endif; ?>
