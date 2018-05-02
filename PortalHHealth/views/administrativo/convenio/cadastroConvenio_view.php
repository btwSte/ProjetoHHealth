<?php
  require_once("../../../variaveis.php");

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS | Cadastrar Convênio</title>
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
  			 [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );

  			new Photostack( document.getElementById( 'photostack-1' ), {
  				callback : function( item ) {
  					console.log(item)
  				}
  			} );
  			new Photostack( document.getElementById( 'photostack-2' ), {
  				callback : function( item ) {
  					console.log(item)
  				}
  			} );
  			new Photostack( document.getElementById( 'photostack-3' ), {
  				callback : function( item ) {
  					console.log(item)
  				}
  			} );
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
       <div class="segura_form_tbc">
         <form class="frmCabecalhoConvenio" action="<?php echo ($voltaTres); ?>router.php?controller=Convenio&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro: Cabeçalho Convênios</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_cabecalho"  size="16" />
             </div>

             <div class="text">
               <input id="tel" placeholder="Texto da imagem:" type="text" name="txtTituloImagem" value=""  maxlength="60">
             </div>

             <div id="btn_tbc">
               <input type="submit" name="btnEnviar" value="Enviar">
             </div>
         </form>

       </div>


       <div class="segura_form_convenio">
         <form class="frmConteudoConvenio" action="<?php echo ($voltaTres); ?>router.php?controller=Convenio&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro De Convênios:</p>
           </div>

             <div  class="text">
              <input id="tel" placeholder="Convênio" type="text" name="txtNomeConvenio" value=""  maxlength="50">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>
         </form>

       </div>


	  </main>
  </body>
</html>
