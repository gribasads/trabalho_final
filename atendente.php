<?php 

require_once 'construtor.php';
error_reporting(0);

  $quant=@$_POST["quantidade"];
  $brinde=0;
  $bonus=0;
  $tipo=@$_GET["tipo"];
  $id    = $coluna['id'];
  $sabor  = $coluna['sabor'];
  $valor = $coluna['valor'];
  
  //calcular($quantCL,$quantPP,$quantPT);
   
 if($tipo==="gerar"){
  $sabor  = $_GET['sabor'];
  $valor = $_GET['valor'];
  $quant = $_GET['quantidade'];
  $total = $valor * $quant;
   $pedido=new Pedido();
   $pedido->criarNota($sabor,$valor,$quant,$total);
   
 }
 

 $id = $_GET['id'];
 
 
 $sql = "select  * from gustavo_pizza where id=$id  ";
 $query = new queries();
 $resultado = $query->executar($sql);
 echo $resultado->num_rows;
 if ($resultado->num_rows > 0) {
     
 
     while ($coluna = $resultado->fetch_assoc()) {
         $id    = $coluna['id'];
         $sabor  = $coluna['sabor'];
         $valor = $coluna['valor'];
         
         
     }
 }      

?>

<html>

  <body>
        <form name="acesso" action="atendente.php" method="get">
      <h1>
        <?php  echo "Olá ";
       echo $_COOKIE['nome'];
       ?></h1>
       <h2><?php
       echo"<br>";
       echo "total das pizza";
       echo "<br>";
       echo number_format($total,2,",",".");
       ?></h2>
       <h3><?php if($quant >= 5){
    echo"<br>";
    echo "Enviar uma coca-cola como brinde";
   } 
?></h3>
<h3>
    <?php
  if($quant>=15){
    $brinde = $total* 0.05;
    echo"A sua comissão será de:  ";
    echo number_format($brinde,2,",",".");
  }
    ?>
</h3>

            id<input type="text"    name="id"     value="<?php echo $id?>"   > </input>    
            <br>
            sabor<input type="text" name="sabor"  value="<?php echo $sabor?>"> </input>    
            <br>
            valor<input type="text" name="valor"  value="<?php echo $valor?>"> </input>    
            <br>
            quantidade<input type="number" name="quantidade" > </input> 
           <br>
           <button type="submit" name="tipo" value="gerar" download>Gerar Nota</button>
           
           
          <table border="1">
          <thead>
                    <tr>
                        <th>id</th>
                        <th>sabor</th>
                        <th>valor</th>
                        
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
               
                echo "<tr>";
                $id = $coluna['id'];
                echo "<td><a href='atendente.php?id=$id'>" . $coluna['id'] . "</td>";
                echo "<td>" . $coluna['sabor'] . "</td>";
                echo "<td>" . $coluna['valor'] . "</td>";
                
                echo "</tr>   ";
            }
        } else {
            echo "Nenhum registro encontrado!";
        }

        ?>
                </table>
          
          </form>

          <form action="index.php">
          <input type="submit" value="voltar"/>
          </form>
      </body>
</html>