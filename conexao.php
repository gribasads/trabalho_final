<?php
$caminho_banco = "193.123.108.138";
$usuario       = 'iae';
$senha         = 'iae';
$banco_dados   = 'iae';
$conexao  =  new mysqli($caminho_banco,$usuario,$senha,$banco_dados );
$conexao->set_charset("utf8mb4");
if($conexao->connect_error)
{
    //echo "Falha na conexao";
    die("Falha de conecao".$conexao->connect_error);
    
}else{
    echo "Conectado!";
    
}

?>
