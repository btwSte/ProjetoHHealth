<?php
session_start();
require_once('../../../variaveis.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fila de Espera</title>
    <link rel="stylesheet" type="text/css" href="../../../css/Frajola.css">
    <script src="../../../js/modernizr.min.js"></script>
    <script type="text/javascript" src="../../../js/jquery.js"></script>

    <script>
			$(document).ready(function() {

				$(".ver").click(function() {
					$(".modalContainer").slideToggle(1000);
				//slideToggle
				//toggle
				//FadeIn
				});
			});




        function Modal2(idIten){
					$.ajax({
						type: "POST",
						url: "modal2.php",
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

    <div  id="opcao" class="button shrink">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
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

      <!--  DEVE FICAR -->
      <div id="areaConteudoMedico">
          <div class="barraIdenti">
              <div class="containerIndetificacao">
                <?php
                $_SESSION['LogCpf'];
                require_once($voltaTres."controllers/AdmMedico_controller.php");
                require_once($voltaTres."models/Medico_class.php");

                $controller_medico = new controllerCmsMedico();
                 //chama metodo para listar os registros
                $listm = $controller_medico::SelecionaMedico();

                $contm = 0;

                  while ($contm < count($listm)) {
                 ?>
                  Seja bem vindo(a), <?php echo($listm[$contm]->nome);
                    $contm +=1;
                  }
                  ?>
              </div>
          </div>
          <div class="listaPacienteEsq">
              <div class="containerEscritaPaciente">FILA DE ESPERA | PACIENTES</div>
              <div class="containerListaPaciente">
                <?php
                require_once($voltaTres."controllers/fila_controller.php");
                require_once($voltaTres."models/fila_class.php");

                $controller_fila = new controllerFila();
                 //chama metodo para listar os registros
                $list = $controller_fila::SelecionaFila();
                //inicia cont
                $cont = 0;

                while ($cont < count($list)) {

                ?>
                  <div class="barraNomePaciente">Nome:	<?php echo $list[$cont]->nome; ?>

                    <a class="opcao" href="../../../router.php?controller=consulta&modo=iniciar&id=<?php echo($list[$cont]->idFila); ?>">
                       <img src="../../../imagens/seta.png" alt="Iniciar Atendimento" title="Iniciar Atendimento">
                     </a>
                  </div>
                  <!-- <div class="opcao_paciente">

                  </div> -->

                  <?php
                      $cont += 1;
                    }
                   ?>
          </div>
        </div>




          <div class="listaPacienteDir">
              <div class="containerEscritaPaciente">FILA DE RETORNO | PACIENTES</div>
              <div class="containerListaPaciente">
                <?php
                $controller_fila = new controllerFila();
                 // chama metodo para listar os registros
                $listIni = $controller_fila::SelecionaFilaIniciada();
                //inicia cont
                $contIni = 0;

                while ($contIni < count($listIni)) {

                ?>
                  <div class="barraNomePaciente">

                    <div class="nomePa">
                      <span style="color: #43704e;" >Nome:</span>	<?php echo $listIni[$contIni]->nome; ?> <br>
                      <span style="color: #43704e;" >Status:</span> <?php echo $listIni[$contIni]->status; ?>
                    </div>

                    <div class="opçNome">
                      <a class="opcao" onclick="return confirm('Deseja iniciar?');" href="../../../router.php?controller=consulta&modo=andamento&id=<?php echo($listIni[$contIni]->idFila); ?>">
                        <img src="../../../imagens/play.png" alt="Consulta em Andamento" title="Consulta em Andamento">
                      </a>

                      <a class="opcao" onclick="return confirm('Deseja colocar em espera?');"
                      href="../../../router.php?controller=consulta&modo=espera&id=<?php echo($listIni[$contIni]->idFila); ?>">
                        <img src="../../../imagens/pause.png" alt="Consulta em Espera" title="Consulta em Espera" >
                      </a>

                      <a class="opcao" onclick="return confirm('Deseja finalizar?');"
                      href="../../../router.php?controller=consulta&modo=finalizar&id=<?php echo($listIni[$contIni]->idFila); ?>">
                        <img src="../../../imagens/stop.png" alt="Finalizar Consulta" title="Finalizar Consulta">
                      </a>

                      <a href="#" class="opcao ver"
                       onclick="Modal2(<?php echo($listIni[$contIni]->idPaciente); ?>)">
                        <img src="../../../imagens/receita.png" alt="Escrever Receita" title="Escrever Receita">
                      </a>

                    </div>
                    <p id="demo"></p>
                  </div>
                  <?php
                      $contIni += 1;
                    }
                   ?>
              </div>
          </div>
      </div>

</main>
  </body>
</html>
