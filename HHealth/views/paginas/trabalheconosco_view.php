<?php
require_once('../../variaveis.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trabalhe Conosco - HHealth</title>
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/normalize.css">
    <script src="<?php echo $voltaDois; ?>js/jquery.js"></script>
    <script src="<?php echo $voltaDois; ?>js/modernizr.min.js"></script>
    <script src="<?php echo $voltaDois; ?>js/mascara.min.js"></script>

  </head>
  <body>
    <div id="principal_trabalhe_conosco">
      <header>
        <div id="container_menu">
          <?php require_once('menu.php'); ?>
        </div>
      </header>
      <main>
        <div id="segura">

        </div>

        <div id="imagem_titulo">
          <h1>Trabalhe Conosco</h1>
          <img src="../../imagens/slide2.jpg" alt="background Informações">
        </div>

        <div id="segura_form_tbc">
          <form class="trabalhe_conosco" action="../../router.php?controller=trabalheConosco" method="post" enctype='multipart/form-data'>
            <div id="tit">
              <p>Envie seus dados:</p>
            </div>
              <div class="text">
                <input required onkeypress="return validar(event, 'number')" type="text" name="txtNome" value=""
                 placeholder="Nome:" pattern="[a-z A-Z ã Ã õ Õ é É í Í ô Ô ó Ó ç Ç]*" title="Digite apenas letras" maxlength="40" >
               </div>
              <div class="text">
                <input id="tel" placeholder="Telefone:" type="text" name="txtTelefone" value=""  maxlength="15"  onkeyup="mascara('(##) ####-####',this,event,true)">
              </div>
              <div class="text">
                <input id="cel" required placeholder="Celular" type="text" name="txtCelular" value="" maxlength="15" onkeyup="mascara('(##) #####-####',this,event,true)">
              </div>
              <div class="text">
                <input type="email" required placeholder="Email" name="txtEmail" value="" maxlength="40">
              </div>
              <div class="text">
                <input type="text" required placeholder="Profissão:" name="txtProfissao" value="" maxlength="40">
              </div>
              <div id="arq_tbc">
                <input type="file" name="Doc_curriculo"  size="16" />
              </div>
              <div id="btn_tbc">
                <input type="submit" name="btnEnviar" value="Enviar">
              </div>
          </form>
        </div>
      </main>
      <!--  Exemplo de exibição de conteudo pego do banco-->
       <?php  //echo  $info->conteudo; ?>
      <div id="container_footer">
        <?php require_once('footer.php'); ?>
      </div>
    </div>

  </body>
</html>
