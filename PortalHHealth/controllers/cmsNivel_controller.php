<?php
  /* Autor: Michel
     Data de modificação: 17/05/2018
     Controller: Niveis de Acesso
     Obs: Controller para realizar CRUD dos niveis
   */

  class controllerCmsNivel{

      public function Novo(){

        // novo objeto
        $nivel = new Nivel();

        // pega o conteudo
        $nivel->nivel = $_POST['txtNivel'];

        $nivel::Insert($nivel);

      }


      public function Listar(){
        $nivel = new Nivel();
        return $nivel::Select();
      }

      public function Excluir() {
        $idNivelPortal = $_GET['id'];

        $excluir = new Nivel();

        $excluir->id = $idNivelPortal;
        $excluir::Delete($excluir);
      }

  }
 ?>
