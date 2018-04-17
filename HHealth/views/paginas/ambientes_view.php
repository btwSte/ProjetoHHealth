<?php
  require_once('../../variaveis.php');


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ambientes - HHealth</title>
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
          require_once($entraPortal.'controllers/cmsAmbientes_controller.php');
          require_once($entraPortal.'models/ambientes_class.php');

          $controller_procedimentos = new controllerCmsAmbientes();
          //chama metodo para listar os registros
          $list = $controller_procedimentos::SelecionarCabecalhoAtivo();

          $cont = 0;

          while ($cont < count($list)) {

         ?>
        <div id="imagem_titulo">
          <h1><?php echo($list[$cont]->tituloFoto); ?></h1>
          <img src="<?php echo $entraPortal.$list[$cont]->fotoCabecalho; ?>" alt="background Informações">
        </div>

        <?php
            $cont += 1;
          }
        ?>

        <div class="container_item_amb">

          <?php
            $controller_procedimentos = new controllerCmsAmbientes();
            //chama metodo para listar os registros
            $listConteudo = $controller_procedimentos::SelecionarConteudoAtivo();

            $contConteudo = 0;

            while ($contConteudo < count($listConteudo)) {
          ?>

          <div class="item_amb">
            <img src="<?php echo($entraPortal.$listConteudo[$contConteudo]->fotoConteudoAmbiente); ?>" alt="#">
            <div class="item_zoom">
              <p><?php echo($listConteudo[$contConteudo]->textoConteudoAmbiente); ?></p>
            </div>
          </div>

          <?php
              $contConteudo +=1;
            }
          ?>
        </div>
      </main>
      <div id="container_footer">
        <?php require_once('footer.php'); ?>
      </div>
    </div>
  </body>
</html>
