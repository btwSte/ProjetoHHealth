<?php
  /* Autor: Michel, Stéphanie
     Data de modificação: 08/05/18
     Controller: Home
     Obs: Controller para realizar CRUD da pagina Home e verifica login
   */

  class controllerCmsHome {
    // FUNÇÕES REFERENTE AO CONTEUDO
    public function NovoConteudoHome(){
      // require da funcao modulo para envio das imagens
      require_once('modulo.php');

      //Novo Objeto
      $conteudoHome = new Home();

      //Pega o Conteudo
      $conteudoHome->textoSlider = $_POST['txtSlide'];

      $conteudoHome->textoMissao = $_POST['txtMissao'];
      $conteudoHome->textoVisao = $_POST['txtVisao'];
      $conteudoHome->textoValores = $_POST['txtValores'];

      $conteudoHome->textoLinkUm = $_POST['txtLinkUm'];
      $conteudoHome->textoLinkDois = $_POST['txtLinkDois'];
      $conteudoHome->textoLinkTres = $_POST['txtLinkTres'];

      //Inicia variaveis
      $diretorio_completo = null;
      $diretorio_completo2 = null;
      $diretorio_completo3 = null;
      $diretorio_completo4 = null;
      $diretorio_completo5 = null;
      $diretorio_completo6 = null;
      $diretorio_completo7 = null;
      $diretorio_completo8 = null;
      $diretorio_completo9 = null;
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
        $diretorio_completo2 = salvaImagem($_FILES['imgSlide'], 'arquivos');
        if ($diretorio_completo2 == 'Erro'){
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
        $diretorio_completo3 = salvaImagem($_FILES['imgMissao'], 'arquivos');
        if ($diretorio_completo3 == 'Erro'){
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
        $diretorio_completo4 = salvaImagem($_FILES['imgVisao'], 'arquivos');
        if ($diretorio_completo4 == 'Erro'){
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
        $diretorio_completo5 = salvaImagem($_FILES['imgValores'], 'arquivos');
        if ($diretorio_completo5 == 'Erro'){
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
        $diretorio_completo6 = salvaImagem($_FILES['imgFundo'], 'arquivos');
        if ($diretorio_completo6 == 'Erro'){
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
        $diretorio_completo7 = salvaImagem($_FILES['imgRedeUm'], 'arquivos');
        if ($diretorio_completo7 == 'Erro'){
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
        $diretorio_completo8 = salvaImagem($_FILES['imgRedeDois'], 'arquivos');
        if ($diretorio_completo8 == 'Erro'){
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
        $diretorio_completo9 = salvaImagem($_FILES['imgRedeTres'], 'arquivos');
        if ($diretorio_completo9 == 'Erro'){
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

      $conteudoHome->fotoLogo = $diretorio_completo;
      $conteudoHome->videoSlider = $diretorio_completo2;
      $conteudoHome->fotoMissao = $diretorio_completo3;
      $conteudoHome->fotoVisao = $diretorio_completo4;
      $conteudoHome->fotoValores = $diretorio_completo5;
      $conteudoHome->fotoFundo = $diretorio_completo6;
      $conteudoHome->redeSocialUm = $diretorio_completo7;
      $conteudoHome->redeSocialDois = $diretorio_completo8;
      $conteudoHome->redeSocialTres = $diretorio_completo9;

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

    public function BuscarConteudo() {
      $idPaginaHome = $_GET['id'];

      $conteudo = new Home();

      $conteudo->id = $idPaginaHome;

      $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

      require_once('views/cms/home/editarHome_view.php');
    }

    public function Atualizar() {
      // require da funcao modulo para envio das imagens
      require_once('modulo.php');
      //pega id
      $idPaginaHome = $_GET['id'];

      //novo objeto
      $atualizaHome = new Home();

      // pega o conteudo
      $atualizaHome->idPaginaHome = $idPaginaHome;

      //Pega o Conteudo
      $atualizaHome->textoSlider = $_POST['txtSlide'];
      $atualizaHome->textoMissao = $_POST['txtMissao'];
      $atualizaHome->textoVisao = $_POST['txtVisao'];
      $atualizaHome->textoValores = $_POST['txtValores'];
      $atualizaHome->textoLinkUm = $_POST['txtLinkUm'];
      $atualizaHome->textoLinkDois = $_POST['txtLinkDois'];
      $atualizaHome->textoLinkTres = $_POST['txtLinkTres'];

      //Inicia variaveis
      $diretorio_completo = null;
      $diretorio_completo2 = null;
      $diretorio_completo3 = null;
      $diretorio_completo4 = null;
      $diretorio_completo5 = null;
      $diretorio_completo6 = null;
      $diretorio_completo7 = null;
      $diretorio_completo8 = null;
      $diretorio_completo9 = null;

      $movUpload = false;
      $imagem_file = null;
      $movUpload2 = false;
      $imagem_file2 = null;
      $movUpload3 = false;
      $imagem_file3 = null;
      $movUpload4 = false;
      $imagem_file4 = null;
      $movUpload5 = false;
      $imagem_file5 = null;
      $movUpload6 = false;
      $imagem_file6 = null;
      $movUpload7 = false;
      $imagem_file7 = null;
      $movUpload8 = false;
      $imagem_file8 = null;
      $movUpload9 = false;
      $imagem_file9 = null;

      $fotoLogo = "a";
      $videoSlider = "a";
      $fotoMissao = "a";
      $fotoVisao = "a";
      $fotoValores = "a";
      $fotoFundo = "a";
      $redeSocialUm = "a";
      $redeSocialDois = "a";
      $redeSocialTres = "a";

      //Pega as Fotos
      //Logotipo
      if (!empty($_FILES['fotoLogo']['name'])){
        $imagem_file = true;
        $diretorio_completo = salvaImagem($_FILES['fotoLogo'], 'arquivos');
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

      if ($imagem_file == true && $movUpload == true) {
        $fotoLogo = $diretorio_completo;
      } else {
        $fotoLogo = "vazio";
      }



      //Foto/GIF do slide
      if (!empty($_FILES['fotoSlide']['name'])){
        $imagem_file2 = true;
        $diretorio_completo2 = salvaImagem($_FILES['fotoSlide'], 'arquivos');
        if ($diretorio_completo2 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload2 = false;
        } else {
          $movUpload2 = true;
        }
      } else {
        $imagem_file2 = false;
      }

      if ($imagem_file2 == true && $movUpload2 == true) {
        $videoSlider = $diretorio_completo2;
      } else {
        $videoSlider = "vazio";
      }


      //Imagem de Missao
      if (!empty($_FILES['fotoMissao']['name'])){
        $imagem_file3 = true;
        $diretorio_completo3 = salvaImagem($_FILES['fotoMissao'], 'arquivos');
        if ($diretorio_completo3 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload3 = false;
        } else {
          $movUpload3 = true;
        }
      } else {
        $imagem_file3 = false;
      }

      if ($imagem_file3 == true && $movUpload == true) {
        $fotoMissao = $diretorio_completo3;
      } else {
        $fotoMissao = "vazio";
      }



      //Imagem de Visao
      if (!empty($_FILES['fotoVisao']['name'])){
        $imagem_file4 = true;
        $diretorio_completo4 = salvaImagem($_FILES['fotoVisao'], 'arquivos');
        if ($diretorio_completo4 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload4 = false;
        } else {
          $movUpload4 = true;
        }
      } else {
        $imagem_file4 = false;
      }

      if ($imagem_file4 == true && $movUpload4 == true) {
        $fotoVisao = $diretorio_completo4;
      } else {
        $fotoVisao = "vazio";
      }



      //Imagem de Valores
      if (!empty($_FILES['fotoValores']['name'])){
        $imagem_file5 = true;
        $diretorio_completo5 = salvaImagem($_FILES['fotoValores'], 'arquivos');
        if ($diretorio_completo5 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload5 = false;
        } else {
          $movUpload5 = true;
        }
      } else {
        $imagem_file5 = false;
      }

      if ($imagem_file5 == true && $movUpload5 == true) {
        $fotoValores = $diretorio_completo5;
      } else {
        $fotoValores = "vazio";
      }


      //Imagem de Fundo
      if (!empty($_FILES['fotoFundo']['name'])){
        $imagem_file6 = true;
        $diretorio_completo6 = salvaImagem($_FILES['fotoFundo'], 'arquivos');
        if ($diretorio_completo6 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload6 = false;
        } else {
          $movUpload6 = true;
        }
      } else {
        $imagem_file6 = false;
      }

      if ($imagem_file6 == true && $movUpload6 == true) {
        $fotoFundo = $diretorio_completo6;
      } else {
        $fotoFundo = "vazio";
      }



      //Imagem de Rede social
      if (!empty($_FILES['fotoRedeUm']['name'])){
        $imagem_file7 = true;
        $diretorio_completo7 = salvaImagem($_FILES['fotoRedeUm'], 'arquivos');
        if ($diretorio_completo7 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload = false;
        } else {
          $movUpload7 = true;
        }
      } else {
        $imagem_file7 = false;
      }

      if ($imagem_file7 == true && $movUpload7 == true) {
        $redeSocialUm = $diretorio_completo7;
      } else {
        $redeSocialUm = "vazio";
      }


      //Imagem de Rede social
      if (!empty($_FILES['fotoRedeDois']['name'])){
        $imagem_file8 = true;
        $diretorio_completo8 = salvaImagem($_FILES['fotoRedeDois'], 'arquivos');
        if ($diretorio_completo8 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload8 = false;
        } else {
          $movUpload8 = true;
        }
      } else {
        $imagem_file8 = false;
      }

      if ($imagem_file8 == true && $movUpload8 == true) {
        $redeSocialDois = $diretorio_completo8;
      } else {
        $redeSocialDois = "vazio";
      }


      //Imagem de Rede social
      if (!empty($_FILES['fotoRedeTres']['name'])){
        $imagem_file9 = true;
        $diretorio_completo9 = salvaImagem($_FILES['fotoRedeTres'], 'arquivos');
        if ($diretorio_completo9 == 'Erro'){
          echo "<script>
                  alert('arquivo nao movido');
                  window.history.go(-1);
                </script>";
                $movUpload9 = false;
        } else {
          $movUpload9 = true;
        }
      } else {
        $imagem_file9 = false;
      }

      if ($imagem_file9 == true && $movUpload9 == true) {
        $redeSocialTres = $diretorio_completo9;
      } else {
        $redeSocialTres = "vazio";
      }

      $atualizaHome->fotoLogo = $fotoLogo;
      $atualizaHome->videoSlider = $videoSlider;
      $atualizaHome->fotoMissao = $fotoMissao;
      $atualizaHome->fotoVisao = $fotoVisao;
      $atualizaHome->fotoValores = $fotoValores;
      $atualizaHome->fotoFundo = $fotoFundo;
      $atualizaHome->redeSocialUm = $redeSocialUm;
      $atualizaHome->redeSocialDois = $redeSocialDois;
      $atualizaHome->redeSocialTres = $redeSocialTres;

      $atualizaHome::Update($atualizaHome);

    }

  }
?>
