<div id="segura_logo">
    <a href="index.php">
      <div id="logo">
         <img src="imagens/hhealth.png" alt="logo">
      </div>
    </a>
  </div>

   <button class="btn_menu"> <img src="../imagens/menu.png" alt="Menu"> </button>

  <nav class="menu">
    <a class="btn_close"><i class="fa fa-times">X</i></a>
    <ul>
      <li><a href="views/paginas/ambientes_view.php">Ambientes</a></li>
      <li><a href="views/paginas/contato_view.php">Contato</a></li>
      <li><a href="views/paginas/convenios_view.php">Convênios</a></li>
      <li><a href="views/paginas/informacoes_view.php">Informações</a></li>
      <li><a href="views/paginas/procedimentoExames_view.php">Procedimento de Exames</a></li>
      <li><a href="views/paginas/sobre_view.php">Sobre</a></li>
      <li><a href="views/paginas/trabalheConosco_view.php">Trabalhe Conosco</a></li>
      <li><a href="views/paginas/unidades_view.php">Unidades</a></li>
    </ul>
    <ul id="login_menu">
      <li> <a href="views/login_paciente/login_view.php">Login</a></li>
      <li> <a href="#c">Cadastro</a></li>
    </ul>
  </nav>

  <div class="login_cadastro">
    <div id="login">
      <a href="views/login_paciente/login_view.php"> <img src="imagens/login.png" alt="Login" title="Login"> </a>
    </div>
    <div id="borda">
    </div>
    <div id="cadastro">
      <a href="#"><img src="imagens/cadUsuario.png" alt="Cadastro de Usuário" title="Cadastre-se"> </a>
    </div>

  </div>


  <!-- jquery-->
  <script >

    $(".btn_menu").click(function() {
      $(".menu").show();
    });
    $(".btn_close").click(function() {
      $(".menu").hide();
    });
  </script>
