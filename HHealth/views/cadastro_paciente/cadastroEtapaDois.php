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
            <div class="segura_form">
                <form name="frmCadastroPaciente" action="">

                    <div class="barraTituloFormulario">
                        CADASTRO DE PACIENTE
                    </div> 
                    <div class="barraEtapaFormulario"> Etapa 2 / 3 </div>

                    <div class="barraInformacaoFormularioInter">CEP</div>
                    <div class="barraInputFormularioFirst">

                        <input type="text" required placeholder="" name="txtCep" value="" maxlength="255" class="inputMax">
                    </div>
                    
                    <div class="barraInformacaoFormularioInter">Endereço</div>
                    <div class="barraInputFormularioFirst">

                        <input type="text" required placeholder="" name="txtEndreco" value="" maxlength="255" class="inputMax">
                    </div>
                    
                    <div class="barraInformacaoFormularioLeft">Cidade</div>
                    <div class="barraInformacaoFormularioLeft">Estado</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <select name="sltCidade">
                                <option value="*">Cidade</option>
                                <option value="1">Barueri</option>
                                <option value="2">Itapevi</option>                            
                            </select>
                        </div>
                        <div class="barraSemiImputDuos">
                            <select name="sltEstado">
                                <option value="*">Estado</option>
                                <option value="1">SP</option>
                                <option value="2">RJ</option>                            
                            </select>
                        </div>
                    </div>

                    <div class="barraInformacaoFormularioLeft">Numero</div>
                    <div class="barraInformacaoFormularioLeft">Bairro</div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <input type="tex" required placeholder="" name="txtNumero" value="" maxlength="255" class="inputRedux">
                        </div>
                        <div class="barraSemiImputDuos">
                            <input type="text" required placeholder="" name="txtBairro" value="" maxlength="255" class="inputReduxRight">
                        </div>
                    </div>
                    
                    <div class="barraInformacaoFormularioLeft">Plano de Convenio</div>
                    <div class="barraInformacaoFormularioRight"></div>
                    <div class="barraInputFormularioDuo">
                        <div class="barraSemiImputDuos">
                            <select name="sltConvenio">
                                <option value="*">Convênio</option>
                                <option value="1">Bradesco - Premium</option>
                                <option value="2">Bradesco - Gold</option>                            
                            </select>
                        </div>  
                        <div class="barraSemiImputDuos">
                            
                        </div>
                    </div>
                    
                    <div class="barraBotaoFormularioTwo">
                        <button type="submit" name="btnEtapa" value="Enviar">CONTINUAR</button>
                    </div>

                </form>
            </div>
        </main>
        
    </body>
</html>