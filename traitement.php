<?php
require 'config.php'; // définit NOTE_MIN et NOTE_MAX

// Tableau qui va collecter les erreurs
$erreurs = [];

// ─── 1. Vérification de l'existence des champs (isset) ───────────────────────
if (!isset($_POST['nom'], $_POST['note_info'], $_POST['note_math'])) {
    $erreurs[] = "Le formulaire n'a pas été soumis correctement.";
} else {
    // ─── 2. Vérification que les champs ne sont pas vides (empty) ────────────
    // empty() retourne true pour '' ET pour '0' → attention pour les notes !
    // On teste donc séparément : présence ET valeur non vide au sens chaîne.
    $nom       = trim($_POST['nom']);
    $note_info = trim($_POST['note_info']);
    $note_math = trim($_POST['note_math']);

    if ($nom === '') {
        $erreurs[] = "Le nom est obligatoire.";
    }
    if ($note_info === '') {
        $erreurs[] = "La note d'informatique est obligatoire.";
    } elseif (!is_numeric($note_info)) {
        $erreurs[] = "La note d'informatique doit être un nombre.";
    }
    if ($note_math === '') {
        $erreurs[] = "La note de mathématiques est obligatoire.";
    } elseif (!is_numeric($note_math)) {
        $erreurs[] = "La note de mathématiques doit être un nombre.";
    }

    // ─── 3. Vérification des bornes (NOTE_MIN / NOTE_MAX) ────────────────────
    if (is_numeric($note_info)) {
        $n1 = (float) $note_info;
        if ($n1 < NOTE_MIN || $n1 > NOTE_MAX) {
            $erreurs[] = "La note d'informatique doit être comprise entre "
                       . NOTE_MIN . " et " . NOTE_MAX . ".";
        }
    }
    if (is_numeric($note_math)) {
        $n2 = (float) $note_math;
        if ($n2 < NOTE_MIN || $n2 > NOTE_MAX) {
            $erreurs[] = "La note de mathématiques doit être comprise entre "
                       . NOTE_MIN . " et " . NOTE_MAX . ".";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat du traitement — POST</title>
</head>
<body>
    <h1>Résultat du traitement</h1>

<?php if (!empty($erreurs)): ?>
    <!-- ─── Cas d'erreur : on affiche la liste des messages ─────────────── -->
    <div style="color: red;">
        <p><strong>Erreurs détectées :</strong></p>
        <ul>
            <?php foreach ($erreurs as $msg): ?>
                <li><?= htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <p><a href="saisie.html">← Retour au formulaire</a></p>

<?php else: ?>
    <!-- ─── Cas valide : récapitulatif ──────────────────────────────────── -->
    <?php
    // ─── 4. Protection de l'affichage avec htmlspecialchars() ─────────────
    $nomAff  = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
    $infoAff = htmlspecialchars(number_format((float) $note_info, 2, ',', ' '), ENT_QUOTES, 'UTF-8');
    $mathAff = htmlspecialchars(number_format((float) $note_math, 2, ',', ' '), ENT_QUOTES, 'UTF-8');
    $moyenne = ((float) $note_info + (float) $note_math) / 2;
    $moyAff  = htmlspecialchars(number_format($moyenne, 2, ',', ' '), ENT_QUOTES, 'UTF-8');
    ?>
    <h2>Récapitulatif</h2>
    <table border="1" cellpadding="6">
        <tr><th>Étudiant</th><td><?= $nomAff ?></td></tr>
        <tr><th>Note Informatique</th><td><?= $infoAff ?> / <?= NOTE_MAX ?></td></tr>
        <tr><th>Note Mathématiques</th><td><?= $mathAff ?> / <?= NOTE_MAX ?></td></tr>
        <tr><th>Moyenne</th><td><?= $moyAff ?> / <?= NOTE_MAX ?></td></tr>
    </table>

    <?php if ($moyenne >= 10): ?>
        <p style="color: green;"><strong>Admis(e)</strong> — moyenne ≥ 10</p>
    <?php else: ?>
        <p style="color: orange;"><strong>Non admis(e)</strong> — moyenne &lt; 10</p>
    <?php endif; ?>

    <p><a href="saisie.html">← Saisir un autre étudiant</a></p>
<?php endif; ?>
</body>
</html>