<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fila de Espera</title>
    <link rel="stylesheet" type="text/css" href="../../css/Frajola.css">
    <script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include("header_home.php"); ?>

    <div  id="opcao" class="button shrink">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
    </div>
  <main>

    <?php include("menu_home.php"); ?>


      <script>
          function openNav() {
              document.getElementById("mySidenav").style.width = "270px";
          }

          function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
          }
      </script>


      <div id="content_pacientes_cadastrados">
        <p class="decore_pesquisa">Fila de atendimento </p>
        <?php
        require_once('../../variaveis.php');

        require_once($voltaDois."controllers/fila_controller.php");
        require_once($voltaDois."models/fila_class.php");

        $controller_fila = new controllerFila();
         //chama metodo para listar os registros
        $list = $controller_fila::SelecionaFila();
        //inicia cont
        $cont = 0;

        while ($cont < count($list)) {

        ?>
        <div class="dados_pacientes_cadastrados">
          <p class="decore_list_paciente">Nome:	<?php echo $list[$cont]->nome; ?> </p>
        </div>

        <?php
            $cont += 1;
          }
         ?>



      </div>
  </body>
</html>
