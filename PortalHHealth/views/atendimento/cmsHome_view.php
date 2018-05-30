<?php
require_once('../../variaveis.php');

session_start();
#require_once("cms/conexao.php");

/* Chama o arquivo que contem os funçoes*/
require_once("../../func.php");
/*Chama a função para verificar se o usuario esta logado*/
logar($_SESSION['LogCod']);




//Conexão com o banco de dados
// Conexão com o banco de dados
$conn = @mysql_connect("localhost", "root", "bcd127") or die("Não foi possível a conexão com o Banco");
// Selecionando banco
$db = @mysql_select_db("dbhhealth", $conn) or die("Não foi possível selecionar o Banco");

// Recuperamos a ação enviada pelo formulário
$a = $_GET['a'];

// Verificamos se a ação é de busca
if ($a == "buscar") {

	// Pegamos a palavra
	$palavra = trim($_POST['palavra']);

	// Verificamos no banco de dados produtos equivalente a palavra digitada
	$sql = mysql_query("SELECT tbl_agenda_consulta.*,
	      tbl_paciente.nome,
       tbl_paciente.cpf,
        tbl_especialidade.especialidade
     FROM tbl_agenda_consulta
	    INNER JOIN tbl_paciente
       ON tbl_paciente.idPaciente = tbl_agenda_consulta.idPaciente
       INNER JOIN tbl_especialidade
        ON tbl_especialidade.idEspecialidade = tbl_agenda_consulta.idEspecialidade
        WHERE tbl_paciente.cpf =".$palavra);

	// Descobrimos o total de registros encontrados
	$numRegistros = mysql_num_rows($sql);
}
	 // $cpf = "";
	 //
	 // if (isset($_GET['btnPesquisar'])) {
		//  $cpf = $_GET['txtPesquisa'];
	 // 	// code...
	 // }

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Atendimento</title>
  <link rel="stylesheet" type="text/css" href="../../css/Frajola.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/modernizr.min.js"></script>
</head>
  <body>

      <?php include("header_home.php"); ?>

      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
      </div>
    <main>

      <?php include("menu_home.php"); ?>


        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>


        <div id="areaConteudo">
            <div id="campo_pesquisa">
              <p class="tituloPesqui">Pesquise pelo CPF:</p>
              <form class="frmPesquisa" method="post" action="cmsHome_view.php?a=buscar">
                <input type="text" name="palavra" value="" required>
                <button type="submit" value="buscar"> Pesquisar </button>
              </form>
            </div>
            <div id="content_pacientes">
              <div id="content_pacientes_cadastrados">
                <p class="decore_pesquisa">Consultas marcadas </p>
                <?php
								// Se houver pelo menos um registro, exibe-o
								if ($numRegistros != 0) {
									// Exibe os produtos e seus respectivos preços
									while ($consulta = mysql_fetch_object($sql)) {

                ?>
                <div class="dados_pacientes_cadastrados">
                  <p class="decore_list_paciente">Nome:	<?php echo $consulta->nome; ?> </p>
                  <p class="decore_list_pacienteSpç">Data:<?php echo $consulta->data; ?></p>
                  <p class="decore_list_pacienteSpç">Hora: <?php echo $consulta->hora; ?></p>
                </div>
								<?php 	}
								// Se não houver registros
							} else {
									echo "Nenhuma consulta foi encontrado com o cpf ".$palavra."";
								} ?>
                <div class="segura_list_opcao">
                  <div class="dados_pacientes_cadastrados">
                    <p class="decore_list_paciente"></p>
                  </div>
                  <div class="opcao_paciente">
                    <p>Envia para fila</p>
                  </div>
                </div>

                <?php
                  //   $cont += 1;
                  // }
                ?>
              </div>
              <div id="content_pacientes_cadastrados">

                <p class="decore_pesquisa">Pré Atendimento marcados</p>
                <?php
                  // require_once($entraHHealth."controllers/cadastroPaciente_controller.php");
                  // require_once($entraHHealth."models/cadPaciente_class.php");
									//
                  // $controller_paciente = new controllerCadPaciente();
                  // //chama metodo para listar os registros
                  // $list = $controller_paciente::SelecionarConteudo();
									//
                  // $cont = 0;
									//
                  // while ($cont < count($list)) {

                ?>
                <div class="segura_list_opcao">
                  <div class="dados_pacientes_cadastrados">
                    <p class="decore_list_paciente">Nome:</p>
                    <p class="decore_list_pacienteSpç">Data:</p>
                    <p class="decore_list_pacienteSpç">Hora:</p>
                  </div>
                  <div class="dados_pacientes_cadastrados">
                    <p class="decore_list_paciente"><?php //echo $list[$cont]->nome; ?></p>

                  </div>
                  <div class="opcao_paciente">
                    <p>Envia para fila</p>
                  </div>
                </div>
                <?php
                  //   $cont += 1;
                  // }
                ?>
              </div>
            </div>
        </div>
  </body>
</html>
