<?php
 include("../../../variaveis.php");

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Visualiza Niveis</title>
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
			<!-- Select do banco -->
				<?php
				require_once($voltaTres.'router.php');
				require_once($voltaTres.'controllers/cmsNivel_controller.php');
				require_once($voltaTres.'models/nivel_class.php');

				$controller_Nivel = new Nivel();
				//chama metodo para listar os registros
				$list = $controller_Nivel::Select();

				$cont = 0;

				while ($cont < count($list))
				{
				?>

          <div id="segura">
            <div class="segura_img_info">
              <div class="txtUniVisu">
                 <div class="txtUnidade">Nivel: <?php echo($list[$cont]->nivel); ?></div>
              </div>
            </div>
            <div class="Crud_Opc">

                <div class="Deletar_crud">
                  <a href="<?php echo $voltaTres; ?>router.php?controller=Nivel&modo=excluirNivel&id=<?php echo($list[$cont]->idNivelPortal ); ?>">DELETAR</a>

                </div>
                <div class="Editar_crud">
                  <a href="">EDITAR</a>
                </div>

            </div>
            <!-- ABRE O IF -->

          </div>




			<?php
			$cont += 1 ;
			}
			?>
		</main>
	</body>
</html>
