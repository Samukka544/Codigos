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
        <h3>Atualizar Contato</h3>
    </header>
</body>

</html>
<?php
$idContato = mysqli_real_escape_string($conexao, $_POST["idContato"]);
$nomeContato = mysqli_real_escape_string($conexao, $_POST["nomeContato"]);
$emailContato = mysqli_real_escape_string($conexao, $_POST["emailContato"]);
$telefoneContato = mysqli_real_escape_string($conexao, $_POST["telefoneContato"]);
$sexoContato = mysqli_real_escape_string($conexao, $_POST["sexoContato"]);
$enderecoContato = mysqli_real_escape_string($conexao, $_POST["enderecoContato"]);
$dataNascContato = mysqli_real_escape_string($conexao, $_POST["dataNascContato"]);

$sql = "UPDATE tbcontatos SET
        nomeContato = '{$nomeContato}',
        emailContato = '{$emailContato}',
        telefoneContato = '{$telefoneContato}',
        sexoContato = '{$sexoContato}',
        enderecoContato = '{$enderecoContato}',
        dataNascContato = '{$dataNascContato}'
        WHERE idContato = '{$idContato}'";

$rs = mysqli_query($conexao, $sql);

if ($rs) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Atualizar Contato</h4>
        <p>Contato atualizado com sucesso.</p>
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
        <p>O contato não pôde ser atualizado.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=contatos">Voltar para a lista de contatos.</a>
        </p>
    </div>
<?php
}
?>
?>