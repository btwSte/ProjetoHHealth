<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fila de Espera</title>
    <link rel="stylesheet" type="text/css" href="../../../css/Frajola.css">
    <script src="../../../js/modernizr.min.js"></script>
  </head>
  <body>

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
                  SEJA BEM VINDO,
              </div>
          </div>
          <div class="listaPacienteEsq">
              <div class="containerEscritaPaciente">FILA DE ESPERA | PACIENTES</div>
              <div class="containerListaPaciente">
                <?php
                require_once('../../../variaveis.php');

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
