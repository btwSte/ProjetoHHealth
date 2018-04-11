<?php
/*
   Autor: Vinicius
   Data de criação: 03/04/18
   Class: Ambientes
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
*/
require_once(".../../../variaveis.php");

class Ambientes
{

  public $idAmbienteCabecalho;
  public $foto;
  public $tituloFoto;
  public $tituloPagina;
  public $ativo;
  public $idPaginaAmbiente;
  public $fotoConteudoAmbiente;
  public $textoConteudoAmbiente;



  function __construct()
  {
    require_once('bd_class.php');
  }
  //FUNÇÕES REFERENTE AO CABEÇALHO
    //Insere o registro no BD
    public function Insert($informacaoCabecalho) {
      $ativo = '1';
      $sql = "INSERT INTO tbl_ambiente_cabecalho (foto, tituloFoto, tituloPagina, ativo)
          VALUES ('".$informacaoCabecalho->foto."',
                  '".$informacaoCabecalho->tituloFoto."',
                  '".$informacaoCabecalho->tituloPagina."',
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

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }
  public function SelectCabecalho() {
    // Select no banco
    $sql = "SELECT * FROM tbl_ambiente_cabecalho ORDER BY idAmbienteCabecalho DESC";

    //instancia a classe do banco
    $conex = new Mysql_db();

    //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    $PDOconex = $conex->Conectar();

    $select = $PDOconex->query($sql);

    //inicia contador em 0
    $cont = 0;

    //guarda resultado
    while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
      $listCabecalho[] = new Ambientes();

      $listCabecalho[$cont]->idAmbienteCabecalho = $result['idAmbienteCabecalho'];
      $listCabecalho[$cont]->fotoCabecalho = $result['foto'];
      $listCabecalho[$cont]->tituloFoto = $result['tituloFoto'];
      $listCabecalho[$cont]->tituloPagina = $result['tituloPagina'];
      $listCabecalho[$cont]->ativo = $result['ativo'];

      //incrementa o contador
      $cont += 1;
   }

   $conex->Desconectar();

   if (isset($listCabecalho)) {
       return $listCabecalho;
   }

 }

  public function SelectCabecalhoById($cabecalho){
    $sql = "SELECT * FROM tbl_ambiente_cabecalho WHERE idAmbienteCabecalho=".$cabecalho->id;
    //echo $sql;

    //instancia a classe do banco
    $conex = new Mysql_db();

    //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    $PDOconex = $conex->Conectar();

    $select = $PDOconex->query($sql);

    if($result = $select->fetch(PDO::FETCH_ASSOC)){
    $cabecalhoResultado = new Ambientes();

    $cabecalhoResultado->idAmbienteCabecalho = $result['idAmbienteCabecalho'];
    $cabecalhoResultado->foto = $result['foto'];
    $cabecalhoResultado->tituloFoto = $result['tituloFoto'];
    $cabecalhoResultado->tituloPagina = $result['tituloPagina'];
    $cabecalhoResultado->ativo = $result['ativo'];

    }else{
      echo "Nada encontrado";
    }

    $conex->Desconectar();

    if (isset($cabecalhoResultado)) {
      return $cabecalhoResultado;
    }
  }

  public function DeleteCabecalho($excluirCabecalho){
    // Select no banco
    $sql = "DELETE FROM tbl_ambiente_cabecalho WHERE idAmbienteCabecalho=".$excluirCabecalho->id;

    //instancia a classe do banco
    $conex = new Mysql_db();

    //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    $PDOconex = $conex->Conectar();

    if ($PDOconex->query($sql)) {
      header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
    }else{
      echo "erro ao deletar";
    }

    $conex->Desconectar();

  }

  public function UpdateCabecalho($cabecalho){
    if ($cabecalho->foto == "vazio") {
      $sql = "UPDATE tbl_ambiente_cabecalho SET
          tituloFoto='".$cabecalho->tituloFoto."',
          tituloPagina='".$cabecalho->tituloPagina."'
          WHERE idAmbienteCabecalho=".$cabecalho->idAmbienteCabecalho;
    } else {
      $sql = "UPDATE tbl_ambiente_cabecalho SET
        foto='".$cabecalho->foto."',
        tituloFoto='".$cabecalho->tituloFoto."',
        tituloPagina='".$cabecalho->tituloPagina."'
        WHERE idAmbienteCabecalho=".$cabecalho->idAmbienteCabecalho;
    }
    // echo $sql;
    $conex = new Mysql_db();

    $PDOconex = $conex->Conectar();

    if ($PDOconex->query($sql)) {
      header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
    }else{
      echo "erro";
    }

    $conex->Desconectar();
  }

  public function ActivateCabecalho($ativarCabecalho){
    $update = "UPDATE tbl_ambiente_cabecalho SET ativo='0' WHERE idAmbienteCabecalho > '0';";
    $sql = "UPDATE tbl_ambiente_cabecalho SET ativo= 1 WHERE idAmbienteCabecalho=".$ativarCabecalho->id;

    $conex = new Mysql_db();

    $PDOconex = $conex->Conectar();
    $PDOconex->query($update);
    if ($PDOconex->query($sql)) {
      header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
    }else{
      echo "erro";
    }

    $conex->Desconectar();
  }

  public function DisableCabecalho($desativarCabecalho){
    $sql = "UPDATE tbl_ambiente_cabecalho SET ativo= 0 WHERE idAmbienteCabecalho=".$desativarCabecalho->id;

    $conex = new Mysql_db();

    $PDOconex = $conex->Conectar();

    if ($PDOconex->query($sql)) {
      header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
    }else{
      echo "erro";
    }

    $conex->Desconectar();
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
        header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
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
        header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/cadastroAmbientes_view.php');
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
        header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
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
        header('location:'.$voltaUm.'PortalHHealth/views/cms/ambientes/visu_Ambientes_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

}

 ?>
