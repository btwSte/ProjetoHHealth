<?php
  require_once('../../../variaveis.php');

  session_start();
  #require_once("cms/conexao.php");

  /* Chama o arquivo que contem os funçoes*/
  require_once ($voltaTres."func.php");
  /*Chama a função para verificar se o usuario esta logado*/
  logar($_SESSION['LogCod']);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal HHealth - Visualizar Procedimentos</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $voltaTres; ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo $voltaTres; ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaDois."header.php"); ?>

    <script src="<?php echo $voltaTres; ?>js/classie.js"></script>
		<script src="js/photostack.js"></script>
		<script>
      [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );

  		new Photostack( document.getElementById( 'photostack-1' ), {
  			callback : function( item ) {
  				console.log(item)
  			}
  		} );

      new Photostack( document.getElementById( 'photostack-2' ), {
				callback : function( item ) {
					console.log(item)
				}
			} );

			new Photostack( document.getElementById( 'photostack-3' ), {
				callback : function( item ) {
					console.log(item)
				}
			} );
		</script>

    <div  id="opcao" class="button shrink">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
		</span>
    </div>

    <main>
      <?php include($voltaDois."menuLateral_view.php"); ?>

      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "270px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>
        
        <?php
        
        require_once($voltaTres.'router.php');
        require_once($voltaTres.'controllers/cmsHome_controller.php');
        require_once($voltaTres.'models/home_class.php');

        $controller_home = new controllerCmsHome();
        //chama metodo para listar os registros
        $listConteudo = $controller_home::ListarHome();

        $contConteudo = 0;

        while ($contConteudo < count($listConteudo)) {

       ?>
        
        <div class="seguraFormVisuHome">
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Logo</div>
                <div class="textoInfoHome">Imagem Cabeçalho</div>
                <div class="textoSliderHome">Texto Cabeçalho</div>
            </div>
            <div class="barraConteudoInfoHome">
                <div class="contInfoHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->fotoLogo); ?>" alt="Home">
                </div>
                <div class="contInfoHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->videoSlider); ?>" alt="Home">
                </div>
                <div class="contSliderHome">
                    <?php echo($listConteudo[$contConteudo]->textoSlider); ?>
                </div>
            </div>
            <br>
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Missão</div>
                <div class="textoInfoHome">Visão</div>
                <div class="textoSliderHome">Valores</div>
            </div>
            
            <div class="barraConteudoInfoHome">
                <div class="contInfoHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->fotoMissao); ?>" alt="Home">
                </div>
                <div class="contInfoHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->fotoVisao); ?>" alt="Home">
                </div>
                <div class="contInfoHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->fotoValores); ?>" alt="Home">
                </div>
            </div>
            <div class="barraConteudoValoresHome">
                <div class="contValoresHome">
                    <?php echo($listConteudo[$contConteudo]->textoMissao); ?>
                </div>
                <div class="contValoresHome">
                    <?php echo($listConteudo[$contConteudo]->textoVisao); ?>
                </div>
                <div class="contValoresHome">
                    <?php echo($listConteudo[$contConteudo]->textoValores); ?>
                </div>
            </div>
            
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Imagem Fundo</div>
            </div>            
            <div class="barraConteudoInfoHome">
                <div class="contImgFundoHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->fotoFundo); ?>" alt="Home">
                </div>
            </div>
                        
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Rodapé do Site</div>
            </div>            
            
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Redes Socias (Icones)</div>
            </div>
            <div class="barraRedeInfoHome">
                <div class="contRedeHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->redeSocialUm); ?>" width="50px" height="50px" alt="Home">
                </div>
                <div class="contDescRedeHome">
                    <?php echo($listConteudo[$contConteudo]->textoLinkUm); ?>
                </div>
            </div>
            <div class="barraRedeInfoHome">
                <div class="contRedeHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->redeSocialDois); ?>" width="50px" height="50px" alt="Home">
                </div>
                <div class="contDescRedeHome">
                    <?php echo($listConteudo[$contConteudo]->textoLinkDois); ?>
                </div>
            </div>
            <div class="barraRedeInfoHome">
                <div class="contRedeHome">
                    <img src="<?php echo($voltaTres.$listConteudo[$contConteudo]->redeSocialTres); ?> " width="50px" height="50px" alt="Home">
                </div>
                <div class="contDescRedeHome">
                    <?php echo($listConteudo[$contConteudo]->textoLinkTres); ?>
                </div>
            </div>
            
            
            <div class="">
                
                <!-- Botao Para Deletar Essa Configuração do Banco-->
                <a href="<?php echo $voltaTres; ?>router.php?controller=cmsHome&modo=excluirhome&id=<?php echo($listConteudo[$contConteudo]->idPaginaHome); ?>">DELETAR</a>
                
                <div class="alinhaBtnRight">  
                    <!-- Div Disponivel Para o Icone Indicador de Ativo/Desativado -->
                    <div class="iconeAtivo"></div>
                    <!-- Botao Para Enviar Essa Configuração para o Banco-->
                    <a href="<?php echo $voltaTres; ?>router.php?controller=cmsHome&modo=buscarhome&id=<?php echo($listConteudo[$contConteudo]->idPaginaHome); ?>">EDITAR</a>         
                </div>  
                  
            </div>
             
        </div>
        <?php
            $contConteudo += 1;
            }
            ?> 
        
    </main>
  </body>
</html>
