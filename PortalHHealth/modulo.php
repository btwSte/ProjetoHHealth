<?php
  function salvaImagem($file, $caminho){
    $erro = "Erro";

    $diretorio_imagem = $caminho . "/";
    $nome_arquivo = basename($file['name']);

    //verifica extensão
    if (strstr($nome_arquivo, '.jpg') || strstr($nome_arquivo, '.png') || strstr($nome_arquivo, '.jpeg')) {
      $extensao = substr($nome_arquivo, strpos($nome_arquivo, "."), 5);
      $prefixo = substr($nome_arquivo, 0, strpos($nome_arquivo, "."));
      $nome_arquivo = md5($prefixo) . $extensao;
      $diretorio_completo = $diretorio_imagem . $nome_arquivo;

      if (move_uploaded_file($file['tmp_name'], $diretorio_completo)) {
        return $diretorio_completo;
      } else{
        return $erro;
      }
    } else{
      return $erro;
    }
  }

 ?>
