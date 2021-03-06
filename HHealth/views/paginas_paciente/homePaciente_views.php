<?php
#require_once("cms/conexao.php");
session_start();



 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Area do Paciente</title>
    <link rel="stylesheet" type="text/css" href="../../css/stylePaciente.css">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Scattered Polaroids Gallery: A flat-style take on a Polaroid gallery" />
		<meta name="keywords" content="scattered polaroids, image gallery, javascript, random rotation, 3d, backface, flat design" />
		<meta name="author" content="Codrops" />
		<script src="../../js/modernizr.min.js"></script>
  </head>
  <body>

      <?php include("header.php"); ?>


  		<script src="../../js/classie.js"></script>
  		<script src="../../js/photostack.js"></script>

      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
          </span>
      </div>
    <main>

        <?php include("menuLateral.php"); ?>

        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <div id="containerConteudo">


           <div id="segura_form_tbc">

               <div class="barraTexto">
                 TEMPO DE ESPERA
               </div>
               <div class="barraHora">
                 00 : 00
               </div>

           </div>

        </div>
    </main>
        <?php include("footer.php"); ?>

  </body>
</html>
