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



   public function Selecionar(){
     $sql = "SELECT tbl_paciente.*,
	      tbl_endereco.*
     FROM tbl_paciente
	    INNER JOIN tbl_endereco
       ON tbl_paciente.idEndereco = tbl_endereco.idEndereco
        WHERE tbl_paciente.idPaciente =".$_SESSION['Login'];
        // echo $sql;
     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     //guarda resultado
     $listContato = new Paciente();
     if ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listContato->idPaciente = $result['idPaciente'];
       $listContato->nome = $result['nome'];
       $listContato->dtNasc = $result['dtNasc'];
       $listContato->idEstadoCivil = $result['idEstadoCivil'];
       $listContato->sexo = $result['sexo'];
       $listContato->nacionalidade = $result['nacionalidade'];
       $listContato->idTipoSanguineo = $result['idTipoSanguineo'];
       $listContato->rg = $result['rg'];
       $listContato->cpf = $result['cpf'];
       $listContato->telResidencial = $result['telResidencial'];
       $listContato->celular = $result['celular'];
       $listContato->email = $result['email'];
       $listContato->senha = $result['senha'];
       $listContato->idEndereco = $result['idEndereco'];
       $listContato->idConvenio = $result['idConvenio'];
       $listContato->fotoRg = $result['fotoRg'];
       $listContato->fotoCpf = $result['fotoCpf'];
       $listContato->valido = $result['valido'];
       $listContato->fotoConvenio = $result['fotoConvenio'];
       $listContato->fotoPaciente = $result['fotoPaciente'];
       //incrementa o contador
    }

     //Chama função que encerra conexao no banco
     $conex->Desconectar();

     if (isset($listContato)) {
         return $listContato;
     }
   }


 }

?>
