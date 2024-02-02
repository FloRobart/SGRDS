<?php echo view('header'); ?>
  <section id="listeRattrapagesProg" class="text-center my-3 mx-2 h-100">
    <div class="container">
      <div class="row">
        <h1 class="col-11">Rattrapages à Programmer</h1>
        <?php if(session()->get('isLoggedIn')): ?>
          <button class="col-1 btn btn-primary rounded" data-bs-toggle="modal" data-bs-target="#modalCreation">+</button>
        <?php endif; ?>
      </div>

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
              <td scope="col"><input id="ds" name="ds" placeholder="DS"></td>
              <td scope="col"><input id="ressource" name="ressource" placeholder="Ressource"></td>
              <td scope="col"><input id="enseignant" name="enseignant" placeholder="Enseignant"></td>
              <td scope="col"></td>
              <td scope="col">
                <select name="semestre" id="semestre">
                  <option value="0">Semestre:</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </td>
              <td scope="col"></td>
            </tr>
          </thead>
          <tbody>
            <!-- TODO: Section à loop -->
            <?php
                      use App\Models\RattrapageModele;
                      use App\Models\DSModele;
                      use App\Models\EligibleModele;
                      use App\Models\EtudiantModele;
                      // Récupérer les étudiants
                      $model_Rattrapage = new RattrapageModele();
                      $rattrapges = $model_Rattrapage->getAllRattrapagesByType("PROGRAMME");

                      $model_DS = new DSModele();
                      $ds = $model_DS->getAllDS();
                      $ds = array_column($ds, null, 'id_ds'); // Transform $ds into an associative array with 'id_ds' as keys


                    

                      foreach ($rattrapges as $rattrapge) {
                        echo"<tr>";
                        echo"<td class=\"identifiantDS\">".$rattrapge['id_ds']."</td>";
                        echo"<td>".$ds[$rattrapge['id_ds']]['intitule_ds']."</td>";
                        echo"<td>".$ds[$rattrapge['id_ds']]['ressource_ds']."</td>";
                        echo"<td>".$rattrapge['enseignant_rattrapage']."</td>";
                        echo"<td>".ceil($ds[$rattrapge['id_ds']]['semestre_ds']/2)."</td>";

                        echo"<td>".($ds[$rattrapge['id_ds']]['semestre_ds'])."</td>";
                        echo"<td>";

                        if(!session()->get('isLoggedIn'))
                        {
                          echo"<button class=\"btn btn-primary rounded btnProg\" data-bs-toggle=\"modal\" data-bs-target=\"#modalProgrammation".$rattrapge['id_ds']."\"\">";
                          echo"<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-fill\" viewBox=\"0 0 16 16\">";
                          echo"<path d=\"M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z\"/>";
                          echo"</svg>";
                          echo"</button>";
                        }

                        if(session()->get('isLoggedIn'))
                        {
                          echo"<button class=\"btn btn-secondary rounded btnEdit\" data-bs-toggle=\"modal\" data-bs-target=\"#modalEdition".$rattrapge['id_ds']."\">";
                          echo"<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-fill\" viewBox=\"0 0 16 16\">";
                          echo"<path d=\"M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z\"/>";
                          echo"</svg>";
                          echo"</button>";

                          echo"<button class=\"btn btn-warning rounded btnSuppr\" data-bs-toggle=\"modal\" data-bs-target=\"#modalSuppression".$rattrapge['id_ds']."\">";
                          echo"<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x-lg\" viewBox=\"0 0 16 16\">";
                          echo"<path d=\"M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z\"/>";
                          echo"</svg>";
                          echo"</button>";
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

  <!-- Modal de suppression, dans l'idéal il faudrait en avoir qu'un pour tlm -->

<script>
  function btnEditPress(id){
      console.log(id);
    }
</script>


  <?php

  $model_rattrapage = new RattrapageModele();
  $modele_etudiant = new EtudiantModele();
  $modele_eligible = new EligibleModele();
  $modele_ds = new DSModele();
  $rattrapges = $model_rattrapage->getAllRattrapagesByType("PROGRAMME");
  $ds = $modele_ds->getAllDS();
  $ds = array_column($ds, null, 'id_ds'); // Transform $ds into an associative array with 'id_ds' as keys



    foreach ($rattrapges as $rattrapge) {
      $etudiant_concerner = $modele_eligible->getEligibleByRattrapage($rattrapge['id_rattrapage']);

      echo "<div class=\"modal fade\" id=\"modalSuppression".$rattrapge['id_ds']."\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
      echo "<div class=\"modal-dialog\">";
      echo "<div class=\"modal-content\">";
      echo "<div class=\"modal-header\">";
      echo "<h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Confirmer la suppression ?</h1>";
      echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
      echo "</div>";
      echo "<div class=\"modal-body\">";
      echo "<p>Êtes-vous sûr de vouloir supprimer ce rattrapage ?</p>";
      echo "</div>";
      echo "<div class=\"modal-footer\">";
      echo "<form action=\"\">";
      echo "<input type=\"hidden\" id=\"identifiantSuppr\" name=\"identifiantSuppr\" value=\"".$rattrapge['id_rattrapage']."\">";
      echo "<!-- Modifier la value avec JS selon le bouton selectionné, -1 si nouveau bail -->";
      echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>";
      echo "<input type=\"submit\" class=\"btn btn-warning\" value=\"Supprimer\">";
      echo "</form>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "";

      echo "<div class=\"modal fade\" id=\"modalProgrammation".$rattrapge['id_ds']."\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
      echo "<div class=\"modal-dialog\">";
      echo "<div class=\"modal-content\">";
      echo "<div class=\"modal-header\">";
      echo "<h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Programmer un rattrapage</h1>";
      echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>";
      echo "</div>";
      echo "<form >";
      echo "<div class=\"modal-body\">";
      echo "<!-- TODO: BIEN VERIFIER DANS LE BACK SI TOUT A BIEN ETE REMPLI";
      echo "       JE METS PAS REQUIRED CAR ON PEUT COCHER LA CASE PAS DE RATTRAPAGE";
      echo "  -->";
      echo "<input type=\"checkbox\" id=\"nonRattrapable\" class=\"me-2\"><label>Pas de rattrapage ?</label><br>";
      echo "<input type=\"hidden\" id=\"identifiantProg\" name=\"identifiantProg\" value=\"".$rattrapge['id_rattrapage']."\">";
      echo "<label>Date du rattrapage : </label>";
      echo "<input type=\"date\" id=\"date".$rattrapge['id_ds']."\" name=\"date.\"[ class=\"w-100 my-2\"><br>";
      echo "<label>Heure du rattrapage : </label>";
      echo "<input type=\"time\" id=\"heure".$rattrapge['id_ds']."\" name=\"heure\" min=\"08:00\" max=\"18:00\" class=\"w-100 my-2\" /><br>";
      echo "<label>Durée du rattrapage : </label>";
      echo "<input type=\"time\" id=\"duree".$rattrapge['id_ds']."\" name=\"duree\" min=\"00:30\" max=\"04:00\" class=\"w-100 my-2\" /><br>";
      echo "<label>Salle du rattrapage : </label>";
      echo "<input type=\"text\" id=\"salle".$rattrapge['id_ds']."\" name=\"salle\" placeholder=\"Salle du rattrapage\" class=\"w-100 my-2\" /><br>";

      echo "</div>";
      echo "<div class=\"modal-footer\">";
      echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>";
      echo "<input type=\"submit\" class=\"btn btn-primary\" value=\"Programmer le DS\">";
      echo "</div>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "";



      echo "<div class=\"modal fade\" id=\"modalEdition".$rattrapge['id_ds']."\" tabindex=\"-1\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">";
      echo "<div class=\"modal-dialog\">";
      echo "<div class=\"modal-content\">";
      echo "<div class=\"modal-header\">";
      echo "<h1 class=\"modal-title fs-5\" id=\"exampleModalLabel\">Éditer un rattrapage</h1>";
      echo "</div>";
      echo "<form id=\"FormEdit\">";
      echo "<div class=\"modal-body\">";
      echo "<input type=\"hidden\" id=\"identifiantEdit\" name=\"identifiantEdit\" value=\"\">";
      echo "<!-- Modifier la value avec JS selon le bouton selectionné-->";
      echo "<label>Intitulé du DS : </label>";
      echo "<input id=\"intituleEdit".$rattrapge['id_ds']."\" name=\"intitule\" placeholder=\"Intitulé du DS\" class=\"w-100 my-2\" value=\" ".$ds[$rattrapge['id_ds']]['intitule_ds'] ."\" required><br>";
      echo "<label>Ressource : </label>";
      echo "<input type=\"text\" id=\"ressourceEdit".$rattrapge['id_ds']."\" name=\"ressource\" placeholder=\"Ressource\" class=\"w-100 my-2\" value=\" ".$ds[$rattrapge['id_ds']]['ressource_ds'] ."\" list=\"ressources\" required /><br>";
      echo "<label>Enseignant : </label>";
      echo "<input type=\"text\" id=\"enseignantEdit".$rattrapge['id_ds']."\" name=\"enseignant\" placeholder=\"Enseignant\" class=\"w-100 my-2\" value=\" ".$rattrapge['enseignant_rattrapage'] ."\" list=\"enseignants\" required /><br>";
      echo "<label>Type de DS : </label>";
      echo "<select id=\"typeDSEdit".$rattrapge['id_ds']."\">";
      echo "<option id=\"papierEdit\">Papier</option>";
      echo "<option id=\"machineEdit\">Machine</option>";
      echo "<option id=\"oralEdit\">Oral</option>";
      echo "</select><br>";
      echo "<label>Étudiants absents justifier : </label>";
      echo "<ul class=\"listeEtudiants\">";
      foreach ($etudiant_concerner as $etudiant) {
        $etu = $modele_etudiant->getEtudiantById($etudiant['id_etudiant']);
        echo "<li>".$etu['nom_etudiant']." ". $etu['prenom_etudiant']. "</li>";
      }
      echo "</ul>";
      echo "<label>Étudiants absents non justifier : </label>";
      echo "<ul class=\"listeEtudiantsNonJ\">";
      $etudiant_non_concerner = $modele_eligible->getNonEligibleByRattrapage($rattrapge['id_rattrapage']);
      foreach ($etudiant_non_concerner as $etudiant) {
        $etu = $modele_etudiant->getEtudiantById($etudiant['id_etudiant']);
        echo "<li>".$etu['nom_etudiant']." ". $etu['prenom_etudiant']. "</li>";
      }
      echo "</ul>";

      

      


      
      echo "</div>";
      echo "<div class=\"modal-footer\">";
      echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>";
      echo "<input type=\"submit\" class=\"btn btn-primary\" id=\"ConfirmEdit" .$rattrapge['id_ds']."\" value=\"Confirmer\">";
      
      


      echo "</div>";
      echo "</form>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
      echo "<script>";
      echo "let btn".$rattrapge['id_ds']." = document.getElementById(\"ConfirmEdit".$rattrapge['id_ds']."\");";
      echo "btn".$rattrapge['id_ds'].".addEventListener(\"click\", function(ev){
        let intitule = document.getElementById(\"intituleEdit".$rattrapge['id_ds']."\").value;
        let ressource = document.getElementById(\"ressourceEdit".$rattrapge['id_ds']."\").value;
        let enseignant = document.getElementById(\"enseignantEdit".$rattrapge['id_ds']."\").value;
        let type = document.getElementById(\"typeDSEdit".$rattrapge['id_ds']."\").value;
        let id = ".$rattrapge['id_ds'].";
      
        fetch('/update_rattrapage', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            id: id
            intitule: intitule,
            ressource: ressource,
            enseignant: enseignant,
            type: type,

          }),
        })
        .then(response => response.json())
        .then(data => {
          console.log('Success:', data);
        })
        .catch((error) => {
          console.error('Error:', error);
        });
      
      });";
      echo "</script>";
    }

  ?>





  <!-- Modal de création d'un rattrapage POUR LE DIRECTEUR -->
  <div class="modal fade" id="modalCreation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Nouveau rattrapage</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form methode="POST" action="/add_ds">
          <div class="modal-body">
            <input id="intitule_ds" name="intitule_ds" placeholder="Intitulé du DS" class="w-100 my-2" required><br>
            <input type="text" id="semestre_ds" name="semestre_ds" placeholder="semestre_ds" class="w-100 my-2" required /><br>
            <input type="text" id="enseignant" name="enseignant" placeholder="Enseignant" class="w-100 my-2"/><br>
            <input type="date" id="date" name="date" class="w-100 my-2"><br>
            <input type="time" id="heure" name="heure" min="08:00" max="18:00" class="w-100 my-2" /><br>
            <input type="text" id="durree" name="durree" placeholder="durree" class="w-100 my-2"/><br>
            <input type="text" id="ressource" name="ressource" placeholder="Ressource" class="w-100 my-2" list="ressources" required /><br>
            <select id="typeDS">
              <option id="papier">Papier</option>
              <option id="machine">Machine</option>
              <option id="oral">Oral</option>
            </select><br>
            <!-- TODO: Ici il faudrait faire en sorte de quand on saisit un étudiant et qu'on appuie sur  ca l'ajoute à la liste-->
            <!-- <input type="text" id="etudiantAdd" name="etudiant" placeholder="Ajouter un étudiant" class="w-75 my-2"
              list="etudiants">
            <p class="btn btn-secondary my-2" id="btnAddStudent">+</p><br>
            <p>Étudiants absents :</p>
            <ul class="listeEtudiants">

            </ul> -->

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btnClear" data-bs-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="Confirmer">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal d'édition du rattrapage POUR LE DIRECTEUR -->



  <div class="container">
    <footer class="py-3 my-4">
      <p class="text-center text-body-secondary border-top py-2">SGRDS 2024</p>
    </footer>
  </div>
  <!-- Datalists -->
  <!-- TODO: Il faudra mettre la liste des ressources, étudiants et enseignants ici pour les différents formulaires UNIQUEMENT EN MODE DIRECTEUR-->
  <datalist id="ressources">
    <option>R3.XX Communication</option>
    <option>R3.XX Developpement</option>
  </datalist>

  <datalist id="enseignants">
    <option>Laurence NIVET</option>
    <option>Rodolphe CHARRIER</option>
  </datalist>

  <datalist id="etudiants">
    <option value="Esteban BREA HELL">Esteban BREA HELL</option>
    <option value="Gomain RASCOIN">Gomain RASCOIN</option>
  </datalist>

  <!-- JS -->
  <script type="text/javascript">
    //IL FAUT METTRE EN DUR LES ETUDIANTS DES RATTRAPAGES COMME CI DESSOUS
    //let infosRattrapage = [{ id: 1, intitule: "Conduite du changement", ressource: "Communication", enseignant: "Laurence NIVET", type: "Papier", etudiants: ["Esteban BREA HELL"] }];
    // let infosRattrapage = [
    //   {
    //     id:1,
    //     intitule:"Conduite du changement",
    //     ressource:"Communication",
    //     enseignant:"Laurence NIVET",
    //     type:"Papier",
    //     etudiants:["Esteban BREA HELL"]
    //   },
      
    // ]
    <?php


      $rattrapageModel = new RattrapageModele();
      $eligibleModel = new EligibleModele();
      $etudiantModel = new EtudiantModele();

      $rattrapages = $rattrapageModel->getAllRattrapages();
      $model_DS = new DSModele();
      $ds = $model_DS->getAllDS();
      $ds = array_column($ds, null, 'id_ds'); // Transform $ds into an associative array with 'id_ds' as keys


      $str = "[";
      foreach ($rattrapages as $rattrapge){
        $etudiants = $rattrapageModel->getAllEtudiantsByRattrapage($rattrapge['id_rattrapage']);
        $etudiantsAbsents = array();
        foreach ($etudiants as $etudiant){
          $etudiantAbsents[] = $etudiant->nom_etudiant;
        }
        $str .= "{id: ".$rattrapge['id_rattrapage'].", intitule: \"".$ds[$rattrapge['id_ds']]['intitule_ds']."\", ressource: \"".$ds[$rattrapge['id_ds']]['ressource_ds']."\", enseignant: \"".$rattrapge['enseignant_rattrapage']."\", type: \"".$ds[$rattrapge['id_ds']]['type_ds']."\", etudiants: [";
        foreach ($etudiantsAbsents as $etudiantAbsent){
          $str .= "\"".$etudiantAbsent."\",";
        }
        $str .= "]},";

      }
      $str .= "]";
      echo "let infosRattrapage = ".$str.";";
      


    ?>

    let ds = document.getElementById("ds");



    function setFormID(formID, id) {
      document.getElementById(formID).setAttribute("value", id.toString());
    }

    function getRattrapageById(id) {
      for (let rat of infosRattrapage) {
        console.log(rat);
        if (rat.id == id) return rat;
      }
      return null;
    }

    function is_valid_datalist_value(idDataList, inputValue) {
      var option = document.querySelector("#" + idDataList + " option[value='" + inputValue + "']");
      if (option != null) {
        return option.value.length > 0;
      }
      return false;
    }


    function addStudent() {
      let input = document.getElementById("etudiantAdd");

      if (!is_valid_datalist_value("etudiants", input.value)) { alert("Étudiant invalide"); return; }

      let list = document.getElementById("listeEtudiants");
      let listElements = list.getElementsByTagName("li");

      for (let elt of listElements) {
        if (elt.textContent.includes(input.value)) { alert(input.value + " a déjà été mis absent pour ce DS"); return; }
      }

      var li = document.createElement("li");
      li.appendChild(document.createTextNode(input.value));

      var dataForBackend = document.createElement("input");
      dataForBackend.setAttribute("type", "hidden");
      dataForBackend.setAttribute("value", input.value);
      dataForBackend.setAttribute("name", "etudiants[]");

      var removeButton = document.createElement("a");
      removeButton.appendChild(document.createTextNode("x"));
      removeButton.setAttribute("class", "btn btn-secondary mx-3");


      li.appendChild(removeButton);
      li.appendChild(dataForBackend);
      list.appendChild(li);

    }

    function addEditStudent() {
      let input = document.getElementById("etudiantEdit");

      if (!is_valid_datalist_value("etudiants", input.value)) { alert("Étudiant invalide"); return; }

      let list = document.getElementById("listeEtudiantsEdit");
      let listElements = list.getElementsByTagName("li");

      for (let elt of listElements) {
        if (elt.textContent.includes(input.value)) { alert(input.value + " a déjà été mis absent pour ce DS"); return; }
      }

      var li = document.createElement("li");
      li.appendChild(document.createTextNode(input.value));

      var dataForBackend = document.createElement("input");
      dataForBackend.setAttribute("type", "hidden");
      dataForBackend.setAttribute("value", input.value);
      dataForBackend.setAttribute("name", "etudiants[]");

      var removeButton = document.createElement("a");
      removeButton.appendChild(document.createTextNode("x"));
      removeButton.setAttribute("class", "btn btn-secondary mx-3");


      li.appendChild(removeButton);
      li.appendChild(dataForBackend);
      list.appendChild(li);

    }

    function removeStudent(btn) {
      btn.parentNode.remove();
    }

    function fillEditModal(id) {


      let rat = getRattrapageById(id);

      document.getElementById("intituleEdit").setAttribute("value", rat.intitule);
      document.getElementById("ressourceEdit").setAttribute("value", rat.ressource);
      document.getElementById("enseignantEdit").setAttribute("value", rat.enseignant);
      switch (rat.type) {
        case "Papier": document.getElementById("papierEdit").setAttribute("selected", "selected"); break;
        case "Machine": document.getElementById("machineEdit").setAttribute("selected", "selected"); break;
        case "Oral": document.getElementById("oralEdit").setAttribute("selected", "selected"); break;
      }

      let list = document.getElementById("listeEtudiantsEdit");
      for (let stud of rat.etudiants) {
        var li = document.createElement("li");
        li.appendChild(document.createTextNode(stud));

        var dataForBackend = document.createElement("input");
        dataForBackend.setAttribute("type", "hidden");
        dataForBackend.setAttribute("value", stud);
        dataForBackend.setAttribute("name", "etudiants[]");

        var removeButton = document.createElement("a");
        removeButton.appendChild(document.createTextNode("x"));
        removeButton.setAttribute("class", "btn btn-secondary mx-3");


        li.appendChild(removeButton);
        li.appendChild(dataForBackend);
        list.appendChild(li);
      }
    }

    function fillProgModal(id) {
 
      let rat = getRattrapageById(id);

      let list = document.getElementById("listeEtudiantsProg");
      for (let stud of rat.etudiants) {
        var li = document.createElement("li");

        let cb = document.createElement("input");
        cb.setAttribute("name", "etudiants[]");
        cb.setAttribute("type", "checkbox");
        cb.setAttribute("class", "me-2");

        li.appendChild(cb);
        li.appendChild(document.createTextNode(stud));
        list.appendChild(li);
      }
    }

    

  </script>

</body>

</html>