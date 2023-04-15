<?php

//Declaration d'un tableau d'entier que je caste en booleen
$tab=[(bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1),
    (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1), (bool)rand(0,1),
    (bool)rand(0,1), (bool)rand(0,1)];

$tab_vide= []; // definit un tableau vide pour garder en memoire le tableau où on aura les o et x
// Creation de tableau avec les symboles o ou x 
foreach($tab as $case) {
        array_push($tab_vide, $case == 1? "o":"x"); // o pour vivant et x pour mort
}



// Definit une fonction que j'appelle play 
function JeuDeVie($tab_vide) {
    $tab_nouv= []; // definit un nouveau tableau vide pour garder en memoire le tableau mis a jour

    for($i = 0; $i < count($tab_vide); $i++){
        //le cas xox
        switch($i){
            case 0:
                if( ((($tab_vide[count($tab_vide)-1]) == "o") && (($tab_vide[$i+1]) == "x")) || ((($tab_vide[count($tab_vide)-1]) == "x") && ($tab_vide[$i+1]) == "o") ) {
                    array_push($tab_nouv,"o");
                } 
                else {
                    array_push($tab_nouv,"x");
                }
            break;

            case count($tab_vide)-1:
                if(($tab_vide[$i-1] == "o" && $tab_vide[0] == "x") || ($tab_vide[$i-1] == "x" && $tab_vide[0] == "o")) {
                    array_push($tab_nouv,"o");
                }
                else {
                    array_push($tab_nouv,"x");
                }
            break;

            default:
                if(($tab_vide[$i-1] == "o" && $tab_vide[$i+1] == "x") || ($tab_vide[$i-1] == "x" && $tab_vide[$i+1] == "o")) {
                    array_push($tab_nouv,"o");
                } 
                else {
                    array_push($tab_nouv,"x");
                }
            break;
        }
    }
}
?>













<!-- <?php
// echo "EXERCICE 1 : PHP";
// echo '<br><br>';


// function print_tab($t){
//   foreach ($t as $idx => $value) {
//     echo " ";
//     echo $value ? "o" : "x";
//   }
//   echo "\n";
// }

// $tab = [];
// for($i=0 ; $i<10; $i++){
//     echo $i;
//     echo '<br>';
//   $tab[$i] = (bool) rand(0,1); 
// }
// print_tab($tab);
?> -->


