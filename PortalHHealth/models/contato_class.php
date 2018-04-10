<?php
/* Autor: Vinicius
   Data de modificação: 10/04/18
   Class: Contato
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */

 class Contato {
   public $idDadoContato;
   public $nome;
   public $telefone;
   public $celular;
   public $email;
   public $sugestao_critica;
   public $texto;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

   public function Select(){
     $sql = "SELECT * FROM tbl_dado_contato";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listContato[] = new Contato();

       $listContato[$cont]->idDadoContato = $result['idDadoContato'];
       $listContato[$cont]->nome = $result['nome'];
       $listContato[$cont]->telefone = $result['telefone'];
       $listContato[$cont]->celular = $result['celular'];
       $listContato[$cont]->email = $result['email'];
       $listContato[$cont]->sugestao_critica = $result['sugestao_critica'];
       $listContato[$cont]->texto = $result['texto'];

       //incrementa o contador
       $cont += 1;
    }

     //Chama função que encerra conexao no banco
     $conex->Desconectar();

     if (isset($listContato)) {
         return $listContato;
     }
   }

   public function Excluir($info_Contato){
     $sql = "DELETE FROM tbl_dado_contato WHERE idDadoContato= $info_Contato->idDadoContato;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);
    header('location:views/cms/contatos/visu_contatosRecebidos_view.php');
   }

 }
 ?>
