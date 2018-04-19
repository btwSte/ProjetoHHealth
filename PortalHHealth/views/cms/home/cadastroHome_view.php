<?php
  /* Autor: Michel & Vinicius
     Data de modificação: 05/04/18
     View : Tela de Cadastro
     Obs: Tela de cadastro de informaçoes para tela da Home
   */

   require_once('../../../variaveis.php');
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
            <form class="frmConteudoHome" action="<?php echo $voltaTres; ?>router.php?controller=cmsHome&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
                <div class="tit">
                    <p>CADASTRO DA TELA HOME</p>
                </div>
                <div class="textoHomePortal">Menu (Escolher a logo)</div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Logo" name="imglogo" value="" maxlength="255" class="inputHome">
                </div>

                <!-- SLIDER -->
                <div class="textoHomePortal">Slider</div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Slide(Video ou Imagem)" name="imgSlide" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Slider" name="txtSlide" value="" maxlength="255" class="inputHomeDuploDir">
                </div>

                <!-- MISSÃO, VISÃO E VALORES -->
                <div class="textoHomePortal">Missão, Visão e Valores</div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Missao" name="txtNome" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Missão" name="txtNome" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Visao" name="txtNome" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Visão" name="txtNome" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Valores" name="txtNome" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Valores" name="txtNome" value="" maxlength="255" class="inputHomeDuploDir">
                </div>

                <!-- Imagem Do Fundo -->
                <div class="textoHomePortal">Imagem Do Fundo</div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="ImagemFundo" name="imgimagemFundo" value="" maxlength="255" class="inputHomeDuplo">
                </div>

                <!-- Nossas Unidades -->
                <div class="textoHomePortal">Nossas Unidades</div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="NossasUnidades" name="imgUnidade1" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="file" required placeholder="NossasUnidades" name="imgUnidade2" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="NossasUnidades" name="imgUnidade3" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="file" required placeholder="NossasUnidades" name="imgUnidade4" value="" maxlength="255" class="inputHomeDuploDir">
                </div>

                <div class="inputHomePortal">
                    <input type="file" required placeholder="NossasUnidades" name="imgUnidade5" value="" maxlength="255" class="inputHomeDuplo">
                </div>

                <!-- Rodape -->
                <div class="textoHomePortal">Rodapé do Site</div>
                <div class="inputHomePortal">
                    <input type="text" required placeholder="Email" name="txtNEmail" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Telefone" name="txtTelefone" value="" maxlength="255" class="inputHomeDuplo">
                </div>

                <!-- Redes Sociais -->
                <div class="textoHomePortal">Redes Sociais</div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Redes Sociais" name="imgRedeSocial1" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtlink1" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Redes Sociais" name="imgRedeSocial2" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtlink2" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" required placeholder="Redes Sociais" name="imgRedeSocial3" value="" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtlink3" value="" maxlength="255" class="inputHomeDuploDir">
                </div>
                <!-- Botao Para Finalizar, Boa Sorte! -->
                <div id="centralizarBtnHome">
                    <button type="submit" name="entrar" value="ENTRAR">SALVAR</button>
                </div>
            </form>
        </div>
	  </main>
  </body>
</html>
