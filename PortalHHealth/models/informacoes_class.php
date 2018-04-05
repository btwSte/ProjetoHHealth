<?php
  /* Autor: Stéphanie e Vinicius
     Data de modificação: 01/04/18
     Class: Informacoes
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Informacoes {
    public $idConteudoCabecalho;
    public $foto;
    public $tituloFoto;
    public $tituloPagina;
    public $idPaginaInfoUsuario;
    public $fotoAssunto;
    public $textoAssunto;
    public $ativo;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CABEÇALHO
      //Insere o registro no BD
      public function Insert($informacaoCabecalho) {

        $sql = "INSERT INTO tbl_conteudo_cabecalho (foto, tituloFoto, tituloPagina)
            VALUES ('".$informacaoCabecalho->foto."',
                    '".$informacaoCabecalho->tituloFoto."',
                    '".$informacaoCabecalho->tituloPagina."')";


        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:../PortalHHealth/views/cms/cadastroInformacoes_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }

      public function SelectCabecalho() {
        // Select no banco
        $sql = "SELECT * FROM tbl_conteudo_cabecalho ORDER BY idConteudoCabecalho DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $listCabecalho[] = new Informacoes();

          $listCabecalho[$cont]->idConteudoCabecalho = $result['idConteudoCabecalho'];
          $listCabecalho[$cont]->foto = $result['foto'];
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
        $sql = "SELECT * FROM tbl_conteudo_cabecalho WHERE idConteudoCabecalho=".$cabecalho->id;
        //echo $sql;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
        $cabecalhoResultado = new Informacoes();

        $cabecalhoResultado->idConteudoCabecalho = $result['idConteudoCabecalho'];
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
        $sql = "DELETE FROM tbl_conteudo_cabecalho WHERE idConteudoCabecalho=".$excluirCabecalho->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_informacoes_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();

      }

      public function UpdateCabecalho($cabecalho){
        if ($cabecalho->foto == "vazio") {
          $sql = "UPDATE tbl_conteudo_cabecalho SET
              tituloFoto='".$cabecalho->tituloFoto."',
              tituloPagina='".$cabecalho->tituloPagina."'
              WHERE idConteudoCabecalho=".$cabecalho->id;
        } else {
          $sql = "UPDATE tbl_conteudo_cabecalho SET
            foto='".$cabecalho->foto."',
            tituloFoto='".$cabecalho->tituloFoto."',
            tituloPagina='".$cabecalho->tituloPagina."'
            WHERE idConteudoCabecalho=".$cabecalho->id;
        }
        // echo $sql;
        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/cadastroInformacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function ActivateCabecalho($ativarCabecalho){
        $sql = "UPDATE tbl_conteudo_cabecalho SET ativo= 1 WHERE idConteudoCabecalho=".$ativarCabecalho->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_informacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

      public function DisableCabecalho($desativarCabecalho){
        $sql = "UPDATE tbl_conteudo_cabecalho SET ativo= 0 WHERE idConteudoCabecalho=".$desativarCabecalho->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:../PortalHHealth/views/cms/visu_informacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
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
          header('location:../PortalHHealth/views/cms/cadastroInformacoes_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_informacoes_view.php');
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
          header('location:../PortalHHealth/views/cms/cadastroInformacoes_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_informacoes_view.php');
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
          header('location:../PortalHHealth/views/cms/visu_informacoes_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }
  }
?>
