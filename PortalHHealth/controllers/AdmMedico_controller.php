<?php
  /* Autor: Bruno
     Data de modificação: 02/05/18
     Controller: Medicos
     Obs: Controller para realizar CRUD de Medios
   */

  class controllerCmsMedico{

      public function Novo($idEndereco){

        // novo objeto
        $medico = new Medico();

        // pega o conteudo
        $medico->nome = $_POST['txtNome'];
        $medico->telefone = $_POST['numTelefone'];
        $medico->celular = $_POST['numCelular'];
        $medico->datAdimicao = $_POST['dtAdimicao'];
        $medico->rg = $_POST['numRg'];
        $medico->cpf = $_POST['numCpf'];
        $medico->numCrm = $_POST['numCrm'];
        $medico->nacimento = $_POST['numDtnasc'];
        $medico->idEndereco = $_POST['idEndereco'];
        $medico->email = $_POST['txtEmail'];

        //
        $diretorio_fotoCRM = null;


        //pega a foto
        if (!empty($_FILES['fotoCRM']['name'])){
          $imagem_file = true;
          $diretorio_fotoCRM = salvaImagem($_FILES['fotoCRM'], 'arquivos');
          if ($diretorio_fotoCRM == 'Erro'){
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
                  $movUpload = false;
          } else {
            $movUpload = true;
          }
        } else {
          $imagem_file = false;
        }

        $medico->fotoCrm = $diretorio_fotoCRM;


        //pega a foto
        if (!empty($_FILES['fotoMedico']['name'])){
          $imagem_file = true;
          $diretorio_fotomedico = salvaImagem($_FILES['fotoMedico'], 'arquivos');
          if ($diretorio_fotomedico == 'Erro'){
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
                  $movUpload = false;
          } else {
            $movUpload = true;
          }
        } else {
          $imagem_file = false;
        }

        $medico->fotomedico = $diretorio_fotomedico;



        $medico::Insert($medico);

      }

      public function Listar(){
        $medicamento = new controllerCmsMedico();
        return $medicamento::Select();
      }

      public function Excluir() {
        $idMedicamento = $_GET['id'];

        $excluir = new controllerCmsMedico();

        $excluir->id = $idMedicamento;
        $excluir::Delete($excluir);
      }

      public function Buscar(){
        $idMedicamento = $_GET['id'];

        $medicamento = new controllerCmsMedico();

        $medicamento->id = $idMedicamento;

        $medicamentoResultado = $medicamento::SelectById($medicamento);

        require_once('views/administrativo/medicamento/editarMedicamento_view.php');
      }

      public function Editar(){
        $idMedicamento = $_GET['id'];

        $editar = new controllerCmsMedico();

        // pega o conteudo
        $editar->id = $idMedicamento;
        // pega o conteudo
        $editar->nome = $_POST['txtNome'];
        $editar->fabricante = $_POST['txtFabricante'];

        Medicamento::Update($editar);
      }

  }
 ?>
