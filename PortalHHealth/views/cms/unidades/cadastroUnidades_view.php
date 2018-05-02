<?php
require_once('../../../variaveis.php');


  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";
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
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">
          &#9776;Menu
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



      <div class="segura_form_tbc">
        <form class="frmCabecalhoUnidade" action="<?php echo($voltaTres); ?>router.php?controller=cmsUnidades&<?php echo($action); ?>" method="post" enctype="multipart/form-data">

          <div class="tit">
            <p>Cadastro: Cabeçalho Unidades</p>
          </div>

          <div  class="text">
            <input type="file" name="imagem_cabecalho"  size="16" />
          </div>
          <div class="text">
            <input id="tel" placeholder="Texto da imagem:" type="text" name="txt1" value=""  maxlength="60">
          </div>
          <div id="btn_tbc">
            <input type="submit" name="btnEnviar" value="Enviar">
          </div>

        </form>
      </div>

      <div class="segura_form_tbc">
        <form class="frmConteudoUnidade" action="<?php echo($voltaTres); ?>router.php?controller=cmsUnidades&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">

          <div class="tit">
            <p>Cadastro De unidades:</p>
          </div>
          <div  class="text">
           <input type="file" name="imagem_conteudo"  size="16" />
          </div>

          <div  class="text">
            <input id="tel" placeholder="CNPJ" maxlength="255" type="text" name="txtCnpj" value=""  maxlength="255">
          </div>

          <div  class="text">
            <input id="tel" placeholder="Nome da Unidade" maxlength="255" type="text" name="txtNome" value=""  maxlength="255">
          </div>

          <div  class="text">
            <input id="tel" placeholder="Email da Unidade" maxlength="255" type="text" name="txtEmail" value=""  maxlength="255">
          </div>

          <div  class="text">
            <input id="tel" placeholder="Telefone" type="text" name="txtTel" value=""  maxlength="60">
          </div>

          <div class="tit">
            <p>Endereço: </p>
          </div>

          <div  class="text">
            <input id="tel" placeholder="Logradouro" maxlength="255" type="text" name="txtLogradouro" value=""  maxlength="255">
          </div>

          <div  class="text">
            <input id="tel" placeholder="N°" maxlength="255" type="text" name="txtNum" value=""  maxlength="255">
          </div>

          <div  class="text">
            <input id="tel" placeholder="Bairro" maxlength="255" type="text" name="txtBairro" value=""  maxlength="255">
          </div>

          <div  class="text">
            <input id="tel" placeholder="CEP" maxlength="255" type="text" name="txtCep" value=""  maxlength="255">
          </div>

          <div id="btn_tbc">
            <input type="submit" name="btnEnviarConteudo" value="Enviar">
          </div>
        </form>
      </div>
	  </main>
  </body>
</html>
