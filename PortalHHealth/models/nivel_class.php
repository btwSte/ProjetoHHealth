<?php
  /* Autor: Bruno, Stéphanie
     Data de modificação: 07/05/18
     Class: medico
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Nivel {
    public $nivel;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function Insert($nivel) {

        $sql = "INSERT INTO tbl_nivel_portal (nivel)
            VALUES ('".$nivel->nivel."')";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();
        echo $sql;
        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/administrativo/nivel/cadastroNivel_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function Select() {
        // Select no banco
        $sql = "SELECT * FROM tbl_nivel_portal ORDER BY idNivelPortal DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $list[] = new Nivel();

          $list[$cont]->idNivelPortal = $result['idNivelPortal'];
          $list[$cont]->nivel = $result['nivel'];

          //incrementa o contador
          $cont += 1;
        }

        $conex->Desconectar();

        if (isset($list)) {
          return $list;
        }

      }

      public function Delete($excluir){
        // Select no banco
        $sql = "DELETE FROM tbl_nivel_portal WHERE idNivelPortal=".$excluir->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/nivel/visualizar_nivel_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();
      }

      public function Update($conteudo){
          $sql = "UPDATE tbl_nivel_portal SET
            nivel='".$conteudo->nivel."'
            WHERE idNivelPortal=".$conteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/nivel/visualizar_nivel_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }


  }
?>
