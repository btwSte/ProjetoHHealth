<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contato - HHealth</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/modernizr.min.js"></script>
  </head>
  <body>
    <div id="principal_contato">
      <header>
        <div id="container_menu">
        <?php require_once('menu.php'); ?>
        </div>
      </header>
      <main>
        <div id="segura">

        </div>
        <div id="imagem_titulo">
          <h1>Contato</h1>
          <img src="../../imagens/slide2.jpg" alt="background Informações">
        </div>
        <div id="titulo_contato">
          <h1>Titulo Contato</h1>
        </div>
        <div id="segura_form_contato">
          <form class="contato" action="../../router.php?controller=Contato" method="post">
            <div id="tit">
              <p>Envie sua Sugestão ou Crítica:</p>
            </div>
            <div class="text">
              <input required onkeypress="return validar(event, 'number')" type="text" name="txtNome" value=""
               placeholder="Nome:" pattern="[a-z A-Z ã Ã õ Õ é É í Í ô Ô ó Ó ç Ç]*" title="Digite apenas letras" maxlength="100">
             </div>
            <div class="text">
              <input id="tel" placeholder="Telefone:" type="text" name="txtTelefone" value=""  maxlength="15">
            </div>
            <div class="text">
              <input id="cel" required placeholder="Celular" type="text" name="txtCelular" value="" maxlength="16">
            </div>
            <div class="text">
              <input type="email" required placeholder="Email" name="txtEmail" value="" maxlength="100">
            </div>
            <div class="rdo">
              <input type="radio" name="cs" value="S"> <span>Sugestão </span>
              <input type="radio" name="cs" value="C"> <span>Crítica </span>
            </div>
            <div class="textarea">
              <textarea name="sugestaocritica"  rows="4"  class="textarea" maxlength="600"></textarea>
            </div>
            <div id="btn_sc">
              <input type="submit" name="btnEnviar" value="Enviar">
          </form>

        </div>

        <div id="chat">

        </div>
      </main>
      <div id="container_footer">
        <?php require_once('footer.php'); ?>
      </div>
    </div>
  </body>
</html>
