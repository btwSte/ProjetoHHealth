<?php
    
    require_once('variaveis.php');
    

    $action2 = "modo=novoconteudo";
    
        $idPaginaHome = null;
        $imgLogo = null;
        $videoSlider = null;
        $textoSlider = null;
        $imgMissao = null;
        $imgVisao = null;
        $imgValores = null;
        $textoMissao = null;
        $textoVisao = null;
        $textoValores = null;
        $imgFundo = null;
        $RedeSocialUm = null;
        $RedeSocialDois = null;
        $RedeSocialTres = null;
        $textoLinkUm = null;
        $textoLinkDois = null;
        $textoLinkTres = null;
        
     //if do conteudo do CONTEUDO
      if (isset($conteudoResultado)) {
          
        $idPaginaHome = $conteudoResultado->idPaginaHome;
        $imgLogo = $conteudoResultado->imgLogo;
        $videoSlider = $conteudoResultado->videoSlider;
        $textoSlider = $conteudoResultado->textoSlider;
        $imgMissao = $conteudoResultado->imgMissao;
        $imgVisao = $conteudoResultado->imgVisao;
        $imgValores = $conteudoResultado->imgValores;
        $textoMissao = $conteudoResultado->textoMissao;
        $textoVisao = $conteudoResultado->textoVisao;
        $textoValores = $conteudoResultado->textoValores;
        $imgFundo = $conteudoResultado->imgFundo;
        $RedeSocialUm = $conteudoResultado->RedeSocialUm;
        $RedeSocialDois = $conteudoResultado->RedeSocialDois;
        $RedeSocialTres = $conteudoResultado->RedeSocialTres ;
        $textoLinkUm = $conteudoResultado->textoLinkUm;
        $textoLinkDois = $conteudoResultado->textoLinkDois;
        $textoLinkTres = $conteudoResultado->textoLinkTres;
          
        $action2 = "modo=editarconteudo&id=".$idPaginaHome;
          
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
    <?php include("views/header-editar.php"); ?>
      
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

        <?php include("views/menuLateral_view.php"); ?>



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
                    <input type="file"  placeholder="Logo" name="imglogo" value="<?php echo($imgLogo); ?>" maxlength="255" class="inputHome">
                </div>
                <div>
                    <img src="<?php echo($imgLogo); ?>" alt="Home">
                </div>

                <!-- SLIDER -->
                <div class="textoHomePortal">Slider</div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Slide(Video ou Imagem)" name="imgSlide" value="<?php echo($fotoSlider); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Slider" name="txtSlide" value="<?php echo($textoSlider); ?>" maxlength="255" class="inputHomeDuploDir">
                </div>

                <!-- MISSÃO, VISÃO E VALORES -->
                <div class="textoHomePortal">Missão, Visão e Valores</div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Missao" name="imgMissao" value="<?php echo($fotoMissao); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Missão" name="txtMissao" value="<?php echo($textoMissao); ?>" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Visao" name="imgVisao" value="<?php echo($fotoVisao); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Visão" name="txtVisao" value="<?php echo($textoVisao); ?>" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Valores" name="imgValores" value="<?php echo($fotoValores); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Texto Valores" name="txtValores" value="<?php echo($textoValores); ?>" maxlength="255" class="inputHomeDuploDir">
                </div>

                <!-- Imagem Do Fundo -->
                <div class="textoHomePortal">Imagem Do Fundo</div>
                <div class="inputHomePortal">
                    <input type="file"  placeholder="ImagemFundo" name="imgFundo" value="<?php echo($fotoFundo); ?>" maxlength="255" class="inputHomeDuplo">
                </div>

                
                <!-- Redes Sociais -->
                <div class="textoHomePortal">Redes Sociais</div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Redes Sociais" name="imgRedeUm" value="<?php echo($redeSocialUm); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtLinkUm" value="<?php echo($textoLinkUm); ?>" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Redes Sociais" name="imgRedeDois" value="<?php echo($redeSocialDois); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtLinkDois" value="<?php echo($textoLinkDois); ?>" maxlength="255" class="inputHomeDuploDir">
                </div>
                <div class="inputHomePortal">
                    <input type="file" placeholder="Redes Sociais" name="imgRedeTres" value="<?php echo($redeSocialTres); ?>" maxlength="255" class="inputHomeDuplo">
                    <input type="text" required placeholder="Link" name="txtLinkTres" value="<?php echo($textoLinkTres); ?>" maxlength="255" class="inputHomeDuploDir">
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
