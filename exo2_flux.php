<?php 
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
?>