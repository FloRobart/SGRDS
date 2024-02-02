<?php echo view('header'); ?>

<script>
  console.log("Trie.js");
window.onload = function() {
    
    let mail   = document.getElementById("mail");
    let prenom = document.getElementById("prenom");
    let nom    = document.getElementById("nom");
    let année  = document.getElementById("Année");
    
    
    mail.addEventListener("keyup", function() {
        inputMail = mail.value.toUpperCase();
        test();
    });

    nom.addEventListener("keyup", function() {
        inputNom = nom.value.toUpperCase();
        test();
    });

    prenom.addEventListener("keyup", function() {
        inputPrenom = prenom.value.toUpperCase();
        test();
    });

    année.addEventListener("change", function() {
        inputAnnée = année.value.toUpperCase();
        test();
    });


}

function test()
{
  let mail   = document.getElementById("mail");
  let nom    = document.getElementById("nom");
  let prenom = document.getElementById("prenom");
  let année  = document.getElementById("Année");

  let inputMail   = (mail   != null ? mail.value.toUpperCase()   : null);
  let inputNom    = (nom    != null ? nom.value.toUpperCase()    : null);
  let inputPrenom = (prenom != null ? prenom.value.toUpperCase() : null);
  let inputAnnée  = (année  != null ? année.value.toUpperCase()  : null);

  let rows = document.getElementsByTagName("tr");

    if (inputMail   == null && inputMail.length   < 1  &&
        inputNom    == null && inputNom.length    < 1  &&
        inputPrenom == null && inputPrenom.length < 1  &&
        inputAnnée  == null && inputAnnée.length  < 1
    ) {
        // If input is empty, reset all rows to be visible and return
        for (let i = 3; i < rows.length; i++) {
            rows[i].style.display = "";
        }
        return;
    }

    for (let i = 3; i < rows.length; i++) {  
        let row = rows[i];

        let tdMail   = row.cells[1];
        let tdNom    = row.cells[2];
        let tdPrenom = row.cells[3]; 
        let tdAnnée  = row.cells[4];

        let textMail   = tdMail.textContent   || tdMail.innerHTML;
        let textNom    = tdNom.textContent    || tdNom.innerHTML;
        let textPrenom = tdPrenom.textContent || tdPrenom.innerHTML;
        let textAnnée  = tdAnnée.textContent  || tdAnnée.innerHTML;


        if (textMail.toUpperCase().indexOf(inputMail)     > -1 &&
            textNom.toUpperCase().indexOf(inputNom)       > -1 &&
            textPrenom.toUpperCase().indexOf(inputPrenom) > -1 &&
            textAnnée.toUpperCase().indexOf(inputAnnée)   > -1
        ){
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    }
}
</script>
      <section id="listeRattrapagesProg" class="text-center my-3 mx-2 h-100">
        <div class="container">
            <h1>Liste des Rattrapages Programmés</h1>
            <div class="table-responsive pb-5 mb-5">
                <table class="table table-striped mb-5 pb-5">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Mail</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Prénom</th>
                      <th scope="col">Année</th>
                    </tr>
                    <tr>
                      <!--
                        Cette section sert a rechercher les étudiants selon les critères suivants :
                         - Leur mail
                         - Leur nom
                         - Leur prénom
                         - Leur année

                        Le semestre fonctionne avec un dropdown mais il retient pas quel option est cliquée faudra implémenter ca en premier lieu (bonne chance mon bew)
                        ensuite tu claques des filter() sur un tableau contenant tout les rattrapages selon le contenu des champs

                      -->
                      <td scope="col"></td>
                      <td scope="col"><input id="mail"   name="mail"   placeholder="mail"></td>
                      <td scope="col"><input id="nom"    name="nom"    placeholder="nom"></td>
                      <td scope="col"><input id="prenom" name="prenom" placeholder="prenom"></td>
                      <td scope="col">

                        <select name="Année" id="Année">
                          <option value="">Année</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                        
                      </td>
                      <td scope="col"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Section à loop -->
                    <tr>
                    <?php
                      use App\Models\EtudiantModele;
                      use App\Models\EligibleModele;
                      use App\Models\RattrapageModele;
                      use App\Models\DSModele;
                      // Récupérer les étudiants
                      $model_etudiant = new EtudiantModele();
                      $model_eligible = new EligibleModele();
                      $etudiants = $model_etudiant->getAllEtudiants();
                      $etudiantEligibles = $model_eligible->getAllEligible();

                      foreach ($etudiants as $etudiant) {
                        foreach ($etudiantEligibles as $eligible) {
                          if ($eligible['id_etudiant'] == $etudiant['id_etudiant']) {
                            echo"<tr>";
                            echo"<td>".$etudiant['id_etudiant']."</td>";
                            echo"<td>".$etudiant['mail_etudiant']."</td>";
                            echo"<td>".$etudiant['nom_etudiant']."</td>";
                            echo"<td>".$etudiant['prenom_etudiant']."</td>";
                            echo"<td>".$etudiant['annee_etudiant']."</td>";

                            echo"<td>";
                            echo'<button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modalInfo'.$etudiant['id_etudiant'].'".>';
                            echo'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">';
                            echo'<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>';
                            echo'</svg>';
                            echo'</button>';
                            echo"</td>";
                            echo"</tr>";

                            break;
                          }
                        }
                      }
                      ?>


                        
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
      </section>

      <?php
        // j'ai la liste des étudiants
        // pour chaque étudiant vérifier si il a un rattrapage

        // récupérer le nom du DS avec l'ID

        // elligible.id_rattrapage where elligible.id_etudiant == etudiant.id_etudiant = id_rattrapage
        // rattrapage.id_ds where rattrapage.id_rattrapage == elligible.id_rattrapage = id_ds

        /* Récupération des informations */
        $model_etudiant = new EtudiantModele();
        $model_eligible = new EligibleModele();
        $model_rattrapage = new RattrapageModele();
        $model_ds = new DSModele();
        $etudiants = $model_etudiant->getAllEtudiants();
        $etudiantEligibles = $model_eligible->getAllEligible();


        foreach ($etudiants as $etudiant) {
          foreach ($etudiantEligibles as $eligible) {
            if ($eligible['id_etudiant'] == $etudiant['id_etudiant']) {
              /* Récupération des données */
              $eligible = $model_eligible->getEligibleByRattrapage($etudiant['id_etudiant']);

              /* Initialisation de la popup */
              echo'<div class="modal fade" id="modalInfo'.$etudiant['id_etudiant'].'" tabindex="-1" aria-labelledby="infoRattrapage'.$etudiant['id_etudiant'].'" aria-hidden="true">';
              echo'<div class="modal-dialog">';
              echo'<div class="modal-content">';

              /* Header de la popup */
              echo'<div class="modal-header">';
              echo'<h1 class="modal-title fs-5" id="exampleModalLabel">Rattrapes</h1>';
              echo'<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>'; // La petite croix pour fermer la popup
              echo'</div>';
              echo'<div class="modal-body text-left">';

              /* Informations */
              echo'<p>DS à rattrapé :</p>';
              echo'<ul>';

              for ($i = 0; $i < count($eligible); $i++) {
                $idRattrapage = $eligible[$i]['id_etudiant'];
                $idDs = $model_rattrapage->getIdDs($idRattrapage);
                $nomDS = $model_ds->getNomDs($idDs);
                echo'<li>'.$nomDS.'</li>';
              }

              echo'</ul>';
              echo'</div>';

              /* Footer de la popup */
              echo'<div class="modal-footer">';
              echo'<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>';
              echo'</div>';
              echo'</div>';
              echo'</div>';
              echo'</div>';

              break;
            }
          }
        }
      ?>


      
    <div class="container">
        <footer class="py-3 my-4">
          <p class="text-center text-body-secondary border-top py-2">SGRDS 2024</p>
        </footer>
      </div>
</body>
</html>
