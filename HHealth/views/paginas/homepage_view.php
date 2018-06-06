<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home - HHealth</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/flexslider.css">
    <script src="js/jquery.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow|Catamaran" rel="stylesheet">


  </head>
  <body>
    <div id="principal_home">
      <header>
        <div id="container_menu">
          <?php require_once('views/menu.php'); ?>
        </div>
        <div id="segura">

        </div>


          <div id="container_video">
            <!-- <video autoplay loop class="bg_video">
              <source src="videos/bg.webm" type="video/webm">
               <source src="imagens/hh.mp4" type="video/mp4">
            </video> -->
            <div class="text_video animated bounceInLeft" >
                Aonde você for a rede <br>
              HHealth
                  estará cuidando de você
                <div id="linha_slid">

                </div>
            </div>

          </div>

      </header>
      <main>
        <!-- area conteudo -->
          <div id="segura_mvv">
            <div class="item_mvv">
              <img src="imagens/missao.png" alt="Missão">
               <h2>Missão</h2>
            <p>Promover o bem estar físico, psíquico e social do ser humano com profissionais qualificados e tecnologia atualizada, buscando atingir a excelência no atendimento, ensino e pesquisa.</p>
            </div>
            <div class="item_mvv">
              <img src="imagens/visao.png" alt="Visão">
              <h2>Visão</h2>
              <p>Ser reconhecida pela excelência no atendimento, ensino,  pesquisa e gestão em saúde.</p>
            </div>
            <div class="item_mvv">
              <img src="imagens/valores.png" alt="Valores">
              <h2>Valores</h2>
              <p> Respeito ao ser humano, ensino e pesquisa, valorização dos colaboradores, atendimento humanizado e excelência profissional.</p>
            </div>
          </div>
          <!-- Background Menu Rapido -->
          <div class="bg_menu_rapido">
            <div id="segura_menu_rapido">
              <div class="item_menu_rapido">
                <a href="#">  <img src="imagens/icon-conv.png" alt="Convênios"></a>
                <h3>Convênios</h3>
              </div>
              <div class="item_menu_rapido">
                <a href="#">  <img src="imagens/icon-exam.png" alt="Procedimento de Exames"></a>
                <h3>Procedimento de Exames</h3>
              </div>
              <div class="item_menu_rapido">
                <a href="#"> <img src="imagens/icon-info.png" alt="Informações"> </a>
                <h3>Informações</h3>
              </div>
              <div class="item_menu_rapido">
                <a href="#"> <img src="imagens/icon-uni.png" alt="Ambientes"> </a>
                <h3>Ambientes</h3>
              </div>
            </div>
          </div>
        <div id="segura_imagem_home">
          <!-- <img src="imagens/1.jpg" alt="Médica"> -->
        </div>
        <div id="text_unid">
          <h1>Nossas Unidades</h1>
        </div>

        <div id="container_unidades">
			<div id="container">
			<div class="slider-holder">
				<span id="slider-image-1"></span>
				<span id="slider-image-2"></span>
				<div class="image-holder">
					<img src="imagens/hospital-1.jpg" class="slider-image" />
					<img src="imagens/hospital-2.jpg" class="slider-image" />
					<img src="imagens/hospital-3.jpg" class="slider-image" />
					<img src="imagens/hospital-4.jpg" class="slider-image" />
					<img src="imagens/hospital-5.jpg" class="slider-image" />
				</div>

				<div class="button-holder">
					<a href="#slider-image-1" class="slider-change"></a>
					<a href="#slider-image-2" class="slider-change"></a>
				</div>
			</div>
		  </div>
        </div>

      </main>
      <div id="container_footer">
          <?php require_once('views/footer.php'); ?>
      </div>
    </div>
  </body>
</html>
