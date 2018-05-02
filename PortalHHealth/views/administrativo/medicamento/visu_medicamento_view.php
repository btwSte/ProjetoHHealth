<?php
  require_once("../../../variaveis.php");
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portal HHealth - Visualizar Medicamentos </title>
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

         <h1>Medicamentos</h1>

         <div id="segura">
             <div class="txtMedicamentoVisu">
               <!-- Select do banco -->
                 <?php
                 require_once($voltaTres.'router.php');
                 require_once($voltaTres.'controllers/cmsMedicamento_controller.php');
                 require_once($voltaTres.'models/medicamento_class.php');

                 $controller_medicamento = new controllerCmsMedicamento();
                 //chama metodo para listar os registros
                 $list = $controller_medicamento::Listar();

                 $cont = 0;

                 while ($cont < count($list))
                 {
                 ?>
                 <div class="txtMedicamento">Nome: <?php echo($list[$cont]->nome); ?></div>
                 <div class="txtMedicamento">Fabricante: <?php echo($list[$cont]->fabricante); ?></div>
             </div>

           <div class="Crud_Opc">

               <div class="Deletar_crud">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=Medicamento&modo=excluirmedicamento&id=<?php echo($list[$cont]->idMedicamento); ?>">DELETAR</a>

               </div>
               <div class="Editar_crud">
                 <a href="<?php echo $voltaTres; ?>router.php?controller=Medicamento&modo=buscarmedicamento&id=<?php echo($list[$cont]->idMedicamento); ?>">EDITAR</a>
               </div>

           </div>
             <?php
                $cont += 1 ;
              }
             ?>
        </div>

    </main>
  </body>
</html>
