<?php
// Aqui será a validação do formato do CEP
function validarCEP($cep) {
    return preg_match('/^\d{5}-\d{3}$/', $cep);
}

// Aqui será a validação o formato do telefone
function validarTelefone($telefone) {
    return preg_match('/^\(\d{2}\)\s\d{5}-\d{4}$/', $telefone);
}

// Aqui receberá os dados do formulário preenchido pelo usuário
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

// Validação dos dados
$errors = [];
if (empty($nome) || !ctype_alpha($nome)) {
    $errors[] = "Nome inválido.";
}
if (empty($endereco)) {
    $errors[] = "Endereço inválido.";
}
if (empty($cep) || !validarCEP($cep)) {
    $errors[] = "CEP inválido.";
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "E-mail inválido.";
}
if (empty($telefone) || !validarTelefone($telefone)) {
    $errors[] = "Telefone inválido.";
}
if (empty($cpf) || !ctype_digit($cpf)) {
    $errors[] = "CPF inválido.";
}

// Aqui será a mensagem caso ocorra um erro
if (!empty($errors)) {
    echo "Os seguintes erros foram encontrados:<br>";
    foreach ($errors as $error) {
        echo "- " . $error . "<br>";
    }
} else {
    // Aqui processa os dados
    echo "Dados válidos! Formulário enviado com sucesso.";
}