<?php
  /* Autor: João Victor
     Data de modificação: 14/05/2018
     Controller: Plano
     Obs: Controller para realizar CRUD de Especialidade
   */

  class controllerCmsEspecialidade{

      public function Novo(){
        // novo objeto
        $especialidade = new Especialidade();

        // pega o conteudo
        $especialidade->nome = $_POST['txtNome'];

        $especialidade::Insert($especialidade);
      }
  }
 ?>
