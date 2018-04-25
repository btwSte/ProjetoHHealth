<?php
  require_once('../../variaveis.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Informações - HHealth</title>
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/normalize.css">
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
          require_once($entraPortal.'controllers/cmsInformacoes_controller.php');
          require_once($entraPortal.'models/informacoes_class.php');
          require_once($entraPortal.'models/informacoes_cabecalho_class.php');

          $controller_procedimentos = new controllerCmsInformacoes();
          //chama metodo para listar os registros
          $list = $controller_procedimentos::SelecionarCabecalhoAtivo();

          $cont = 0;

          while ($cont < count($list)) {

         ?>

        <div id="imagem_titulo">
          <h1><?php echo($list[$cont]->tituloFoto); ?></h1>
          <img src="<?php echo $entraPortal.$list[$cont]->foto; ?>" alt="background Informações">
        </div>
          <div id="texto_info">
            <h1><?php echo($list[$cont]->tituloPagina); ?></h1>
          </div>

          <?php
              $cont += 1;
            }
          ?>

        <div id="segura_img_info">
          <?php
            $controller_procedimentos = new controllerCmsInformacoes();
            //chama metodo para listar os registros
            $listConteudo = $controller_procedimentos::SelecionarConteudoAtivo();

            $contConteudo = 0;

            while ($contConteudo < count($listConteudo)) {
          ?>
          <div class="img_info">
            <img src="<?php echo($entraPortal.$listConteudo[$contConteudo]->fotoAssunto); ?>" alt="Informação">
          </div>
          <div class="info">
            <p><?php echo($listConteudo[$contConteudo]->textoAssunto); ?></p>
          </div>

          <?php
              $contConteudo +=1;
            }
          ?>

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
