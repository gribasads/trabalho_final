<?php
class Pedido
{
   // Métodos:
   function criarNota($sabor, $quantidade, $valor){ 
     $total=0;
      $nota  = fopen("arquivos/nota.txt",'w'); // cria o arquivo nota

      // dados do pedido: 
      fputs($nota , "NOTA DO PEDIDO\n\n");
      fputs($nota , "Sabor da pizza:          {$sabor}\n");
      fputs($nota , "Valor     :              {$valor}\n");
      fputs($nota , "quantidade:              {$quantidade}\n");
     

      fputs($nota , "\nValor Total    : {$total}\n");

      fclose($nota); // fecha o arquivo nota
   }
}
