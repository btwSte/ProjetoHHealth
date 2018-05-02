<?php
  /* Autor: Stéphanie
     Data de modificação: 17/04/18
     Controller: Endereço
     Obs: Controller para realizar CRUD da pagina Unidades e verifica login
   */

  class controllerCmsEndereco{

    public function Novo(){
      // novo objeto
      $enderecoConteudo = new Endereco();

      //pega conteudo
      $enderecoConteudo->logradouro = $_POST['txtLogradouro'];
      $enderecoConteudo->numero = $_POST['txtNum'];
      $enderecoConteudo->bairro = $_POST['txtBairro'];
      $enderecoConteudo->cep = $_POST['txtCep'];

      //envia para a class
      $idEndereco = $enderecoConteudo::Insert($enderecoConteudo);
      $controller_unidades = new controllerCmsUnidades();
      $controller_unidades::NovoConteudo($idEndereco);
    }

    public function Excluir(){
      $idEndereco = $_GET['idEnd'];

      $excluirEnd = new Endereco();

      $excluirEnd->idEndereco = $idEndereco;
      $excluirEnd::Delete($excluirEnd);
    }

    public function Editar(){
      $idEndereco = $_GET['idEnd'];

      $upEnd = new Endereco();

      $upEnd->idEndereco = $idEndereco;
      $upEnd->logradouro = $_POST['txtLogradouro'];
      $upEnd->numero = $_POST['txtNum'];
      $upEnd->bairro = $_POST['txtBairro'];
      $upEnd->cep = $_POST['txtCep'];

      return $upEnd::Update($upEnd);
    }

  }


?>
