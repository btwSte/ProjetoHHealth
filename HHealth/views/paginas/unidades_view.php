<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Unidades - HHealth</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/normalize.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/modernizr.min.js"></script>
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

        <div id="imagem_titulo">
          <h1>Unidades</h1>
          <img src="../../imagens/slide2.jpg" alt="background Informações">
        </div>

        <div class="segura_container_unidades">
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="../../imagens/hospital-5.jpg" alt="Unidade de SP" title="Unidade de SP">
            </div>
            <div class="item_unidade_texto">
              <p>Rua Donatário João de Barros - Salto - SP</p>
              <p>hhealth@hospital.com</p>
              <p>(11) 2515-2270</p>
            </div>
          </div>
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="../../imagens/hospital-1.jpg" alt="Unidade do RN" title="Unidade do RN"/>
            </div>
            <div class="item_unidade_texto">
              <p>Rua Carlos Antônio da Silva Neto - Natal - RN</p>
              <p>hhealth@hospital.com</p>
              <p>(84) 2920-5529</p>
            </div>
          </div>
        </div>
        <div class="segura_container_unidades">
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="../../imagens/hospital-4.jpg" alt="Unidade de GO" title="Unidade de GO" >
            </div>
            <div class="item_unidade_texto">
              <p>Quadra Quadra 20 - Águas Lindas de Goiás - GO</p>
              <p>hhealth@hospital.com</p>
              <p>(61) 2723-8593</p>
            </div>
          </div>
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="../../imagens/hospital-3.jpg" alt="Unidade de SC" title="Unidade de SC" >
            </div>
            <div class="item_unidade_texto">
              <p>Servidão Bartolomeu Manoel Pereira - Araranguá - SC</p>
              <p>hhealth@hospital.com</p>
              <p>(48) 2897-8089</p>
            </div>
          </div>
        </div>
        <div class="segura_container_unidades">
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="../../imagens/hospital-2.jpg" title="Unidade de SE" alt="Unidade de SE">
            </div>
            <div class="item_unidade_texto">
              <p>Rua Promotora Terezinha Santos- Aracaju - SE</p>
              <p>hhealth@hospital.com</p>
              <p>(79) 3542-2495</p>
            </div>
          </div>
          <div class="container_item_unidades">
            <div class="item_unidade_imagem">
              <img src="../../imagens/hospital-5.jpg" alt="Unidade de SP" title="Unidade de SP">
            </div>
            <div class="item_unidade_texto">
              <p>Rua Osvaldo Bacetti - Presidente Prudente - SP</p>
              <p> hhealth@hospital.com </p>
              <p> (18) 2836-4836 </p>
            </div>
          </div>
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
