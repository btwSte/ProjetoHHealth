<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/normalize.css">
        <script src="../../js/jquery.js"></script>
        <script src="../../js/modernizr.min.js"></script>
        <title>Cadastro de Paciente</title>
    </head>
    <body>
        <header>

        </header>
        <main>
            <div id="segura_form_tbc">
                <form name="frmCadastroPaciente" action="">

                    <div class="barraTituloFormulario">
                        CADASTRO DE PACIENTE
                    </div> 
                    <div class="barraEtapaFormulario"> Etapa 1 / 3 </div>

                    <div class="barraInformacaoFormularioInter">Nome</div>
                    <div class="barraInputFormularioFirst">

                        <input type="text" required placeholder="" name="txtNome" value="" maxlength="255" class="inputMax">
                    </div>

                    <div class="barraInformacaoFormularioLeft">Data de Nascimento</div>
                    <div class="barraInformacaoFormularioRight">Estado Civil</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <input type="text" required placeholder="" name="txtDtnasc" value="" maxlength="255" class="inputRedux">
                        </div>
                        <div class="barraSemiImputDuos">
                            <select name="sltEstadoCivil" class="select" required>
                                <option value="*" required>Estado Civil</option>
                                <option value="1">Casado</option>
                                <option value="2">Solteiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="barraInformacaoFormularioLeft">Sexo</div>
                    <div class="barraInformacaoFormularioRight">Nacionalidade</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <select name="sltSexo">
                                <option value="*">Sexo</option>
                                <option value="1">Masculino</option>
                                <option value="2">Feminino</option>                            
                            </select>
                        </div>
                        <div class="barraSemiImputDuos">
                            <select name="barraInformacaoFormularioRight" class="select">
                                <option value="*">Nacionalidade</option>
                                <option value="1">Brasilerira</option>
                                <option value="2">Portuguesa</option>
                            </select>
                        </div>
                    </div>                 

                    <div class="barraInformacaoFormularioLeft">N° do RG</div>
                    <div class="barraInformacaoFormularioRight">N° do CPF</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <input type="text" required placeholder="" name="txtRg" value="" maxlength="255" class="inputRedux">
                        </div>
                        <div class="barraSemiImputDuos">
                            <input type="text" required placeholder="" name="txtCpf" value="" maxlength="255" class="inputReduxRight">
                        </div>
                    </div>

                    <div class="barraInformacaoFormularioLeft">Telefone</div>
                    <div class="barraInformacaoFormularioRight">Celular</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <input type="tex" required placeholder="" name="txtTelefone" value="" maxlength="255" class="inputRedux">
                        </div>
                        <div class="barraSemiImputDuos">
                            <input type="text" required placeholder="" name="txtCelular" value="" maxlength="255" class="inputReduxRight">
                        </div>
                    </div>


                    <div class="barraInformacaoFormularioLeft">Email</div>
                    <div class="barraInformacaoFormularioRight">Senha</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <input type="email" required placeholder="" name="txtEmail" value="" maxlength="255" class="inputRedux">
                        </div>
                        <div class="barraSemiImputDuos">
                            <input type="password" required placeholder="" name="txtSenha" value="" maxlength="255" class="inputReduxRight">
                        </div>
                    </div>

                    <div class="barraBotaoFormulario">
                        <button type="submit" name="btnEtapa" value="Enviar">CONTINUAR</button>
                    </div>

                </form>
            </div>
        </main>
       
    </body>
</html>