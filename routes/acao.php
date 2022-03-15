<?php
include_once('../classes/Papagaio.php');
include_once('../classes/PastorAlemao.php');

session_start();

/* entrada de valores */
$acao = filter_var($_POST['acao']);

/* retorno padrão */
$retorno = [
  'acao_solicitada' => '',
  'mensagem' => 'Dados retornados com sucesso!',
  'codigo' => 200
];

// recebendo instancia da classe para utilização dos métodos
$animal = unserialize($_SESSION['animal']['instancia']);
$retorno['acao_solicitada'] = call_user_func(array($animal, $acao));

/* tratamentos */
if(!$retorno['acao_solicitada']) {
  $retorno['codigo'] = 400;
  $retorno['mensagem'] = 'A ação solicitada não pode ser executada!';
}

/* retorno JSON API */
header('Content-Type: application/json');
http_response_code($retorno['codigo']);
echo json_encode($retorno);

