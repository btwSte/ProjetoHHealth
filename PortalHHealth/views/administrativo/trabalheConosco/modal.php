<?php

 include("../../../variaveis.php");

	$id = $_POST['id'];

  require_once($voltaTres.'router.php');
  require_once($voltaTres.'controllers/admTrabalheConosco_controller.php');
  require_once($voltaTres.'models/trabalheconosco_class.php');

  $controller_curriculo = new controllerCurriculo();
  //chama metodo para listar os registros
  $list = $controller_curriculo::selectCurriculoByID();






?>
<html>
	<head>
		<title> Teste Modal </title>
	</head>

	<script>
$(document).ready(function() {

  $(".fechar").click(function() {
    //$(".modalContainer").fadeOut();
	$(".modalContainer").slideToggle(100);
  });
});

	</script>

<body>
    <form>
        <div id="barraIcone">
            <div id="btnClose">
                <a href="#" class="fechar">
                    <img src="<?php echo $voltaTres; ?>imagens/iconeFechar.png" alt="Fechar" /><!-- Icone Para Visualizar a Selecionada -->
                </a>
            </div>
            <div id="txtTitulo">
                Curriculos enviados
            </div>
        </div>
        <div>
            <?php
              if (isset($list)) {

              }
            ?>
          <span style="color:#fff;"> ID: <?php echo($id); ?></span>
            <div  class="campoTexto">
                <div class="campoEsqTexto">Nome</div>
                <div class="campoDirTexto"><?php echo($list->nome); ?></div>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Telefone</div>
                <div class="campoDirTexto"><?php echo($list->celular); ?></div>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Celular</div>
                <div class="campoDirTexto"><?php echo($list->email); ?></div>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Profissão</div>
                <div class="campoDirTexto"><?php echo($list->profissao); ?></div>
            </div>


            <a href="<?php echo($entraHHealth.$list->curriculo); ?>">
                <div  class="campoBotao" >
                  Baixar curiculo
                </div>
            </a>


        </div>
    </form>
</body>
</html>
