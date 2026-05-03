<?php
require_once 'connexion.php';

// Récupérer les filières
$filieres = $pdo->query("SELECT * FROM filieres")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body>
    <h1>Ajouter un étudiant</h1>
    
    <form id="formEtudiant" action="traitement.php" method="POST">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prénom">
        <select name="filiere_id">
            <?php foreach($filieres as $filiere): ?>
            <option value="<?= $filiere['id'] ?>"><?= $filiere['nom'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des étudiants</h2>
    
    <?php
    $etudiants = $pdo->query("
        SELECT e.*, f.nom as filiere_nom 
        FROM etudiants e 
        JOIN filieres f ON e.filiere_id = f.id
    ")->fetchAll();
    ?>

    <table border="1">
        <thead>
            <tr><th>Nom</th><th>Prénom</th><th>Filière</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach($etudiants as $e): ?>
            <tr>
                <td><?= htmlspecialchars($e['nom']) ?></td>
                <td><?= htmlspecialchars($e['prenom']) ?></td>
                <td><?= htmlspecialchars($e['filiere_nom']) ?></td>
                <td>
                    <a href="update.php?id=<?= $e['id'] ?>">Modifier</a>
                    <a href="delete.php?id=<?= $e['id'] ?>" class="btn-supprimer">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>