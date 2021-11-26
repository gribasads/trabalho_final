<?php

require_once 'construtor.php';



function calcular($quantCL,$quantPP,$quantPT){
    $entrega=0;
    //calabreza
    if($quantCL > 0){
        $entrega += 0.75;
     $totalCala=($_SESSION['calabreza'] * $quantCL) + 1.05;
    }else{
        $totalCala=0;
    }

    //pepperoni
    if($quantPP > 0){
        $entrega += 2.58;
        $totalPepe=($_SESSION['peperoni'] * $quantPP) + 0.45;
       }else{
           $totalPepe=0;
       }

    //portuguesa
    if($quantPT > 0){
        $entrega += 3.21;
        $totalPortu=($_SESSION['portuguesa'] * $quantPT) + 0.1865;
    }else{
        $totalPortu=0;
    }
    $_SESSION['valorTotal'] = $totalCala + $totalPepe + $totalPortu +$entrega;
    return $_SESSION['valorTotal'];   
}

function bonus($brinde){
    if($brinde >= 15){
       $_SESSION['bonus']= $_SESSION['valorTotal'] * 0.05;
    }
    return $_SESSION['bonus'];
}
 

?>