<?php

class PagarMe_Request extends PagarMe {
	private $path;
	private $method;
	private $parameters = Array();
	private $headers;
	private $live;

	public function __construct($path, $method, $live = PagarMe::live)
	{
		$this->method = $method;
		$this->path = $path;
		$this->live = $live;
	}
	public function run()
	{
		if(!parent::getApiKey()) {
			throw new PagarMe_Exception("You need to configure API key before performing requests.");
		}

		$this->parameters = array_merge($this->parameters, array( "api_key" => parent::getApiKey()));
		// var_dump($this->parameters);
		// $this->headers = (PagarMe::live) ? array("X-Live" => 1) : array();
		$client = new RestClient(array("method" => $this->method, "url" => $this->full_api_url($this->path), "headers" => $this->headers, "parameters" => $this->parameters ));
		$response = $client->run();
		$decode = json_decode($response["body"], true);
		// $teste = json_decode($response["body"]);
		// $res = str_replace('} {"object":"transaction"',',"object":"transaction"',$response['body']);
		// $resp = json_decode($res);
		// echo($res);
		echo($response['body']);
		// $a = 0;
		// while($a < sizeof($decode)){
			// $a++;
		// }
		if($decode === NULL) {
			throw new Exception("Failed to decode json from response.\n\n Response: ".$response);
		} else {
			if($response["code"] == 200) {
				// echo(json_encode($decode));
				// echo($response['body']);
				return $decode;

			} else {
				throw PagarMe_Exception::buildWithFullMessage($decode);
			}
		}
	}


	public function setParameters($parameters)
   	{
		$this->parameters = $parameters;
	}

	public function getParameters()
	{
		return $this->parameters;
	}
}
