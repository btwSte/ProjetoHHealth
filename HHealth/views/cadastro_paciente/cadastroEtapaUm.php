<?php
  require_once('../../variaveis.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/style.css">
        <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/normalize.css">
        <script src="<?php echo $voltaDois; ?>js/jquery.js"></script>
        <script src="<?php echo $voltaDois; ?>js/modernizr.min.js"></script>
        <script type="text/javascript" src="<?php echo $voltaDois; ?>js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="<?php echo $voltaDois; ?>/js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="<?php echo $voltaDois; ?>js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo $voltaDois; ?>js/jquery.zebra-datepicker.js"></script>
        <title>Cadastro de Paciente</title>
<script>




  $(document).ready(function(){
    $("#etapa2").hide();
    $("#etapa3").hide();

    $("#envio1").click(function(){
        $("#etapa2").show();
        $("#etapa1").hide();

    });
    $("#envio2").click(function(){
        $("#etapa3").show();
        $("#etapa2").hide();

    });
  });


</script>

    </head>
    <body>
        <header>


        </header>
        <main>

            <form name="frmCadastroPaciente"  action="<?php echo $voltaDois; ?>router.php?controller=paciente" method="post" enctype='multipart/form-data'>
              <div class="segura_form" id="etapa1">
                      <div class="barraTituloFormulario">
                          CADASTRO DE PACIENTE
                      </div>
                      <div class="barraEtapaFormulario"> Etapa 1 / 3 </div>

                      <div class="barraInformacaoFormularioInter">Nome</div>
                      <div class="barraInputFormularioFirst">
                          <input type="text"  placeholder="" name="txtNome" value="" maxlength="255" class="inputMax">
                      </div>

                      <div class="barraInformacaoFormularioLeft">Data de Nascimento</div>

                      <div class="barraInformacaoFormularioRight">Estado Civil</div>

                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                            <input type="text"  placeholder="00/00/0000" name="txtDtnasc" value="" maxlength="11" class="inputRedux" >
                          </div>

                          <div class="barraSemiImputDuos">
                              <select name="sltEstadoCivil" class="select" required>
                                  <option value="*" required>Estado Civil</option>

                                  <?php
                                  require_once($voltaDois.'router.php');
                                  require_once($voltaDois.'controllers/estadoCivil_controller.php');
                                  require_once($voltaDois.'models/estadoCivil_class.php');

                                  $controller_estadoCivil = new controllerEstadoCivil();
                                  //chama metodo para listar os registros
                                  $list = $controller_estadoCivil::Selecionar();

                                  $cont = 0;

                                  while ($cont < count($list)) {
                                ?>
                                  <option value="<?php echo($list[$cont]->idEstadoCivil); ?>">
                                    <?php echo($list[$cont]->estado); ?>
                                  </option>

                                  <?php
                                    $cont += 1;
                                  }
                                ?>
                              </select>
                          </div>
                      </div>

                      <div class="barraInformacaoFormularioLeft">Sexo</div>
                      <div class="barraInformacaoFormularioRight">Nacionalidade</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <select name="sltSexo">
                                  <option value="*">Sexo</option>
                                  <option value="1">Masculino</option>
                                  <option value="2">Feminino</option>
                              </select>
                          </div>
                          <div class="barraSemiImputDuos">
                              <select name="sltNacionalidade" class="select">
                                  <option value="*">Nacionalidade</option>
                                  <!-- faz require e abre while -->
                                  <?php
                                  require_once($voltaDois.'controllers/nacionalidade_controller.php');
                                  require_once($voltaDois.'models/nacionalidade_class.php');

                                  $controller_nacionalidade = new controllerNacionalidade();
                                  //chama metodo para listar os registros
                                  $listNacionalidade = $controller_nacionalidade::SelecionarNacionalidade();

                                  $contNacionalidade = 0;

                                  while ($contNacionalidade < count($listNacionalidade)) {
                                ?>
                                  <!-- option -->
                                  <option value="<?php echo($listNacionalidade[$contNacionalidade]->idNacionalidade); ?>">
                                    <?php echo($listNacionalidade[$contNacionalidade]->nacionalidade); ?>
                                  </option>
                                  <!-- fecha while -->
                                  <?php
                                    $contNacionalidade += 1;
                                  }
                                ?>

                              </select>
                          </div>
                      </div>

                      <div class="barraInformacaoFormularioLeft">N° do RG</div>
                      <div class="barraInformacaoFormularioRight">N° do CPF</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <input type="text"  placeholder="" name="txtRg" value="" maxlength="255" class="inputRedux">
                          </div>
                          <div class="barraSemiImputDuos">
                              <input type="text"  placeholder="" name="txtCpf" value="" maxlength="255" class="inputReduxRight">
                          </div>
                      </div>

                      <div class="barraInformacaoFormularioLeft">Telefone</div>
                      <div class="barraInformacaoFormularioRight">Celular</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <input type="tex"  placeholder="" name="txtTelefone" value="" maxlength="255" class="inputRedux"  id="telefone">
                          </div>
                          <div class="barraSemiImputDuos">
                              <input type="text"  placeholder="" name="txtCelular" value="" maxlength="255" class="inputReduxRight" id="celular">
                          </div>
                      </div>


                      <div class="barraInformacaoFormularioLeft">Email</div>
                      <div class="barraInformacaoFormularioRight">Senha</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <input type="text"  placeholder="" name="txtEmail" value="" maxlength="255" class="inputRedux">
                          </div>
                          <div class="barraSemiImputDuos">
                              <input type="password"  placeholder="" name="txtSenha" value="" maxlength="255" class="inputReduxRight">
                          </div>
                      </div>

                      <div class="barraBotaoFormulario" >
                        <a href="#" id="envio1" onclick="function()">Proximo</a>
                      </div>

              </div>

              <div class="segura_form" id="etapa2">
                      <div class="barraTituloFormulario">
                          CADASTRO DE PACIENTE
                      </div>
                      <div class="barraEtapaFormulario"> Etapa 2 / 3 </div>

                      <div class="barraInformacaoFormularioInter">CEP</div>

                      <div class="barraInputFormularioFirst">

                          <input type="text"  placeholder="" name="txtCep" value="" maxlength="255" class="inputMax">
                      </div>

                      <div class="barraInformacaoFormularioInter">Endereço</div>
                      <div class="barraInputFormularioFirst">

                          <input type="text"  placeholder="" name="txtLogradouro" value="" maxlength="255" class="inputMax">
                      </div>

                      <div class="barraInformacaoFormularioLeft">Cidade</div>
                      <div class="barraInformacaoFormularioRight">Estado</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <select name="sltCidade">
                                  <option value="*">Cidade</option>
                                  <option value="1">Barueri</option>
                                  <option value="2">Itapevi</option>
                              </select>
                          </div>
                          <div class="barraSemiImputDuos">
                              <select name="sltEstado">
                                  <option value="*">Estado</option>
                                  <option value="1">SP</option>
                                  <option value="2">RJ</option>
                              </select>
                          </div>
                      </div>

                      <div class="barraInformacaoFormularioLeft">Numero</div>
                      <div class="barraInformacaoFormularioRight">Bairro</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <input type="tex"  placeholder="" name="txtNum" value="" maxlength="255" class="inputRedux">
                          </div>
                          <div class="barraSemiImputDuos">
                              <input type="text"  placeholder="" name="txtBairro" value="" maxlength="255" class="inputReduxRight">
                          </div>
                      </div>

                      <div class="barraInformacaoFormularioLeft">Plano de Convenio</div>
                      <div class="barraInformacaoFormularioRight"> Tipo Sanguineo</div>
                      <div class="barraInputFormularioDuo">
                          <div class="barraSemiImputDuos">
                              <select name="sltConvenio">
                                  <option value="*">Convênio</option>
                                  <!-- faz require e abre while -->
                                  <?php
                                  require_once($voltaDois.'controllers/convenio_controller.php');
                                  require_once($voltaDois.'models/convenio_class.php');

                                  $controller_convenio = new controllerConvenio();
                                  //chama metodo para listar os registros
                                  $listConvenio = $controller_convenio::SelecionarConvenioAtivo();

                                  $contConvenio = 0;

                                  while ($contConvenio < count($listConvenio)) {
                                ?>
                                <!-- option -->
                                <option value="<?php echo($listConvenio[$contConvenio]->idConvenio); ?>">
                                  <?php echo($listConvenio[$contConvenio]->nome); ?>
                                </option>
                                <!-- fecha while -->
                                <?php
                                  $contConvenio += 1;
                                }
                              ?>
                              </select>
                          </div>
                          <div class="barraSemiImputDuos">
                            <select name="sltTipoSanguineo">
                                <option value="*">Tipo Sanguíneo</option>

                                <!-- faz require e abre while -->
                                <?php
                                require_once($voltaDois.'controllers/tipoSanguineo_controller.php');
                                require_once($voltaDois.'models/tipoSanguineo_class.php');

                                $controller_tipoSanguineo = new controllerTipoSanguineo();
                                //chama metodo para listar os registros
                                $listTipoSanguineo = $controller_tipoSanguineo::SelecionarTipoSanguineo();

                                $contTipoSanguineo = 0;

                                while ($contTipoSanguineo < count($listTipoSanguineo)) {
                              ?>
                                <option value="<?php echo($listTipoSanguineo[$contTipoSanguineo]->idTipoSanguineo); ?>">
                                  <?php echo($listTipoSanguineo[$contTipoSanguineo]->tipo); ?>
                                </option>

                                <!-- fecha while -->
                                <?php
                                  $contTipoSanguineo += 1;
                                }
                              ?>
                            </select>
                          </div>
                      </div>

                      <div class="barraBotaoFormulario" >
                        <a href="#" id="envio2" onclick="function()">Proximo</a>

                      </div>
              </div>
              <div class="segura_form" id="etapa3">
                      <div class="barraTituloFormulario">
                          CADASTRO DE PACIENTE
                      </div>
                      <div class="barraEtapaFormulario"> Etapa 3 / 3 </div>

                      <!-- RG -->
                      <div class="barraInputFormularioDuo">
                          <div class="barraInformacaoFormularioLeft">Anexar foto RG</div>
                      </div>
                      <div  class="inputFile">
                          <input type="file" name="imagem_rg"  size="16" placeholder="oi"/>
                      </div>
                      <!-- CPF -->
                     <div class="barraInputFormularioDuo">
                          <div class="barraInformacaoFormularioLeft">Anexar foto CPF</div>
                      </div>
                      <div  class="inputFile">
                          <input type="file" name="imagem_cpf"  size="16" placeholder="oi"/>
                      </div>
                      <!-- DEFINIR -->
                      <div class="barraInputFormularioDuo">
                          <div class="barraInformacaoFormularioLeft">Anexar foto cartão convenio </div>
                      </div>
                      <div  class="inputFile">
                          <input type="file" name="imagem_cartConvenio"  size="16" placeholder="oi"/>
                      </div>
                      <!-- DEFINIR -->
                      <div class="barraInputFormularioDuo">
                          <div class="barraInformacaoFormularioLeft">Foto paciente</div>
                      </div>
                      <div  class="inputFile">
                          <input type="file" name="foto_paciente"  size="16" placeholder="oi"/>
                      </div>
                      <!--BTN -->
                      <div class="barraBotaoFormulario">
                          <button type="submit" name="btnEtapa" value="Enviar">ENVIAR</button>
                      </div>
              </div>
            </form>
        </main>

    </body>
</html>
