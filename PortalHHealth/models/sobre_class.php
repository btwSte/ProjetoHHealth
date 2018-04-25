<?php
  /* Autor: Stéphanie
     Data de modificação: 04/04/18
     Class: Sobre
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Sobre {
    public $idPaginaSobre;
    public $fotoSobre;
    public $textoSobre;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function InsertConteudo($sobreConteudo) {

        $sql = "INSERT INTO pagina_sobre (fotoSobre, textoSobre)
            VALUES ('".$sobreConteudo->fotoSobre."',
                    '".$sobreConteudo->textoSobre."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/cms/sobre/cadastroSobre_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function SelectConteudo() {
        // Select no banco
        $sql = "SELECT * FROM pagina_sobre ORDER BY idPaginaSobre DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Sobre();

          $listConteudo[$cont]->idPaginaSobre = $result['idPaginaSobre'];
          $listConteudo[$cont]->fotoSobre = $result['fotoSobre'];
          $listConteudo[$cont]->textoSobre = $result['textoSobre'];
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
        $sql = "SELECT * FROM pagina_sobre WHERE idPaginaSobre=".$conteudo->id;
        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
        $conteudoResultado = new controllerCmsSobre();

        $conteudoResultado->idPaginaSobre = $result['idPaginaSobre'];
        $conteudoResultado->fotoSobre = $result['fotoSobre'];
        $conteudoResultado->textoSobre = $result['textoSobre'];
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
        $sql = "DELETE FROM pagina_sobre WHERE idPaginaSobre=".$excluirConteudo->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/sobre/visu_sobre_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();
      }

      public function UpdateConteudo($conteudo){
        if ($conteudo->fotoSobre == "vazio") {
          $sql = "UPDATE pagina_sobre SET
              textoSobre='".$conteudo->textoSobre."'
              WHERE idPaginaSobre=".$conteudo->id;
        } else {
          $sql = "UPDATE pagina_sobre SET
            fotoSobre='".$conteudo->fotoSobre."',
            textoSobre='".$conteudo->textoSobre."'
            WHERE idPaginaSobre=".$conteudo->id;
        }

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/sobre/cadastroSobre_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function ActivateConteudo($ativarConteudo){
        $sql = "UPDATE pagina_sobre SET ativo= 1 WHERE idPaginaSobre=".$ativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/sobre/visu_sobre_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function DisableConteudo($desativarConteudo){
        $sql = "UPDATE pagina_sobre SET ativo= 0 WHERE idPaginaSobre=".$desativarConteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/cms/sobre/visu_sobre_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function SelectConteudoAtivo(){
        // Select no banco
        $sql = "SELECT * FROM pagina_sobre WHERE ativo=1";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listConteudo[] = new Sobre();

          $listConteudo[$cont]->idPaginaSobre = $result['idPaginaSobre'];
          $listConteudo[$cont]->fotoSobre = $result['fotoSobre'];
          $listConteudo[$cont]->textoSobre = $result['textoSobre'];
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
