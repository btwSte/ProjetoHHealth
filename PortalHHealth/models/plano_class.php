<?php
  /* Autor: João Victor
     Data de modificação: 09/05/2018
     Class: medicamneto
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Plano {
    public $idPlano;
    public $nome;
    public $idConvenio;
    public $consulta;
    public $exame;
    public $prontoSocorro;
    public $internacao;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function Insert($plano) {

        $sql = "INSERT INTO tbl_plano_convenio (nome, idConvenio, consulta, exame, prontoSocorro, internacao, ativo)
            VALUES ('".$plano->nome."',
                    '".$plano->idConvenio."',
                    '".$plano->consulta."',
                    '".$plano->exame."',
                    '".$plano->prontoSocorro."',
                    '".$plano->internacao."', 1)";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/administrativo/plano/cadastroPlano_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function SelectConteudo(){
        // Select no banco
        $sql = "SELECT p.* , c.nome as nomeConvenio FROM tbl_plano_convenio as p
                INNER JOIN tbl_convenio as c
                ON c.idConvenio = p.idConvenio";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;
        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Plano();

          $listConteudo[$cont]->idPlano = $result['idPlano'];
          $listConteudo[$cont]->nome = $result['nome'];
          $listConteudo[$cont]->idConvenio = $result['nomeConvenio'];
              echo $sql;
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
        $sql = "SELECT p.* , c.nome as nomeConvenio FROM tbl_plano_convenio as p
                INNER JOIN tbl_convenio as c
                ON c.idConvenio = p.idConvenio WHERE p.ativo = 1";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Plano();

          $listConteudo[$cont]->idPlano = $result['idPlano'];
          $listConteudo[$cont]->nome = $result['nome'];
          $listConteudo[$cont]->idConvenio = $result['nomeConvenio'];
          $listConteudo[$cont]->ativo = $result['ativo'];

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
        $sql = "DELETE FROM tbl_plano_convenio WHERE idPlano=".$excluirConteudo->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();
        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/plano/visu_plano_view.php');

        }else{
          echo ($sql);
        }

        $conex->Desconectar();

      }
  }
?>
