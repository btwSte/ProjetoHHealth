<?php
 /* Autor: Stéphanie
    Data de modificação: 24/04/18
    Class: Trabalhe conosco
    Obs: Replica dos campos do BD com os metodos de ações do CRUD
  */

 class ProcedimentoCabecalho{
   public $idProcedimentoCabecalho;
   public $fotoCabecalho;
   public $tituloFoto;
   public $tituloCabecalho;
   public $ativo;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

   //FUNÇÕES REFERENTE AO CABEÇALHO
     //Insere o registro no BD
     public function Insert($procedimentoCabecalho) {
       //deixa os outros cabecalhos desativados
       $update = "UPDATE tbl_procedimento_cabecalho SET ativo='0' WHERE idProcedimentoCabecalho > '0';";

       //recebe valor para inserir cabecalho como ativo
       $ativo = '1';



       $sql = "INSERT INTO tbl_procedimento_cabecalho (fotoCabecalho, tituloFoto, tituloCabecalho, ativo)
           VALUES ('".$procedimentoCabecalho->fotoCabecalho."',
                   '".$procedimentoCabecalho->tituloFoto."',
                   '".$procedimentoCabecalho->tituloCabecalho."',
                 '".$ativo."')";


       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       //executa o update
       $PDOconex->query($update);

       //executa script no banco
       if ($PDOconex->query($sql))
         header('location:'.$voltaUm.'views/cms/procedimentos/cadastroProcedimentos_view.php');
         // echo $sql;
       else
         echo "Erro no cadastro";

       //Chama função que encerra conexao no banco
       $conex->Desconectar();
     }

     public function SelectCabecalho() {
       // Select no banco
       $sql = "SELECT * FROM tbl_procedimento_cabecalho ORDER BY idProcedimentoCabecalho DESC";

       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       $select = $PDOconex->query($sql);

       //inicia contador em 0
       $cont = 0;

       //guarda resultado
       while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
         $listCabecalho[] = new Procedimentos();

         $listCabecalho[$cont]->idProcedimentoCabecalho = $result['idProcedimentoCabecalho'];
         $listCabecalho[$cont]->fotoCabecalho = $result['fotoCabecalho'];
         $listCabecalho[$cont]->tituloFoto = $result['tituloFoto'];
         $listCabecalho[$cont]->tituloCabecalho = $result['tituloCabecalho'];
         $listCabecalho[$cont]->ativo = $result['ativo'];

         //incrementa o contador
         $cont += 1;
      }

      $conex->Desconectar();

      if (isset($listCabecalho)) {
          return $listCabecalho;
      }

     }

     public function SelectCabecalhoById($procedimento){
       $sql = "SELECT * FROM tbl_procedimento_cabecalho WHERE idProcedimentoCabecalho=".$procedimento->id;

       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       $select = $PDOconex->query($sql);

       if($result = $select->fetch(PDO::FETCH_ASSOC)){
       $procedimentoResultado = new controllerCmsProcedimentos();

       $procedimentoResultado->idProcedimentoCabecalho = $result['idProcedimentoCabecalho'];
       $procedimentoResultado->fotoCabecalho = $result['fotoCabecalho'];
       $procedimentoResultado->tituloFoto = $result['tituloFoto'];
       $procedimentoResultado->tituloCabecalho = $result['tituloCabecalho'];
       $procedimentoResultado->ativo = $result['ativo'];

       }else{
         echo "Nada encontrado";
       }

       $conex->Desconectar();

       if (isset($procedimentoResultado)) {
         return $procedimentoResultado;
       }
     }

     public function DeleteCabecalho($excluirCabecalho){
       // Select no banco
       $sql = "DELETE FROM tbl_procedimento_cabecalho WHERE idProcedimentoCabecalho=".$excluirCabecalho->id;

       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       if ($PDOconex->query($sql)) {
         header('location:'.$voltaUm.'views/cms/visu_procedimentos_view.php');
       }else{
         echo "erro ao deletar";
       }

       $conex->Desconectar();

     }

     public function UpdateCabecalho($procedimento){
       if ($procedimento->foto == "vazio") {
         $sql = "UPDATE tbl_procedimento_cabecalho SET
             tituloFoto='".$procedimento->tituloFoto."',
             tituloCabecalho='".$procedimento->tituloCabecalho."'
             WHERE idProcedimentoCabecalho=".$procedimento->id;
       } else {
         $sql = "UPDATE tbl_procedimento_cabecalho SET
           fotoCabecalho='".$procedimento->fotoCabecalho."',
           tituloFoto='".$procedimento->tituloFoto."',
           tituloCabecalho='".$procedimento->tituloCabecalho."'
           WHERE idProcedimentoCabecalho=".$procedimento->id;
       }
       // echo $sql;
       $conex = new Mysql_db();

       $PDOconex = $conex->Conectar();

       if ($PDOconex->query($sql)) {
         header('location:'.$voltaUm.'views/cms/cadastroProcedimentos_view.php');
       }else{
         echo "erro";
       }

       $conex->Desconectar();
     }

     public function ActivateCabecalho($ativarCabecalho){
       $sql = "UPDATE tbl_procedimento_cabecalho SET ativo= 1 WHERE idProcedimentoCabecalho=".$ativarCabecalho->id;

       $conex = new Mysql_db();

       $PDOconex = $conex->Conectar();

       if ($PDOconex->query($sql)) {
         header('location:'.$voltaUm.'views/cms/visu_procedimentos_view.php');
       }else{
         echo "erro";
       }

       $conex->Desconectar();
     }

     public function DisableCabecalho($desativarCabecalho){
       $sql = "UPDATE tbl_procedimento_cabecalho SET ativo= 0 WHERE idProcedimentoCabecalho=".$desativarCabecalho->id;

       $conex = new Mysql_db();

       $PDOconex = $conex->Conectar();

       if ($PDOconex->query($sql)) {
         header('location:'.$voltaUm.'views/cms/visu_procedimentos_view.php');
       }else{
         echo "erro";
       }

       $conex->Desconectar();
     }



 }
 ?>
