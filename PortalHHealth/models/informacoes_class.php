<?php
  /* Autor: Stéphanie e Vinicius
     Data de modificação: 24/04/18
     Class: Informacoes
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */


  class Informacoes {
    public $idPaginaInfoUsuario;
    public $fotoAssunto;
    public $textoAssunto;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }



    //FUNÇÕES REFERENTE AO CONTEUDO
      public function InsertConteudo($informacaoConteudo) {

        $sql = "INSERT INTO pagina_info_usuario (fotoAssunto, textoAssunto)
            VALUES ('".$informacaoConteudo->fotoAssunto."',
                    '".$informacaoConteudo->textoAssunto."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/cms/informacoes/cadastroInformacoes_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function SelectConteudo() {
        // Select no banco
        $sql = "SELECT * FROM pagina_info_usuario ORDER BY idPaginaInfoUsuario DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Informacoes();

          $listConteudo[$cont]->idPaginaInfoUsuario = $result['idPaginaInfoUsuario'];
          $listConteudo[$cont]->fotoAssunto = $result['fotoAssunto'];
          $listConteudo[$cont]->textoAssunto = $result['textoAssunto'];
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
        $sql = "SELECT * FROM pagina_info_usuario WHERE idPaginaInfoUsuario=".$conteudo->id;
        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
        $conteudoResultado = new controllerCmsInformacoes();

        $conteudoResultado->idPaginaInfoUsuario = $result['idPaginaInfoUsuario'];
        $conteudoResultado->fotoAssunto = $result['fotoAssunto'];
        $conteudoResultado->textoAssunto = $result['textoAssunto'];
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
        $sql = "DELETE FROM pagina_info_usuario WHERE idPaginaInfoUsuario=".$excluirConteudo->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/informacoes/visu_informacoes_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();

      }

      public function UpdateConteudo($conteudo){
        if ($conteudo->fotoAssunto == "vazio") {
          $sql = "UPDATE pagina_info_usuario SET
              textoAssunto='".$conteudo->textoAssunto."'
              WHERE idPaginaInfoUsuario=".$conteudo->id;
        } else {
          $sql = "UPDATE pagina_info_usuario SET
            fotoAssunto='".$conteudo->fotoAssunto."',
            textoAssunto='".$conteudo->textoAssunto."'
            WHERE idPaginaInfoUsuario=".$conteudo->id;
        }

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/informacoes/cadastroInformacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function ActivateConteudo($ativarConteudo){
        $sql = "UPDATE pagina_info_usuario SET ativo= 1 WHERE idPaginaInfoUsuario=".$ativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/informacoes/visu_informacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function DisableConteudo($desativarConteudo){
        $sql = "UPDATE pagina_info_usuario SET ativo= 0 WHERE idPaginaInfoUsuario=".$desativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/informacoes/visu_informacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function SelectConteudoAtivo(){
        // Select no banco
        $sql = "SELECT * FROM pagina_info_usuario WHERE ativo=1";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Informacoes();

          $listConteudo[$cont]->idPaginaInfoUsuario = $result['idPaginaInfoUsuario'];
          $listConteudo[$cont]->fotoAssunto = $result['fotoAssunto'];
          $listConteudo[$cont]->textoAssunto = $result['textoAssunto'];
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
