<?php
require_once('../../variaveis.php');
session_start();
 ?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <title>Login Paciente</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $voltaDois; ?>css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $voltaDois; ?>css/Frajola.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $voltaDois; ?>css/styleLogin.css">
        <link rel="stylesheet" type="text/javascript"  href="<?php echo $voltaDois; ?>js/script.js">
    </head>
    <body>
        <div id="back">
          <div class="backRight"></div>
          <div class="backLeft"></div>
        </div>

        <div id="slideBox">
          <div class="topLayer">
            <div class="right">
                <div class="containerLogo">
                 <img src="<?php echo $voltaDois; ?>imagens/hhealth.png" alt="Logo" width="100%" height="100%">
                </div>
              <div class="content">

                <form class="" action="<?php echo $voltaDois; ?>router.php?controller=loginPaciente&modo=logar" method="post">
                  <div class="form-groupDir">
                        <input type="text" name="cpf" value="" placeholder="CPF">
                  </div>
                    <div class="form-group">
                        <input type="password" name="senha" value="" placeholder="Senha">
                  </div>
                    <button type="submit" name="entrar" value="ENTRAR">ENTRAR</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
