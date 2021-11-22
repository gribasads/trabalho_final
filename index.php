<?php
require_once 'construtor.php';


    $login = $_POST['login'];
    $pass =  $_POST['pass'];
 echo $login;
 echo $pass;


    $user = new Usuario();
    setcookie("nome", $login);
    $func=$user->Logar($login,$pass);
    echo  "======>".$func;
if(empty($func)){
    header('Location: index.html');
}
    if($func ==='admin'){

        header('Location: adm.php');
    }
    if ($func ==='atendente'){
        header('Location: atendente.php');
    }
    else{
        echo 'erro';
    }



?>

