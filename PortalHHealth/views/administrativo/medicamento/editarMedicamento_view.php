<?php

  $idMedicamento = null;
  $nome = null;
  $fabricante = null;

  if (isset($medicamentoResultado)) {
    $idMedicamento = $medicamentoResultado->idMedicamento;
    $nome = $medicamentoResultado->nome;
    $fabricante = $medicamentoResultado->fabricante;

    $action = "modo=editarmedicamento&id=".$idMedicamento;
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS | Cadastrar Medicamento</title>
    <link rel="stylesheet" type="text/css" href="css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php include("views/header-editar.php"); ?>


      <div class="container">
			<!-- Top Navigation -->

      <?php include("views/menuLateral_view.php"); ?>

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

        <?php include("views/menuLateral_view.php"); ?>



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>

       <div class="segura_form_medicamento">
         <form class="frmCadastroMedicamento" action="router.php?controller=Medicamento&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Editar Medicamento:</p>
           </div>

             <div  class="text">
               Nome do Medicamento: <br>
              <input placeholder="Nome do Medicamento" type="text" name="txtNome" value="<?php echo($nome); ?>"  maxlength="50">
             </div>

             <div  class="text">
               Fabricante do Medicamento: <br>
              <input placeholder="Fabricante do Medicamento" type="text" name="txtFabricante" value="<?php echo($fabricante); ?>"  maxlength="50">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviar" value="Enviar">
           </div>
         </form>

       </div>


	  </main>
  </body>
</html>
