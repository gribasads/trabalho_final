<?php 
require_once 'functions.php';
require_once 'construtor.php';


  $quant=@$_POST["quantidade"];
  $brinde=0;
  $bonus=0;
  $tipo=$_POST["tipo"];
  //calcular($quantCL,$quantPP,$quantPT);
   
 if($tipo=="gerar"){
   $pedido=new Pedido();
   $pedido->criarNota($sabor,$quant,$valor);
 }
  $id = $_POST['id'];


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

<html>

  <form action="atendente.php" method="POST">
      <body>
      <h1>
        <?php  echo "Olá ";
       echo $_COOKIE['nome'];
       ?></h1>
       <h2><?php
       echo"<br>";
       echo "total das pizza";
       echo "<br>";
      // echo number_format($_SESSION['valorTotal'],2,',',);
       ?></h2>
       <h3><?php if($quant >= 5){
    echo"<br>";
    echo "Enviar uma coca-cola como brinde";
   } 
?></h3>
<h3>
    <?php
  //  bonus($brinde,$bonus);
    echo "<br>";
  //  echo "O valor do seu bonus sera de ".number_format($_SESSION['bonus'],2,',',);;

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
           <button type="submit" name="tipo" value="gerar">Gerar nota</button>
           <input type="submit" name="envia">
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
                //echo $coluna["id"] . "-" . $coluna["email"] . "-" . $coluna["senha"] . "<br>";
                echo "<tr>";
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