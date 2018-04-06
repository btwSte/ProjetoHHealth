<?php
require_once('../../../variaveis.php');

  session_start();
  #require_once("cms/conexao.php");

  /* Chama o arquivo que contem os funçoes*/
  require_once ("../../func.php");
  /*Chama a função para verificar se o usuario esta logado*/
  logar($_SESSION['LogCod']);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal HHealth - Visualizar Unidades</title>
    <link rel="stylesheet" type="text/css" href="../../css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include("../header.php"); ?>

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
      <?php include("../menuLateral_view.php"); ?>

      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "270px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>

      <h1>Cabeçalhos</h1>

        <div id="segura">
         <div id="imagem_titulo">
           <h1></h1>
           <img src="" alt="">
         </div>
         <div id="texto_info">
           <h1></h1>
         </div>
         <div class="Crud_Opc">

             <div class="Deletar_crud">
               <a href="">DELETAR</a>

             </div>
             <div class="Editar_crud">
               <a href="">EDITAR</a>
             </div>

             </div>

               <div class="ativar_crud ">
                 <a href="">
                   <img src="../../imagens/check.png" alt="Desativar" title="Desativar">
                 </a>
               </div>

               <div class="desativar_crud ">
                 <a href="">
                   <img src="../../imagens/no.png" alt="Ativar" title="Ativar">
                 </a>
               </div>

         </div>


         <h1>Conteúdos</h1>

         <div id="segura">
           <div class="segura_img_info">
             <div class="imgUniVisu">
               <img src="" alt="">
             </div>
             <div class="txtUniVisu">
                <div class="txtUnidade">Endereço:<!--SelectAqui--></div>
                 <div class="txtUnidade">Email:<!--SelectAqui--></div>
                 <div class="txtUnidade">Numero:<!--SelectAqui--></div>
             </div>
           </div>
           <div class="Crud_Opc">

               <div class="Deletar_crud">
                 <a href="">DELETAR</a>

               </div>
               <div class="Editar_crud">
                 <a href="">EDITAR</a>
               </div>

           </div>
           <!-- ABRE O IF -->

             <div class="ativar_crud ">
               <a href="">
                 <img src="../../imagens/check.png" alt="Desativar" title="Desativar">
               </a>
             </div>

             <div class="desativar_crud ">
               <a href="">
                 <img src="../../imagens/no.png" alt="Ativar" title="Ativar">
               </a>
             </div>


         </div>

    </main>
  </body>
</html>
