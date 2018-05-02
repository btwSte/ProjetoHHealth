<?php
require_once('../../variaveis.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Convênios - HHealth</title>
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/normalize.css">
    <script src="<?php echo $voltaDois; ?>js/jquery.js"></script>
    <script src="<?php echo $voltaDois; ?>js/modernizr.min.js"></script>
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
        <?php
          require_once($entraPortal.'router.php');
          require_once($entraPortal.'controllers/cmsConvenio_controller.php');
          require_once($entraPortal.'models/convenio_class.php');
          require_once($entraPortal.'models/convenio_cabecalho_class.php');

          $controller_convenio = new controllerCmsConvenio();
          //chama metodo para listar os registros
          $list = $controller_convenio::SelecionarCabecalhoAtivo();

          $cont = 0;

          while ($cont < count($list)) {
        ?>
        <div id="imagem_titulo">
          <h1><?php echo($list[$cont]->tituloPagina); ?></h1>
          <img src="<?php echo $entraPortal.$list[$cont]->fotoPrincipal; ?>" alt="background Informações">
        </div>

        <?php
          $cont +=1;
          }
        ?>
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
            <?php
              $controller_convenio = new controllerCmsConvenio();
              //chama metodo para listar os registros
              $listConteudo = $controller_convenio::SelecionarConteudoAtivo();

              $contConteudo = 0;

              while ($contConteudo < count($listConteudo)) {
                if ($contConteudo%2 ==0)
                  $cor = 'prod';
                else
                  $cor = 'prod2'

            ?>
            <div class="div_linha_<?php echo $cor; ?>">
              <div class="item_convenio"> <?php echo($listConteudo[$contConteudo]->nome); ?></div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
            </div>

            <?php
                $contConteudo +=1;
              }
            ?>
            <!-- <div class="div_linha_prod2">
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
              <div class="item_convenio"> Teste </div>
            </div> -->
          </div>
        </div>
      </main>
      <div id="container_footer">
        <?php require_once('footer.php'); ?>
      </div>
    </div>

  </body>
</html>
