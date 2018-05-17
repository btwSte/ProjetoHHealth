<?php


  require_once('func.php');


/*Verifica se o batao de deslogar existe e chama a função para deslogar o usuario*/
if (isset($_POST['deslogar'])) {
  deslogar();
}

 ?>
<header>
    <div id="logo">
      <a href="cmsHome_view.php"> <img src="imagens/hhealth.png" alt="logo"> </a>
    </div>
    <!--menu -->
    <div class="Titulo">
        Administrativo
    </div>
    <div class="Editar_crud">
      <form class="" method="post">
        <input type="submit" name="deslogar" value="Deslogar" id="logout" >
      </form>

    </div>
</header>
