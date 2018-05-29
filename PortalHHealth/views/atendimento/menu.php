
  <div id="segura_logo">
    <a href="<?php  echo RAIZ; ?>">
      <div id="logo">
         <img src="<?php  echo RAIZ; ?>imagens/hhealth.png" alt="logo">
      </div>
    </a>
  </div>

   <button class="btn_menu"> <img src="<?php  echo RAIZ; ?>imagens/menu.png" alt="Menu"> </button>

  <nav class="menu">
    <a class="btn_close"><i class="fa fa-times">X</i></a>
    <ul>
      <li><a href="home/ambientes">Ambientes</a></li>
      <li><a href="home/contato">Contato</a></li>
      <li><a href="home/convenios">Convênios</a></li>
    </ul>
  </nav>

  <div class="login_cadastro">
    <div id="login">
      <a href="home/login"> <img src="imagens/login.png" alt="Login"> </a>
    </div>
    <div id="borda">
    </div>
    <div id="cadastro">
      <a href="#"><img src="imagens/cadUsuario.png" alt="Cadastro de Usuário"> </a>
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
