<?php
require "config.php";

function mention(int $note): string {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}
echo "<h2>Exercice 3.1 : Création</h2>";
// Tableau associatif des notes
$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];
// Tableau indexé des modules
$modules = [
    "Algorithmique",
    "Programmation Web",
    "Architecture des ordinateurs"
];

// Affichage avec foreach
echo "<h3>Affichage avec foreach</h3>";

foreach ($modules as $module) {
    echo $module . "<br>";
}
// Affichage avec les indices
echo "<h3>Affichage par indices</h3>";
echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";
echo "<h2>Exercice 3.2 : Tableau des notes</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
      </tr>";
foreach ($notes as $nom => $note) {
    // Les notes inférieures au seuil sont en rouge
    $couleur = ($note < SEUIL) ? "red" : "black";
    echo "<tr style='color: $couleur;'>";
    echo "<td>$nom</td>";
    echo "<td>$note</td>";
    echo "<td>" . mention($note) . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<h2>Exercice 3.3 : Statistiques</h2>";
// 1. Calcul avec une boucle, sans array_sum()
$somme = 0;
$effectif = 0;
$meilleure = null;
$faible = null;
foreach ($notes as $nom => $note) {
    $somme += $note;
    $effectif++;
    if ($meilleure === null || $note > $meilleure) {
        $meilleure = $note;
    }
    if ($faible === null || $note < $faible) {
        $faible = $note;
    }
}
$moyenne = $somme / $effectif;
echo "<h3>Calcul avec une boucle</h3>";
echo "Somme : " . $somme . "<br>";
echo "Nombre d'apprenants : " . $effectif . "<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Plus faible note : " . $faible . "<br>";

// 2. Vérification avec les fonctions prédéfinies
echo "<h3>Vérification avec les fonctions PHP</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre d'apprenants : " . count($notes) . "<br>";
echo "Moyenne : " .
     round(array_sum($notes) / count($notes), 2) . "<br>";
echo "Meilleure note : " . max($notes) . "<br>";
echo "Plus faible note : " . min($notes) . "<br>";

// 3. Nombre d'apprenants par mention
echo "<h3>Effectifs par mention</h3>";
$effectifs = [];
foreach ($notes as $nom => $note) {
    $m = mention($note);
    if (isset($effectifs[$m])) {
        $effectifs[$m]++;
    } else {
        $effectifs[$m] = 1;
    }
}
foreach ($effectifs as $m => $nombre) {
    echo $m . " : " . $nombre . "<br>";
}
// Fonction d'affichage réutilisable
function afficher($tab): void {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";
    foreach ($tab as $nom => $note) {
        echo "<tr>";
        echo "<td>$nom</td>";
        echo "<td>$note</td>";
        echo "</tr>";
    }
    echo "</table><br>";
}
// 1. Tri par noms croissants
echo "<h2>Exercice 3.4 : Tri</h2>";
echo "<h3>1. Noms croissants (ksort)</h3>";
$tab = $notes;
ksort($tab);
afficher($tab);
// 2. Tri par notes décroissantes
echo "<h3>2. Notes décroissantes (arsort)</h3>";
$tab = $notes;
arsort($tab);
afficher($tab);
// 3. Tri par noms décroissants
echo "<h3>3. Noms décroissants (krsort)</h3>";
$tab = $notes;
krsort($tab);
afficher($tab);
// 4. Tri par notes croissantes
echo "<h3>4. Notes croissantes (asort)</h3>";
$tab = $notes;
asort($tab);
afficher($tab);
// Tri d'un tableau indexé : sort() ou rsort()
echo "<h3>Tri des modules avec sort()</h3>";
$modules_tries = $modules;
sort($modules_tries);

foreach ($modules_tries as $module) {
    echo $module . "<br>";
}
echo "<h2>Exercice 3.5 : Opérateurs de tableaux</h2>";

$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

// Prédictions :
// $a + $b   : ["x" => 1, "y" => 2]
// $a == $b  : true
// $a === $b : false

echo "<h3>Opérateur +</h3>";
var_dump($a + $b);
echo "<h3>Opérateur ==</h3>";
var_dump($a == $b);
echo "<h3>Opérateur ===</h3>";
var_dump($a === $b);
?>