<?php
/* Autor: Bruno
   Data de modificação: 18/04/18
   Class: Trabalhe conosco
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */
 require_once("../../../variaveis.php");

class ContatoCabecalho{
  public $idPaginaContato;
  public $fotoPrincipal;
  public $tituloPagina;
  public $ativo;
  public $textoIntroducao;

  // Conexão com o banco
  public function __construct() {
    require_once('bd_class.php');
  }
}

 ?>
