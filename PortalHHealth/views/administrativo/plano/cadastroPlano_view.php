<?php
  require_once("../../../variaveis.php");

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS | Cadastrar Planos</title>
    <link rel="stylesheet" type="text/css" href="<?php echo($voltaTres); ?>css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo($voltaTres); ?>js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include($voltaUm."header.php"); ?>


      <div class="container">
			<!-- Top Navigation -->

      <?php include("../menuLateral_view.php"); ?>

  		</div><!-- /container -->
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

        <!-- FORM CONTEÚDO -->
       <div class="segura_form_convenio">
         <form class="frmPlano" action="<?php echo ($voltaTres); ?>router.php?controller=Plano&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro De Planos:</p>
           </div>
             <div class="text">
              <input id="tel" placeholder="Plano" type="text" name="txtPlano" value=""  maxlength="50" required>
             </div>
                <select name="sltConvenio" class="select">
                          <option value="*">Convênio</option>
                          <!-- faz require e abre while -->
                          <?php
                          require_once($voltaTres.'controllers/cmsConvenio_controller.php');
                          require_once($voltaTres.'models/convenio_class.php');

                          $controller_convenio = new controllerCmsConvenio();
                          //chama metodo para listar os registros
                          $listConvenio = $controller_convenio::SelecionarConteudoAtivo();

                          $contPlano = 0;

                          while ($contPlano < count($listConvenio)) {
                        ?>
                          <!-- option -->
                          <option value="<?php echo($listConvenio[$contPlano]->idConvenio); ?>">
                            <?php echo($listConvenio[$contPlano]->nome); ?>
                          </option>
                          <!-- fecha while -->
                          <?php
                            $contPlano += 1;
                          }
                        ?>

                </select>

              <select name="sltConsulta" class="select">
                 <option value="*">Cobre Consulta?</option>
                 <option value="sim">Sim</option>
                 <option value="nao">Não</option>
              </select>
              <select name="sltExame" class="select">
                 <option value="*">Cobre Exame?</option>
                 <option value="sim">Sim</option>
                 <option value="nao">Não</option>
              </select>
              <select name="sltPS" class="select">
                 <option value="*">Cobre Pronto Socorro?</option>
                 <option value="sim">Sim</option>
                 <option value="nao">Não</option>
              </select>
              <select name="sltInternacao" class="select">
                 <option value="*">Cobre Internação?</option>
                 <option value="sim">Sim</option>
                 <option value="nao">Não</option>
              </select>
           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>
         </form>

       </div>


	  </main>
  </body>
</html>
