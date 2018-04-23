<?php
  /* Autor: Stéphanie
     Data de modificação: 17/04/18
     Class: Unidades
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

   require_once("../../../variaveis.php");

  class Unidades{
    public $idUnidade;
    public $fotoUnidade;
    public $nome;
    public $cnpj;
    public $email;
    public $telefone;
    public $idEndereco;
    public $ativo;


    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }




    // REFERENTE AO CONTEUDO

    public function InsertConteudo($unidadeConteudo){
      $sql = "INSERT INTO tbl_unidade (fotoUnidade, nome, cnpj, idEndereco, email, telefone)
         VALUES ('".$unidadeConteudo->fotoUnidade."',
                '".$unidadeConteudo->nome."',
                '".$unidadeConteudo->cnpj."',
                 '".$unidadeConteudo->idEndereco."',
                 '".$unidadeConteudo->email."',
                 '".$unidadeConteudo->telefone."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql)){
          header('location:'.$voltaUm.'views/cms/unidades/cadastroUnidades_view.php');
        } else {
          echo "Erro no cadastro";
          // echo $sql;
        }

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function DeleteConteudo($excluirConteudo){
      // Select no banco
      $sql = "DELETE FROM tbl_unidade WHERE idUnidade=".$excluirConteudo->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        // header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
        return 1;
      }else{
        echo "erro ao deletar";
        return 0;
      }

      $conex->Desconectar();

    }

    public function UpdateConteudo($conteudo){
      if ($conteudo->fotoUnidade == "vazio") {
        $sql = "UPDATE tbl_unidade SET
          nome='".$conteudo->nome."',
            cnpj='".$conteudo->cnpj."',
             email='".$conteudo->email."',
            telefone='".$conteudo->telefone."'
            WHERE idUnidade=".$conteudo->id;
      } else {
        $sql = "UPDATE tbl_unidade SET
            fotoUnidade='".$conteudo->fotoUnidade."',
            nome='".$conteudo->nome."',
              cnpj='".$conteudo->cnpj."',
               email='".$conteudo->email."',
              telefone='".$conteudo->telefone."'
              WHERE idUnidade=".$conteudo->id;
      }

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        // echo $sql;
        header('location:'.$voltaUm.'views/cms/unidades/cadastroUnidades_view.php');
        //
      }else{
        echo "erro";
        // echo $sql;
      }

      $conex->Desconectar();
    }

    public function ActivateConteudo($ativarConteudo){
      $sql = "UPDATE tbl_unidade SET ativo= 1 WHERE idUnidade=".$ativarConteudo->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function DisableConteudo($desativarConteudo){
      $sql = "UPDATE tbl_unidade SET ativo= 0 WHERE idUnidade=".$desativarConteudo->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }
  }

?>
