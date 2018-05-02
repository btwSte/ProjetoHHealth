<?php
  /* Autor: Stéphanie
     Data de modificação: 01/05/18
     Class: Login
     Obs: Class para login
   */
class Login {
  public $cpf;
  public $senha;

  // Conexão com o banco
  public function __construct() {
    require_once('bd_class.php');
  }

    function VerificaLogin($verifica){

        // Instancia a classe do DB
        $dbConnection = new Mysql_db();

        //Chama o metodo para Conectar no DB e guarda o retorno da conexao da variavel $PDOconex
        $PDOconex = $dbConnection->Conectar();

        // echo "SELECT * FROM tbl_paciente WHERE cpf='$Login->cpf' AND senha='$Login->senha' AND valido='1';";
        // $validarlogin = $PDOconex->query("SELECT * FROM tbl_login where cpf='$Login->cpf' and senha='$Login->senha';");

        $validarlogin = $PDOconex->query("SELECT * FROM tbl_paciente WHERE cpf='$verifica->cpf' AND senha='$verifica->senha' AND valido='1';");
        $validarlogin = $PDOconex->prepare("SELECT * FROM tbl_paciente WHERE cpf='$verifica->cpf' AND senha='$verifica->senha' AND valido='1';");


        $validarlogin->execute();

        if($validarlogin->rowCount() == 1){
            while($ln = $validarlogin->fetch(PDO::FETCH_ASSOC)){
               $_SESSION['LogCod'] = $ln['idLogin'];
              echo($_SESSION['LogCod']);
              echo "<script>alert('Logado Com Sucesso!');
                    top.location.href='views/paginas_paciente/homePaciente_views.php';
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
 ?>
