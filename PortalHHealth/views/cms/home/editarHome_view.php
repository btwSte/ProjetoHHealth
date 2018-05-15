<?php
  require_once('variaveis.php');

  $action = "modo=novoconteudo";

  // inicia variaveis
    $idPaginaHome = null;
    $fotoLogo = null;
    $videoSlider = null;
    $textoSlider = null;
    $fotoMissao = null;
    $fotoVisao = null;
    $fotoValores = null;
    $textoMissao = null;
    $textoVisao = null;
    $textoValores = null;
    $fotoFundo = null;
    $redeSocialUm = null;
    $redeSocialDois = null;
    $redeSocialTres = null;
    $textoLinkUm = null;
    $textoLinkDois = null;
    $textoLinkTres = null;

  //if do conteudo
  if (isset($conteudoResultado)) {
    $idPaginaHome = $conteudoResultado->idPaginaHome;
    $fotoLogo = $conteudoResultado->fotoLogo;
    $videoSlider = $conteudoResultado->videoSlider;
    $textoSlider = $conteudoResultado->textoSlider;
    $fotoMissao = $conteudoResultado->fotoMissao;
    $fotoVisao = $conteudoResultado->fotoVisao;
    $fotoValores = $conteudoResultado->fotoValores;
    $textoMissao = $conteudoResultado->textoMissao;
    $textoVisao = $conteudoResultado->textoVisao;
    $textoValores = $conteudoResultado->textoValores;
    $fotoFundo = $conteudoResultado->fotoFundo;
    $redeSocialUm = $conteudoResultado->redeSocialUm;
    $redeSocialDois = $conteudoResultado->redeSocialDois;
    $redeSocialTres = $conteudoResultado->redeSocialTres ;
    $textoLinkUm = $conteudoResultado->textoLinkUm;
    $textoLinkDois = $conteudoResultado->textoLinkDois;
    $textoLinkTres = $conteudoResultado->textoLinkTres;

    $action = "modo=editarconteudo&id=".$idPaginaHome;
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Cadastrar Ambientes</title>
    <link rel="stylesheet" type="text/css" href="css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo($voltaTres); ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php
        if (isset($cabecalhoResultado)) {
          include("views/header-editar.php");
        } else if (isset($conteudoResultado)){
          include("views/header-editar.php");
        } else {
          include("views/header.php");
        }

      ?>

      <div class="container">
			<!-- Top Navigation -->
  		</div>
      <!-- /container -->

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
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">
          &#9776;Menu
		     </span>
      </div>

      <main>
        <?php include("views/menuLateral-editar.php"); ?>
        <script>
          function openNav() {
              document.getElementById("mySidenav").style.width = "270px";
          }

          function closeNav() {
              document.getElementById("mySidenav").style.width = "0";
          }
        </script>

        <div class="seguraFormHome">
          <form class="frmConteudoHome" action="router.php?controller=cmsHome&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
            <div class="tit">
                <p>CADASTRO DA TELA HOME</p>
            </div>
            <div class="textoHomePortal">
              Menu (Escolher a logo)
            </div>
            <div class="inputHomePortal">
                <input type="file"  placeholder="Logo" name="fotoLogo" value="" maxlength="255" class="inputHome">
            </div>
            <div>
              <img src="<?php echo($fotoLogo); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <!-- SLIDER -->
            <div class="textoHomePortal">Slider</div>
            <div class="inputHomePortal">
                <input type="file" placeholder="Slide(Video ou Imagem)" name="fotoSlide" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Texto Slider" name="txtSlide" value="<?php echo($textoSlider); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($videoSlider); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <!-- MISSÃO, VISÃO E VALORES -->
            <div class="textoHomePortal">Missão, Visão e Valores</div>
            <div class="inputHomePortal">
                <input type="file" placeholder="Missao" name="fotoMissao" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Texto Missão" name="txtMissao" value="<?php echo($textoMissao); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($fotoMissao); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <div class="inputHomePortal">
                <input type="file" placeholder="Visao" name="fotoVisao" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Texto Visão" name="txtVisao" value="<?php echo($textoVisao); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($fotoVisao); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <div class="inputHomePortal">
                <input type="file" placeholder="Valores" name="fotoValores" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Texto Valores" name="txtValores" value="<?php echo($textoValores); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($fotoValores); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <!-- Imagem Do Fundo -->
            <div class="textoHomePortal">Imagem Do Fundo</div>
            <div class="inputHomePortal">
                <input type="file"  placeholder="ImagemFundo" name="fotoFundo" value="" maxlength="255" class="inputHomeDuplo">
            </div>
            <div>
              <img src="<?php echo($fotoFundo); ?>" alt="Home" style="width:200px; height:200px;">
            </div>


            <!-- Redes Sociais -->
            <div class="textoHomePortal">Redes Sociais</div>
            <div class="inputHomePortal">
                <input type="file" placeholder="Redes Sociais" name="fotoRedeUm" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Link" name="txtLinkUm" value="<?php echo($textoLinkUm); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($redeSocialUm); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <div class="inputHomePortal">
                <input type="file" placeholder="Redes Sociais" name="fotoRedeDois" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Link" name="txtLinkDois" value="<?php echo($textoLinkDois); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($redeSocialDois); ?>" alt="Home" style="width:200px; height:200px;">
            </div>

            <div class="inputHomePortal">
                <input type="file" placeholder="Redes Sociais" name="fotoRedeTres" value="" maxlength="255" class="inputHomeDuplo">
                <input type="text" required placeholder="Link" name="txtLinkTres" value="<?php echo($textoLinkTres); ?>" maxlength="255" class="inputHomeDuploDir">
            </div>
            <div>
              <img src="<?php echo($redeSocialTres); ?>" alt="Home" style="width:200px; height:200px;">
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
