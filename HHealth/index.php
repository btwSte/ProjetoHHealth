<?php

  $controller ="";
  $acao ="";

 if (isset($_GET["ctrl"])){
   $controller = $_GET["ctrl"];
 }


 if (isset($_GET["acao"])){
     $acao = $_GET["acao"];
 }


  if ($controller == ""){

     $controller = "home";
     $acao ="index";
  }


//echo $controller;
//echo $acao;

  require_once('router.php');

//require_once('views/homepage/homepage_view.php'); ?>
