<?php
/* Autor: Stéphanie
   Data de modificação: 24/04/18
   Class: Cabecalho Sobre
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */

class SobreCabecalho{
  public $idSobreCabecalho;
  public $fotoCabecalho;
  public $tituloFoto;
  public $tituloPagina;
  public $ativo;

  // Conexão com o banco
  public function __construct() {
    require_once('bd_class.php');
  }

  //FUNÇÕES REFERENTE AO CABEÇALHO
    //Insere o registro no BD
    public function Insert($sobreCabecalho) {
      //deixa os outros cabecalhos desativados
      $update = "UPDATE tbl_sobre_cabecalho SET ativo='0' WHERE idSobreCabecalho > '0';";

      //recebe valor para inserir cabecalho como ativo
      $ativo = '1';

      $sql = "INSERT INTO tbl_sobre_cabecalho (fotoCabecalho, tituloFoto, tituloPagina, ativo)
          VALUES ('".$sobreCabecalho->fotoCabecalho."',
                  '".$sobreCabecalho->tituloFoto."',
                  '".$sobreCabecalho->tituloPagina."',
                  '".$ativo."')";


      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa o update
      $PDOconex->query($update);

      //executa script no banco
      if ($PDOconex->query($sql))
        header('location:'.$voltaUm.'views/cms/sobre/cadastroSobre_view.php');
      else
        echo "Erro no cadastro";
        echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectCabecalho() {
      // Select no banco
      $sql = "SELECT * FROM tbl_sobre_cabecalho ORDER BY idSobreCabecalho DESC";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listSobre[] = new SobreCabecalho();

        $listSobre[$cont]->idSobreCabecalho = $result['idSobreCabecalho'];
        $listSobre[$cont]->fotoCabecalho = $result['fotoCabecalho'];
        $listSobre[$cont]->tituloFoto = $result['tituloFoto'];
        $listSobre[$cont]->tituloPagina = $result['tituloPagina'];
        $listSobre[$cont]->ativo = $result['ativo'];

        //incrementa o contador
        $cont += 1;
     }

     $conex->Desconectar();

     if (isset($listSobre)) {
         return $listSobre;
     }

    }

    public function SelectCabecalhoById($sobre){
      $sql = "SELECT * FROM tbl_sobre_cabecalho WHERE idSobreCabecalho=".$sobre->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      if($result = $select->fetch(PDO::FETCH_ASSOC)){
      $cabecalhoResultado = new SobreCabecalho();

      $cabecalhoResultado->idSobreCabecalho = $result['idSobreCabecalho'];
      $cabecalhoResultado->fotoCabecalho = $result['fotoCabecalho'];
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
      $sql = "DELETE FROM tbl_sobre_cabecalho WHERE idSobreCabecalho=".$excluirCabecalho->id;

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

    public function UpdateCabecalho($cabecalho){
      if ($cabecalho->fotoCabecalho == "vazio") {
        $sql = "UPDATE tbl_sobre_cabecalho SET
            tituloFoto='".$cabecalho->tituloFoto."',
            tituloPagina='".$cabecalho->tituloPagina."'
            WHERE idSobreCabecalho=".$cabecalho->id;
      } else {
        $sql = "UPDATE tbl_sobre_cabecalho SET
          fotoCabecalho='".$cabecalho->fotoCabecalho."',
          tituloFoto='".$cabecalho->tituloFoto."',
          tituloPagina='".$cabecalho->tituloPagina."'
          WHERE idSobreCabecalho=".$cabecalho->id;
      }
      // echo $sql;
      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/sobre/cadastroSobre_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function ActivateCabecalho($ativarCabecalho){
      $update = "UPDATE tbl_sobre_cabecalho SET ativo='0' WHERE idSobreCabecalho > '0';";

      $sql = "UPDATE tbl_sobre_cabecalho SET ativo= 1 WHERE idSobreCabecalho=".$ativarCabecalho->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      $PDOconex->query($update);

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/sobre/visu_sobre_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function DisableCabecalho($desativarCabecalho){
      $sql = "UPDATE tbl_sobre_cabecalho SET ativo= 0 WHERE idSobreCabecalho=".$desativarCabecalho->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/sobre/visu_sobre_view.php');
      }else{
        echo "erro";
      }

      $conex->Desconectar();
    }

    public function SelectCabecalhoAtivo(){
      // Select no banco
      $sql = "SELECT * FROM tbl_sobre_cabecalho WHERE ativo=1";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listCabecalho[] = new SobreCabecalho();

        $listCabecalho[$cont]->idSobreCabecalho = $result['idSobreCabecalho'];
        $listCabecalho[$cont]->fotoCabecalho = $result['fotoCabecalho'];
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
}

 ?>
