<?php
header('Content-Type: text/html; charset=utf-8');

	class TransacaoController{

		public function cartaoDeCredito(){

			if(isset($_SESSION['idConsulta'])){
			// echo('eee2');

				$req = new Transacao();

				// $preparedCpf = str_replace('-', '',$_POST['cpf']);
				// $cpf = str_replace('.', '', $preparedCpf);
				// echo($cpf);
				$cpf = $_POST['cpf'];


				// $cep = str_replace('-', '',$_POST['cep']);
				// echo $cep;

				$preparedCel = str_replace('(', '', $_POST['celular']);
				$preparedCel = str_replace(')', '', $preparedCel);
				$cell = str_replace('-', '', $preparedCel);
				// echo($_POST['year']);
				// echo("\n e");
				$req->amount = $_POST['total'] * 100;
				$req->card_number= $_POST['cartao'];
				$req->card_brand= $_POST['rdband'];
				$req->card_cvv= $_POST['codigo'];
				$req->card_expiration_month= $_POST['month'];
				$req->card_expiration_year= $_POST['year'];
				$req->card_holder_name= $_POST['nome'];
				$req->installments= $_POST['installments'];
				$req->external_id= $_SESSION['Login'];
				$req->name= $_POST['nome'];
				$req->cpf= "00000000000";
				$req->phone_numbers= '+55'.$cell;
				$req->email= $_POST['email'];
				$req->street= $_POST['logradouro'];
				$req->street_number= $_POST['numero'];
				$req->state= "SP";
				$req->city= "São Paulo";
				$req->neighborhood= $_POST['bairro'];
				$req->zipcode= $cep;
				$req->unit_price= $_POST['preco']*100;
				$req->title= "Cardiologista";
				$req->quantity = 1;
				$req->id=$_SESSION['idConsulta'];
				// echo($req->id);

				$res = $req::viaCartaoDeCredito($req);
				if($res == 1 || $res == true){
					// registrarCompra($compra,$_SESSION['_selected'], $_SESSION['id_usuario'])


				}
			}
		}

		// public function boletoBancario(){
		// 	if(isset($_SESSION['_selected'])){
		// 	// echo('eee2');
		//
		// 		$req = new Transacao();
		//
		// 		$preparedCel = str_replace('(', '', $_POST['celular']);
		// 		$preparedCel = str_replace(')', '', $preparedCel);
		// 		$cell = str_replace('-', '', $preparedCel);
		// 		$cell = str_replace(' ', '', $cell);
		//
		// 		$req->amount = $_POST['total'] * 100;
		// 		$req->name= $_POST['nome'];
		// 		$req->cpf= "00000000000";
		// 		$req->phone_numbers= '+55'.$cell;
		// 		$req->email= $_POST['email'];
		// 		// $req->id=$_SESSION['_idViagem'];
		//
		// 		$res = $req::viaBoleto($req);
		// 		if($res == 1 || $res == true){
		// 			// echo($res);
		// 		}
		// 	}
		// }




	}




 ?>
