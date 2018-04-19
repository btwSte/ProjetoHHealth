<?php
/* Autor: Bruno
   Data de modificação: 18/04/18
   Class: Trabalhe conosco
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */


 class TrabalheConosco{

   public $idCurriculo;
   public $nome;
   public $telefone;
   public $celular;
   public $email;
   public $profissao;
   public $curriculo;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

   public function Select(){
     $sql ="SELECT * FROM tbl_trabalheconosco";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     //inicia contador em 0
     $cont = 0;

     //Guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       # code...
        $listCuriculo[] = new TrabalheConosco();

        $listCuriculo[$cont]->idCurriculo = $result['idCurriculo'];
        $listCuriculo[$cont]->nome  = $result['nome'];
        $listCuriculo[$cont]->telefone = $result['telefone'];
        $listCuriculo[$cont]->celular = $result['celular'];
        $listCuriculo[$cont]->email = $result['email'];
        $listCuriculo[$cont]->profissao = $result['profissao'];
        $listCuriculo[$cont]->curriculo = $result['curriculo'];

        //incrementa o contador
        $cont += 1;

     }
     //Chama função que encerra conexao no banco
     $conex->Desconectar();

     if (isset($listCuriculo)) {
         return $listCuriculo;
     }
   }

   public function Excluir($info_Curriculo){
     $sql = "DELETE FROM tbl_trabalheconosco WHERE idCurriculo= $info_Curriculo->idCurriculo;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);
     // echo $sql;
    header('location:views/administrativo/trabalheConosco/visuTrabalhe_view.php');
   }


 }


 ?>
