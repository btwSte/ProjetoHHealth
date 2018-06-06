<?php
    require_once('../../../variaveis.php');

    session_start();
    #require_once("cms/conexao.php");

    /* Chama o arquivo que contem os funçoes*/
    require_once ("../../../func.php");
    /*Chama a função para verificar se o usuario esta logado*/
    // logar($_SESSION['LogCod']);

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>CMS - Portal HHealth </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $voltaTres; ?>css/Frajola.css">
    <script src="<?php echo $voltaTres; ?>js/modernizr.min.js"></script>
    </head>
    <body>

        <?php include("../header.php"); ?>


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


        <div id="areaConteudoMedico">
            <div class="barraIdenti">
                <div class="containerIndetificacao">
                    SEJA BEM VINDO,
                </div>
            </div>
            <div class="listaPacienteEsq">
                <div class="containerEscritaPaciente">FILA DE ESPERA | PACIENTES</div>
                <div class="containerListaPaciente">
                    <div class="barraNomePaciente">Hilary Clinton <!-- Nome do Paciente --></div>
                    <div class="barraNomePaciente">Luis Inacio Lula da Silva</div>
                    <div class="barraNomePaciente"></div>
                    <div class="barraNomePaciente"></div>
                    <div class="barraNomePaciente"></div>
                    <div class="barraNomePaciente"></div>
                </div>
            </div>
            <div class="listaPacienteDir">
                <div class="containerEscritaPaciente">FILA DE RETORNO | PACIENTES</div>
                <div class="containerListaPaciente">
                    <div class="barraNomePaciente">Donald Trump <!-- Nome do Paciente --></div>
                    <div class="barraNomePaciente">Bolsonaro</div>
                    <div class="barraNomePaciente"></div>
                    <div class="barraNomePaciente"></div>
                    <div class="barraNomePaciente"></div>
                    <div class="barraNomePaciente"></div>
                </div>
            </div>

        </div>

        </main>
    </body>
</html>
