<?php
#require_once("cms/conexao.php");



 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Historico do Perfil</title>
    <link rel="stylesheet" type="text/css" href="../../css/stylePaciente.css"s>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Scattered Polaroids Gallery: A flat-style take on a Polaroid gallery" />
		<meta name="keywords" content="scattered polaroids, image gallery, javascript, random rotation, 3d, backface, flat design" />
		<meta name="author" content="Codrops" />
		<script src="../../js/modernizr.min.js"></script>
  </head>
  <body>

      <?php include("header.php"); ?>

      
  		<script src="../../js/classie.js"></script>
  		<script src="../../js/photostack.js"></script>
  		
      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
          </span>
      </div>
    <main>
        <?php include("menuLateral.php"); ?>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <div id="containerConteudo">            
               <div class="containerTitulo">
                   <div class="barraTexto">
						HISTORICO
                   </div>                   
               </div>
                
                <!-- faz require e abre while -->
                <?php
                    require_once('../../controllers/historico_controller.php');
                    require_once('../../models/historico_class.php');

                    $controller_historico = new controllerHistorico();
                    //chama metodo para listar os registros
                    $listHistorico = $controller_historico::SelecionarHistorico();

                    $contHistorico = 0;

                    while ($contHistorico < count($listHistorico)) {
                ?>
            
                <div id="segura_form_exames">
					<div class="barraCampos">
                        <div class="camposBarra"><?php echo($listHistorico[$contHistorico]->idPaciente); ?></div>                        
                        <div class="camposBarra"><?php echo($listHistorico[$contHistorico]->idMedico); ?></div>
					</div>
						<div class="barraCampos">
                        <div class="camposBarra"><?php echo($listHistorico[$contHistorico]->idConsulta); ?></div>         
					</div>
                    <div class="barraTextExame">
                    	<div class="campoTextoExame"><?php echo($listHistorico[$contHistorico]->Relatorio); ?></div>
                    </div>
                </div>
        </div>
        
        <?php
            $contHistorico += 1;
          }
        ?>
        
        
        
    </main>
        
    <?php include("footer.php"); ?>

  </body>
</html>
