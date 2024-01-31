<!DOCTYPE html>
<html lang="fr">
<head>
 <meta charset="UTF-8">
 <title>Liste des Étudiants</title>
</head>
<body>
 <h1>Liste des Étudiants</h1>
 <?php if (!empty($etudiants)) : ?>
 <table border="1">
 <tr>
 <th>Nom</th>
 <th>Prénom</th>
 </tr>
 <?php foreach ($etudiants as $etudiant) : ?>
 <tr>
 <td><?= $etudiant['nomEtudiant']; ?></td>
 <td><?= $etudiant['prenomEtudiant']; ?></td>
 </tr>
 <?php endforeach; ?>
 </table>
 <?php else : ?>
 <p>Aucun étudiant trouvé.</p>
 <?php endif; ?>
</body>
</html>