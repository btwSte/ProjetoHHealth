<?php

 include("../../../variaveis.php");
 session_start();

 $id = $_POST['id'];
 $_SESSION['idMedico'];

  // require_once($voltaTres.'router.php');
  // require_once($voltaTres.'controllers/admTrabalheConosco_controller.php');
  // require_once($voltaTres.'models/trabalheconosco_class.php');
 //
 //  $controller_curriculo = new controllerCurriculo();
 //  //chama metodo para listar os registros
 //  $list = $controller_curriculo::selectCurriculoByID();
 //
 //




?>
<html>
	<head>
		<title> Receita </title>

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

        <div id="barraIcone">
            <div id="btnClose">
                <a href="#" class="fechar">
                    <img src="<?php echo $voltaTres; ?>imagens/iconeFechar.png" alt="Fechar" /><!-- Icone Para Visualizar a Selecionada -->
                </a>
            </div>
            <div id="txtTitulo">
              Escrever Receita
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>


        <form class="frmCabecalhoConvenio" action="<?php echo ($voltaTres); ?>router.php?controller=" method="post" >



            <div class="text">
              <input id="tel" placeholder="Data:" type="text" name="txtData" value=""  maxlength="10" >
              <input id="tel" placeholder="Hora:" type="text" name="txtHora" value=""  maxlength="5" >
            </div>

            <div class="textarea">
              <textarea name="sugestaocritica" rows="4" class="textarea" maxlength="3000"></textarea>
              </div>
            <div id="btn_tbc">
              <input type="submit" name="btnEnviar" value="Salvar">
            </div>
        </form>


</body>
</html>
