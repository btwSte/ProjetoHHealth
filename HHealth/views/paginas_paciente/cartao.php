<?php
  session_start();
  $idConsultaAgendada = "";
  // $poltrona_selecionada = array();
  $meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
  //pega ano do pc
  $ano = date("Y");

  $anos = array($ano, $ano+1, $ano+2, $ano+3,$ano+4);

  // var_dump($_SESSION['_idViagem']);
  require_once("../../models/cadPaciente_class.php");
  require_once("../../controllers/cadastroPaciente_controller.php");
  $paciente = new Paciente();
  $pacienteController = new controllerCadPaciente();

  $paciente = $pacienteController::selectPaciente();
  echo $paciente->nome;
    if(isset($_SESSION['Login'])){
      echo $_SESSION['Login'];
      // echo("id = OK");
      if(isset($_GET["id"])){

        $idConsultaAgendada = $_GET["id"];
        $_SESSION['idConsulta'] = $idConsultaAgendada;

      }else{
        echo("Agendamento = Error");
      }
    }else{
      echo("id = Error");
    }



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../css/stylePaciente.css"s>
    <title>Pagamento da Consulta</title>
    <script src="../../js/jquery-3.3.1.js"></script>
    <script>
      $(document).on("submit", "#_finalizar",function(e){
        e.preventDefault();
        // var ret = [];
        var preco = $('#preco').val();
        alert(preco);
        $.ajax({
          url:'router.php?controller=agendamentoConsulta&modo=cartao',
          type: 'POST',
          data: new FormData($('#_finalizar')[0]),
          processData: false,
          contentType: false,
          async: false,
          // dataType:'json',
          success: function(res){
            // $(".pague").html('<h2>Foi</h2>');

            // console.log(res);
            var resp = JSON.parse(res.substring(res.indexOf('{"object":"transa')-1));
            // console.log(res.substring(res.indexOf('KEY-----\n"}'+1333)));
            // console.log(res.substring(res.indexOf(') "')+13));
            console.log(resp.id);
            console.log(resp.status);
            $.ajax({
              url:`router.php?controller=pagamento&modo=salvar`,
              type: 'POST',
              data: {'transacao_id':resp.id, 'status':resp.status, 'preco': preco},
              success: function(e){
                console.log(e);
              }
            });

            $(".pague").html('<h2>Foi</h2>');
            // console.log(res);
          },
          error: function(a,err,b){
            console.log(err);
          }
        });

      });

    </script>
  </head>
  <body>
    <!-- action="router.php?controller=registro_passagem&modo=compra" -->

    <form id='_finalizar' class="" enctype="multipart/form-data" method="post">

       <div class="cont_pague">
           <div class="text_pague">Bandeiras</div>
          <div class="bandeiras">
            <input type="radio" name="rdband" value="elo" required>
            <img class="img_pague" src="img/icon/elo-icon.png" alt="elo">
          </div>
          <div class="bandeiras">
            <input type="radio" name="rdband" value="visa">
            <img class="img_pague" src="img/icon/Visa-icon.png" alt="">
          </div>
          <div class="bandeiras">
            <input type="radio" name="rdband" value="mastercard">
            <img class="img_pague" src="img/icon/mastercard-icon.png" alt="">
          </div>//
          <div class="bandeiras">
            <input type="radio" name="rdband" value="americanexpress">
            <img class="img_pague" src="img/icon/americanexpress-icon.png" alt="">
          </div>
       </div>
       <div class="line_vertical"></div>
       <div class="registro_pague">
         <div class="text_pague">
            Dados do Titular
          </div>
         <div class="box_pague">
            <input type="text" name="nome" value="<?php echo $paciente->nome;  ?>" >
          </div>
         <div id="cpf" class="box_pague">
            <input type="text" name="cpf" value="<?php echo $paciente->cpf; ?>" >
         </div>
              <div id="celular" class="box_pague">
            <input type="text" name="celular" value="<?php echo $paciente->celular; ?>" >
         </div>
          <input type="hidden" name="email" value="<?php echo $paciente->email; ?>" >
         <h2 class="text_pague subtitulo">Endereco</h2>
         <div id="cep" class="box_pague">
            <input type="text" name="cep" value="<?php echo $paciente->cep; ?>" >
         </div>
         <div id="logradouro" class="box_pague">
            <input type="text" name="logradouro" value="<?php echo $paciente->logradouro; ?>" >
          </div>
          <div id="bairro" class="box_pague">
            <input type="text" name="bairro" value="<?php echo $paciente->bairro; ?>" >
          </div>
          <div id="cidade" class="box_pague">
            <input type="text" name="cidade" value="<?php echo $paciente->cidade; ?>" >
            <input type="hidden" name="uf" value="<?php echo $paciente->uf; ?>">
            <input type="hidden" name="numero" value="<?php echo $paciente->numero; ?>">
          </div>
       </div>
       <div class="line_vertical"></div>
       <div class="cont_pague">
        <h2 class="text_pague subtitulo">Dados do Cartão</h2>
         <div class="box_pague">
            <input type="text" name="cartao"  placeholder="Numero do cartao" maxlength="16" required>
          </div>
         <select class="combo_pague" name="month">
          <?php
            for($a = 0; $a < sizeof($meses); $a++){
              ?><option value="<?php
              if($a < 9){echo('0'.($a+1));}else{echo($a+1);}

               ?>"><?php echo($meses[$a]); ?></option><?php
            }
           ?>
         </select>
         <select class="combo_pague" name="year">
            <?php
            for($a = 0; $a < sizeof($anos); $a++){
              ?><option value="<?php echo(substr($anos[$a],2)); ?>">
              <?php echo($anos[$a]); ?>
              </option><?php
            }
             ?>
         </select>
         <div class="box_pague"><input type="text" name="codigo" value="" maxlength="3" required="required" placeholder="Codigo de segurança"></div>
        <div class="text_pague subtitulo">Parcelamento</div>
         <select class="combo_pague" name="installments">
           <?php
           $a = 1;
            while($a < 5){
              ?>
              <option value="<?php echo $a; ?>"><?php echo $a; ?>x</option>
              <?php
              $a++;
            }

            ?>
         </select>
         <!-- <div>
           Poltrona(s) selecionada(s): <?php //mostraPoltronasSelecionadas($poltrona_selecionada); ?>
         </div>
         <div class="preco">
            Total: R$
           <label><?php //echo($DadosViagem->preco * sizeof($poltrona_selecionada)); ?></label>
           <input type="hidden" value="<?php //echo($DadosViagem->preco * sizeof($poltrona_selecionada)); ?>" name="total"> -->
           <input id="preco" type="hidden" name="preco" value="80">
           <!-- <input type="hidden" name="tipo" value="cartao"> -->
         </div>
       </div> -->
       <div class="cont_pague">
         <div class="finalizar">

      </div>
       </div>
       <div class="cont_pague">
         <div class="text_pague">
            <?php //echo($total); ?>

         </div>
       </div>
       <button type="submit" class="btn">Finalizar Compra</button>
      </form>
  </body>
</html>
