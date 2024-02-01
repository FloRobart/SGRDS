function playerSearch() {
    let ressource = document.getElementById("ressource");
    let inputRessource = (ressource != null ? ressource.value.toUpperCase() : null);
    let enseignant = document.getElementById("enseignant");
    let inputEnseignant = (enseignant != null ? enseignant.value.toUpperCase() : null);

    let ds = document.getElementById("ds");
    let inputDs = (ds != null ? ds.value.toUpperCase() : null);

    let semestre = document.getElementById("semestre");
    let inputSemestre = (semestre != null ? semestre.value.toUpperCase() : null);

    let année = document.getElementById("Année");
    let inputAnnée = (année != null ? année.value.toUpperCase() : null);
    
    console.log(inputSemestre);

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