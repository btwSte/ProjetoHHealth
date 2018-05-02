<?php
  require_once("../../../variaveis.php");

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS | Cadastrar Medico</title>
    <link rel="stylesheet" type="text/css" href="<?php echo($voltaTres); ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo($voltaTres); ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaUm."header.php"); ?>


      <div class="container">
			<!-- Top Navigation -->

      <?php include("../menuLateral_view.php"); ?>

  		</div><!-- /container -->
  		<script src="js/classie.js"></script>
  		<script src="js/photostack.js"></script>
  		<script>

  		</script>
      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
		  </span>
      </div>
    <main>

        <?php include("../menuLateral_view.php"); ?>



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>


        <!-- FORM CABEÇALHO -->

         <form class="frmCabecalhoConvenio" action="<?php echo ($voltaTres); ?>router.php?controller=Convenio&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
            <div class="segura_form_tbc" >
               <div class="tit">
                 <p>Cadastro: Medico</p>
               </div>

                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>
                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>
                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>
                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>
                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>
                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>
                 <div class="text">
                   <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
                 </div>

                 <div id="btn_tbc">
                   <input type="submit" name="btnEnviar" value="Enviar">
                 </div>

             </div>
         </form>




	  </main>
  </body>
</html>
