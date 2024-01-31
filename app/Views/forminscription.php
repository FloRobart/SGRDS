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
      <input type="password" id="password" name="mdp_admin" placeholder="Mot de passe" class="my-2 py-1 w-sm-75 "><br>
      <input type="password" id="passwordConfirm" name="confirmpassword" placeholder="Confirmer le mot de passe" class="my-2 py-1 w-sm-75 "><br>
      <input type="submit" class="btn btn-primary my-2 py-1" value="S'inscrire">
  </form> 
</div>
<?php echo view('footer'); ?>
