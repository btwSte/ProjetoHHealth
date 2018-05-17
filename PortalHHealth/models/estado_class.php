<?php
  /* Autor: João Victor
     Data de modificação: 17/05/2018
     Class: Convênios
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Estado {
    public $idConvenio;
    public $nome;
    public $sigla;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
    public function SelectConteudo(){
      // Select no banco
      $sql = "SELECT * FROM tbl_estado";

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

        $listConteudo[$cont]->idEstado = $result['idEstado'];
        $listConteudo[$cont]->nome = $result['nome'];

        //incrementa o contador
        $cont += 1;
      }

      $conex->Desconectar();

      if (isset($listConteudo)) {
       return $listConteudo;
      }
    }
  }
?>
