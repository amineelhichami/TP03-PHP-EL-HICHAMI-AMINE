<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat du formulaire (GET)</title>
</head>
<body>
    <h1>Résultat</h1>

<?php
// Vérification que le formulaire a bien été soumis (présence des paramètres)
if (isset($_GET['nom'], $_GET['prenom'], $_GET['sexe'])) {

    // Nettoyage basique pour éviter les injections HTML (XSS)
    $nom    = htmlspecialchars(trim($_GET['nom']));
    $prenom = htmlspecialchars(trim($_GET['prenom']));
    $sexe   = $_GET['sexe']; // 'M' ou 'F'

    // Choix du titre selon le sexe
    if ($sexe === 'M') {
        $civilite = 'Monsieur';
    } elseif ($sexe === 'F') {
        $civilite = 'Madame';
    } else {
        $civilite = null;
    }

    if ($civilite !== null) {
        echo "<p>Bonjour $civilite $prenom $nom</p>";
    } else {
        echo "<p>Valeur de sexe invalide.</p>";
    }

    // Rappel : les données ont été transmises par l'URL
    echo '<p><small>Données reçues par la méthode GET (visibles dans l\'URL).</small></p>';

} else {
    echo "<p>Aucune donnée reçue. Merci de remplir le " .
         "<a href=\"info.html\">formulaire</a>.</p>";
}
?>

    <p><a href="info.html">← Retour au formulaire</a></p>
</body>
</html>