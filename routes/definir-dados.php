<?php
include_once('../classes/Papagaio.php');
include_once('../classes/PastorAlemao.php');

session_start();

/* entrada de valores */
$nome = filter_var($_POST['nome']);
$peso = filter_var($_POST['peso']);
$corPredominante = filter_var($_POST['corPredominante']);
$corSecundaria = filter_var($_POST['corSecundaria']);
$filhote = filter_var($_POST['filhote']);

/* retorno padrão */
$retorno = [
    'animal' => '',
    'tipo_animal' => '',
    'mensagem' => 'Dados retornados com sucesso!',
    'codigo' => 200
];

/* tratamentos */
if(!$peso) {
    $retorno['codigo'] = 400;
    $retorno['mensagem'] = 'O campo peso está inválido!';
}
if(strlen($nome) <= 2) {
    $retorno['codigo'] = 400;
    $retorno['mensagem'] = 'O campo nome está muito pequeno';
}

if(!$corPredominante) {
    $retorno['codigo'] = 400;
    $retorno['mensagem'] = 'O campo cor predominante está inválido!';
}

if(!$corSecundaria) {
    $retorno['codigo'] = 400;
    $retorno['mensagem'] = 'O campo cor secundária está inválido!';
}

if(is_null($filhote)) {
    $retorno['codigo'] = 400;
    $retorno['mensagem'] = 'O campo filhote está inválido!';
}

/* caso de sucesso */
if($retorno['codigo'] === 200) {
    if($_SESSION['tipo'] == 'passaro') {
        $animal = new Papagaio($nome, $peso, $corPredominante, $corSecundaria, $filhote);
    } else {
        $animal = new PastorAlemao($nome, $peso, $corPredominante, $corSecundaria, $filhote);
    }

    $_SESSION['animal'] = [
        'nome' => $animal->nome, 
        'peso' => $animal->peso, 
        'corPredominante' => $animal->corPredominante, 
        'corSecundaria' => $animal->{$_SESSION['tipo'] == 'passaro' ? 'corDoBico':'corDoRosto'}, 
        'filhote' => $animal->filhote,
        'instancia' => $animal
    ];
    $retorno['tipo_animal'] = $_SESSION['tipo'];
    $retorno['animal'] = $_SESSION['animal'];
}

/* retorno JSON API */
header('Content-Type: application/json');
http_response_code($retorno['codigo']);
echo json_encode($retorno);