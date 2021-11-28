<?php
class Pedido
{
   // Métodos:
   function criarNota($sabor, $valor,$quantidade,$totalNota){ 
     $total=$totalNota;
      $nota  = fopen("arquivos/nota.txt",'w'); 

    
      fputs($nota , "NOTA DO PEDIDO\n\n");
      fputs($nota , "Sabor da pizza:          {$sabor}\n");
      fputs($nota , "Valor     :              {$valor}\n");
      fputs($nota , "quantidade:               {$quantidade}\n");
     
      if($quantidade>=5){
        fputs($nota , "Adicionar coca-cola como brinde\n");
      }
      if($quantidade>=15){
         $brinde = $total* 0.05;
         fputs($nota , "A comissão do seu atendente será de:  {$brinde} muito obrigado pela contribuição!!!\n");
       }

      fputs($nota , "\nValor Total    : {$total}\n");

      fclose($nota); 
   }
}
