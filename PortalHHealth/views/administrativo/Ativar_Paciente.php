<?php
	require_once('../../variaveis.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CMS - Mensagens Recebidads</title>
		<link rel="stylesheet" type="text/css" href="<?php echo $voltaDois; ?>css/Frajola.css">
        <link rel="stylesheet" type="text/css" href="MODAL/css/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo $voltaTres; ?>css/styleModal.css">
		<script src="<?php echo $voltaTres; ?>js/modernizr.min.js"></script>
        <script type="text/javascript" src="<?php echo $voltaTres; ?>js/jquery.js"></script>
	<body>
		<div class="modalContainer">
			<div class="modal">

			</div>
		</div>
    <?php include("header_home.php"); ?>
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
			<?php include("menu_home.php"); ?>
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
                    <div class="campoId">Nome</div>
                    <div class="campoNeutro">Dt Nasc</div>
                    <div class="campoNeutro">Nacionalidade</div>
                    <div class="campoNeutro">cpf</div>
                    <div class="campoNeutro">Email</div>
                    <div class="campoNeutroDir">Opções</div>
                </div>
            <!-- Select do banco -->
						<?php
						require_once($voltaDois.'router.php');
						require_once($voltaDois.'controllers/admPaciente_controller.php');
						require_once($voltaDois.'models/Paciente_class.php');

						$controller_contatos = new controllerCadPaciente();
						//chama metodo para listar os registros
						$list = $controller_contatos::selectPaciente();

						$cont = 0;

						while ($cont < count($list))
						{
						?>
                <div class="linhaContato">
                    <div class="campoIdSelect"><?php echo($list[$cont]->nome); ?></div>
                    <div class="campoNeutroSelect"><?php echo($list[$cont]->dtNasc); ?></div>
                    <div class="campoNeutroSelect"><?php echo($list[$cont]->nacionalidade); ?></div>
                    <div class="campoNeutroSelect"><?php echo($list[$cont]->cpf); ?></div>
                    <div class="campoNeutroSelect"><?php echo($list[$cont]->email); ?></div>
                    <div class="campoNeutroSelect">
                        <div class="optionSelect">
													<?php
															// IF PARA DESATIVAR O CONTEUDO
																if ($list[$cont]->valido == 1){

													 ?>
														<div class="ativar_crud ">
															<a href="<?php echo $voltaDois; ?>router.php?controller=Paciente&modo=desativar&id=<?php echo($list[$cont]->idPaciente); ?>">
																<img src="<?php echo($voltaDois); ?>imagens/check.png" alt="Desativar" title="Desativar">
															</a>
														</div>
														<?php
													// FECHA O IF E ABRE ELSE
													// ELSE PARA ATIVAR CONTEUDO
													} else {
														 ?>

														<div class="desativar_crud ">
															<a href="<?php echo $voltaDois; ?>router.php?controller=Paciente&modo=ativar&id=<?php echo($list[$cont]->idPaciente); ?>">
																<img src="<?php echo($voltaDois); ?>imagens/no.png" alt="Ativar" title="Ativar">
															</a>
														</div>
														<!-- FECHA O ELSE -->
														 <?php
														 }
															?>
                        </div>
                        <div class="optionSelectDir">
                        </div>
                    </div>
                </div>
							<?php
							$cont += 1 ;
							}
							?>
           <!-- Select do banco -->
          <div class="finalSelect"></div>
      </div>
		</main>
	</body>
</html>
