<?php
 /* Autor: João Victor
    Data de modificação: 25/04/2018
    Class: Cabeçalho da página de Convênios
    Obs: Replica dos campos do BD com os metodos de ações do CRUD
  */

 class ConvenioCabecalho{
   public $idPaginaConvenio;
   public $fotoPrincipal;
   public $tituloPagina;
   public $ativo;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

   //FUNÇÕES REFERENTE AO CABEÇALHO
     //Insere o registro no BD
     public function Insert($convenioCabecalho) {
       //deixa os outros cabecalhos desativados
       $update = "UPDATE pagina_convenio SET ativo='0' WHERE idPaginaConvenio > '0';";

       //recebe valor para inserir cabecalho como ativo
       $ativo = '1';



       $sql = "INSERT INTO pagina_convenio (fotoPrincipal, tituloPagina, ativo)
           VALUES ('".$convenioCabecalho->fotoPrincipal."',
                   '".$convenioCabecalho->tituloPagina."',
                 '".$ativo."')";


       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       //executa o update
       $PDOconex->query($update);

       //executa script no banco
       if ($PDOconex->query($sql))
         header('location:'.$voltaUm.'views/administrativo/convenio/cadastroConvenio_view.php');
         // echo $sql;
       else
         echo "Erro no cadastro";

       //Chama função que encerra conexao no banco
       $conex->Desconectar();
     }

     public function SelectCabecalho(){
       // Select no banco
       $sql = "SELECT * FROM pagina_convenio";

       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       $select = $PDOconex->query($sql);

       //inicia contador em 0
       $cont = 0;

       //guarda resultado
       while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
         $listCabecalho[] = new ConvenioCabecalho();

         $listCabecalho[$cont]->idPaginaConvenio = $result['idPaginaConvenio'];
         $listCabecalho[$cont]->fotoPrincipal = $result['fotoPrincipal'];
         $listCabecalho[$cont]->tituloPagina = $result['tituloPagina'];
         $listCabecalho[$cont]->ativo = $result['ativo'];

         //incrementa o contador
         $cont += 1;
       }

        $conex->Desconectar();

        if (isset($listCabecalho)) {
           return $listCabecalho;
        }
     }

     public function SelectCabecalhoAtivo(){
       // Select no banco
       $sql = "SELECT * FROM pagina_convenio WHERE ativo=1";

       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       $select = $PDOconex->query($sql);

       //inicia contador em 0
       $cont = 0;

       //guarda resultado
       while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
         $listCabecalho[] = new ConvenioCabecalho();

         $listCabecalho[$cont]->idPaginaConvenio = $result['idPaginaConvenio'];
         $listCabecalho[$cont]->fotoPrincipal = $result['fotoPrincipal'];
         $listCabecalho[$cont]->tituloPagina = $result['tituloPagina'];
         $listCabecalho[$cont]->ativo = $result['ativo'];

         //incrementa o contador
         $cont += 1;
       }

        $conex->Desconectar();

        if (isset($listCabecalho)) {
           return $listCabecalho;
        }
     }
   }
