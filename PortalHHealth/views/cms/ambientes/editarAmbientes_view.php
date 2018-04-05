<?php
  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";

  $idAmbienteCabecalho = null;
  $foto = null;
  $tituloFoto = null;
  $tituloPagina = null;
  $idPaginaAmbiente = null;
  $fotoConteudoAmbiente = null;
  $textoConteudoAmbiente = null;

  if (isset($cabecalhoResultado)) {
    $idAmbienteCabecalho = $cabecalhoResultado->idAmbienteCabecalho;
    echo ($tituloFoto);
    $fotoCabecalho = $cabecalhoResultado->foto;
    $tituloFoto = $cabecalhoResultado->tituloFoto;
    $tituloCabecalho = $cabecalhoResultado->tituloPagina;
    echo "<script>alert('Dentro do if!');
          </script>";

    $action = "modo=editarcabecalho&id=".$idAmbienteCabecalho;
  }


  if (isset($conteudoResultado)) {
    $idPaginaAmbiente = $conteudoResultado->idPaginaAmbiente;
    echo ($textoConteudoAmbiente);
    $fotoConteudoAmbiente = $conteudoResultado->fotoConteudoAmbiente;
    $textoConteudoAmbiente = $conteudoResultado->textoConteudoAmbiente;
    echo "<script>alert('Dentro do if do conteudo!');
          </script>";

    $action2 = "modo=editarconteudo&id=".$idPaginaAmbiente;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Cadastrar Procedimentos</title>
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
         <form class="trabalhe_conosco" action="router.php?controller=cmsAmbiente&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro: Cabeçalho Ambientes</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_cabecalho"  size="16" />
             </div>

             <div class="text">
               <input id="tel" placeholder="Texto da imagem:" type="text" name="txt1" value="<?php echo($tituloFoto); ?>"  maxlength="60">
             </div>

             <div id="btn_tbc">
               <input type="submit" name="btnEnviar" value="Enviar">
             </div>
             <div class="imagem_cabecalho">
                <img src="<?php echo($fotoCabecalho); ?>" alt="" style="width:200px; height:200px;">
             </div>
         </form>

       </div>


       <div class="segura_form_tbc">
         <form class="trabalhe_conosco" action="router.php?controller=cmsAmbiente&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro De Informações:</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_conteudo"  size="16" />
             </div>

             <div  class="text">
              <input type="text" required placeholder="Texto_conteudo:" name="txtConteudo" value="<?php echo($textoConteudoAmbiente); ?>" maxlength="1000">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>
         </form>
         <div class="imagem_cabecalho">
            <img src="<?php echo($fotoConteudoAmbiente); ?>" alt="" style="width:200px; height:200px;">
         </div>

       </div>



  </body>
</html>
