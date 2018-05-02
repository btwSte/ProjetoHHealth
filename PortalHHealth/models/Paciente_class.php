<?php
/* Autor: Vinicius
   Data de modificação: 02/05/18
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
  public $valido;
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

   public function AtivarPaciente($dadoPaciente){
     $sql = "UPDATE tbl_paciente SET valido= 1 WHERE idPaciente=".$dadoPaciente->id;

     $conex = new Mysql_db();

     $PDOconex = $conex->Conectar();

     if ($PDOconex->query($sql)) {
       header('location:'.$voltaUm.'views/administrativo/Ativar_Paciente.php');
     }else{
       echo "erro";
     }

     $conex->Desconectar();

   }
   public function DesativarPaciente($dadoPaciente){
     $sql = "UPDATE tbl_paciente SET valido= 0 WHERE idPaciente=".$dadoPaciente->id;

     $conex = new Mysql_db();

     $PDOconex = $conex->Conectar();

     if ($PDOconex->query($sql)) {
       header('location:'.$voltaUm.'views/administrativo/Ativar_Paciente.php');
     }else{
       echo "erro";
     }

     $conex->Desconectar();
   }

   public function Selecionar(){
     $sql = "SELECT * FROM tbl_paciente";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listContato[] = new Paciente();
       $listContato[$cont]->idPaciente = $result['idPaciente'];
       $listContato[$cont]->nome = $result['nome'];
       $listContato[$cont]->dtNasc = $result['dtNasc'];
       $listContato[$cont]->idEstadoCivil = $result['idEstadoCivil'];
       $listContato[$cont]->sexo = $result['sexo'];
       $listContato[$cont]->nacionalidade = $result['nacionalidade'];
       $listContato[$cont]->idTipoSanguineo = $result['idTipoSanguineo'];
       $listContato[$cont]->rg = $result['rg'];
       $listContato[$cont]->cpf = $result['cpf'];
       $listContato[$cont]->telResidencial = $result['telResidencial'];
       $listContato[$cont]->celular = $result['celular'];
       $listContato[$cont]->email = $result['email'];
       $listContato[$cont]->senha = $result['senha'];
       $listContato[$cont]->idEndereco = $result['idEndereco'];
       $listContato[$cont]->idConvenio = $result['idConvenio'];
       $listContato[$cont]->fotoRg = $result['fotoRg'];
       $listContato[$cont]->fotoCpf = $result['fotoCpf'];
       $listContato[$cont]->valido = $result['valido'];
       $listContato[$cont]->fotoConvenio = $result['fotoConvenio'];
       $listContato[$cont]->fotoPaciente = $result['fotoPaciente'];

       //incrementa o contador
       $cont += 1;
    }

     //Chama função que encerra conexao no banco
     $conex->Desconectar();

     if (isset($listContato)) {
         return $listContato;
     }
   }

 }

?>
