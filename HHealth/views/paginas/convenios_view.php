<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Convênios - HHealth</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/modernizr.min.js"></script>
  </head>
  <body>
    <div id="principal_informacao">
      <header>
        <div id="container_menu">
          <?php require_once('menu.php'); ?>
        </div>
      </header>
      <main>
        <div id="segura">

        </div>
        <div id="imagem_titulo">
          <h1>Convênios</h1>
          <img src="../../imagens/slide2.jpg" alt="background Informações">
        </div>
        <div id="container_conv">
          <div id="segura_pesquisa">
            <form class="" action="convenios" method="get">
              Pesquise pelo Convênio e Plano
              <input type="text" name="txtBusca" id="txtBusca" value="">
              <input type="submit" name="btnBuscar" value="Pesquisar"/>
            </form>
          </div>
          <div id="segura_planos">
            <div id="div_titulos">
              <div class="tit_convenio"> Convênio </div>
              <div class="tit_convenio"> Plano </div>
              <div class="tit_convenio"> Consultas/Exames </div>
              <div class="tit_convenio"> Pronto Socorro </div>
              <div class="tit_convenio"> Internação </div>
            </div>
            <div class="div_linha_prod">
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
            </div>
            <div class="div_linha_prod2">
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
            </div>
            <div class="div_linha_prod">
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
            </div>
            <div class="div_linha_prod2">
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
            </div>
          </div>
        </div>
      </main>
      <div id="container_footer">
        <?php require_once('footer.php'); ?>
      </div>
    </div>

  </body>
</html>
