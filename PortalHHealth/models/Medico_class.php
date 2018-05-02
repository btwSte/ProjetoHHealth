<?php
  /* Autor: Bruno
     Data de modificação: 02/05/18
     Class: medico
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Medico {
    public $nome;
    public $telefone;
    public $celular;
    public $datAdimicao;
    public $rg;
    public $cpf;
    public $numCrm;
    public $nacimento;
    public $idEndereco;
    public $fotoCrm;
    public $fotomedico;
    public $email;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function Insert($medico) {

        $sql = "INSERT INTO tbl_medico (nome,telefone,celular,datAdimicao,rg,cpf,numCrm,nacimento,idEndereco,fotoCrm,fotomedico,email)
            VALUES ('".$medico->nome."',
                      '".$medico->telefone."',
                      '".$medico->celular."',
                      '".$medico->datAdimicao."',
                      '".$medico->rg."',
                      '".$medico->cpf."',
                      '".$medico->numCrm."',
                      '".$medico->nacimento."',
                      '".$medico->idEndereco."',
                      '".$medico->fotoCrm."',
                      '".$medico->fotomedico."',
                      '".$medico->email."')";

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

      public function Select() {
        // Select no banco
        $sql = "SELECT * FROM tbl_medicamento ORDER BY idMedicamento DESC";

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        //inicia contador em 0
        $cont = 0;

        //guarda resultado
        while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
          $list[] = new Medicamento();

          $list[$cont]->idMedicamento = $result['idMedicamento'];
          $list[$cont]->nome = $result['nome'];
          $list[$cont]->fabricante = $result['fabricante'];

          //incrementa o contador
          $cont += 1;
        }

        $conex->Desconectar();

        if (isset($list)) {
          return $list;
        }

      }

      public function SelectById($conteudo){
        $sql = "SELECT * FROM tbl_medicamento WHERE idMedicamento=".$conteudo->id;
        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        $select = $PDOconex->query($sql);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
        $conteudoResultado = new controllerCmsMedicamento();

        $conteudoResultado->idMedicamento = $result['idMedicamento'];
        $conteudoResultado->nome = $result['nome'];
        $conteudoResultado->fabricante = $result['fabricante'];
        }else{
          echo "Nada encontrado";
        }

        $conex->Desconectar();

        if (isset($conteudoResultado)) {
          return $conteudoResultado;
        }
      }

      public function Delete($excluir){
        // Select no banco
        $sql = "DELETE FROM tbl_medicamento WHERE idMedicamento=".$excluir->id;

        //instancia a classe do banco
        $conex = new Mysql_db();

        //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/medicamento/visu_medicamento_view.php');
        }else{
          echo "erro ao deletar";
        }

        $conex->Desconectar();
      }

      public function Update($conteudo){
          $sql = "UPDATE tbl_medicamento SET
            nome='".$conteudo->nome."',
            fabricante='".$conteudo->fabricante."'
            WHERE idMedicamento=".$conteudo->id;

        $conex = new Mysql_db();

        $PDOconex = $conex->Conectar();

        if ($PDOconex->query($sql)) {
          header('location:'.$voltaUm.'views/administrativo/medicamento/visu_medicamento_view.php');
        }else{
          echo "erro";
        }

        $conex->Desconectar();
      }

  }
?>
