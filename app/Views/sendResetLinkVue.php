<?php echo view('header'); ?>

<div class="row">
    <div class="col-md-8 offset-md-2 text-center my-5">
        <span class="text-center">Allez sur votre adresse mail "<b><?php echo $email; ?></b>" et cliquez sur le lien pour réinitialiser votre mot de passe.</span><br />
        <a href="mailto:" class="btn btn-primary my-5 py-1">Ouvrez votre boîte mail</a>
    </div>
</div>

<?php echo view('footer'); ?>