<?php
  /* Autor: Michel
     Data de modificação: 25/04/18
     Controller: Home
     Obs: Controller para realizar CRUD da pagina Home e verifica login
   */

class controllerCmsHome{

    function Logar(){
      $Login = new Login();

      $Login->cpf = $_POST['cpf'];
      $Login->senha = $_POST['senha'];

      Login::Logar($Login);
    }
    
    // FUNÇÕES REFERENTE AO CONTEUDO
    public function NovoConteudoHome(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        
        //Novo Objeto
        $conteudoHome = new Home();
        
        //Pega o Conteudo
        $conteudoHome->txtSlide = $_POST['txtSlide'];
        
        $conteudoHome->txtMissao = $_POST['txtMissao'];
        $conteudoHome->txtVisao = $_POST['txtVisao'];
        $conteudoHome->txtValores = $_POST['txtValores'];
       
        $conteudoHome->txtLinkUm = $_POST['txtLinkUm'];
        $conteudoHome->txtLinkDois = $_POST['txtLinkDois'];
        $conteudoHome->txtLinkTres = $_POST['txtLinkTres'];
           
        //Inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        
        //Pega as Foto
        
        if (!empty($_FILES['imgLogo']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgLogo'], 'arquivos');
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
        
        if (!empty($_FILES['imgSlide']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgSlide'], 'arquivos');
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
        
        if (!empty($_FILES['imgMissao']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgMissao'], 'arquivos');
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
      
        if (!empty($_FILES['imgVisao']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgVisao'], 'arquivos');
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
        
        if (!empty($_FILES['imgValores']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgValores'], 'arquivos');
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
        
        if (!empty($_FILES['imgFundo']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgFundo'], 'arquivos');
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
        
        if (!empty($_FILES['imgRedeUm']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgRedeUm'], 'arquivos');
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
        
        if (!empty($_FILES['imgRedeDois']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgRedeDois'], 'arquivos');
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
        
        if (!empty($_FILES['imgRedeTres']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imgRedeTres'], 'arquivos');
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
        
        $conteudoHome->imgLogo = $diretorio_completo;
        $conteudoHome->imgSlide = $diretorio_completo;
        $conteudoHome->imgMissao = $diretorio_completo;        
        $conteudoHome->imgVisao = $diretorio_completo;
        $conteudoHome->imgValores = $diretorio_completo;
        $conteudoHome->imgFundo = $diretorio_completo;        
        $conteudoHome->imgRedeUm = $diretorio_completo;
        $conteudoHome->imgRedeDois = $diretorio_completo;
        $conteudoHome->imgRedeTres = $diretorio_completo;
        
        $conteudoHome::InsertConteudo($conteudoHome);
    }
        
    public function ListarHome(){
        $conteudo = new Home();
        return $conteudo::SelectHome();
        
  }
    
     public function ExcluirHome() {
        $idPaginaHome = $_GET['id'];

        $excluirHome = new Home();

        $excluirHome->id = $idPaginaHome;
        $excluirHome::DeleteHome($excluirHome);
         
         return $excluirHome::DeleteHome($excluirHome);
      }   
    
        public function BuscarConteudo(){
        $idPaginaHome = $_GET['id'];

        $conteudo= new Home();

        $conteudo->id = $idPaginaHome;

        $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

        require_once('views/cms/home/editarHome_view.php');
      }
    
    
}
?>
