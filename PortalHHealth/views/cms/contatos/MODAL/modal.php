<?php 
	$id = $_POST['id'];


?>
<html>
	<head> 
		<title> Teste Modal </title>
	</head>
	
	<script>
$(document).ready(function() {

  $(".fechar").click(function() {
    //$(".modalContainer").fadeOut();
	$(".modalContainer").slideToggle(1000);
  });
});
	
	</script>
	
<body>
    <form>
        <div id="barraIcone">
            <div id="btnClose">
                <a href="#" class="fechar">
                    <img src="imagens/iconeFechar.png" alt="Fechar" /><!-- Icone Para Visualizar a Selecionada -->
                </a>
            </div>
            <div id="txtTitulo">
                Visualizar Mensagens
            </div>
        </div>    
        <div>
            <?php
                $sql = "select * from ";
            ?>
            ID: <?php echo($id); ?>
            <div  class="campoTexto">
                <div class="campoEsqTexto">Nome</div>
                <div class="campoDirTexto"><!-- [SELECT AQUI > Nome] --></div>
            </div>
            
            <div  class="campoTexto">
                <div class="campoEsqTexto">Telefone</div>
                <div class="campoDirTexto"><!-- [SELECT AQUI > Telefone] --></div>
            </div>
            
            <div  class="campoTexto">
                <div class="campoEsqTexto">Celular</div>
                <div class="campoDirTexto"><!-- [SELECT AQUI > Celular] --></div>
            </div>
            
            <div  class="campoTexto">
                <div class="campoEsqTexto">Email</div> 
                <div class="campoDirTexto"><!-- [SELECT AQUI > Email] --></div>
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
                <!-- [SELECT AQUI > Mensagem] -->
            </div>
            
        </div>
    </form>
</body>
</html>