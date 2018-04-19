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
		<script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaDois."header.php"); ?>

    <script src="js/classie.js"></script>
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

        <div class="seguraFormVisuHome">
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Logo</div>
                <div class="textoInfoHome">Slider</div>
                <div class="textoSliderHome">Texto Slider</div>
            </div>
            <div class="barraConteudoInfoHome">
                <div class="contInfoHome"><!--Bora Começar, Aqui vai a Imagem do logo --></div>
                <div class="contInfoHome"><!-- Slider Atual --></div>
                <div class="contSliderHome"><!-- Texto Sobre o Slider Atual --></div>
            </div>
            <br>
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Missão</div>
                <div class="textoInfoHome">Visão</div>
                <div class="textoSliderHome">Valores</div>
            </div>
            
            <div class="barraConteudoInfoHome">
                <div class="contInfoHome"><!-- Imagem Missão Atual --></div>
                <div class="contInfoHome"><!-- Imagem Visão Atual --></div>
                <div class="contInfoHome"><!-- Imagem Valores Atual --></div>
            </div>
            <div class="barraConteudoValoresHome">
                <div class="contValoresHome"><!-- Texto Missão Atual --></div>
                <div class="contValoresHome"><!-- Texto Visão Atual --></div>
                <div class="contValoresHome"><!-- Texto Valores Atual --></div>
            </div>
            
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Imagem Fundo</div>
            </div>            
            <div class="barraConteudoInfoHome">
                <div class="contImgFundoHome"><!-- Imagem do Fundo (Acima das unidades atuais) Atual --></div>
            </div>
            
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Nossas Unidades</div>
            </div>            
            <div class="barraConteudoInfoHome">
                <div class="contInfoHome"><!-- Imagem 1, Slider Nossas Unidades Atual --></div>
                <div class="contInfoHome"><!-- Imagem 2, Slider Nossas Unidades Atual --></div>
                <div class="contInfoHome"><!-- Imagem 3, Slider Nossas Unidades Atual --></div>
                <div class="contInfoHome"><!-- Imagem 4, Slider Nossas Unidades Atual --></div>
                <div class="contInfoHome"><!-- Imagem 5, Slider Nossas Unidades Atual --></div>
            </div>
            
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Rodapé do Site</div>
            </div> 
            <div class="barraEmailInfoHome">
                <div class="contEmailHome"><!-- Email Atual do rodapé --></div>
                <div class="contEmailHome"><!-- Telefone Atual do Rodapé --></div>
            </div>
            
            <div class="barraTextoInfoHome">
                <div class="textoInfoHome">Redes Socias (Icones)</div>
            </div>
            <div class="barraRedeInfoHome">
                <div class="contRedeHome"><!-- Imagen/Icone 1 Atual do rodape --></div>
                <div class="contDescRedeHome"><!-- link 1, Referente a Imagem/Icone 1 Atual do rodape --></div>
            </div>
            <div class="barraRedeInfoHome">
                <div class="contRedeHome"><!-- Imagen/Icone 2 Atual do rodape --></div>
                <div class="contDescRedeHome"><!-- link 2, Referente a Imagem/Icone 2 Atual do rodape --></div>
            </div>
            <div class="barraRedeInfoHome">
                <div class="contRedeHome"><!-- Imagen/Icone 3 Atual do rodape --></div>
                <div class="contDescRedeHome"><!-- link 3, Referente a Imagem/Icone 3 Atual do rodape --></div>
            </div>
            
            <div class="barraBtnOpcao">
                <!-- Botao Para Deletar Essa Configuração do Banco-->
                <input type="submit" name="entrar" value="DELETAR" class="btnVisualizarHome">
                <div class="alinhaBtnRight">  
                    <!-- Div Disponivel Para o Icone Indicador de Ativo/Desativado -->
                    <div class="iconeAtivo"></div>
                    <!-- Botao Para Enviar Essa Configuração para o Banco-->
                    <input type="submit" name="entrar" value="EDITAR" class="btnVisualizarHome">         
                </div>  
                    
            </div>
        </div>
      
       

         

    </main>
  </body>
</html>
