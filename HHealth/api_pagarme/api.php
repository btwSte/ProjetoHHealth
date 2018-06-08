<?php

  require __DIR__.'/pagarme/pagarme-php/Pagarme.php';

  PagarMe::setApiKey('ak_test_8WyR0RFHABj4zuSDjFJfy6QpYk6Z0M');


  $req = null;
  $type = 'credit_card';
  // $type = 'boleto';

  switch($type){

    case 'credit_card':
      $req = array(
      "amount" => 10000, //10000
      "card_number" => "4111111111111111", //"4111111111111111"
      "card_cvv" => "123", //123
      "card_expiration_month" => "09", //"09"
      "card_expiration_year" => "22", //"22"
      "card_holder_name" => "Bruna", //"John Doe"
      "payment_method" => "credit_card", //"credit_card"
      "installments" => "1", // 1
      "customer" => array(
          "external_id" => "1", // "1"
          "name" => "Bruna", //"John Doe"
          "type" => "individual", //"Individual"
          "country" => "br", // "br"
          "documents" => array(
            array(
              "type" => "cpf", //"cpf"
              "number" => "00000000000" //"00000000000"
            )
          ),
          "phone_numbers" => array( "+551199999999" ), // "+5511999999999"
          "email" => "aardvark.silva@pagar.me" // "aardvark.silva@pagar.me"
      ),
      "billing" => array(
        "name" => "Bruna", // "John Doe"
        "address" => array(
            "country" => "br", //"br"
            "street" => "Avenida Brigadeiro Faria Lima", // "Av. Brigadeiro Faria lima"
            "street_number" => "1811", //"1811"
            "state" => "sp", // "sp"
            "city" => "Sao Paulo", //"São Paulo"
            "neighborhood" => "Jardim Paulistano", // "Jardim Paulistano"
            "zipcode" => "01451001" //"01451001"
        )
      ),
      "items" => array(
        array(
          "id" => "ID DO ITEM", //"ID do ITEM"
          "title" => "NOME DO ITEM", // "NOme do ITem"
          "unit_price" => 7500, //"PRecoUnitario"
          "quantity" => 1, //"Quantidade"
          "tangible" => false //"false" -- Não é um bem fisico como um sapato ou camiseta,
          //mas sim uma poltrona que será utilizada até o fim de sua viagem
        )
      )
    );
    break;

  case 'boleto':
    $req = array(
    'amount' => 1000, //10000
    'payment_method' => 'boleto', //"boleto"
    'postback_url' => 'http://requestb.in/pkt7pgpk', //"http://requestb.in/pkt7pgpk"
    'customer' => array(
        'type' => 'individual', //"individual"
        'country' => 'br', //"br"
        'name' => 'Aardvark Silva', //"Aardvark Silva"
        'email' => 'aardvark.silva@pagar.me', //"aardvark.silva@pagar.me"
        'documents' => [
            [
                'type' => 'cpf', //"cpf"
                'number' => '00000000000' //"0000000000000"
            ]
        ]
      )
    );
    break;
  }

  $transaction = new PagarMe_Transaction($req);
  // public function buscarTransacao($id_transacao){

  // }
  $var = $transaction->charge();

?>
