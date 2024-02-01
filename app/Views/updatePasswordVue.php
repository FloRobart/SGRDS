<?php echo view('header'); ?>

<?php if($success):?>
    <span>Mot de passe réinitialisé avec succès.</span><br /><input type="button" value="Retour à la page de connexion" onclick="window.location.href=\'/connexion\'">
<?php else: ?>
    <span>Erreur lors de la réinitialisation du mot de passe.</span><br /><input type="button" value="Retour à la page de connexion" onclick="window.location.href=\'/connexion\'">
<?php endif; ?>

<?php echo view('footer'); ?>