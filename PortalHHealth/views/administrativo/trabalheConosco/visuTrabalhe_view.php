<?php
 include("../../../variaveis.php");



 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Visualiza curriculos enviados</title>
		<link rel="stylesheet" type="text/css"  href="  <?php echo($voltaTres) ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
		<script src="<?php echo $voltaTres; ?>js/modernizr.min.js"></script>
		<script type="text/javascript" src="<?php echo $voltaTres; ?>js/jquery.js"></script>
		<script>
			$(document).ready(function() {

				$(".ver").click(function() {
					$(".modalContainer").slideToggle(2000);
				//slideToggle
				//toggle
				//FadeIn
				});
			});



				function Modal(idIten){
					$.ajax({
						type: "POST",
						url: "modal.php",
						data: {id:idIten},
						success: function(dados){
							$('.modal').html(dados);
						}
					});
				}
		</script>
	</head>
	<body>

		<div class="modalContainer">
			<div class="modal">

			</div>
		</div>


    <?php include("../header.php"); ?>
		<div class="container">

		</div><!-- /container -->


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
                    <div class="campoNeutro">Email</div>
                    <div class="campoNeutro">Profisão</div>
                    <div class="campoNeutroDir">Opções</div>
                </div>
								<!-- Select do banco -->
									<?php
									require_once($voltaTres.'router.php');
									require_once($voltaTres.'controllers/admTrabalheConosco_controller.php');
									require_once($voltaTres.'models/trabalheconosco_class.php');

									$controller_Curriculo = new controllerCurriculo();
									//chama metodo para listar os registros
									$list = $controller_Curriculo::selectCurriculo();

									$cont = 0;

									while ($cont < count($list))
									{
									?>
		                <div class="linhaContato">
		                    <div class="campoIdSelect"><?php echo($list[$cont]->idCurriculo); ?></div>
		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->nome); ?></div>
		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->telefone); ?></div>
		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->email); ?></div>
		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->profissao); ?></div>
		                    <div class="campoNeutroSelect">
		                        <div class="optionSelect">
		                            <a href="#" alt="IconeVisualizar" class="ver" onclick="Modal(<?php echo($list[$cont]->idCurriculo) ?>)">
		                                <img src="<?php echo($voltaTres) ?>imagens/visualizarVerde.png" alt="Zoom" width="30" height="25"/><!-- Icone Para Visualizar a Selecionada -->
		                            </a>
		                        </div>
		                        <div class="optionSelectDir">
		                            <a  href="<?php echo $voltaTres ?>router.php?controller=Curriculo&modo=excluirCurriculo&id=<?php echo($list[$cont]->idCurriculo); ?>" alt="Deletar Curriculo" onClick="return confirm('Deseja realmente exluir ?');">
		                                <img src="<?php echo($voltaTres) ?>imagens/excluirVermelho.png" alt="Zoom" width="30" height="23"/><!-- icone para Excluir o Selecionado -->
		                            </a>
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
