<?php
  require_once('../../../variaveis.php');
	$id = $_POST['id'];
  require_once($voltaTres.'router.php');
  require_once($voltaTres.'controllers/cmsContato_controller.php');
  require_once($voltaTres.'models/contato_class.php');

  $controller_contatos = new controllerContato();
  //chama metodo para listar os registros
  $list = $controller_contatos::selectContatoByID();

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
                Visualizar Mensagens
            </div>
        </div>
        <div>
            <?php
              if (isset($list)) {

              }
            ?>
            <div id="invi">
              ID: <?php echo($id); ?>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Nome</div>
                <div class="campoDirTexto"><?php echo($list->nome); ?></div>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Telefone</div>
                <div class="campoDirTexto"><?php echo($list->telefone); ?></div>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Celular</div>
                <div class="campoDirTexto"><?php echo($list->celular); ?></div>
            </div>

            <div  class="campoTexto">
                <div class="campoEsqTexto">Email</div>
                <div class="campoDirTexto"><?php echo($list->email); ?></div>
            </div>

            <div  class="campoTexto">
                <style>
                    .campoEsqContato{background-color: #6bb27d;color: #fff;}
                    .campoDirContato{background-color: #6bb27d;color: #fff;}
                </style>
                <div class="campoEsqContato">Sugestão</div>
                <div class="campoDirContato">Critica</div>
            </div>

            <div  class="campoMensagem">
                <?php echo($list->texto); ?>
            </div>

        </div>
    </form>
</body>
</html>
