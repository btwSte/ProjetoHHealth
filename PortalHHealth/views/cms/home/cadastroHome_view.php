<?php
  require_once('../../../variaveis.php');

  $action = "modo=novoconteudo";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Cadastrar Ambientes</title>
    <link rel="stylesheet" type="text/css" href="<?php echo($voltaTres); ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo($voltaTres); ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaDois."header.php"); ?>


      <div class="container">
			<!-- Top Navigation -->

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

        <?php include($voltaDois."menuLateral_view.php"); ?>



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>


        <div class="seguraFormHome">
            <form class="frmConteudoHome" action="<?php echo $voltaTres; ?>router.php?controller=cmsHome&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
                <div class="tit">
                    <p>CADASTRO DA TELA HOME</p>
                </div>
                <div class="textoHomePortal">Menu (Escolher a logo)</div>
                <div class="inputHomePortal">
                    <input type="file"  placeholder="Logo" name="imgLogo" value="" maxlength="255" class="inputHome">
                </div>

                <!-- SLIDER -->
                <div class="textoHomePortal">Slider</div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Slide(Video ou Imagem)" name="imgSlide" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Slider" name="txtSlide" value="" maxlength="255" class="inputHomeDuploDir">
                </div>

                <!-- MISSÃO, VISÃO E VALORES -->
                <div class="textoHomePortal">Missão, Visão e Valores</div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Missao" name="imgMissao" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Missão" name="txtMissao" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Visao" name="imgVisao" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Visão" name="txtVisao" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Valores" name="imgValores" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Valores" name="txtValores" value="" maxlength="255" class="inputHomeDuploDir">
                </div>

                <!-- Imagem Do Fundo -->
                <div class="textoHomePortal">Imagem Do Fundo</div>
                <div class="inputHomePortal">
                    <input type="file"  placeholder="ImagemFundo" name="imgFundo" value="" maxlength="255" class="inputHomeDuplo">
                </div>


                <!-- Redes Sociais -->
                <div class="textoHomePortal">Redes Sociais</div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Redes Sociais" name="imgRedeUm" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtLinkUm" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Redes Sociais" name="imgRedeDois" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtLinkDois" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Redes Sociais" name="imgRedeTres" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtLinkTres" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <!-- Botao Para Finalizar, Boa Sorte! -->
                <div id="centralizarBtnHome">
                    <button type="submit" name="btnEviarConteudo" value="ENTRAR">SALVAR</button>
                </div>
            </form>
        </div>
	  </main>
  </body>
</html>
