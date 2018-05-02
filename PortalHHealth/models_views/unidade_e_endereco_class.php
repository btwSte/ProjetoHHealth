<?php
  /* Autor: Stéphanie
     Data de modificação: 26/04/18
     Class: Unidades
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */
   class UnidadeEndereco{

    // Conexão com o banco
    public function __construct() {

      //  require_once('models/bd_class.php');

    }

    public function SelectConteudoById($conteudo){
      $sql = "SELECT * FROM tbl_unidade INNER JOIN tbl_endereco ON tbl_endereco.idEndereco = tbl_unidade.idEndereco WHERE idUnidade=".$conteudo->id;


      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      if($result = $select->fetch(PDO::FETCH_ASSOC)){
      $conteudoResultado = new controllerCmsUnidades();

      //Faz select da tabela unidade e da tabela endereco
      $conteudoResultado->idUnidade = $result['idUnidade'];
      $conteudoResultado->fotoUnidade = $result['fotoUnidade'];
      $conteudoResultado->nome = $result['nome'];
      $conteudoResultado->cnpj = $result['cnpj'];
      $conteudoResultado->idEndereco = $result['idEndereco'];
      $conteudoResultado->email = $result['email'];
      $conteudoResultado->telefone = $result['telefone'];
      $conteudoResultado->ativo = $result['ativo'];
      $conteudoResultado->logradouro= $result['logradouro'];
      $conteudoResultado->numero= $result['numero'];
      $conteudoResultado->bairro= $result['bairro'];
      $conteudoResultado->cep= $result['cep'];

      }else{
        echo "Nada encontrado";
      }

      $conex->Desconectar();

      if (isset($conteudoResultado)) {
        return $conteudoResultado;
      }
    }

    public function SelectConteudoAtivo(){
      // Select no banco
      $sql = "SELECT * FROM tbl_unidade INNER JOIN tbl_endereco ON tbl_endereco.idEndereco = tbl_unidade.idEndereco WHERE ativo=1";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listConteudo[] = new UnidadeEndereco();

        $listConteudo[$cont]->idUnidade = $result['idUnidade'];
        $listConteudo[$cont]->fotoUnidade = $result['fotoUnidade'];
        $listConteudo[$cont]->nome = $result['nome'];
        $listConteudo[$cont]->cnpj = $result['cnpj'];
        $listConteudo[$cont]->idEndereco = $result['idEndereco'];
        $listConteudo[$cont]->ativo = $result['ativo'];
        $listConteudo[$cont]->email = $result['email'];
        $listConteudo[$cont]->telefone = $result['telefone'];
        $listConteudo[$cont]->logradouro= $result['logradouro'];
        $listConteudo[$cont]->numero= $result['numero'];
        $listConteudo[$cont]->bairro= $result['bairro'];
        $listConteudo[$cont]->cep= $result['cep'];
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
