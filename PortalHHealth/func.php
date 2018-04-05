<?php
/**
 * Created by PhpStorm.
 * User: Vinicius Ribeiro Alves
 * Date: 28/03/2018
 * Time: 08:28
 */

 /*Função para verificar se o usuario esta logado*/
function logar($id){
  if ($id == null || $id == '') {
    /*Se a variavel não existir redireciona para pagina de login*/
    header('location:../../index.php');
  }else{

  }

}
/* Função para deslogar o usuario*/
function deslogar(){
  session_destroy();
  /*Quando o usuario deslogar destroi a variavel de sessao e redireciona para area de login*/
  header('location:../../index.php');

}
?>
