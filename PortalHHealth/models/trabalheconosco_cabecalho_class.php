<?php
/* Autor: Bruno
   Data de modificação: 18/04/18
   Class: Trabalhe conosco
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */

 require_once("../../../variaveis.php");

class TrabalheConoscoCabecalho{
  public $ativo;
  public $idPaginaTrabalheConosco;
  public $fotoPrincipal;
  public $tituloPagina;

  // Conexão com o banco
  public function __construct() {
    require_once('bd_class.php');
  }
}
?>
