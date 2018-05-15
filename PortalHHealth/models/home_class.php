<?php
    /* Autor: Michel, Stéphanie
     Data de modificação: 08/05/18
     Class: Home
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */


  class Home{
    public $idPaginaHome;
    public $fotoLogo;
    public $videoSlider;
    public $textoSlider;
    public $fotoMissao;
    public $fotoVisao;
    public $fotoValores;
    public $textoMissao;
    public $textoVisao;
    public $textoValores;
    public $fotoFundo;
    public $redeSocialUm;
    public $redeSocialDois;
    public $redeSocialTres;
    public $textoLinkUm;
    public $textoLinkDois;
    public $textoLinkTres;
    public $ativo;
    public $idUnidade;

    //Conexao com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //Referente ao conteudo da Home
    public function InsertConteudo($conteudoHome){

      $sql = "INSERT INTO pagina_home (fotoMissao, fotoVisao, fotoValores, textoMissao, textoVisao, textoValores, fotoFundo, fotoLogo, videoSlider, textoSlider, redeSocialUm, redeSocialDois, redeSocialTres, textoLinkUm, textoLinkDois, textoLinkTres)
      VALUES ('".$conteudoHome->fotoMissao."',
              '".$conteudoHome->fotoVisao."',
              '".$conteudoHome->fotoValores."',
              '".$conteudoHome->textoMissao."',
              '".$conteudoHome->textoVisao."',
              '".$conteudoHome->textoValores."',
              '".$conteudoHome->fotoFundo."',
              '".$conteudoHome->fotoLogo."',
              '".$conteudoHome->videoSlider."',
              '".$conteudoHome->textoSlider."',
              '".$conteudoHome->redeSocialUm."',
              '".$conteudoHome->redeSocialDois."',
              '".$conteudoHome->redeSocialTres."',
              '".$conteudoHome->textoLinkUm."',
              '".$conteudoHome->textoLinkDois."',
              '".$conteudoHome->textoLinkTres."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql)){
        header('location:views/cms/home/cadastroHome_view.php');
        //echo $sql;
      } else {
        echo "Erro no cadastro";
        // echo $sql;
      }

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectHome(){
      // Select no banco
      $sql = "SELECT * FROM pagina_home ORDER BY idPaginaHome DESC";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listCabecalho[] = new Home();

        $listCabecalho[$cont]->idPaginaHome = $result['idPaginaHome'];
        $listCabecalho[$cont]->fotoMissao = $result['fotoMissao'];
        $listCabecalho[$cont]->fotoVisao = $result['fotoVisao'];
        $listCabecalho[$cont]->fotoValores = $result['fotoValores'];
        $listCabecalho[$cont]->textoMissao = $result['textoMissao'];
        $listCabecalho[$cont]->textoVisao = $result['textoVisao'];
        $listCabecalho[$cont]->textoValores = $result['textoValores'];
        $listCabecalho[$cont]->fotoFundo = $result['fotoFundo'];
        $listCabecalho[$cont]->fotoLogo = $result['fotoLogo'];
        $listCabecalho[$cont]->videoSlider = $result['videoSlider'];
        $listCabecalho[$cont]->textoSlider = $result['textoSlider'];
        $listCabecalho[$cont]->redeSocialUm = $result['redeSocialUm'];
        $listCabecalho[$cont]->redeSocialDois = $result['redeSocialDois'];
        $listCabecalho[$cont]->redeSocialTres = $result['redeSocialTres'];
        $listCabecalho[$cont]->textoLinkUm = $result['textoLinkUm'];
        $listCabecalho[$cont]->textoLinkDois = $result['textoLinkDois'];
        $listCabecalho[$cont]->textoLinkTres = $result['textoLinkTres'];


        //incrementa o contador
        $cont += 1;
     }

     $conex->Desconectar();

     if (isset($listCabecalho)) {
        return $listCabecalho;
     }
    }

    public function DeleteHome($excluirHome){
      // Select no banco
      $sql = "DELETE FROM pagina_home WHERE idPaginaHome=".$excluirHome->id;

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:'.$voltaUm.'views/cms/home/visu_home_view.php');
      } else {
        echo "erro ao deletar";
      }

      $conex->Desconectar();
    }

    public function SelectConteudoById($conteudo){
      $sql = "SELECT * FROM pagina_home WHERE idPaginaHome=".$conteudo->id;
      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      if($result = $select->fetch(PDO::FETCH_ASSOC)){
      $conteudoResultado = new Home();

        $conteudoResultado->idPaginaHome = $result['idPaginaHome'];
        $conteudoResultado->fotoMissao = $result['fotoMissao'];
        $conteudoResultado->fotoVisao = $result['fotoVisao'];
        $conteudoResultado->fotoValores = $result['fotoValores'];
        $conteudoResultado->textoMissao = $result['textoMissao'];
        $conteudoResultado->textoVisao = $result['textoVisao'];
        $conteudoResultado->textoValores = $result['textoValores'];
        $conteudoResultado->fotoFundo = $result['fotoFundo'];
        $conteudoResultado->fotoLogo = $result['fotoLogo'];
        $conteudoResultado->videoSlider = $result['videoSlider'];
        $conteudoResultado->textoSlider = $result['textoSlider'];
        $conteudoResultado->redeSocialUm = $result['redeSocialUm'];
        $conteudoResultado->redeSocialDois = $result['redeSocialDois'];
        $conteudoResultado->redeSocialTres = $result['redeSocialTres'];
        $conteudoResultado->textoLinkUm = $result['textoLinkUm'];
        $conteudoResultado->textoLinkDois = $result['textoLinkDois'];
        $conteudoResultado->textoLinkTres = $result['textoLinkTres'];
        // $conteudoResultado->ativo = $result['ativo'];


      } else {
        echo "Nada encontrado";
      }

      $conex->Desconectar();

      if (isset($conteudoResultado)) {
        return $conteudoResultado;
      }
    }

    public function Update($conteudo){
      $sql = "UPDATE pagina_home SET
        textoSlider='".$conteudo->textoSlider."',
        textoMissao='".$conteudo->textoMissao."',
        textoVisao='".$conteudo->textoVisao."',
        textoValores='".$conteudo->textoValores."',
        textoLinkUm='".$conteudo->textoLinkUm."',
        textoLinkDois='".$conteudo->textoLinkDois."',
        textoLinkTres='".$conteudo->textoLinkTres."'
      ";

      if ($conteudo->fotoLogo != "vazio")
        $sql = $sql . ", fotoLogo='".$conteudo->fotoLogo."'";

      if ($conteudo->videoSlider != "vazio")
        $sql = $sql . ", videoSlider='".$conteudo->videoSlider."'";

      if ($conteudo->fotoMissao != "vazio")
        $sql = $sql . ", fotoMissao='".$conteudo->fotoMissao."'";

      if ($conteudo->fotoVisao != "vazio")
        $sql = $sql . ", fotoVisao='".$conteudo->fotoVisao."'";

      if ($conteudo->fotoValores != "vazio")
        $sql = $sql . ", fotoValores='".$conteudo->fotoValores."'";

      if ($conteudo->fotoFundo != "vazio")
        $sql = $sql . ", fotoFundo='".$conteudo->fotoFundo."'";

      if ($conteudo->redeSocialUm != "vazio")
        $sql = $sql . ", redeSocialUm='".$conteudo->redeSocialUm."'";

      if ($conteudo->redeSocialDois != "vazio")
        $sql = $sql . ", redeSocialDois='".$conteudo->redeSocialDois."'";

      if ($conteudo->redeSocialTres != "vazio")
        $sql = $sql . ", redeSocialTres='".$conteudo->redeSocialTres."'";

      $sql = $sql . " WHERE idPaginaHome=".$conteudo->idPaginaHome;


      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        header('location:views/cms/home/visu_home_view.php');
      } else {
        echo "erro";
        // echo $sql;
      }

      $conex->Desconectar();

    }




    }
?>
