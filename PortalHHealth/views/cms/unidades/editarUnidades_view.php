<?php
require_once('../../../variaveis.php');

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";

  $idProcedimentoCabecalho = null;
  $fotoCabecalho = null;
  $tituloFoto = null;
  $tituloCabecalho = null;
  $idPaginaProcedimento = null;
  $fotoProcedimento = null;
  $textoProcedimento = null;

  if (isset($cabecalhoResultado)) {
    $idProcedimentoCabecalho = $cabecalhoResultado->idProcedimentoCabecalho;
    echo ($tituloFoto);
    $fotoCabecalho = $cabecalhoResultado->fotoCabecalho;
    $tituloFoto = $cabecalhoResultado->tituloFoto;
    $tituloCabecalho = $cabecalhoResultado->tituloCabecalho;
    echo "<script>alert('Dentro do if!');
          </script>";

    $action = "modo=editarcabecalho&id=".$idProcedimentoCabecalho;
  }


  if (isset($conteudoResultado)) {
    $idPaginaProcedimento = $conteudoResultado->idPaginaProcedimento;
    echo ($textoProcedimento);
    $fotoProcedimento = $conteudoResultado->fotoProcedimento;
    $textoProcedimento = $conteudoResultado->textoProcedimento;
    echo "<script>alert('Dentro do if do conteudo!');
          </script>";

    $action2 = "modo=editarconteudo&id=".$idPaginaProcedimento;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Cadastrar Procedimentos</title>
    <link rel="stylesheet" type="text/css" href="<?php echo($voltaTres); ?>css/Frajola.css">
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





  		</div><!-- /container -->
  		<script src="<?php echo($voltaTres); ?>js/classie.js"></script>
  		<script src="<?php echo($voltaTres); ?>js/photostack.js"></script>
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

        <?php include($voltaDois."menuLateral-editar.php"); ?>



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>



       <div class="segura_form_tbc">
         <form class="trabalhe_conosco" action="<?php echo($voltaTres); ?>router.php?controller=cmsUnidades&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
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
               <input id="cel" required placeholder="Titulo do conteudo" type="text" name="txtTitulo_conteudo" value="<?php echo($tituloCabecalho); ?>" maxlength="60">
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
         <form class="trabalhe_conosco" action="<?php echo($voltaTres); ?>router.php?controller=cmsUnidades&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro De Informações:</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_conteudo"  size="16" />
             </div>

             <div  class="text">
              <input type="text" required placeholder="Texto_conteudo:" name="txtConteudo" value="<?php echo($textoProcedimento); ?>" maxlength="1000">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>
         </form>
         <div class="imagem_cabecalho">
            <img src="<?php echo($fotoProcedimento); ?>" alt="" style="width:200px; height:200px;">
         </div>

       </div>


      </main>s
  </body>
</html>
