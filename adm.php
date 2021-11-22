<?php
require_once 'conexao.php';

$id = $_GET['id'];


$sql = "select  * from gustavo_pizza where id=$id  ";

$resultado = $conexao->query($sql);
if ($resultado->num_rows > 0) {
    

    while ($coluna = $resultado->fetch_assoc()) {
        $id    = $coluna['id'];
        $sabor  = $coluna['sabor'];
        $valor = $coluna['valor'];
        
        
    }
}    
?>

<body>
    
<form name="acesso" action="pizza.php" method="get">
            id<input type="text" name="id"      value="<?php echo $id?>"   > </input>    
            <br>
            sabor<input type="text" name="sabor"  value="<?php echo $sabor?>"> </input>    
            <br>
            valor<input type="text" name="valor" value="<?php echo $valor?>"> </input>    
            <br>
            
            
            <input type="submit" name="tipo" value="incluir"></input>   
            <input type="submit" name="tipo" value="editar"></input>   
            <input type="submit" name="tipo" value="listar"></input>   


            <table border="1">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>sabor</th>
                        <th>valor</th>
                        <th>excluir</th>
                    </tr>
                </thead>
                <tbody>
                <BR>
                <BR>
        <?php
        require_once 'conexao.php';
        $sql = "select  * from gustavo_pizza  ";
        $resultado = $conexao->query($sql);
        if ($resultado->num_rows > 0) {
            echo "Registro encontrado";

            while ($coluna = $resultado->fetch_assoc()) {
                //echo $coluna["id"] . "-" . $coluna["email"] . "-" . $coluna["senha"] . "<br>";
                echo "<tr>";
                $id = $coluna['id'];
                echo "<td><a href='adm.php?id=$id'>" . $coluna['id'] . "</td>";
                echo "<td>" . $coluna['sabor'] . "</td>";
                echo "<td>" . $coluna['valor'] . "</td>";
                echo "<td><a href='pizza.php?id=$id&tipo=excluir'>Excluir</td>";  
                echo "</tr>   ";
            }
        } else {
            echo "Nenhum registro encontrado!";
        }

        ?>





        </tbody>
    </table>




</form>

<form action="index.html">
  <input type="submit" value="voltar"/>
</form>

</body>
       