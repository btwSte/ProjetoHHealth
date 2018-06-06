<?php
  require_once('../../variaveis.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sobre - HHealth</title>
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/normalize.css">
    <script src="<?php echo $voltaDois; ?>js/jquery.js"></script>
    <script src="<?php echo $voltaDois; ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <div id="principal_sobre">
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
          require_once($entraPortal.'controllers/cmsSobre_controller.php');
          require_once($entraPortal.'models/sobre_class.php');
          require_once($entraPortal.'models/sobre_cabecalho_class.php');

          $controller_sobre = new controllerCmsSobre();
          //chama metodo para listar os registros
          $list = $controller_sobre::SelecionarCabecalhoAtivo();

          $cont = 0;

          while ($cont < count($list)) {

         ?>

        <div id="imagem_titulo">
          <h1> <?php echo($list[$cont]->tituloFoto); ?> </h1>
          <img src="http://www.portalhealth.local.br/<?php echo $list[$cont]->fotoCabecalho; ?>" alt="background Informações">
        </div>
          <div id="titulo_sobre">
            <h1><?php echo($list[$cont]->tituloPagina); ?></h1>
          </div>

          <?php
              $cont += 1;
            }
          ?>

          <div id="segura_texto_imagem_sobre">
          <?php
            $controller_sobre = new controllerCmsSobre();
            //chama metodo para listar os registros
            $listConteudo = $controller_sobre::SelecionarConteudoAtivo();

            $contConteudo = 0;

            while ($contConteudo < count($listConteudo)) {
          ?>

            <div id="texto_sobre">
              <p> <?php echo($listConteudo[$contConteudo]->textoSobre); ?></p>
            </div>
            <div id="img_sobre">
              <img src="http://www.portalhealth.local.br/<?php echo($listConteudo[$contConteudo]->fotoSobre); ?>" alt="#">
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
