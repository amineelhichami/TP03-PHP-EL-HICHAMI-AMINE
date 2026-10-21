<?php 

/* Auteur : Amine EL HICHAMI
     
  Date : 18-10-2036 */
require ("config.php") ;

function mention(int $note){
    if ($note < NOTE_MIN || $note > NOTE_MAX) {
        echo "Note invalide";
    } elseif ($note >= 16 ){
        echo "Très bien";
    } elseif ($note >= 14 ){
        echo "Bien";
    } elseif ($note >= 12 ){
        echo "Assez bien";
    } elseif($note >= SEUIL ){
        echo "Passable" ;
    } else {
    echo "Ajourné" ;
    }
} 

$note1test = 10 ;
$note2test = 20 ;
$note3test = 5 ;
mention($note1test);
echo "<br>" ;
mention($note2test);
echo "<br>" ;
mention($note3test);
//Exercice 2.2 : Switch 

$moisactuel = date("m");

switch ($moisactuel) {
    case "01":
        echo "Janvier";
        break;
    case "02":
        echo "Février";
        break;
    case "03":
        echo "Mars";
        break;
    case "04":
        echo "Avril";
        break;
    case "05":
        echo "Mai";
        break;
    case "06":
        echo "Juin";
        break;
    case "07":
        echo "Juillet";
        break;
    case "08":
        echo "Août";
        break;
    case "09":
        echo "Septembre";
        break;
    case "10":
        echo "Octobre";
        break;
    case "11":
        echo "Novembre";
        break;
    case "12":
        echo "Décembre";
        break;
    default:
        echo "Nombre invalide";
        break;
}

//Exercice 3 
//Question 1 

echo "<br><br>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

//Question 2 
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }
    $i += 2;
}

//Question 3 
$i2 = 1;
while ($i2 <= 10) {
    switch ($i2) {
        case 5:
            echo "En 5<br>";
            break;
        case 10:
            echo "En 10 la boucle s'arrete<br>";
            break 2;
    }
    $i2++;
}

//Question 4
$i3 = 0;
do {
    if ($i3 == 10) {
        echo "<strong>" . $i3 . "</strong><br>";
    } else {
        echo $i3 . "<br>";
    }
    $i3 += 2;
} while ($i3 <= 20);

?>