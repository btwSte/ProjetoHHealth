<?php

  $controller ="";
 if (isset($_GET["ctrl"])){
   $controller = $_GET["ctrl"];
 }
  if ($controller == ""){
     $controller = "home";
  }


//echo $controller;
//echo $acao;

  require_once('router.php');

  require_once('views/paginas/homepage_view.php');
?>
