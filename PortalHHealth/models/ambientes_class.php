<?php
/*
   Autor: Vinicius
   Data de criação: 17/04/18
   Class: Ambientes
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
*/


class Ambientes {


  public $ativo;
  public $idPaginaAmbiente;
  public $fotoConteudoAmbiente;
  public $textoConteudoAmbiente;

  function __construct(){
    require_once('bd_class.php');
  }

  /* Inserção do Conteudo da tela de ambientes */

  //FUNÇÕES REFERENTE AO CONTEUDO
    public function InsertConteudo($informacaoConteudo) {
      $ativo = 1;

      $sql = "INSERT INTO pagina_ambiente (fotoPrincipal, textoFoto, ativo)
          VALUES ('".$informacaoConteudo->fotoAssunto."',
                  '".$informacaoConteudo->textoAssunto."',
                  '".$ativo."')";


      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql))
        header('location:'.$voltaUm.'views/cms/ambientes/cadastroAmbientes_view.php');
      else
        echo "Erro no cadastro";
        echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectConteudo() {
      // Select no banco
      $sql = "SELECT * FROM pagina_ambiente ORDER BY idPaginaAmbiente DESC";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new Ambientes();

        $listConteudo[$cont]->idPaginaAmbiente = $result['idPaginaAmbiente'];
        $listConteudo[$cont]->fotoConteudoAmbiente = $result['fotoPrincipal'];
        $listConteudo[$cont]->textoConteudoAmbiente = $result['textoFoto'];
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
      $sql = "SELECT * FROM pagina_ambiente WHERE idPaginaAmbiente=".$conteudo->id;
      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      if($result = $select->fetch(PDO::FETCH_ASSOC)){
      $conteudoResultado = new Ambientes();

      $conteudoResultado->idPaginaAmbiente = $result['idPaginaAmbiente'];
      $conteudoResultado->fotoConteudoAmbiente = $result['fotoPrincipal'];
      $conteudoResultado->textoConteudoAmbiente = $result['textoFoto'];
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
      $sql = "DELETE FROM pagina_ambiente WHERE idPaginaAmbiente=".$excluirConteudo->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
      }else{
        echo "erro ao deletar";
      }

      $conex->Desconectar();

    }

    public function UpdateConteudo($conteudo){
      if ($conteudo->fotoAssunto == "vazio") {
        $sql = "UPDATE pagina_ambiente SET
            textoFoto='".$conteudo->textoAssunto."'
            WHERE idPaginaAmbiente=".$conteudo->id;
      } else {
        $sql = "UPDATE pagina_ambiente SET
          fotoPrincipal='".$conteudo->fotoAssunto."',
          textoFoto='".$conteudo->textoAssunto."'
          WHERE idPaginaAmbiente=".$conteudo->id;
      }

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/ambientes/cadastroAmbientes_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function ActivateConteudo($ativarConteudo){
      $sql = "UPDATE pagina_ambiente SET ativo= 1 WHERE idPaginaAmbiente=".$ativarConteudo->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function DisableConteudo($desativarConteudo){
      $sql = "UPDATE pagina_ambiente SET ativo= 0 WHERE idPaginaAmbiente=".$desativarConteudo->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function SelectConteudoAtivo(){
      // Select no banco
      $sql = "SELECT * FROM pagina_ambiente WHERE ativo=1";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new Ambientes();

        $listConteudo[$cont]->idPaginaAmbiente = $result['idPaginaAmbiente'];
        $listConteudo[$cont]->fotoConteudoAmbiente = $result['fotoPrincipal'];
        $listConteudo[$cont]->textoConteudoAmbiente = $result['textoFoto'];
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
