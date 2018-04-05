<?php
  /* Autor: Stéphanie
     Data de modificação: 04/04/18
     Class: Sobre
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Sobre {
    public $idSobreCabecalho;
    public $fotoCabecalho;
    public $tituloFoto;
    public $tituloPagina;
    public $idPaginaSobre;
    public $fotoSobre;
    public $textoSobre;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CABEÇALHO
      //Insere o registro no BD
      public function Insert($sobreCabecalho) {

        $sql = "INSERT INTO tbl_sobre_cabecalho (fotoCabecalho, tituloFoto, tituloPagina)
            VALUES ('".$sobreCabecalho->fotoCabecalho."',
                    '".$sobreCabecalho->tituloFoto."',
                    '".$sobreCabecalho->tituloPagina."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:../PortalHHealth/views/cms/cadastroSobre_view.php');
        else
          echo "Erro no cadastro";

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
          $listSobre[] = new Sobre();

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
        $cabecalhoResultado = new Sobre();

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
          header('location:../PortalHHealth/views/cms/visu_sobre_view.php');
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
          header('location:../PortalHHealth/views/cms/cadastroSobre_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function ActivateCabecalho($ativarCabecalho){
        $sql = "UPDATE tbl_sobre_cabecalho SET ativo= 1 WHERE idSobreCabecalho=".$ativarCabecalho->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_sobre_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_sobre_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
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
          header('location:../PortalHHealth/views/cms/cadastroSobre_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_sobre_view.php');
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
          header('location:../PortalHHealth/views/cms/cadastroSobre_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_sobre_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_sobre_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }
  }
?>
