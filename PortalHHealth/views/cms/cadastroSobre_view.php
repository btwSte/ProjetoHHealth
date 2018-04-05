<?php
  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";

  $idSobreCabecalho = null;
  $fotoCabecalho = null;
  $tituloFoto = null;
  $tituloPagina = null;
  $idPaginaSobre = null;
  $fotoSobre = null;
  $textoSobre = null;
  $ativo = null;

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CMS - Cadastrar Sobre</title>
		<link rel="stylesheet" type="text/css" href="../../css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
	</head>
	<body>
    <?php include("../header.php"); ?>
		<div class="container">

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
			<div class="segura_form_tbc">
				<form class="frmCabecalhoSobre" action="../../router.php?controller=cmsSobre&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
					<div class="tit">
						<p>Cadastro: Cabeçalho Sobre</p>
					</div>

					<div  class="text">
						<input type="file" name="imagem_cabecalho"  size="16" />
					</div>

					<div class="text">
						<input id="tel" placeholder="Texto da imagem:" type="text" name="txt1" value=""  maxlength="60">
					</div>
					<div class="text">
						<input id="cel" required placeholder="Titulo do conteudo" type="text" name="txtTitulo_conteudo" value="" maxlength="60">
					</div>
					<div id="btn_tbc">
						<input type="submit" name="btnEnviar" value="Enviar">
					</div>
				</form>
			</div>
			<!-- SegundoForm -->
			<div class="segura_form_tbc">
				<form class="frmConteudoSobre" action="../../router.php?controller=cmsSobre&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
					<div class="tit">
						<p>Cadastro da Pagina Sobre:</p>
					</div>

					<div  class="text">
						<input type="file" name="imagem_conteudo"  size="16" />
					</div>

					<div  class="textAlt">
						<input type="text" required placeholder="Conteudo/Historia" name="txtConteudo" value="" maxlength="1000">
					</div>

					<div id="btn_tbc">
						<input type="submit" name="btnEnviarConteudo" value="Enviar">
					</div>
				</form>
			</div>
		</main>
	</body>
</html>
