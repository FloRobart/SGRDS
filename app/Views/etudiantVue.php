<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Étudiants</title>
    </head>
    <body>
        <h1>Liste des Étudiants</h1>
        <?php
        use App\Models\EtudiantModele;
        // Récupérer les étudiants
        $modele_etudiant = new EtudiantModele();
        $etudiants = $modele_etudiant->findAll();
        ?>
        <?php if (!empty($etudiants)) : ?>
            <table border="1">
            <tr>
                <th>Mail</th>
                <th>Nom</th>
                <th>Prénom</th>
            </tr>
            <?php foreach ($etudiants as $etudiant) : ?>
                <tr>
                    <td><?= $etudiant['mail_etudiant']; ?></td>
                    <td><?= $etudiant['nom_etudiant']; ?></td>
                    <td><?= $etudiant['prenom_etudiant']; ?></td>
                </tr>
            <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Aucun étudiant trouvé.</p>
        <?php endif; ?>
    </body>
</html>