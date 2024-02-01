<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGRDS</title>
    <!-- Import de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Lien pour cacher/afficher le mot de passe -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>
<style>
    form i {
        margin-left: -30px;
        cursor: pointer;
    }
</style>
<body>
    <header>
        <div class="px-3 py-2 text-bg-light border-bottom">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <h1 class="text-dark">SRGDS</h1>
              </a>
              <div class="text-end">
                <?php if(session()->get('isLoggedIn')): ?>
                  <i class="bi bi-person-circle fs-3"></i>
                  <span class="me-4"><?php echo session()->get('nom_admin'); ?></span>
                  <a href="<?php echo base_url(); ?>/deconnexion" class="btn btn-warning">Déconnexion</a>
                <?php else: ?>
                  <a href="<?php echo base_url(); ?>/connexion" class="btn btn-primary">Connexion</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </header>