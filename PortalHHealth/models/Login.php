<?php
 session_start();
/**
 * Created by PhpStorm.
 * User: vinic
 * Date: 27/03/2018
 * Time: 21:28
 */

class Login
{

    public $cpf;
    public $senha;


    public function __construct()
    {
        require_once('bd_class.php');
    }

    public function Logar($Login)
    {
        //$sql="SELECT * FROM tbl_login where cpf='$Login->cpf' and senha='$Login->senha';";

        // Instancia a classe do DB
        $dbConnection = new Mysql_db();

        //Chama o metodo para Conectar no DB e guarda o retorno da conexao da variavel $PDOconex
        $PDOconex = $dbConnection->Conectar();

        /*//executa o comando SQL no banco via PDO
        if ($PDOconex->query($sql)) {
            echo("<script> alert('Hello! I am an alert box!!'); </script>");
        }else {
            echo "erro ao Logar";
        }*/
        // echo "SELECT * FROM tbl_login where cpf='$Login->cpf' and senha='$Login->senha';";

        $validarlogin = $PDOconex->query("SELECT * FROM tbl_login where cpf='$Login->cpf' and senha='$Login->senha';");
        $validarlogin = $PDOconex->prepare("SELECT * FROM tbl_login where cpf='$Login->cpf' and senha='$Login->senha';");


        $validarlogin->execute();

        if($validarlogin->rowCount() == 1)
        {
            while($ln = $validarlogin->fetch(PDO::FETCH_ASSOC))
            {
               $_SESSION['LogCod'] = $ln['idLogin'];
              // echo($_SESSION['LogCod']);
              echo "<script>alert('Logado Com Sucesso!');
                    top.location.href='views/cms/cmsHome_view.php';
                    </script>";

            };
        }
        else
        {
          echo "<script>alert('Login Incorreto');
              top.location.href='index.php';
              </script>";

        }
    }

}
