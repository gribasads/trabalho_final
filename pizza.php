<?php

require_once 'conexao.php';
$id =  @$_GET['id'];
$sabor =@$_GET['sabor'];
$valor =@$_GET['valor'];
$tipo = @$_GET['tipo'];


if ($tipo === 'incluir') { // CREATE
    $sql = "INSERT INTO gustavo_pizza(sabor,valor) VALUES('$sabor','$valor');";
    if ($conexao->query($sql) === TRUE) {
        echo "SAlvo com sucesso!";
        header("Location: adm.php");
    } else {

        echo "Erro:" . "$sql" . "<br>" . $conexao->error;
    }
}
if ($tipo === 'editar') { /// UPDATE
    $sql = "update gustavo_pizza set sabor =  '$sabor' ,valor = '$valor' WHERE id =$id";
    if ($conexao->query($sql) === TRUE) {
        echo "SAlvo com sucesso!";
        header("Location: adm.php?id=$id");
die();
    } else {

        echo "Erro:" . "$sql" . "<br>" . $conexao->error;
    }
}


if ($tipo === 'listar') { // Read


    $sql = "select  * from gustavo_pizza where sabor =  '$sabor' ";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
        echo "Registro encontrado";

        while ($coluna = $resultado->fetch_assoc()) {
            echo $coluna["id"] . "-" . $coluna["sabor"] . "-" . $coluna["valor"] . "<br>";
        }
    } else {
        echo "Nenhum registro encontrado!";
        
    }
}


if ($tipo === 'excluir') { //DELETE
    $sql = " delete from gustavo_pizza  WHERE id =$id ";    
    if ($conexao->query($sql) === TRUE) {        
        header("Location: adm.php?id=$id");
    
    } else {

        echo "Erro:" . "$sql" . "<br>" . $conexao->error;
    }
}




?>
