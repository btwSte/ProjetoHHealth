<?php
  /* Autor: João Victor
     Data de modificação: 14/05/2018
     Class: medicamneto
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Especialidade {
    public $idEspecialidade;
    public $nome;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function Insert($especialidade) {

        $sql = "INSERT INTO tbl_especialidade (nome) VALUES ('".$especialidade->nome."')";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/administrativo/especialidade/cadastroEspecialidade_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }
  }
?>
