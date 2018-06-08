<?php
  session_start();
  require_once('../../variaveis.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Agendamento de Consulta</title>
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
            <div id="segura_form_tbc">

                   <div class="barraTexto">
                     TEMPO DE ESPERA
                   </div>
                   <div class="barraHora">
                     00 : 00
                   </div>

               </div>
            <form name="frmPreAtendimento"  action="../../router.php?controller=agendamentoConsulta&modo=NovaConsulta" method="post" enctype='multipart/form-data'>
               <div id="segura_form_preAtend">

                   <div class="barraTexto">
                     AGENDAR CONSULTA
                     <?php $_SESSION['Login']; ?>
                   </div>

                   <div class="seguraSelect">
                      <select required name="sltEspecialida" class="select" >
                          <option value="*">Especialidade</option>
                          <!-- faz require e abre while -->
                          <?php
                          require_once($voltaDois.'controllers/especialidade_controller.php');
                          require_once($voltaDois.'models/especialidade_class.php');

                          $controller_esp = new controllerEspecialidade();
                          //chama metodo para listar os registros
                          $listEsp = $controller_esp->SelecionarEspecialidade();

                           $contEsp = 0;

                          while ($contEsp < count($listEsp)) {
                        ?>
                          <!-- option -->
                          <option value="<?php echo($listEsp[$contEsp]->idEspecialidade); ?>">
                            <?php echo($listEsp[$contEsp]->especialidade); ?>
                          </option>
                          <!-- fecha while -->
                           <?php
                            $contEsp += 1;
                          }
                        ?>
                      </select>
                  </div>

                  <div class="seguraSelect">
                     <select required name="sltData" class="select" >
                         <option value="*">Data</option>
                         <option value="02/08/2018">02/08/2018</option>
                         <option value="02/09/2018">02/09/2018</option>
                         <option value="02/11/2018">02/11/2018</option>
                         <option value="02/12/2018">02/12/2018</option>
                     </select>
                 </div>

                  <div class="seguraSelect">
                      <select required name="sltHora" class="select" >
                          <option value="">Hora</option>
                          <?php
                          require_once($voltaDois.'controllers/hora_controller.php');
                          require_once($voltaDois.'models/hora_class.php');

                          $controller_hora = new controllerHora();
                          //chama metodo para listar os registros
                          $listHora = $controller_hora->SelecionarHora();

                           $contHora = 0;

                          while ($contHora < count($listHora)) {
                        ?>
                        <!-- option -->
                        <option value="<?php echo($listHora[$contHora]->hora); ?>">
                          <?php echo($listHora[$contHora]->hora); ?>
                        </option>
                        <!-- fecha while -->
                         <?php
                          $contHora += 1;
                        }
                      ?>
                      </select>
                  </div>

                   <div class="barraTxt">
                        <input type="submit" name="btnSalvar" value="AGENDAR" id="botaoForm">
                   </div>
               </div>
            </form>

            <div id="segura_select">
              <div class="barraTexto">
                Consultas Agendadas
               </div>

               <div class="segura_form_contatos">
                         <div class="linhaContato">
                             <div class="campoId">#</div>
                             <div class="campoNeutro">Data</div>
                             <div class="campoNeutro">Hora</div>
                             <div class="campoNeutro">Paciente</div>
                             <div class="campoNeutro">especialidade</div>
                             <div class="campoNeutroDir">Opções</div>
                         </div>
         								<!-- Select do banco -->
         									<?php

         									require_once($voltaDois.'router.php');
         									require_once($voltaDois.'controllers/agendamentoConsulta_controller.php');
         									require_once($voltaDois.'models/agendamentoConsulta_class.php');

         									$controller_Curriculo = new agendamentoConsulta();
         									//chama metodo para listar os registros
         									$list = $controller_Curriculo::Select();

         									$cont = 0;


         									while ($cont < count($list))
         									{
         									?>
         		                <div class="linhaContato">
         		                    <div class="campoIdSelect"><?php echo($list[$cont]->idAgendaConsulta); ?></div>
         		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->data); ?></div>
         		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->hora); ?></div>
         		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->nome); ?></div>
         		                    <div class="campoNeutroSelect"><?php echo($list[$cont]->especialidade); ?></div>
         		                    <div class="campoNeutroSelect">

     		                        <div class="optionSelectDir">
     		                            <a  href="<?php echo $voltaDois ?>router.php?controller=agendamentoConsulta&modo=excluirConsulta&id=<?php echo($list[$cont]->idAgendaConsulta); ?>" alt="Deletar Consulta"
                                      onClick="return confirm('Deseja realmente exluir a sua consulta?')";>
     		                                excluir
     		                            </a>
                                    <a href="cartao.php?id=<?php echo($list[$cont]->idAgendaConsulta); ?>">Pagar</a>
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

            </div>
        </div>


    </main>

    <?php include("footer.php"); ?>

  </body>
</html>
