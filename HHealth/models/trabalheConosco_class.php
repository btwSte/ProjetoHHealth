<?php
/*
   Autor: Vinicius
   Data de criação: 06/04/18
   Class: Contato
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
*/

class TrabaConosco
{

  public $idCurriculo;
  public $nome;
  public $telefone;
  public $celular;
  public $email;
  public $profissao;
  public $curriculo;


  function __construct()
  {
    require_once('bd_class.php');
  }

  public function Insert($dadoCurriculo) {
    $sql = "INSERT INTO tbl_trabalheconosco (nome , telefone , celular , email , profissao , curriculo )
    VALUES ('".$dadoCurriculo->nome."',
            '".$dadoCurriculo->telefone."',
            '".$dadoCurriculo->celular."',
            '".$dadoCurriculo->email."',
            '".$dadoCurriculo->profissao."',
            '".$dadoCurriculo->curriculo."');";





      //instancia a classe do banco
     $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();


       // echo $sql;

    //executa script no banco
    if ($PDOconex->query($sql)){
      echo "<script>alert('Enviado Com Sucesso!');
            top.location.href='views/paginas/trabalheConosco_view.php';
            </script>";


    }
    else
    echo "<script>
          alert('Erro no envio.');
          </script>";


    //Chama função que encerra conexao no banco
    $conex->Desconectar();
  }

}

 ?>
