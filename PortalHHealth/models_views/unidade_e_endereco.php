<?php
  /* Autor: Stéphanie
     Data de modificação: 23/04/18
     Class: Unidades
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */
   class UnidadeEndereco{

     // Conexão com o banco
     public function __construct() {
       require_once('bd_class.php');
     }

    public function SelectConteudo() {
      // Select no banco
      $sql = "SELECT * FROM tbl_unidade INNER JOIN tbl_endereco ON tbl_endereco.idEndereco = tbl_unidade.idEndereco;";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      $listConteudo=array();

      //guarda resultado
      //$result = $select->fetch(PDO::FETCH_ASSOC);
      while($result = $select->fetch(PDO::FETCH_ASSOC)){
        $listConteudo[] = $result;
      }


     $conex->Desconectar();

     if (count($listConteudo) > 0) {
         return $listConteudo;
     }

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
 }
?>
