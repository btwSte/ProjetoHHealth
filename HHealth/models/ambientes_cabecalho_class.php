<?php
  /*Autor: Stéphanie
     Data de modificação: 24/04/18
     Class: Cabecalho Ambientes
     Obs: Controller para realizar CRUD do cabecalho da pagina Ambientes e verifica login
   */


  class AmbienteCabecalho{
    public $idAmbienteCabecalho;
    public $foto;
    public $tituloFoto;
    public $tituloPagina;
    public $ativo;

    function __construct(){
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CABEÇALHO
      //Insere o registro no BD
      public function Insert($informacaoCabecalho) {
        //deixa os outros cabecalhos desativados
        $update = "UPDATE tbl_ambiente_cabecalho SET ativo='0' WHERE idAmbienteCabecalho > '0';";

        //recebe valor para inserir cabecalho como ativo
        $ativo = '1';

        //insert que vai para o banco
        $sql = "INSERT INTO tbl_ambiente_cabecalho (foto, tituloFoto, tituloPagina, ativo)
            VALUES ('".$informacaoCabecalho->foto."',
                    '".$informacaoCabecalho->tituloFoto."',
                    '".$informacaoCabecalho->tituloPagina."',
                    '".$ativo."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa o update
        $PDOconex->query($update);

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
          $listCabecalho[] = new AmbienteCabecalho();

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
        $cabecalhoResultado = new AmbienteCabecalho();

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
          header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
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
          header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
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
          header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
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
          header('location:'.$voltaUm.'views/cms/ambientes/visu_Ambientes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function SelectCabecalhoAtivo(){
        // Select no banco
        $sql = "SELECT * FROM tbl_ambiente_cabecalho WHERE ativo=1";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listCabecalho[] = new AmbienteCabecalho();

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
  }

?>
