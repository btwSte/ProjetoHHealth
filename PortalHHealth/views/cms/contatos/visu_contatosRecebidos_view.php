<?php
	require_once('../../../variaveis.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CMS - Mensagens Recebidads</title>
		<link rel="stylesheet" type="text/css" href="../../css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
	</head>
	<body>
    <?php include("../header.php"); ?>
		<div class="container">

		</div><!-- /container -->
  		<script src="../../js/classie.js"></script>
  		<script src="../../js/photostack.js"></script>
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

			<div class="segura_form_contatos">
                <div class="linhaContato">
                    <div class="campoId">#</div>
                    <div class="campoNeutro">Nome</div>
                    <div class="campoNeutro">Tel</div>
                    <div class="campoNeutro">Cel</div>
                    <div class="campoNeutro">Email</div>
                    <div class="campoNeutroDir">Opções</div>
                </div>
            <!-- Select do banco -->
                <div class="linhaContato">
                    <div class="campoIdSelect"><!-- ID --></div>
                    <div class="campoNeutroSelect"><!-- NOME --></div>
                    <div class="campoNeutroSelect"><!-- TELEFONE --></div>
                    <div class="campoNeutroSelect"><!-- CELULAR --></div>
                    <div class="campoNeutroSelect"><!-- EMAIL --></div>
                    <div class="campoNeutroSelect">
                        <div class="optionSelect">
                            <a href="#" alt="IconeVisualizar">
                                <img src="../../imagens/visualizarVerde.png" alt="Zoom" width="30" height="25"/><!-- Icone Para Visualizar a Selecionada -->
                            </a>
                        </div>
                        <div class="optionSelectDir">
                            <a href="#" alt="IconeVisualizar">
                                <img src="../../imagens/excluirVermelho.png" alt="Zoom" width="30" height="23"/><!-- icone para Excluir o Selecionado -->
                            </a>
                        </div>
                    </div>
                </div>
           <!-- Select do banco -->
                <div class="finalSelect"></div>
            </div>
		</main>
	</body>
</html>
