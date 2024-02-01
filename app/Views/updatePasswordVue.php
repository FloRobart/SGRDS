<?php echo view('header'); ?>
<div class="row">
    <div class="col-md-8 offset-md-2 text-center my-5">
        <h1 class="text-center">
            <?php
                echo $success ? 'Mot de passe réinitialisé avec succès' : 'Erreur lors de la réinitialisation du mot de passe';
            ?>
        </h1><br />
        <a href="/connexion" class="btn btn-primary my-5 py-1">Connexion</a>
    </div>
</div>


<?php echo view('footer'); ?>