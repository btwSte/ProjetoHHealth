<?php
#require_once("cms/conexao.php");



 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" type="text/css" href="../../css/stylePaciente.css"s>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Scattered Polaroids Gallery: A flat-style take on a Polaroid gallery" />
		<meta name="keywords" content="scattered polaroids, image gallery, javascript, random rotation, 3d, backface, flat design" />
		<meta name="author" content="Codrops" />
		<script src="../../js/modernizr.min.js"></script>
  </head>
  <body>

      <?php include("header.php"); ?>

      
  		<script src="../../js/classie.js"></script>
  		<script src="../../js/photostack.js"></script>
  		
      <div  id="opcao" class="button shrink">
          <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Menu
          </span>
      </div>
    <main>
        <?php include("menuLateral.php"); ?>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "270px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        <div id="containerConteudo">
			<div id="segura_form_perfil">
				<form name="frmEditarPerfil"></form>
				<div class="barraTexto">
					EDITAR PERFIL
				</div> 
				<div class="seguraSelect">
					<div class="linhaBorderPerfil"></div>
					<div class="linhaTextPerfil">Dados Pessoais</div>
				</div>	
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtNome" placeholder="Nome" maxlength="255" class="input">
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="date" name="txtDt_nasc" placeholder="Data de Nascimento" maxlength="255" class="inputDuplo">
						<select name="sltopcaoUm" class="select">
                            <option value="1">Estado Civil</option>
                            <option value="2"></option>                          
                        </select>
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtNacionalidade" placeholder="Nacionalidade" maxlength="255" class="inputDuplo">
						<select name="sltopcaoUm" class="select">
                            <option value="1">Sexo</option>
                            <option value="2"></option>                          
                        </select>
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtRg" placeholder="RG" maxlength="255" class="inputDuplo">
						<input type="text" name="txtCpf" placeholder="CPF" maxlength="255" class="inputDuploML">
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtTelefone" placeholder="Telefone" maxlength="255" class="inputDuplo">
						<input type="text" name="txtCelular" placeholder="Celular" maxlength="255" class="inputDuploML">
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="email" name="txtEmail" placeholder="Email" maxlength="255" class="input">
                   </div>
				</div>
				<!-- Endereço -->
				<div class="seguraSelect">
					<div class="linhaBorderPerfil"></div>
					<div class="linhaTextPerfil">Endereço</div>
				</div>	
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtSituacao" placeholder="Insira" maxlength="255" class="input">
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtSituacao" placeholder="Insira" maxlength="255" class="inputDuplo">
						<select name="sltopcaoUm" class="select">
                            <option value="1">Preencher</option>
                            <option value="1"></option>
                            <option value="1"></option>                            
                        </select>
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtNacionalidade" placeholder="Nacionalidade" maxlength="255" class="inputDuplo">
						<select name="sltopcaoUm" class="select">
                            <option value="1">Sexo</option>
                            <option value="2"></option>                          
                        </select>
                   </div>
				</div>
				<div class="seguraSelect">
					<div class="barraTxt">
                        <input type="text" name="txtSituacao" placeholder="Insira" maxlength="255" class="input">
                   </div>
				</div>	
				<div class="seguraSelect">
					<input type="text" name="txtBairro" placeholder="Bairro" maxlength="255" class="inputTrio">
					
					<input type="text" name="txtNumero" placeholder="Numero" maxlength="255" class="inputTrioML">
					
					<input type="text" name="txtComplemento" placeholder="Complemento" maxlength="255" class="inputTrioML">

				</div>
				<div class="seguraSelect">
					<div class="linhaBorderPerfil"></div>
					<div class="linhaTextPerfil">Documentação</div>
				</div>
				<div class="seguraSelect">
					<input type="file" name="curriculo"  size="16" id="file_upload" />
				</div>
				<div class="seguraSelect">
					<input type="file" name="curriculo"  size="16" />
				</div>
				<div class="seguraSelect">
					<input type="file" name="curriculo"  size="16" />
				</div>
				<div class="Editar_crud">
        			<input type="submit" value="SALVAR" id="logout" >
				</div>
			</div>
        </div>
    </main>
	<!-- footer/Rodapé -->
    <?php include("footer.php"); ?>

  </body>
</html>
