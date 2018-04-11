<?php
  /* Autor: Stéphanie
     Data de modificação: 10/04/18
     Class: Unidades
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

   require_once(".../../../variaveis.php");

  class Unidades{
    public $idUnidadeCabecalho;
    public $fotoCabecalho;
    public $tituloFoto;
    public $idPaginaUnidade;
    public $fotoUnidade;
    public $idEndereco;
    public $cnpj;
    public $nome;
    public $email;
    public $telefone;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cep;
    public $ativo;


    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CABEÇALHO
    public function Insert($unidadeCabecalho){
      $ativo = '1';

      $sql = "INSERT INTO tbl_unidade_cabecalho (fotoCabecalho, tituloFoto)
         VALUES ('".$unidadeCabecalho->fotoCabecalho."',
                 '".$unidadeCabecalho->tituloFoto."',
                 '".$ativo."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql))
        header('location:../PortalHHealth/views/cms/unidades/cadastroUnidades_view.php');
      else
        echo "Erro no cadastro";
        // echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectCabecalho(){
      // Select no banco
      $sql = "SELECT * FROM tbl_unidade_cabecalho ORDER BY idUnidadeCabecalho DESC";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listCabecalho[] = new Unidades();

        $listCabecalho[$cont]->idUnidadeCabecalho = $result['idUnidadeCabecalho'];
        $listCabecalho[$cont]->fotoCabecalho = $result['fotoCabecalho'];
        $listCabecalho[$cont]->tituloFoto = $result['tituloFoto'];
        $listCabecalho[$cont]->ativo = $result['ativo'];

        //incrementa o contador
        $cont += 1;
     }

     $conex->Desconectar();

     if (isset($listCabecalho)) {
         return $listCabecalho;
     }
    }

    public function SelectCabecalhoById($unidades){
      $sql = "SELECT * FROM tbl_unidade_cabecalho WHERE idUnidadeCabecalho=".$unidades->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      if($result = $select->fetch(PDO::FETCH_ASSOC)){
      $unidadesResultado = new controllerCmsUnidades();

      $unidadesResultado->idUnidadeCabecalho = $result['idUnidadeCabecalho'];
      $unidadesResultado->fotoCabecalho = $result['fotoCabecalho'];
      $unidadesResultado->tituloFoto = $result['tituloFoto'];
      $unidadesResultado->ativo = $result['ativo'];

      }else{
        echo "Nada encontrado";
      }

      $conex->Desconectar();

      if (isset($unidadesResultado)) {
        return $unidadesResultado;
      }
    }

    public function DeleteCabecalho($excluirCabecalho){
      // Select no banco
      $sql = "DELETE FROM tbl_unidade_cabecalho WHERE idUnidadeCabecalho=".$excluirCabecalho->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:../PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro ao deletar";
      }

      $conex->Desconectar();

    }

    public function UpdateCabecalho($unidades){
      if ($unidades->fotoCabecalho == "vazio") {
        $sql = "UPDATE tbl_unidade_cabecalho SET
            tituloFoto='".$unidades->tituloFoto."'
            WHERE idUnidadeCabecalho=".$unidades->id;
      } else {
        $sql = "UPDATE tbl_unidade_cabecalho SET
          fotoCabecalho='".$unidades->fotoCabecalho."',
          tituloFoto='".$unidades->tituloFoto."'
          WHERE idUnidadeCabecalho=".$unidades->id;
      }
      // echo $sql;
      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:../PortalHHealth/views/cms/unidades/cadastroUnidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function ActivateCabecalho($ativarCabecalho){
      $update = "UPDATE tbl_unidade_cabecalho SET ativo='0' WHERE idUnidadeCabecalho > '0';";

      $sql = "UPDATE tbl_unidade_cabecalho SET ativo= 1 WHERE idUnidadeCabecalho=".$ativarCabecalho->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function DisableCabecalho($desativarCabecalho){
      $sql = "UPDATE tbl_unidade_cabecalho SET ativo= 0 WHERE idUnidadeCabecalho=".$desativarCabecalho->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }


    // REFERENTE AO CONTEUDO
    public function InsertConteudo($unidadeConteudo){
      $enderecoResultado = new controllerCmsUnidades();
      $sql = "";

      $sqlEnd = "INSERT INTO tbl_endereco (logradouro, numero, bairro, cep)
          VALUES ('".$unidadeConteudo->logradouro."',
                  '".$unidadeConteudo->numero."',
                  '".$unidadeConteudo->bairro."',
                  '".$unidadeConteudo->cep."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sqlEnd)){
        $select = "SELECT * FROM tbl_endereco ORDER BY idEndereco DESC LIMIT 1";
        $resultEnd = $PDOconex->query($select);


        if($result = $resultEnd->fetch(PDO::FETCH_ASSOC)){

          $enderecoResultado->idEndereco = $result['idEndereco'];

        }else{
          echo "Nada encontrado";
        }

        $sql = "INSERT INTO tbl_unidade (fotoUnidade, nome, cnpj, idEndereco, email, telefone)
           VALUES ('".$unidadeConteudo->fotoUnidade."',
                  '".$unidadeConteudo->nome."',
                  '".$unidadeConteudo->cnpj."',
                   '".$enderecoResultado->idEndereco."',
                   '".$unidadeConteudo->email."',
                   '".$unidadeConteudo->telefone."')";

        //executa script no banco
        if ($PDOconex->query($sql)){
          header('location:'.$voltaUm.'views/cms/unidades/cadastroUnidades_view.php');
        } else {
          echo "Erro no cadastro";
          echo $sql;
        }

      } else {
        echo "Erro no cadastro de endereço";
      }

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectConteudo() {
      // Select no banco
      $sql = "SELECT * FROM pagina_unidade ORDER BY idPaginaUnidade DESC";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new Unidades();

        $listConteudo[$cont]->idPaginaUnidade = $result['idPaginaUnidade'];
        $listConteudo[$cont]->fotoUnidade = $result['fotoUnidade'];
        $listConteudo[$cont]->endereco = $result['endereco'];
        $listConteudo[$cont]->email = $result['email'];
        $listConteudo[$cont]->numero = $result['numero'];
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
      $sql = "SELECT * FROM pagina_unidade WHERE idPaginaUnidade=".$conteudo->id;
      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      if($result = $select->fetch(PDO::FETCH_ASSOC)){
      $conteudoResultado = new controllerCmsUnidades();

      $conteudoResultado->idPaginaUnidade = $result['idPaginaUnidade'];
      $conteudoResultado->fotoUnidade = $result['fotoUnidade'];
      $conteudoResultado->endereco = $result['endereco'];
      $conteudoResultado->email = $result['email'];
      $conteudoResultado->numero = $result['numero'];
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
      $sql = "DELETE FROM pagina_unidade WHERE idPaginaUnidade=".$excluirConteudo->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro ao deletar";
      }

      $conex->Desconectar();

    }

    public function UpdateConteudo($conteudo){
      if ($conteudo->fotoUnidade == "vazio") {
        $sql = "UPDATE pagina_unidade SET
            endereco='".$conteudo->endereco."',
            email='".$conteudo->email."',
            numero='".$conteudo->numero."'
            WHERE idPaginaUnidade=".$conteudo->id;
      } else {
        $sql = "UPDATE pagina_unidade SET
            fotoUnidade='".$conteudo->fotoUnidade."',
            endereco='".$conteudo->endereco."',
            email='".$conteudo->email."',
            numero='".$conteudo->numero."'
          WHERE idPaginaUnidade=".$conteudo->id;
      }

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/cadastroUnidades_view.php');
        //
      }else{
        echo "erro";
        // echo $sql;
      }

      $conex->Desconectar();
    }

    public function ActivateConteudo($ativarConteudo){
      $sql = "UPDATE pagina_unidade SET ativo= 1 WHERE idPaginaUnidade=".$ativarConteudo->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function DisableConteudo($desativarConteudo){
      $sql = "UPDATE pagina_unidade SET ativo= 0 WHERE idPaginaUnidade=".$desativarConteudo->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'PortalHHealth/views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }
  }

?>
