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
        <h3>Excluir Contato</h3>
    </header>
</body>

</html>
<?php
$idContato = mysqli_real_escape_string($conexao, $_GET["idContato"]);
$sql = "DELETE FROM tbcontatos WHERE idContato= '{$idContato}'";

$rs = mysqli_query($conexao, $sql);

if ($rs) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Excluir Contato</h4>
        <p>Contato excluído com sucesso.</p>
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
        <p>O contato não pôde ser excluído.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=contatos">Voltar para a lista de contatos.</a>
        </p>
    </div>
<?php
}
?>