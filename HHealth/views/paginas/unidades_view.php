<?php
  require_once('../../variaveis.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Unidades - HHealth</title>
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $voltaDois; ?>css/normalize.css">
    <script src=".<?php echo $voltaDois; ?>js/jquery.js"></script>
    <script src="<?php echo $voltaDois; ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <div id="principal_unidades">
      <header>
        <div id="container_menu">
          <?php require_once('menu.php'); ?>
        </div>
      </header>
      <main id='unidades'>
        <div id="segura">

        </div>
        <?php
          require_once($entraPortal.'router.php');
          require_once($entraPortal.'controllers/cmsUnidades_controller.php');
          require_once($entraPortal.'models/unidades_class.php');
          require_once($entraPortal.'models/unidade_cabecalho_class.php');
          require_once($entraPortal.'models_views/unidade_e_endereco_class.php');
          require_once($entraPortal.'models/bd_class.php');

          $controller_unidades = new controllerCmsUnidades();
          //chama metodo para listar os registros
          $list = $controller_unidades::SelecionarCabecalhoAtivo();

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

        <div class="segura_container_unidades">
          <?php
            $controller_unidades = new controllerCmsUnidades();
            //chama metodo para listar os registros
            $listConteudo = $controller_unidades::SelecionarConteudoAtivo();

            $contConteudo = 0;

            while ($contConteudo < count($listConteudo)) {
          ?>
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="<?php echo($entraPortal.$listConteudo[$contConteudo]->fotoUnidade); ?>" alt="Unidade de SP" title="Unidade de SP">
            </div>
            <div class="item_unidade_texto">
              <p><?php echo($listConteudo[$contConteudo]->logradouro); ?> - <?php echo($listConteudo[$contConteudo]->bairro); ?> - SP</p>
              <p><?php echo($listConteudo[$contConteudo]->email); ?></p>
              <p><?php echo($listConteudo[$contConteudo]->telefone); ?></p>
            </div>
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
