<?php
    require_once 'connexion.php';
    
    // Récupérer l'ID
    $id = $_GET['id'];
    
    // Supprimer
    $stmt = $pdo->prepare("DELETE FROM etudiants WHERE id = ?");
    $stmt->execute([$id]);
    
    header('Location: index.php');
?>