<?php echo 'Hello PHP <br>'; 
// un commentaire sur une ligne 
# un autre commentaire sur une ligne 
/* un commentaire 
  sur plusieurs 
 lignes 
*/

require ("config.php") ;

// `$x`, `$_x`, `$2x`, `$x-y`, `$Prix_HT`, `$prix ht`, `$état`

// Les noms valides sont `$x`, `$_x` , `$Prix_HT` et `$état` car ils respectent les regles de nommage des variables dans php, c'est a dire qu'ils contiennent pas des caracteres speciaux ou des espaces et ils commencent pas par des nombres 

$x = 15 ;
$_x = 15.90 ;
$Prix_HT = 60 ;
$état = "Active" ;

$a = 77 ;
$A = 90 ;
echo "\$a = $a et \$A = $A <br>" ; //Donc ils sont deux variables distincts 


echo "NOTE MIN = ".NOTE_MIN."<br>" ;
echo "NOTE MAX = ".NOTE_MAX."<br>" ;
echo "SEUIL".SEUIL."<br>" ;

if (defined('SEUIL')) echo "La constante SEUIL est definie.<br>" ;
if (defined('INCONNUE')) 
  echo "La constante INCONNUE est definie.<br>" ;
else 
  "La constante INCONNUE est non definie.<br>" ;

$prix_ht = 60 ; 
$tva = 20 ;
$prix_TTC = $Prix_HT * (1+$tva/100) ;
echo "Le prix total du produit est ".$prix_TTC." €.";
  

//Question 1 
$test = 42 ;
$test = (string) $test ;
$string_test = var_dump($test) ;  echo "$string_test <br>";
// Question 2 
$bool_0 = var_dump((bool) 0 ); echo "$bool_0 <br>";
$bool_0_0 = var_dump((bool) 0.0 ); echo "$bool_0_0 <br>";
$bool_char0 = var_dump((bool) "0" ); echo "$bool_char0 <br>";
$bool_chaine_vide = var_dump((bool) "" ); echo "$bool_chaine_vide <br>";
$bool_abc = var_dump((bool) "abc" ); echo "$bool_abc <br>";
$bool_tab_vide = var_dump((bool) [] ); echo "$bool_tab_vide <br>";
$bool_null = var_dump((bool) null ); echo "$bool_null <br><br>";

//Question 3 
$int_3_9 = var_dump((int) 3.9 ); echo "$int_3_9 <br>";
$int_12abc = var_dump((int) "12abc" ); echo "$int_12abc <br>";
$float_15e3 = var_dump((float) 1.5e3 ); echo "$float_15e3 <br>";
$int_true = var_dump((int) true ); echo "$int_true <br><br>";

//Question 4
$Decimale255 = 255 ;
$Hexadecimale255 = 0xFF ;
$Octale255 = 0o0377 ; 
$Binaire255 = 0b11111111 ; 

echo "Decimale : $Decimale255 <br>";
echo "Hexadecimale : $Hexadecimale255 <br>";
echo "Octale : $Octale255 <br>";
echo "Binaire : $Binaire255 <br><br>";


//Question 5  
$traitees = "égales à" ; $ici = 2 ;
echo "Ahmed a dit : \"J'ai réussi\" <br>" ;
echo "Voulez-vous supprimer C:\*.*? <br>" ;
echo "Ceci n'affichera pas \\n de nouvelle ligne <br>" ;
echo "Les variables ne seront pas \$traitees \$ici <br>" ;
echo "Les variables ne seront pas $traitees $ici <br><br>" ;

$chaine1 = "*Bonjour les developpeurs*" ;
$chaine1 = trim($chaine1 , "*") ;
echo "$chaine1 <br>" ;

for ($i = 0; $i < strlen($chaine1); $i++) {
    echo "$chaine1[$i] <br>";
}
?>