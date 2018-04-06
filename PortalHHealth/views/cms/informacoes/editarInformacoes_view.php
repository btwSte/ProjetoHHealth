<?php
require_once('../../../variaveis.php');

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";

  $idConteudoCabecalho = null;
  $foto = null;
  $tituloFoto = null;
  $tituloPagina = null;
  $idPaginaInfoUsuario = null;
  $fotoAssunto = null;
  $textoAssunto = null;

  if (isset($cabecalhoResultado)) {
    $idConteudoCabecalho = $cabecalhoResultado->idConteudoCabecalho;
    echo ($tituloFoto);
    $foto = $cabecalhoResultado->foto;
    $tituloFoto = $cabecalhoResultado->tituloFoto;
    $tituloPagina = $cabecalhoResultado->tituloPagina;
    echo "<script>alert('Dentro do if!');
          </script>";

    $action = "modo=editarcabecalho&id=".$idConteudoCabecalho;
  }


  if (isset($conteudoResultado)) {
    $idPaginaInfoUsuario = $conteudoResultado->idPaginaInfoUsuario;
    echo ($textoAssunto);
    $fotoAssunto = $conteudoResultado->fotoAssunto;
    $textoAssunto = $conteudoResultado->textoAssunto;
    echo "<script>alert('Dentro do if do conteudo!');
          </script>";

    $action2 = "modo=editarconteudo&id=".$idPaginaInfoUsuario;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Cadastrar Informações</title>
    <link rel="stylesheet" type="text/css" href="css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
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



       <div class="segura_form_tbc">
         <form class="trabalhe_conosco" action="router.php?controller=cmsInformacoes&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro: Cabeçalho informações</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_cabecalho"  size="16" />
             </div>

             <div class="text">
               <input id="tel" placeholder="Texto da imagem:" type="text" name="txt1" value="<?php echo($tituloFoto); ?>"  maxlength="60">
             </div>
             <div class="text">
               <input id="cel" required placeholder="Titulo do conteudo" type="text" name="txtTitulo_conteudo" value="<?php echo($tituloPagina); ?>" maxlength="60">
             </div>


             <div id="btn_tbc">
               <input type="submit" name="btnEnviar" value="Enviar">
             </div>
             <div class="imagem_cabecalho">
                <img src="<?php echo($foto); ?>" alt="" style="width:200px; height:200px;">
             </div>
         </form>

       </div>


       <div class="segura_form_tbc">
         <form class="trabalhe_conosco" action="router.php?controller=cmsInformacoes&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro: De informações:</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_conteudo"  size="16" />
             </div>

             <div  class="text">
              <input type="text" required placeholder="Texto_conteudo:" name="txtConteudo" value="<?php echo($textoAssunto); ?>" maxlength="1000">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>
         </form>
         <div class="imagem_cabecalho">
            <img src="<?php echo($fotoAssunto); ?>" alt="" style="width:200px; height:200px;">
         </div>

       </div>



  </body>
</html>
