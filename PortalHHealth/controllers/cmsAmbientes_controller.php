<?php
  /* Autor: Vinicius
     Data de criação: 03/04/18
     Controller: Ambientes
     Obs: Controller para realizar CRUD da pagina Informacoes e verifica login
   */

class controllerCmsAmbientes{
    function Logar(){
      $Login = new Login();

      $Login->cpf = $_POST['cpf'];
      $Login->senha = $_POST['senha'];

      Login::Logar($Login);
    }

        // FUNÇÕES REFENTE AO CABEÇALHO
    public function NovoCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');

        // novo objeto
        $informacaoCabecalho = new Ambientes();

        // pega o conteudo
        $informacaoCabecalho->tituloFoto = $_POST['txt1'];
        $informacaoCabecalho->tituloPagina = "";

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;

        //pega a foto
        if (!empty($_FILES['imagem_cabecalho']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'], 'arquivos');
          if ($diretorio_completo == 'Erro'){
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
                  $movUpload = false;
          } else {
            $movUpload = true;
          }
        } else {
          $imagem_file = false;
        }

        $informacaoCabecalho->foto = $diretorio_completo;
        $informacaoCabecalho::Insert($informacaoCabecalho);
      }
      public function ListarCabecalho(){
        $cabecalho = new Ambientes();
        return $cabecalho::SelectCabecalho();
      }


}
?>
