<?php
  /* Autor: João Victor
     Data de modificação: 17/05/2018
     Class: Convênios
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Cargo {
    public $idConvenio;
    public $cargo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
    public function InsertConteudo($informacaoConteudo) {

      $sql = "INSERT INTO tbl_cargo (cargo) VALUES ('".$informacaoConteudo->cargo."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/administrativo/cargo/cadastroCargo_view.php');
      else
        echo ($sql);

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectConteudo(){
      // Select no banco
      $sql = "SELECT * FROM tbl_cargo";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new Cargo();

        $listConteudo[$cont]->idCargo = $result['idCargo'];
        $listConteudo[$cont]->cargo = $result['cargo'];

        //incrementa o contador
        $cont += 1;
      }

      $conex->Desconectar();

      if (isset($listConteudo)) {
       return $listConteudo;
      }
    }

      public function DeleteConteudo($excluirConteudo){
        // Select no banco
        $sql = "DELETE FROM tbl_cargo WHERE idCargo=".$excluirConteudo->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();
        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/cargo/visu_cargo_view.php');

        }else{
          echo "Erro ao deletar";
        }

        $conex->Desconectar();

      }

  }
?>
