<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
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


    public function Insert($pacienteConteudo) {
      $sql = "INSERT INTO tbl_endereco (logradouro, numero, bairro, cep)
          VALUES ('".$pacienteConteudo->logradouro."',
                  '".$pacienteConteudo->numero."',
                  '".$pacienteConteudo->bairro."',
                  '".$pacienteConteudo->cep."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($sql)){
        $select = "SELECT * FROM tbl_endereco ORDER BY idEndereco DESC LIMIT 1";

        $select = $PDOconex->query($select);

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

    // public function Delete($excluirEnd){
    //   // Select no banco
    //   $sql = "DELETE FROM tbl_endereco WHERE idEndereco=".$excluirEnd->idEndereco;
    //
    //   //instancia a classe do banco
    //   $conex = new Mysql_db();
    //
    //   //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    //   $PDOconex = $conex->Conectar();
    //
    //   if ($PDOconex->query($sql)) {
    //     header('location:'.$voltaUm.'views/cms/unidades/visu_unidades_view.php');
    //   }else{
    //     echo "erro ao deletar";
    //   }
    //
    //   $conex->Desconectar();
    // }
    //
    // public function Update($upEnd){
    //   $sql = "UPDATE tbl_endereco SET
    //                 logradouro='".$upEnd->logradouro."',
    //                 numero='".$upEnd->numero."',
    //                 bairro='".$upEnd->bairro."',
    //                 cep='".$upEnd->cep."'  WHERE idEndereco=".$upEnd->idEndereco;
    //
    //   //instancia a classe do banco
    //   $conex = new Mysql_db();
    //
    //   //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    //   $PDOconex = $conex->Conectar();
    //
    //   if ($PDOconex->query($sql)) {
    //     return 1;
    //   }else{
    //     echo "erro ao atualizar end";
    //     return 0;
    //   }
    //
    //   $conex->Desconectar();
    // }
  }


?>
