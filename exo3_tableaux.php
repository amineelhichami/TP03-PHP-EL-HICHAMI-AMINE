<?php 

require "config.php";
// Fonction qui retourne la mention
function mention(int $note) {
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
?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
    </tr>
    <?php foreach ($notes as $nom => $note) { ?>

        <tr style="color: <?php echo ($note < SEUIL) ? 'red' : 'black'; ?>;">
            <td><?php echo $nom; ?></td>
            <td><?php echo $note; ?></td>
            <td><?php echo mention($note); ?></td>
        </tr>
    <?php } ?>
</table>