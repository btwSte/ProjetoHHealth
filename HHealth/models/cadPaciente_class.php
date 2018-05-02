<?php
/* Autor: Bruno e Stéphanie
   Data de modificação: 01/05/18
   Class: Cadastro de paciente
   Obs: Class para realizar cadastro de paciente
 */



 class Paciente{

  public $idPaciente;
  public $nome;
  public $dtNasc;
  public $sexo;
  public $rg;
  public $cpf;
  public $senha;
  public $email;
  public $telResidencial;
  public $celular;
  public $nacionalidade;
  public $fotoConvenio;
  public $fotoPaciente;
  public $fotoRg;
  public $fotoCpf;
  public $idEndereco;
  public $idEstadoCivil;
  public $idTipoSanguineo;
  public $idConvenio;
  public $idPlano;





   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }


   // REFERENTE AO CONTEUDO

   public function InsertPaciente($dadoPaciente){
     $sql = "INSERT INTO tbl_paciente (nome, dtNasc, idEstadoCivil, sexo, nacionalidade, idTipoSanguineo, rg, cpf, telResidencial, celular, email, senha, idEndereco, idConvenio, fotoRg, fotoCpf, fotoConvenio, fotoPaciente)
        VALUES ('".$dadoPaciente->nome."',
               '".$dadoPaciente->dtNasc."',
               '".$dadoPaciente->idEstadoCivil."',
                '".$dadoPaciente->sexo."',
                '".$dadoPaciente->nacionalidade."',
                '".$dadoPaciente->idTipoSanguineo."',
                '".$dadoPaciente->rg."',
                '".$dadoPaciente->cpf."',
                '".$dadoPaciente->telResidencial."',
                '".$dadoPaciente->celular."',
                '".$dadoPaciente->email."',
                '".$dadoPaciente->senha."',
                '".$dadoPaciente->idEndereco."',
                '".$dadoPaciente->idConvenio."',
                '".$dadoPaciente->fotoRg."',
                '".$dadoPaciente->fotoCpf."',
                '".$dadoPaciente->fotoConvenio."',
                '".$dadoPaciente->fotoPaciente."')";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();
     echo $sql;
     //executa script no banco
     if ($PDOconex->query($sql)){
       // echo "<script>
       //         alert('Cadastrado com sucesso.');
       //         window.history.go(-1);
       //       </script>";
         header('location:'.$voltaUm.'views/login_paciente/login_view.php');
       } else {
         echo "Erro no cadastro";
         echo $sql;
       }

     //Chama função que encerra conexao no banco
     $conex->Desconectar();
   }


 }

?>
