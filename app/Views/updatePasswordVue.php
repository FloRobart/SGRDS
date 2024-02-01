<?php echo view('header'); ?>
<div class="row">
    <div class="col-md-8 offset-md-2 text-center my-5">
    <?php
        echo $succes ? '<span class="text-center">Mot de passe réinitialisé avec succès</span><br />' : '<span class="text-center">Erreur lors de la réinitialisation du mot de passe</span><br />';
    ?>
    <!-- <span>Mot de passe réinitialisé avec succès.</span><br /><input type="button" value="Retour à la page de connexion" onclick="window.location.href=\">
    <span>Erreur lors de la réinitialisation du mot de passe.</span><br /><input type="button" value="Retour à la page de connexion" onclick="window.location.href=\'/connexion\'">

<div class="row">
    <div class="col-md-8 offset-md-2 text-center my-5">
        <span class="text-center">Mot de passe réinitialisé avec succès</span><br /> -->    
        <a href="/connexion" class="btn btn-primary my-5 py-1">Connexion</a>
    </div>
</div>


<?php echo view('footer'); ?>