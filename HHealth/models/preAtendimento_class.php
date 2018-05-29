<?php
/*
   Autor: Michel
   Data de criação: 14/05/2018
   Class: Contato
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
*/

class preAtendimento
{

  public $idPreAtendimento;
  public $situacao;
  public $sintomas;


  function __construct()
  {
    require_once('bd_class.php');
  }

  public function Insert($dadoPreAtendimento) {
    $sql = "INSERT INTO tbl_pre_atendimento (situacao , sintomas)
    VALUES ('".$dadoPreAtendimento->situacao."',
            '".$dadoPreAtendimento->sintomas."');";

      //instancia a classe do banco
     $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();


       // echo $sql;

    //executa script no banco
    if ($PDOconex->query($sql)){
      echo "<script>alert('Enviado Com Sucesso!');
            top.location.href='views/paginas_paciente/preAtendimento_views.php';
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
