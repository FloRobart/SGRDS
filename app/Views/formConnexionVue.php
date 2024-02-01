<?php echo view('header'); ?>
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
<div class="container py-5 px-md-5 text-bg-light w-75 w-md-50  ">
  <form action="<?php echo base_url(); ?>connexion/validationConnexion" id="connexionForm" method="post" class="rounded border py-5 px-md-5 text-bg-white text-center">
      <h1>Se connecter</h1>
      <?php if(session()->getFlashdata('msg')):?>
          <div class="alert alert-warning">
              <?= session()->getFlashdata('msg') ?>
          </div>
      <?php endif;?>
      <input type="email" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" class="my-2 py-1 w-sm-75"><br>
      <input type="password" id="password" name="mdp_admin" placeholder="Mot de passe" class="my-2 py-1 w-sm-75 ">
      <i class="bi bi-eye-slash" id="togglePassword"></i><br />
      <div class="d-grid mb-3">
          <a href="#" id="forgotPasswordLink" class="btn btn-link">Mot de passe oublié ?</a>
      </div>
      <input type="submit" class="btn btn-primary my-2 py-1" value="Se connecter">
  </form>
  <script>
    document.getElementById('forgotPasswordLink').addEventListener('click', function() {
      var emailValue = document.getElementById('email').value;
      var forgotPasswordUrl = "<?php echo base_url(); ?>sendResetLink?email=" + encodeURIComponent(emailValue);
      window.location.href = forgotPasswordUrl;
    });

    window.onload = function() {
      const togglePassword = document.getElementById('togglePassword');
      const password = document.getElementById('password');
      togglePassword.addEventListener('click', () => {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.classList.toggle('bi-eye');
      });
    }
  </script>
</div>
<?php echo view('footer'); ?>