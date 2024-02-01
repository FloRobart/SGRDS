<?php echo view('header'); ?>
<div class="container py-5 px-md-5 text-bg-light w-75 w-md-50  ">
    <form action="<?php echo base_url(); ?>update_password" id="connexionForm" method="post" class="rounded border py-5 px-md-5 text-bg-white text-center">
        <h1 id="title">Réinitialisation du mot de passe</h1>
        <?php if(isset($validation)):?>
            <div class="alert alert-warning my-2 py-1 w-sm-75" id="affichageErreur">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>
        
        <input type="password" id="password" name="mdp_admin" placeholder="Mot de passe" class="my-2 py-1 w-sm-75">
        <i class="bi bi-eye-slash" id="togglePassword"></i><br />
        <input type="password" id="confirmPassword" name="confirme_mdp_admin" placeholder="Confirmer le mot de passe" class="my-2 py-1 w-sm-75">
        <i class="bi bi-eye-slash" id="toggleConfirmPassword"></i><br />
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        <input type="submit" class="btn btn-primary my-2 py-1" value="Changer le mot de passe">
    </form>
</div>
<script>
window.onload = function() {
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.classList.toggle('bi-eye');
    });

    toggleConfirmPassword.addEventListener('click', () => {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        toggleConfirmPassword.classList.toggle('bi-eye');
    });

    /* Vérification que les deux mots de passe sont identiques */
    document.getElementById('connexionForm').addEventListener('submit', function(e) {
        e.preventDefault();

        var password2 = document.getElementById('password');
        var confirmPassword2 = document.getElementById('confirmPassword');
        var messageErreur = "";

        if (document.getElementById('affichageErreur') !== null) {
            document.getElementById('affichageErreur').remove();
        }

        if (password2.value === "") {
            messageErreur += "Le mot de passe ne peut pas être vide.<br />";
        }

        if (password2.value !== confirmPassword2.value) {
            messageErreur += "Les deux mots de passe ne sont pas identiques.<br />";
        }

        if (password2.value.length < 4) {
            messageErreur += "Le mot de passe doit contenir au moins 8 caractères.<br />";
        }

        if (password2.value.length > 50) {
            messageErreur += "Le mot de passe doit contenir au maximum 50 caractères.<br />";
        }
        
        if (messageErreur !== "") {
            document.getElementById('title').insertAdjacentHTML('afterend', "<div class=\"alert alert-warning my-2 py-1 w-sm-75\" id=\"affichageErreur\">" + messageErreur + "</div>");
        } else {
            e.target.submit();
        }
    });
}
</script>
<?php echo view('footer'); ?>
