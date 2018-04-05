<?php


class HomeController{

  function index() {

    require_once('views/paginas/homepage_view.php');

  }

  function informacoes() {
    // require_once('models/informacoes.php');
    // $id = $_GET["id"];
    //simulando um acesso ao banco
    // $info = informacoes::selecionarUm( $id);

    require_once('views/paginas/informacoes_view.php');

  }

  function trabalheConosco() {

    require_once('views/paginas/trabalheconosco_view.php');

  }

  function unidades() {

    require_once('views/paginas/unidades_view.php');

  }

  function sobre() {
    require_once('views/paginas/sobre_view.php');
  }

  function ambientes() {
    require_once('views/paginas/ambientes_view.php');
  }

  function contato() {
    require_once('views/paginas/contato_view.php');
  }

  function procedimentoExames() {
    require_once('views/paginas/procedimentoExames_view.php');
  }

  function convenios() {
    require_once('views/paginas/convenios_view.php');
  }

  function login () {
    require_once('views/paginas/login_view.php');
  }

}

 ?>
