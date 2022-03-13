<?php
include_once('../classes/Papagaio.php');

/* entrada de valores */
$nome = filter_var($_POST['nome']);
$peso = filter_var($_POST['peso'], FILTER_SANITIZE_NUMBER_FLOAT);
$cor = filter_var($_POST['cor']);
$bico = filter_var($_POST['bico']);
$filhote = filter_var($_POST['filhote']);
$acao = filter_var($_POST['acao']);

/* retorno padrão */
$retorno = [
    'acao_solicitada' => '',
    'mensagem' => 'Dados retornados com sucesso!',
    'codigo' => 200
];

/* tratamentos */
if(!$peso) {
    $retorno['codigo'] = 400;
    $retorno['mensagem'] = 'O campo peso está inválido!';
}

/* caso de sucesso */
if($retorno['codigo'] === 200) {
    $papagaio = new Papagaio($nome, $peso, $cor, $bico, $filhote);
    $retorno['acao_solicitada'] = call_user_func(array($papagaio, $acao));
}

/* retorno JSON API */
header('Content-Type: application/json');
http_response_code($retorno['codigo']);
echo json_encode($retorno);