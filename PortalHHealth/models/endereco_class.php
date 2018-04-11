<?php
/* Autor: Stéphanie
   Data de modificação: 11/04/18
   Class: Endereço
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */

  class Endereco {
    public $idEndereco;
    public $logradouro;
    public $numero;
    public $bairro;
    public $cep;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    public function Insert($unidadeConteudo) {
      $sql = "INSERT INTO tbl_endereco (logradouro, numero, bairro, cep)
          VALUES ('".$unidadeConteudo->logradouro."',
                  '".$unidadeConteudo->numero."',
                  '".$unidadeConteudo->bairro."',
                  '".$unidadeConteudo->cep."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql)){
        $select = "SELECT * FROM tbl_endereco ORDER BY idEndereco DESC LIMIT 1";

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
          $enderecoResultado = new controllerCmsEndereco();

          $enderecoResultado->idEndereco = $result['idEndereco'];

        } else {
          echo "Nada encontrado";
        }
      } else {
        echo "Erro no cadastro de endereço";
      }

      if (isset($enderecoResultado)) {
        return $enderecoResultado;
      }


      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }
  }


?>
