<?php
  /* Autor: Stéphanie
     Data de modificação: 01/04/18
     Class: Informacoes
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */



  class Procedimentos {
    public $idPaginaProcedimento;
    public $fotoProcedimento;
    public $textoProcedimento;
    public $tituloProcedimento;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function InsertConteudo($procedimentoConteudo) {
        $ativo = 1;

        $sql = "INSERT INTO pagina_procedimento_exame (fotoProcedimento, tituloProcedimento, textoProcedimento, ativo)
            VALUES ('".$procedimentoConteudo->fotoProcedimento."',
                    '".$procedimentoConteudo->tituloProcedimento."',
                    '".$procedimentoConteudo->textoProcedimento."',
                    '".$ativo."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/cms/procedimentos/cadastroProcedimentos_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function SelectConteudo() {
        // Select no banco
        $sql = "SELECT * FROM pagina_procedimento_exame ORDER BY idPaginaProcedimento DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Procedimentos();

          $listConteudo[$cont]->idPaginaProcedimento = $result['idPaginaProcedimento'];
          $listConteudo[$cont]->fotoProcedimento = $result['fotoProcedimento'];
          $listConteudo[$cont]->textoProcedimento = $result['textoProcedimento'];
          $listConteudo[$cont]->tituloProcedimento = $result['tituloProcedimento'];
          $listConteudo[$cont]->ativo = $result['ativo'];

          //incrementa o contador
          $cont += 1;
       }

       $conex->Desconectar();

       if (isset($listConteudo)) {
           return $listConteudo;
       }

      }

      public function SelectConteudoById($conteudo){
        $sql = "SELECT * FROM pagina_procedimento_exame WHERE idPaginaProcedimento=".$conteudo->id;
        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
        $conteudoResultado = new controllerCmsProcedimentos();

        $conteudoResultado->idPaginaProcedimento = $result['idPaginaProcedimento'];
        $conteudoResultado->fotoProcedimento = $result['fotoProcedimento'];
        $conteudoResultado->textoProcedimento = $result['textoProcedimento'];
        $conteudoResultado->tituloProcedimento = $result['tituloProcedimento'];
        $conteudoResultado->ativo = $result['ativo'];

        }else{
          echo "Nada encontrado";
        }

        $conex->Desconectar();

        if (isset($conteudoResultado)) {
          return $conteudoResultado;
        }
      }

      public function DeleteConteudo($excluirConteudo){
        // Select no banco
        $sql = "DELETE FROM pagina_procedimento_exame WHERE idPaginaProcedimento=".$excluirConteudo->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/procedimentos/visu_procedimentos_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();

      }

      public function UpdateConteudo($conteudo){
        if ($conteudo->fotoProcedimento == "vazio") {
          $sql = "UPDATE pagina_procedimento_exame SET
              textoProcedimento='".$conteudo->textoProcedimento."',
              tituloProcedimento='".$conteudo->tituloProcedimento."'
              WHERE idPaginaProcedimento=".$conteudo->id;
        } else {
          $sql = "UPDATE pagina_procedimento_exame SET
            fotoProcedimento='".$conteudo->fotoProcedimento."',
            textoProcedimento='".$conteudo->textoProcedimento."',
            tituloProcedimento='".$conteudo->tituloProcedimento."'
            WHERE idPaginaProcedimento=".$conteudo->id;
        }

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/procedimentos/visu_procedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function ActivateConteudo($ativarConteudo){
        $sql = "UPDATE pagina_procedimento_exame SET ativo= 1 WHERE idPaginaProcedimento=".$ativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/procedimentos/visu_procedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function DisableConteudo($desativarConteudo){
        $sql = "UPDATE pagina_procedimento_exame SET ativo= 0 WHERE idPaginaProcedimento=".$desativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/procedimentos/visu_procedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function SelectConteudoAtivo(){
        // Select no banco
        $sql = "SELECT * FROM pagina_procedimento_exame WHERE ativo=1";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Procedimentos();

          $listConteudo[$cont]->idPaginaProcedimento = $result['idPaginaProcedimento'];
          $listConteudo[$cont]->fotoProcedimento = $result['fotoProcedimento'];
          $listConteudo[$cont]->textoProcedimento = $result['textoProcedimento'];
          $listConteudo[$cont]->tituloProcedimento = $result['tituloProcedimento'];
          $listConteudo[$cont]->ativo = $result['ativo'];

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
