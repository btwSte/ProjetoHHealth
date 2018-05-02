<?php
  /* Autor: João Victor
     Data de modificação: 26/04/2018
     Class: Convênios
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Convenio {
    public $idConvenio;
    public $nome;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
    public function InsertConteudo($informacaoConteudo) {

      $sql = "INSERT INTO tbl_convenio (nome, ativo) VALUES ('".$informacaoConteudo->nome."', 1)";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql))
        header('location:'.$voltaUm.'views/administrativo/convenio/cadastroConvenio_view.php');
      else
        echo "Erro no cadastro";

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }
      
    public function SelectConteudo(){
      // Select no banco
      $sql = "SELECT * FROM tbl_convenio";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new Convenio();

        $listConteudo[$cont]->idConvenio = $result['idConvenio'];
        $listConteudo[$cont]->nome = $result['nome'];
        $listConteudo[$cont]->ativo = $result['ativo'];

        //incrementa o contador
        $cont += 1;
      }

      $conex->Desconectar();

      if (isset($listConteudo)) {
       return $listConteudo;
      }
    }

    public function SelectConteudoAtivo(){
      // Select no banco
      $sql = "SELECT * FROM tbl_convenio WHERE ativo=1";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new Convenio();

        $listConteudo[$cont]->idConvenio = $result['idConvenio'];
        $listConteudo[$cont]->nome = $result['nome'];
        $listConteudo[$cont]->ativo = $result['ativo'];

        //incrementa o contador
        $cont += 1;
      }

      $conex->Desconectar();

      if (isset($listConteudo)) {
       return $listConteudo;
      }
    }
      
      public function ActivateConteudo($ativarConteudo){
        $sql = "UPDATE tbl_convenio SET ativo= 1 WHERE idConvenio=".$ativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/convenio/visu_convenio_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function DisableConteudo($desativarConteudo){
        $sql = "UPDATE tbl_convenio SET ativo= 0 WHERE idConvenio=".$desativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/convenio/visu_convenio_view.php');
           
        }else{
          echo "erro";
            echo $sql;
        }

        $conex->Desconectar();
      }
      
      
      
  }
?>
