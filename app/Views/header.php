<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGRDS</title>
    <!-- Import de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="px-3 py-2 text-bg-light border-bottom">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <h1 class="text-dark">SRGDS</h1>
              </a>
              <div class="text-end">
                <!-- A changer par Déconnexion une fois connecté -->
                <?php if(session()->get('isLoggedIn')): ?>
                  <a href="<?php echo base_url(); ?>/deconnexion" class="btn btn-warning">Déconnexion</a>
                <?php else: ?>
                  <a href="<?php echo base_url(); ?>/connexion" class="btn btn-primary">Connexion</a>
                <?php endif; ?>
                <!-- <button type="button" class="btn btn-warning">Déconnexion</button> -->
              </div>
            </div>
          </div>
        </div>
      </header>