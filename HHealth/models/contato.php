<?php
/*
   Autor: Vinicius
   Data de criação: 06/04/18
   Class: Contato
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
*/

class Contato
{

  public $idDadoContato;
  public $nome;
  public $telefone;
  public $celular;
  public $email;
  public $sugestao_critica;
  public $texto;


  function __construct()
  {
    require_once('bd_class.php');
  }

  public function Insert($informacaoContato) {
    $sql = "INSERT INTO tbl_dado_contato (nome, telefone, celular, email, sugestao_critica, texto)
    VALUES ('".$informacaoContato->nome."',
            '".$informacaoContato->telefone."',
            '".$informacaoContato->celular."',
            '".$informacaoContato->email."',
            '".$informacaoContato->susgestao_critica."',
            '".$informacaoContato->texto."');";


    //instancia a classe do banco
    $conex = new Mysql_db();

    //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    $PDOconex = $conex->Conectar();

    //executa script no banco
    if ($PDOconex->query($sql))
      header('');
    else
      echo "Erro no cadastro";

    //Chama função que encerra conexao no banco
    $conex->Desconectar();
  }

}

 ?>
