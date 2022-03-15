<?php
session_start();

/* entrada de valores */
$tipo = filter_var($_POST['tipo']);

/* retorno padrão */
$retorno = [
  'mensagem' => 'Dados retornados com sucesso!',
  'codigo' => 200
];

/* tratamentos */
if($tipo != 'passaro' && $tipo != 'cachorro') {
  $retorno['codigo'] = 400;
  $retorno['mensagem'] = 'O animal informado está incorreto!';
}

$_SESSION['tipo'] = $tipo;

/* retorno JSON API */
header('Content-Type: application/json');
http_response_code($retorno['codigo']);
echo json_encode($retorno);

