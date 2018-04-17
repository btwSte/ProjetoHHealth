<?php
  require_once('variaveis.php');

  $action2 = "modo=novoconteudo";
  $action = "modo=novocabecalho";

  $idUnidadeCabecalho = null;
  $fotoCabecalho = null;
  $tituloFoto = null;
  $idUnidade = null;
  $fotoUnidade = null;
  $endereco = null;
  $email = null;
  $telefone = null;
  $cnpj = null;
  $nome = null;
  $cep = null;
  $logradouro = null;
  $bairro = null;
  $numero = null;

  //if do conteudo do CABEÇALHO
  if (isset($cabecalhoResultado)) {
    $idUnidadeCabecalho = $cabecalhoResultado->idUnidadeCabecalho;
    $fotoCabecalho = $cabecalhoResultado->fotoCabecalho;
    $tituloFoto = $cabecalhoResultado->tituloFoto;
    $action = "modo=editarcabecalho&id=".$idUnidadeCabecalho;
  }

  // if do conteudo de endereco e unidade
  if (isset($conteudoResultado)) {
    $idUnidade = $conteudoResultado->idUnidade;
    $fotoUnidade = $conteudoResultado->fotoUnidade;
    $idEndereco = $conteudoResultado->idEndereco;
    $email = $conteudoResultado->email;
    $telefone = $conteudoResultado->telefone;
    $cnpj = $conteudoResultado->cnpj;
    $nome = $conteudoResultado->nome;
    $logradouro = $conteudoResultado->logradouro;
    $numero = $conteudoResultado->numero;
    $bairro = $conteudoResultado->bairro;
    $cep = $conteudoResultado->cep;

    $action2 = "modo=editarconteudo&id=".$idUnidade."&idEnd=".$idEndereco;
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CMS - Cadastrar Procedimentos</title>
    <link rel="stylesheet" type="text/css" href="css/Frajola.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="js/modernizr.min.js"></script>
  </head>
  <body>
    <?php
      if (isset($cabecalhoResultado)) {
        include("views/header-editar.php");
      } else if (isset($conteudoResultado)){
        include("views/header-editar.php");
      } else {
        include("views/header.php");
      }

    ?>



      <div class="container">
			<!-- Top Navigation -->





  		</div><!-- /container -->
  		<script src="js/classie.js"></script>
  		<script src="js/photostack.js"></script>
  		<script>
  			 [].slice.call( document.querySelectorAll( '.photostack' ) ).forEach( function( el ) { new Photostack( el ); } );

  			new Photostack( document.getElementById( 'photostack-1' ), {
  				callback : function( item ) {
  					console.log(item)
  				}
  			} );
  			new Photostack( document.getElementById( 'photostack-2' ), {
  				callback : function( item ) {
  					console.log(item)
  				}
  			} );
  			new Photostack( document.getElementById( 'photostack-3' ), {
  				callback : function( item ) {
  					console.log(item)
  				}
  			} );



  		</script>
      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
          </span>
      </div>
    <main>

        <?php include("views/menuLateral-editar.php"); ?>



        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>



       <div class="segura_form_tbc">
         <form class="frmConteudoUnidade" action="router.php?controller=cmsUnidades&<?php echo($action); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Cadastro: Cabeçalho informações</p>
           </div>

             <div  class="text">
               <input type="file" name="imagem_cabecalho"  size="16" />
             </div>

             <div class="text">
               <input id="tel" placeholder="Texto da imagem:" type="text" name="txt1" value="<?php echo($tituloFoto); ?>"  maxlength="60">
             </div>

             <div id="btn_tbc">
               <input type="submit" name="btnEnviar" value="Enviar">
             </div>

             <div class="imagem_cabecalho">
                <img src="<?php echo($fotoCabecalho); ?>" alt="" style="width:200px; height:200px;">
             </div>
         </form>

       </div>


       <div class="segura_form_tbc">
         <form class="frmConteudoUnidade" action="router.php?controller=cmsUnidades&<?php echo($action2); ?>" method="post" enctype="multipart/form-data">
           <div class="tit">
             <p>Editar unidades:</p>
           </div>



             <div  class="text">
               <input type="file" name="imagem_conteudo"  size="16" />
             </div>

             <div  class="text">
               <input id="tel" placeholder="CNPJ" maxlength="255" type="text" name="txtCnpj" value="<?php echo $cnpj ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="Nome da Unidade" maxlength="255" type="text" name="txtNome" value="<?php echo $nome ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="Email da Unidade" maxlength="255" type="text" name="txtEmail" value="<?php echo $email; ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="Telefone" type="text" name="txtTel" value="<?php echo $telefone ?>"  maxlength="60">
             </div>

             <div class="imagem_cabecalho">
                <img src="<?php echo($fotoUnidade); ?>" alt="" style="width:200px; height:200px;">
             </div>

             <div class="tit">
               <p>Endereço: </p>
             </div>

             <div  class="text">
               <input id="tel" placeholder="Logradouro" maxlength="255" type="text" name="txtLogradouro" value="<?php echo $logradouro; ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="N°" maxlength="255" type="text" name="txtNum" value="<?php echo $numero; ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="Bairro" maxlength="255" type="text" name="txtBairro" value="<?php echo $bairro; ?>"  maxlength="255">
             </div>

             <div  class="text">
               <input id="tel" placeholder="CEP" maxlength="255" type="text" name="txtCep" value="<?php echo $cep; ?>"  maxlength="255">
             </div>

           <div id="btn_tbc">
             <input type="submit" name="btnEnviarConteudo" value="Enviar">
           </div>


         </form>


       </div>


      </main>s
  </body>
</html>
