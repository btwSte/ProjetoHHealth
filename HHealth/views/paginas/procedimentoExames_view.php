<?php
  require_once('../../variaveis.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Procedimento de Exames - HHealth</title>
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
          require_once($entraPortal.'controllers/cmsProcedimentos_controller.php');
          require_once($entraPortal.'models/procedimentos_class.php');
          require_once($entraPortal.'models/procedimentos_cabecalho_class.php');

          $controller_procedimentos = new controllerCmsProcedimentos();
          //chama metodo para listar os registros
          $list = $controller_procedimentos::SelecionarCabecalhoAtivo();

          $cont = 0;

          while ($cont < count($list)) {

         ?>

        <div id="imagem_titulo">
          <h1><?php echo($list[$cont]->tituloFoto); ?></h1>
          <img src="<?php echo $entraPortal.$list[$cont]->fotoCabecalho; ?>" alt="background Informações">
        </div>
          <div id="texto_info">
            <h1><?php echo($list[$cont]->tituloCabecalho); ?></h1>
          </div>
          <?php
              $cont += 1;
            }
          ?>



          <?php
            $controller_procedimentos = new controllerCmsProcedimentos();
            //chama metodo para listar os registros
            $listConteudo = $controller_procedimentos::SelecionarConteudoAtivo();

            $contConteudo = 0;

            while ($contConteudo < count($listConteudo)) {
          ?>
          <div id="segura_img_info">
          <div class="img_info">
            <img src="<?php echo($entraPortal.$listConteudo[$contConteudo]->fotoProcedimento); ?>" alt="Informação">
          </div>
          <div class="info">
            <h2><?php echo($listConteudo[$contConteudo]->tituloProcedimento); ?></h2>
            <p><?php echo($listConteudo[$contConteudo]->textoProcedimento); ?></p>
          </div>
        </div>
        <?php
            $contConteudo +=1;
          }
        ?>
      </main>
      <!--  Exemplo de exibição de conteudo pego do banco-->
       <?php  //echo  $info->conteudo; ?>
      <div id="container_footer">
        <?php require_once('footer.php'); ?>
      </div>
    </div>

  </body>
</html>
