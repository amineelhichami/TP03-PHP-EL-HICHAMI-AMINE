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
?>