<?php echo view('header'); ?>

<script>
  console.log("Trie.js");
window.onload = function() {
    
    let ressource = document.getElementById("ressource");
    let enseignant = document.getElementById("enseignant");

    let ds = document.getElementById("ds");

    let semestre = document.getElementById("semestre");

    let année = document.getElementById("Année");
    
    

    ressource.addEventListener("keyup", function() {
        inputRessource = ressource.value.toUpperCase();
        test();
    });

    enseignant.addEventListener("keyup", function() {
        inputEnseignant = enseignant.value.toUpperCase();
        test();
    });

    ds.addEventListener("keyup", function() {
        inputDs = ds.value.toUpperCase();
        test();
    });

    semestre.addEventListener("change", function() {
        inputSemestre = semestre.value.toUpperCase();
        test();
    });

    année.addEventListener("change", function() {
        inputAnnée = année.value.toUpperCase();
        test();
    });


}

function test()
{
  let ressource = document.getElementById("ressource");
    let enseignant = document.getElementById("enseignant");

    let ds = document.getElementById("ds");

    let semestre = document.getElementById("semestre");

    let année = document.getElementById("Année");
  let inputSemestre = (semestre != null ? semestre.value.toUpperCase() : null);
  let inputRessource = (ressource != null ? ressource.value.toUpperCase() : null);
  let inputEnseignant = (enseignant != null ? enseignant.value.toUpperCase() : null);
  let inputDs = (ds != null ? ds.value.toUpperCase() : null);

  let inputAnnée = (année != null ? année.value.toUpperCase() : null);
  let rows = document.getElementsByTagName("tr");

    if (inputRessource == null && inputRessource.length < 1  && inputDs == null && inputDs.length < 1 && inputEnseignant == null && inputEnseignant.length < 1 && (inputSemestre == null || inputSemestre == "" )&& inputSemestre.length < 1 && inputAnnée == null && inputAnnée.length < 1) {
        // If input is empty, reset all rows to be visible and return
        for (let i = 3; i < rows.length; i++) {
            rows[i].style.display = "";
        }
        return;
    }

    for (let i = 3; i < rows.length; i++) {  
        let row = rows[i];
        let tdRessource = row.cells[2]; 
        let tdDs = row.cells[1];
        let tdEnseignant = row.cells[3]; 
        let textEnseignant = tdEnseignant.textContent || tdEnseignant.innerHTML;
        let textDs = tdDs.textContent || tdDs.innerHTML;
        let textRessource = tdRessource.textContent || tdRessource.innerHTML;
        let tdSemestre = row.cells[5]; 
        let textSemestre = tdSemestre.textContent || tdSemestre.innerHTML;

        let tdAnnée = row.cells[4];
        let textAnnée = tdAnnée.textContent || tdAnnée.innerHTML;


        if (textRessource.toUpperCase().indexOf(inputRessource) > -1 && textDs.toUpperCase().indexOf(inputDs) > -1 && textEnseignant.toUpperCase().indexOf(inputEnseignant) > -1 && textSemestre.toUpperCase().indexOf(inputSemestre) > -1 && textAnnée.toUpperCase().indexOf(inputAnnée) > -1){
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
                      <th scope="col">DS</th>
                      <th scope="col">Ressource</th>
                      <th scope="col">Enseignant</th>
                      <th scope="col">Année</th>
                      <th scope="col">Semestre</th>
                      <th scope="col">Action</th>
                    </tr>
                    <tr>
                      <!--
                        Cette section sert a rechercher les rattrapages selon les critères suivants :
                         - L'intitulé du DS
                         - La ressource
                         - L'enseignant
                         - Le semestre

                         Le semestre fonctionne avec un dropdown mais il retient pas quel option est cliquée faudra implémenter ca en premier lieu (bonne chance mon bew)
                         ensuite tu claques des filter() sur un tableau contenant tout les rattrapages selon le contenu des champs

                      -->
                      <td scope="col"></td>
                      <td scope="col"><input id="ds"  name="ds" placeholder="DS"></td>
                      <td scope="col"><input id="ressource" name="ressource" placeholder="Ressource"></td>
                      <td scope="col"><input id="enseignant"  name="enseignant" placeholder="Enseignant"></td>
                      <td scope="col">
                        <select name="Année" id="Année">
                          <option value="">Année:</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>


                      </td>
                      <td scope="col">
                        <!-- Ici tu mets le onClick (ou autre truc d'event jsp frr) sur le tag select et tu check quelle option est selectionnée-->
                        <select name="semestre" id="semestre">
                          <option value="">Semestre:</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                        
                        

                        
                        <!--<div class="dropdown">
                          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Semestre
                          </button>
                          <ul class="dropdown-menu" >
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">Tous</a></li>
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">1</a></li>
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">2</a></li>
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">3</a></li>
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">4</a></li>
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">5</a></li>
                            <li><a class="dropdown-item" href="#" onclick="playerSearch()">6</a></li>
                          </ul>
                        </div>-->
                      </td>
                      <td scope="col"></td>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Section à loop -->
                    <tr>
                    <?php
                      use App\Models\RattrapageModele;
                      use App\Models\DSModele;
                      // Récupérer les étudiants
                      $model_Rattrapage = new RattrapageModele();
                      $rattrapges = $model_Rattrapage->getAllRattrapagesByType("PROGRAMME");

                      $model_DS = new DSModele();
                      $ds = $model_DS->getAllDS();
                      $ds = array_column($ds, null, 'id_ds'); // Transform $ds into an associative array with 'id_ds' as keys


                    

                      foreach ($rattrapges as $rattrapge) {
                        echo"<tr>";
                        echo"<td>".$rattrapge['id_ds']."</td>";
                        echo"<td>".$ds[$rattrapge['id_ds']]['ressource_ds']."</td>";
                        echo"<td>".$ds[$rattrapge['id_ds']]['ressource_ds']."</td>";
                        echo"<td>".$rattrapge['enseignant_rattrapage']."</td>";
                        echo"<td>".ceil($ds[$rattrapge['id_ds']]['semestre_ds']/2)."</td>";

                        echo"<td>".($ds[$rattrapge['id_ds']]['semestre_ds'])."</td>";
                        echo"<td>";
                        echo'<button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modalInfo"'.$rattrapge['id_ds'].'>';
                        echo'<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">';
                        echo'<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>';
                        echo'</svg>';
                        echo'</button>';
                        echo"</td>";
                        echo"</tr>";  
                      
                      }
                      ?>

                      <!-- <td>1</td> 
                      <td>Conduite du changement</td>
                      <td>Communication</td> 
                      <td>Laurence NIVET</td>
                      <td>3</td>
                      <td>6</td> 
                      <td> 
                        
                        <button class="btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modalInfo1">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                              <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                          </svg>
                        </button>-->
                        
                        
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
      </section>

      <?php

            $model_Rattrapage = new RattrapageModele();
            $rattrapges = $model_Rattrapage->getAllRattrapagesByType("PROGRAMME");

            $model_DS = new DSModele();
            $ds = $model_DS->getAllDS();
            $ds = array_column($ds, null, 'id_ds'); // Transform $ds into an associative array with 'id_ds' as keys

            foreach ($rattrapges as $rattrapge) {
              echo'<div class="modal fade" id="modalInfo"'.$rattrapge['id_ds'].' tabindex="-1" aria-labelledby="infoRattrapage"'.$rattrapge['id_ds'].' aria-hidden="true">';
              echo'<div class="modal-dialog">';
              echo'<div class="modal-content">';
              echo'<div class="modal-header">';
              echo'<h1 class="modal-title fs-5" id="exampleModalLabel">Rattrape</h1>';
              echo'<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
              echo'</div>';
              echo'<div class="modal-body text-left">';
              echo'<p>Date : '.$rattrapge['date_rattrapage'].'</p>';
              echo'<p>Heure : '.$rattrapge['horaire_rattrapage'].'</p>';
              echo'<p>Salle : '.$rattrapge['salle_rattrapage'].'</p>';
              echo'<p>Étudiants concernés :</p>';
              echo'<ul>';
              echo'<li>Esteban BREA HELL</li>';
              echo'<li>Gomain RASCOIN</li>';
              echo'</ul>';
              echo'</div>';
              echo'<div class="modal-footer">';
              echo'<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>';
              echo'</div>';
              echo'</div>';
              echo'</div>';
              echo'</div>';
            }

      

                    

        //for (let i = 0; i < 10; i++) {
        //   document.write('<div class="modal fade" id="modalInfo'+(i+1)+'" tabindex="-1" aria-labelledby="infoRattrapage'+(i+1)+'" aria-hidden="true">');
        //   document.write('<div class="modal-dialog">');
        //   document.write('<div class="modal-content">');
        //   document.write('<div class="modal-header">');
        //   document.write('<h1 class="modal-title fs-5" id="exampleModalLabel">Rattrape</h1>');
        //   document.write('<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>');
        //   document.write('</div>');
        //   document.write('<div class="modal-body text-left">');
        //   document.write('<p>Date : 11/09/2001</p>');
        //   document.write('<p>Heure : 17h27</p>');
        //   document.write('<p>Salle : 727</p>');
        //   document.write('<p>Étudiants concernés :</p>');
        //   document.write('<ul>');
        //   document.write('<li>Esteban BREA HELL</li>');
        //   document.write('<li>Gomain RASCOIN</li>');
        //   document.write('</ul>');
        //   document.write('</div>');
        //   document.write('<div class="modal-footer">');
        //   document.write('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>');
        //   document.write('</div>');
        //   document.write('</div>');
        //   document.write('</div>');
        //   document.write('</div>');
        // 
        
      ?>
      <div class="modal fade" id="modalInfo1" tabindex="-1" aria-labelledby="infoRattrapage1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Rattrape</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-left">
              <p>Date : 11/09/2001</p>
              <p>Heure : 17h27</p>
              <p>Salle : 727</p>
              <p>Étudiants concernés :</p>
              <ul>
                <li>Esteban BREA HELL</li>
                <li>Gomain RASCOIN</li>
              </ul> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div> -->

      
    <div class="container">
        <footer class="py-3 my-4">
          <p class="text-center text-body-secondary border-top py-2">SGRDS 2024</p>
        </footer>
      </div>
</body>
</html>

