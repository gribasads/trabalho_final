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

       if($sabor ==="calabresa")
       {
         $entrega = 0.7;
         $imposto = 0.75;
        $totalCala = ($total + $entrega) * $imposto;
        fputs($nota , "entrega: {$entrega} imposto:     {$imposto}\n");
        fputs($nota , "\nValor Total (Calabresa) : {$totalCala}\n");
       }
       if($sabor ==="portuguesa")
       {
         $entrega = 3.21;
         $imposto = 0.1;
        $totalCala = ($total + $entrega) * $imposto;
        fputs($nota , "entrega: {$entrega} imposto:     {$imposto}\n");
        fputs($nota , "\nValor Total (Portuguesa) : {$totalCala}\n");
       }
       if($sabor ==="pepperoni")
       {
         $entrega = 2.58;
         $imposto = 0.0225;
        $totalPeppe = ($total + $entrega) * $imposto;
        fputs($nota , "entrega: {$entrega} imposto:     {$imposto}\n");
        fputs($nota , "\nValor Total (pepperoni) : {$totalPeppe}\n");
       }else{

         fputs($nota , "\nValor Total    : {$total}\n");
       }


      fclose($nota); 
   }
}
