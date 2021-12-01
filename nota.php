<?php
class Pedido
{
   // Métodos:
   function criarNota($sabor, $valor,$quantidade,$totalNota){ 
     $total=$totalNota;
     $entrega=0;
     $imposto=0;
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

       switch ($sabor) {
         case 'calabresa':
          $entrega = 0.75;
          $issq =  0.07 * $total;
         $totalCala = ($total + $entrega) + $issq;
         number_format($totalCala,2);
         fputs($nota , "entrega: {$entrega} imposto:     {$issq}\n");
         fputs($nota , "\nValor Total (Calabresa) : {$totalCala}\n");
           break;
         case 'portuguesa':
          $entrega = 3.21;
          $imposto = 0.01 * $total;
         $totalPt = ($total + $entrega) + $imposto;
         fputs($nota , "entrega: {$entrega} imposto:     {$imposto}\n");
         fputs($nota , "\nValor Total (Portuguesa) : {$totalPt}\n");
         break;
          case 'pepperoni':
            $entrega = 2.58;
            $imposto = 0.025 * $total;
           $totalPeppe = ($total + $entrega) + $imposto;
           fputs($nota , "entrega: {$entrega} imposto:     {$imposto}\n");
           fputs($nota , "\nValor Total (pepperoni) : {$totalPeppe}\n");
           break;
           default: fputs($nota , "\nValor Total    : {$total}\n"); break;

          }


      fclose($nota); 
   }
}
