<?php
  /* Autor: Stéphanie
     Data de modificação: 23/04/18
     Class: Unidades
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

   require_once("../../../variaveis.php");

  class UnidadeCabecalho{
    public $idUnidadeCabecalho;
    public $fotoCabecalho;
    public $tituloFoto;
    public $ativo;

       // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CABEÇALHO
    public function Insert($unidadeCabecalho){
      $ativo = '1';

      $sql = "INSERT INTO tbl_unidade_cabecalho2 (fotoCabecalho, tituloFoto, ativo)
         VALUES ('".$unidadeCabecalho->fotoCabecalho."',
                 '".$unidadeCabecalho->tituloFoto."',
                 '".$ativo."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql))
        header('location:'.$voltaUm.'views/cms/unidades/cadastroUnidades_view.php');
      else
        echo "Erro no cadastro";
        echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectCabecalho(){
      // Select no banco
      $sql = "SELECT * FROM tbl_unidade_cabecalho2 ORDER BY idUnidadeCabecalho DESC";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listCabecalho[] = new UnidadeCabecalho();

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
      $sql = "SELECT * FROM tbl_unidade_cabecalho2 WHERE idUnidadeCabecalho=".$unidades->id;

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
      $sql = "DELETE FROM tbl_unidade_cabecalho2 WHERE idUnidadeCabecalho=".$excluirCabecalho->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro ao deletar";
      }

      $conex->Desconectar();

    }

    public function UpdateCabecalho($unidades){
      if ($unidades->fotoCabecalho == "vazio") {
        $sql = "UPDATE tbl_unidade_cabecalho2 SET
            tituloFoto='".$unidades->tituloFoto."'
            WHERE idUnidadeCabecalho=".$unidades->id;
      } else {
        $sql = "UPDATE tbl_unidade_cabecalho2 SET
          fotoCabecalho='".$unidades->fotoCabecalho."',
          tituloFoto='".$unidades->tituloFoto."'
          WHERE idUnidadeCabecalho=".$unidades->id;
      }
      // echo $sql;
      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/unidades/cadastroUnidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function ActivateCabecalho($ativarCabecalho){
      $update = "UPDATE tbl_unidade_cabecalho2 SET ativo='0' WHERE idUnidadeCabecalho > '0';";

      $sql = "UPDATE tbl_unidade_cabecalho2 SET ativo= 1 WHERE idUnidadeCabecalho=".$ativarCabecalho->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function DisableCabecalho($desativarCabecalho){
      $sql = "UPDATE tbl_unidade_cabecalho2 SET ativo= 0 WHERE idUnidadeCabecalho=".$desativarCabecalho->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/unidades/visu_unidades_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

  }

?>
