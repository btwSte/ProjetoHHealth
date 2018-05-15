<?php
  session_start();
  #require_once("cms/conexao.php");
  require_once("../../../variaveis.php");

  /*Chama a função para verificar se o usuario esta logado*/
  // logar($_SESSION['LogCod']);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal HHealth | Visualizar Planos</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $voltaTres; ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo $voltaTres; ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaUm."header.php"); ?>

    <script src="<?php echo $voltaTres; ?>js/classie.js"></script>
		<script src="<?php echo $voltaTres; ?>js/photostack.js"></script>
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
      <?php include($voltaUm."menuLateral_view.php"); ?>

      <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "270px";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }
      </script>

         <h1>Planos</h1>

         <?php
           require_once($voltaTres.'router.php');
           require_once($voltaTres.'controllers/cmsPlano_controller.php');
           require_once($voltaTres.'models/plano_class.php');


           $controller_plano = new controllerCmsPlano();
           //chama metodo para listar os registros
           $list = $controller_plano::ListarConteudoAtivo();

           $cont = 0;

           while ($cont < count($list)) {

          ?>
         <div id="segura">
           <div class="segura_img_info">
             <div class="txtUniVisu">
                <div class="txtUnidade">Plano: <?php echo($list[$cont]->nome); ?></div>
                <div class="txtUnidade">Convênio: <?php echo($list[$cont]->idConvenio); ?></div>
             </div>
           </div>
           <div class="Crud_Opc">
               <div class="Deletar_crud">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=Plano&modo=excluirconteudo&id=<?php echo($list[$cont]->idPlano ); ?>">DELETAR</a>
               </div>
               <div class="Editar_crud">
                 <a href="">EDITAR</a>
               </div>
           </div>
           <!-- ABRE O IF -->
             <?php
               // IF PARA DESATIVAR O CONTEUDO
                 if ($list[$cont]->ativo == 1){
            ?>
             <div class="ativar_crud ">
               <a href="<?php echo $voltaTres; ?>router.php?controller=Plano&modo=desativarconteudo&id=<?php echo($list[$cont]->idConvenio); ?>">
                 <img src="<?php echo $voltaTres; ?>imagens/check.png" alt="Desativar" title="Desativar">
               </a>
             </div>
             <?php
               // FECHA O IF E ABRE ELSE
               // ELSE PARA ATIVAR CONTEUDO
               } else {
            ?>
             <div class="desativar_crud ">
               <a href="<?php echo $voltaTres; ?>router.php?controller=Plano&modo=ativarconteudo&id=<?php echo($list[$cont]->idConvenio); ?>">
                 <img src="<?php echo $voltaTres; ?>imagens/no.png" alt="Ativar" title="Ativar">
               </a>
             </div>
             <!-- FECHA O ELSE -->
              <?php
                }
            ?>
         </div>
         <?php
            $cont += 1;
          }
         ?>
    </main>
  </body>
</html>
