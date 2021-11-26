<?php
class Pizza
{
   // Atributos:
   private $id, $sabor, $valor;

   // Métodos Especiais:
   public function __get($atributo)
   {
      return $this->$atributo;
   }
   public function __set($atributo, $valor)
   {
      $this->$atributo = $valor;
   }

   // Métodos:
   public function listar()
   {

      $slct_pizza = "SELECT * FROM gustavo_pizza"; 

      $sql = new SQL();                           
      $lista_pizza = $sql->executar($slct_pizza);  

      return $lista_pizza;                      
   }

   public function deletar($item)
   {

      $dlt_pizza =
         "DELETE FROM gustavo_pizza 
          WHERE gustavo_pizza.id = {$item}"; // deleta o item escolhido da tabela

      $sql = new SQL();                             // instancia o SQL
      $sql->executar($dlt_pizza);                   // executa a query

      echo "<script>alert('Item {$item} deletado com sucesso!')</script>"; // aviso de item deletado
      header("Location: index.php?acao=listar-pizza");   // redireciona a lista de pizzas
   }

   public function inserir()
   {
      
$arquivo = fopen("import.txt", 'r');


while (!feof($arquivo)) {
   $linha = explode(";", fgets($arquivo, 1024));

   $insert = "INSERT INTO gustavo_pizza(sabor,valor) VALUES('{$linha[0]}','{$linha[1]}');";
  
    $sql = new queries();
    $sql->executar($insert);

}
fclose($arquivo);
}}