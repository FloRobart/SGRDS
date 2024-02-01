<?php echo view('header'); ?>
<section id="listeRattrapages" class="text-center my-3 mx-2 h-100">
  <div class="container">
      <h1>Liste des étudiants</h1>
      <div class="table-responsive pb-5 mb-5">
          <table class="table table-striped mb-5 pb-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Étudiant</th>
                <th scope="col">Ressource</th>
                <th scope="col">Enseignant</th>
                <th scope="col">Année</th>
                <th scope="col">Semestre</th>
                <th scope="col">Justifié</th>
                <th scope="col">Action</th>
              </tr>
              <tr>
                <td scope="col"></td>
                <td scope="col"><input id="etudiant" name="etudiant" placeholder="Étudiant"></td>
                <td scope="col"><input id="ressource" name="ressource" placeholder="Ressource"></td>
                <td scope="col"><input id="enseignant" name="enseignant" placeholder="Enseignant"></td>
                <td scope="col"></td>
                <td scope="col">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Semestre
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Tous</a></li>
                      <li><a class="dropdown-item" href="#">1</a></li>
                      <li><a class="dropdown-item" href="#">2</a></li>
                      <li><a class="dropdown-item" href="#">3</a></li>
                      <li><a class="dropdown-item" href="#">4</a></li>
                      <li><a class="dropdown-item" href="#">5</a></li>
                      <li><a class="dropdown-item" href="#">6</a></li>
                    </ul>
                  </div>
                </td>
                <td scope="col" >
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Justifié?
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Tout</a></li>
                      <li><a class="dropdown-item" href="#">Oui</a></li>
                      <li><a class="dropdown-item" href="#">Non</a></li>

                    </ul>
                  </div>
                </td>

              </tr>
            </thead>
            <tbody>
              <!-- Section à loop -->
              <tr>
                <td>1</td> <!-- ID du Rattrapage, à voir si on le laisse ou pas -->
                <td>Esteban BREA HELL</td> <!-- Nom de l'étudiant -->
                <td>Communication</td> <!-- Ressource -->
                <td>Laurence NIVET</td>
                <td>3</td>
                <td>6</td> <!-- Semestre -->
                <td>Non</td> <!-- Absence justifiée ? -->
                <td>
                  <!-- Bouton d'édition du rattrapage, redirige vers les pages d'édition -->
                  <button class="btn btn-primary rounded"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                      <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
                    </svg>
                  </button>
                  <!-- Bouton de suppression, a afficher UNIQUEMENT en mode Directeur -->
                  <button class="btn btn-warning rounded"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                      <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
  </div>
</section>
<?php echo view('footer'); ?>