<?php
  /* Autor: Bruno, Stéphanie
     Data de modificação: 07/05/18
     Class: medico
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Medico {
    public $nome;
    public $telefone;
    public $celular;
    public $dtAdmissao;
    public $rg;
    public $cpf;
    public $crm;
    public $dtNasc;
    public $idEndereco;
    // public $fotoCrm;
    // public $fotoMedico;
    // public $email;
    public $senha;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function Insert($medico) {

        $sql = "INSERT INTO tbl_medico (dtAdmissao, nome, rg, cpf, crm, dtNasc, idEndereco)
            VALUES ('".$medico->dtAdmissao."',
                    '".$medico->nome."',
                    '".$medico->rg."',
                    '".$medico->cpf."',
                    '".$medico->crm."',
                    '".$medico->dtNasc."',
                    '".$medico->idEndereco."')";


                    // telefone, celular, email, fotoCrm, fotoMedico, '".$medico->telefone."',
                    // '".$medico->celular."',
                    // '".$medico->email."',
                    // '".$medico->fotoCrm."',
                    // '".$medico->fotoMedico."',
                    //
        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();
        echo $sql;
        //executa script no banco
        if ($PDOconex->query($sql))
          header('location:'.$voltaUm.'views/administrativo/medico/cadastroMedico_view.php');
        else
          echo "Erro no cadastro";

        //Chama função que encerra conexao no banco
        $conex->Desconectar();
      }


      public function SelectMedico(){
        $sql="SELECT * FROM tbl_medico where cpf=".$_SESSION['LogCpf'];

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //Guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $info_medico[] = new Medico();

          $info_medico[$cont]->idMedico = $result['idMedico'];
          $info_medico[$cont]->idCargo = $result['idCargo'];
          $info_medico[$cont]->dtAdmissao = $result['dtAdmissao'];
          $info_medico[$cont]->nome = $result['nome'];
          $info_medico[$cont]->rg = $result['rg'];
          $info_medico[$cont]->cpf  = $result['cpf'];
          $info_medico[$cont]->crm = $result['crm'];
          $info_medico[$cont]->dtNasc = $result['dtNasc'];
          $info_medico[$cont]->idEndereco = $result['idEndereco'];
          $info_medico[$cont]->idEspecialidade = $result['idEspecialidade'];
          $info_medico[$cont]->senha = $result['senha'];


          $_SESSION['LogEspe'] = $result['idEspecialidade'];

          //incrementa o contador
          $cont += 1;
        }
        //Chama função que encerra conexao no banco
        $conex->Desconectar();

        if (isset($info_medico)) {
            return $info_medico;
        }
      }


  }
?>
