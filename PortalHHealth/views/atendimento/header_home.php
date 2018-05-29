<?php
  require_once("../../variaveis.php");

  require_once($voltaDois.'func.php');


/*Verifica se o batao de deslogar existe e chama a função para deslogar o usuario*/
if (isset($_POST['deslogar'])) {
  deslogar();
}

 ?>
<header>
    <div id="logo">
      <a href="cmsHome_view.php"><img src="<?php echo $voltaDois; ?>imagens/hhealth.png" alt="logo"></a>

    </div>
    <!--menu -->
    <div class="Titulo">
        Atendimento do Paciente
    </div>
    <div class="Editar_crud">
      <form class="" method="post">
        <input type="submit" name="deslogar" value="Deslogar" id="logout" >
      </form>

    </div>
</header>
