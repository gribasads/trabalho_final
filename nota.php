<?php
class Pedido
{
   // Métodos:
   function criarNota($sabor, $valor,$quantidade){ 
     $total=3;
      $nota  = fopen("arquivos/nota.txt",'w'); 

    
      fputs($nota , "NOTA DO PEDIDO\n\n");
      fputs($nota , "Sabor da pizza:          {$sabor}\n");
      fputs($nota , "Valor     :              {$valor}\n");
      fputs($nota , "quantidade:              {$quantidade}\n");
     
      if($quantidade>=5){
        fputs($nota , "Adicionar coca-cola como brinde\n");
      }
      fputs($nota , "\nValor Total    : {$total}\n");

      fclose($nota); 
   }
}
