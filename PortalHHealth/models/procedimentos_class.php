<?php
  /* Autor: Stéphanie
     Data de modificação: 01/04/18
     Class: Informacoes
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Procedimentos {
    public $idProcedimentoCabecalho;
    public $fotoCabecalho;
    public $tituloFoto;
    public $tituloCabecalho;
    public $idPaginaProcedimento;
    public $fotoProcedimento;
    public $textoProcedimento;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CABEÇALHO
      //Insere o registro no BD
      public function Insert($procedimentoCabecalho) {

        $sql = "INSERT INTO tbl_procedimento_cabecalho (fotoCabecalho, tituloFoto, tituloCabecalho)
            VALUES ('".$procedimentoCabecalho->fotoCabecalho."',
                    '".$procedimentoCabecalho->tituloFoto."',
                    '".$procedimentoCabecalho->tituloCabecalho."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:../PortalHHealth/views/cms/procedimentos/cadastroProcedimentos_view.php');
          // echo $sql;
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function SelectCabecalho() {
        // Select no banco
        $sql = "SELECT * FROM tbl_procedimento_cabecalho ORDER BY idProcedimentoCabecalho DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listCabecalho[] = new Procedimentos();

          $listCabecalho[$cont]->idProcedimentoCabecalho = $result['idProcedimentoCabecalho'];
          $listCabecalho[$cont]->fotoCabecalho = $result['fotoCabecalho'];
          $listCabecalho[$cont]->tituloFoto = $result['tituloFoto'];
          $listCabecalho[$cont]->tituloCabecalho = $result['tituloCabecalho'];
          $listCabecalho[$cont]->ativo = $result['ativo'];

          //incrementa o contador
          $cont += 1;
       }

       $conex->Desconectar();

       if (isset($listCabecalho)) {
           return $listCabecalho;
       }

      }

      public function SelectCabecalhoById($procedimento){
        $sql = "SELECT * FROM tbl_procedimento_cabecalho WHERE idProcedimentoCabecalho=".$procedimento->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
        $procedimentoResultado = new controllerCmsProcedimentos();

        $procedimentoResultado->idProcedimentoCabecalho = $result['idProcedimentoCabecalho'];
        $procedimentoResultado->fotoCabecalho = $result['fotoCabecalho'];
        $procedimentoResultado->tituloFoto = $result['tituloFoto'];
        $procedimentoResultado->tituloCabecalho = $result['tituloCabecalho'];
        $procedimentoResultado->ativo = $result['ativo'];

        }else{
          echo "Nada encontrado";
        }

        $conex->Desconectar();

        if (isset($procedimentoResultado)) {
          return $procedimentoResultado;
        }
      }

      public function DeleteCabecalho($excluirCabecalho){
        // Select no banco
        $sql = "DELETE FROM tbl_procedimento_cabecalho WHERE idProcedimentoCabecalho=".$excluirCabecalho->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_procedimentos_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();

      }

      public function UpdateCabecalho($procedimento){
        if ($procedimento->foto == "vazio") {
          $sql = "UPDATE tbl_procedimento_cabecalho SET
              tituloFoto='".$procedimento->tituloFoto."',
              tituloCabecalho='".$procedimento->tituloCabecalho."'
              WHERE idProcedimentoCabecalho=".$procedimento->id;
        } else {
          $sql = "UPDATE tbl_procedimento_cabecalho SET
            fotoCabecalho='".$procedimento->fotoCabecalho."',
            tituloFoto='".$procedimento->tituloFoto."',
            tituloCabecalho='".$procedimento->tituloCabecalho."'
            WHERE idProcedimentoCabecalho=".$procedimento->id;
        }
        // echo $sql;
        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/cadastroProcedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function ActivateCabecalho($ativarCabecalho){
        $sql = "UPDATE tbl_procedimento_cabecalho SET ativo= 1 WHERE idProcedimentoCabecalho=".$ativarCabecalho->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_procedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function DisableCabecalho($desativarCabecalho){
        $sql = "UPDATE tbl_procedimento_cabecalho SET ativo= 0 WHERE idProcedimentoCabecalho=".$desativarCabecalho->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_procedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function InsertConteudo($procedimentoConteudo) {

        $sql = "INSERT INTO pagina_procedimento_exame (fotoProcedimento, textoProcedimento)
            VALUES ('".$procedimentoConteudo->fotoProcedimento."',
                    '".$procedimentoConteudo->textoProcedimento."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:../PortalHHealth/views/cms/procedimentos/cadastroProcedimentos_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_procedimentos_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();

      }

      public function UpdateConteudo($conteudo){
        if ($conteudo->fotoProcedimento == "vazio") {
          $sql = "UPDATE pagina_procedimento_exame SET
              textoProcedimento='".$conteudo->textoProcedimento."'
              WHERE idPaginaProcedimento=".$conteudo->id;
        } else {
          $sql = "UPDATE pagina_procedimento_exame SET
            fotoProcedimento='".$conteudo->fotoProcedimento."',
            textoProcedimento='".$conteudo->textoProcedimento."'
            WHERE idPaginaProcedimento=".$conteudo->id;
        }

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/cadastroProcedimentos_view.php');
          // echo $sql;
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
          header('location:../PortalHHealth/views/cms/visu_procedimentos_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_procedimentos_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }
  }
?>
