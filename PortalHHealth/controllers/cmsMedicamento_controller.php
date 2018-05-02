<?php
  /* Autor: Stéphanie
     Data de modificação: 02/05/18
     Controller: Medicamentos
     Obs: Controller para realizar CRUD de Medicamentos
   */

  class controllerCmsMedicamento{

      public function Novo(){

        // novo objeto
        $medicamento = new Medicamento();

        // pega o conteudo
        $medicamento->nome = $_POST['txtNome'];
        $medicamento->fabricante = $_POST['txtFabricante'];

        $medicamento::Insert($medicamento);
      }

      public function Listar(){
        $medicamento = new Medicamento();
        return $medicamento::Select();
      }

      public function Excluir() {
        $idMedicamento = $_GET['id'];

        $excluir = new Medicamento();

        $excluir->id = $idMedicamento;
        $excluir::Delete($excluir);
      }

      public function Buscar(){
        $idMedicamento = $_GET['id'];

        $medicamento = new Medicamento();

        $medicamento->id = $idMedicamento;

        $medicamentoResultado = $medicamento::SelectById($medicamento);

        require_once('views/administrativo/medicamento/editarMedicamento_view.php');
      }

      public function Editar(){
        $idMedicamento = $_GET['id'];

        $editar = new Medicamento();

        // pega o conteudo
        $editar->id = $idMedicamento;
        // pega o conteudo
        $editar->nome = $_POST['txtNome'];
        $editar->fabricante = $_POST['txtFabricante'];

        Medicamento::Update($editar);
      }

  }
 ?>
