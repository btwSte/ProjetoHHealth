<?php
  /* Autor: Stephanie
     Data de modificação: 27/03/18
     Class: bd
     Obs: Faz conexao com o banco
   */

  class Mysql_db {
    private $server;
    private $user;
    private $password;
    private $dataBaseName;

    //metodo mágico ou construtor
    public function __construct(){
      //Servidor
      // $this->server = "192.168.1.1";
      // $this->user = "health";
      // $this->password = "devsystem123";
      // $this->dataBaseName = "dbhhealth";

      //Local
      $this->server = "localhost";
      $this->user = "root";
      $this->password = "bcd127";
      $this->dataBaseName = "dbhhealth";

    }

    //Conectar no DB
    public function Conectar() {

      try {
        //Abre conexao com o BD utilizando a biblioteca PDO
        $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->dataBaseName, $this->user, $this->password);

        return $conexao;
      } catch (PDOException $erro) {
        echo ("Erro ao conectar com o BD.<br>
        Linha do Erro: ".$erro->getLine()."<br>
        Mensagem do Erro: ".$erro->getMessage());
      }



    }

    //Desconectar no BD
    public function Desconectar() {
      //elimina conexao com o banco de dados
      $conexao = null;
    }
  }

?>
