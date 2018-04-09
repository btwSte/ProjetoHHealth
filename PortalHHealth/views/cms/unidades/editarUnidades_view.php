<?php
  require_once('variaveis.php');

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";

  $idUnidadeCabecalho = null;
  $fotoCabecalho = null;
  $tituloFoto = null;
  $idPaginaUnidade = null;
  $fotoUnidade = null;
  $endereco = null;
  $email = null;
  $numero = null;

  if (isset($cabecalhoResultado)) {
    $idUnidadeCabecalho = $cabecalhoResultado->idUnidadeCabecalho;
    $fotoCabecalho = $cabecalhoResultado->fotoCabecalho;
    $tituloFoto = $cabecalhoResultado->tituloFoto;
    $action = "modo=editarcabecalho&id=".$idUnidadeCabecalho;
  }


  if (isset($conteudoResultado)) {
    $idPaginaUnidade = $conteudoResultado->idPaginaUnidade;
    $fotoUnidade = $conteudoResultado->fotoUnidade;
    $endereco = $conteudoResultado->endereco;
    $email = $conteudoResultado->email;
    $numero = $conteudoResultado->numero;
    echo "<script>alert('Dentro do if do conteudo!');
          </script>";

    $action2 = "modo=editarconteudo&id=".$idPaginaUnidade;
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



       <div class="segura_form_tbc">
         <form class="frmConteudoUnidade" action="router.php?controller=cmsUnidades&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro: Cabeçalho informações</p>
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
         <form class="frmConteudoUnidade" action="router.php?controller=cmsUnidades&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro De unidades:</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_conteudo"  size="16" />
             </div>

             <div  class="text">
               <input id="tel" placeholder="Endereço" type="text" name="txtEnd" value="<?php echo $endereco; ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="Email da Unidade" maxlength="255" type="text2" name="txtEmail" value="<?php echo $email; ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="Numero" type="number" name="txtNum" value="<?php echo $numero; ?>"  maxlength="60">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>

           <div class="imagem_cabecalho">
              <img src="<?php echo($fotoUnidade); ?>" alt="" style="width:200px; height:200px;">
           </div>
         </form>


       </div>


      </main>s
  </body>
</html>
