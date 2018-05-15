<?php
  /* Autor: João Victor
     Data de modificação: 14/05/2018
     Controller: Plano
     Obs: Controller para realizar CRUD de Plano
   */

  class controllerCmsPlano{

      public function Novo(){
        // novo objeto
        $plano = new Plano();

        // pega o conteudo
        $plano->nome = $_POST['txtPlano'];
        $plano->idConvenio = $_POST['sltConvenio'];
        $plano->consulta = $_POST['sltConsulta'];
        $plano->exame = $_POST['sltExame'];
        $plano->prontoSocorro = $_POST['sltPS'];
        $plano->internacao = $_POST['sltInternacao'];

        $plano::Insert($plano);
      }

      public function ListarConteudoAtivo(){
        $plano = new Plano();
        return $plano::SelectConteudoAtivo();
      }

      public function ListarConteudo(){
        $plano = new Plano();
        return $plano::SelectConteudo();
      }

      public function ExcluirConteudo() {
        $idConteudo = $_GET['id'];

        $excluirConteudo = new Plano();

        $excluirConteudo->id = $idConteudo;
        $excluirConteudo::DeleteConteudo($excluirConteudo);
      }
  }
 ?>
