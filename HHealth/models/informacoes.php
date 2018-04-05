<?php

class Informacoes{

  public $conteudo = "";


// Exemplo de id recebido da url
   public static function selecionarUm($id ){

       $info = new Informacoes();

       if( $id == 0){
        $info->conteudo = "teste lalalal";
      }else{
        $info->conteudo = "teste conteudo com ID";
      }


       return $info;
   }



}


 ?>
