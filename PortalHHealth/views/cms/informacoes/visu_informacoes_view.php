<?php
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
    <title>Portal HHealth - Visualizar Informações</title>
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
      <?php
        require_once('../../router.php');
        require_once('../../controllers/cmsInformacoes_controller.php');
        require_once('../../models/informacoes_class.php');

        $controller_informacoes = new controllerCmsInformacoes();
        //chama metodo para listar os registros
        $list = $controller_informacoes::ListarCabecalho();

        $cont = 0;

        while ($cont < count($list)) {

       ?>
        <div id="segura">
         <div id="imagem_titulo">
           <h1><?php echo($list[$cont]->tituloFoto); ?></h1>
           <img src="../../<?php echo($list[$cont]->foto); ?>" alt="background Informações">
         </div>
         <div id="texto_info">
           <h1><?php echo($list[$cont]->tituloPagina); ?></h1>
         </div>
         <div class="Crud_Opc">

             <div class="Deletar_crud">
               <a href="../../router.php?controller=cmsInformacoes&modo=excluircabecalho&id=<?php echo($list[$cont]->idConteudoCabecalho); ?>">DELETAR</a>

             </div>
             <div class="Editar_crud">
               <a href="../../router.php?controller=cmsInformacoes&modo=buscarcabecalho&id=<?php echo($list[$cont]->idConteudoCabecalho); ?>">EDITAR</a>
             </div>

             </div>
             <!-- ABRE O IF -->
             <?php
                 // IF PARA DESATIVAR O CONTEUDO
                   if ($list[$cont]->ativo == 1){

              ?>
               <div class="ativar_crud ">
                 <a href="../../router.php?controller=cmsInformacoes&modo=desativarcabecalho&id=<?php echo($list[$cont]->idConteudoCabecalho); ?>">
                   <img src="../../imagens/check.png" alt="Desativar" title="Desativar">
                 </a>
               </div>
               <?php
             // FECHA O IF E ABRE ELSE
             // ELSE PARA ATIVAR CONTEUDO
             } else {
                ?>
               <div class="desativar_crud ">
                 <a href="../../router.php?controller=cmsInformacoes&modo=ativarcabecalho&id=<?php echo($list[$cont]->idConteudoCabecalho); ?>">
                   <img src="../../imagens/no.png" alt="Ativar" title="Ativar">
                 </a>
               </div>
               <!-- FECHA O ELSE -->
                <?php
              }
                 ?>
         </div>
        </div>
      <?php
          $cont += 1;
        }
      ?>

         <h1>Conteúdos</h1>
         <?php
           $controller_informacoes = new controllerCmsInformacoes();
           //chama metodo para listar os registros
           $listConteudo = $controller_informacoes::ListarConteudo();

           $contConteudo = 0;

           while ($contConteudo < count($listConteudo)) {
         ?>

         <div id="segura">
           <div class="segura_img_info">
             <div class="img_info">
               <img src="../../<?php echo($listConteudo[$contConteudo]->fotoAssunto); ?>" alt="Informação">
             </div>
             <div class="info">
               <p><?php echo($listConteudo[$contConteudo]->textoAssunto); ?></p>
             </div>
           </div>
           <div class="Crud_Opc">

               <div class="Deletar_crud">
                 <a href="../../router.php?controller=cmsInformacoes&modo=excluirconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaInfoUsuario); ?>">DELETAR</a>

               </div>
               <div class="Editar_crud">
                 <a href="../../router.php?controller=cmsInformacoes&modo=buscarconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaInfoUsuario); ?>">EDITAR</a>
               </div>
           </div>
           <!-- ABRE O IF -->
           <?php
               // IF PARA DESATIVAR O CONTEUDO
                 if ($listConteudo[$contConteudo]->ativo == 1){

            ?>
             <div class="ativar_crud ">
               <a href="../../router.php?controller=cmsInformacoes&modo=desativarconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaInfoUsuario); ?>">
                 <img src="../../imagens/check.png" alt="Desativar" title="Desativar">
               </a>
             </div>
             <?php
           // FECHA O IF E ABRE ELSE
           // ELSE PARA ATIVAR CONTEUDO
           } else {
              ?>
             <div class="desativar_crud ">
               <a href="../../router.php?controller=cmsInformacoes&modo=ativarconteudo&id=<?php echo($listConteudo[$contConteudo]->idPaginaInfoUsuario); ?>">
                 <img src="../../imagens/no.png" alt="Ativar" title="Ativar">
               </a>
             </div>
             <!-- FECHA O ELSE -->
              <?php
            }
               ?>

         </div>

      <?php
          $contConteudo +=1;
        }
      ?>
    </main>
  </body>
</html>
