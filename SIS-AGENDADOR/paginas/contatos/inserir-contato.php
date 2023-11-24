<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Agendador 1.0</title>
</head>

<body>
    <header>
        <h3>Inserir Contato</h3>
    </header>
</body>

</html>
<?php
$nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
$enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
$sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
$dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);

$sql = "INSERT INTO tbcontatos (
            nomeContato,
            emailContato,
            telefoneContato,
            enderecoContato,
            sexoContato,
            dataNascContato
        ) VALUES (
            '{$nomeContato}',
            '{$emailContato}',
            '{$telefoneContato}',
            '{$enderecoContato}',
            '{$sexoContato}',
            '{$dataNascContato}'
        )";
$rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta. " . mysqli_error($conexao));

if ($rs) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Inserir Contato</h4>
        <p>Contato inserido com sucesso.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=contatos">Voltar para a lista de contatos.</a>
        </p>
    </div>
<?php
} else {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Erro</h4>
        <p>O contato não pôde ser inserido.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=contatos">Voltar para a lista de contatos.</a>
        </p>
    </div>
<?php
}
?>