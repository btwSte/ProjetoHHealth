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
  <title>CMS - Portal HHealth </title>
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


         <div id="areaConteudo">

        </div>


  </body>
</html>
