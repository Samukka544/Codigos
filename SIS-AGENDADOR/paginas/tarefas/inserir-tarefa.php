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
        <h3>Inserir Tarefa</h3>
    </header>
</body>

</html>
<?php
$tituloTarefa = mysqli_real_escape_string($conexao, $_POST["tituloTarefa"]);
$descricaoTarefa = mysqli_real_escape_string($conexao, $_POST["descricaoTarefa"]);
$dataConclusaoTarefa = mysqli_real_escape_string($conexao, $_POST["dataConclusaoTarefa"]);
$horaConclusaoTarefa = mysqli_real_escape_string($conexao, $_POST["horaConclusaoTarefa"]);
$dataLembreteTarefa = mysqli_real_escape_string($conexao, $_POST["dataLembreteTarefa"]);
$horaLembreteTarefa = mysqli_real_escape_string($conexao, $_POST["horaLembreteTarefa"]);
$recorrenciaTarefa = mysqli_real_escape_string($conexao, $_POST["recorrenciaTarefa"]);

$sql = "INSERT INTO tbtarefas (
            tituloTarefa,
            descricaoTarefa,
            dataConclusaoTarefa,
            horaConclusaoTarefa,
            dataLembreteTarefa,
            horaLembreteTarefa,
            recorrenciaTarefa
        ) VALUES (
            '{$tituloTarefa}',
            '{$descricaoTarefa}',
            '{$dataConclusaoTarefa}',
            '{$horaConclusaoTarefa}',
            '{$dataLembreteTarefa}',
            '{$horaLembreteTarefa}',
            '{$recorrenciaTarefa}'
        )";
$rs = mysqli_query($conexao, $sql);

if ($rs) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Inserir Tarefa</h4>
        <p>Tarefa inserida com sucesso.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=tarefas">Voltar para a lista de tarefas.</a>
        </p>
    </div>
<?php
} else {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Erro</h4>
        <p>A tarefa não pôde ser inserida.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=tarefas">Voltar para a lista de tarefas.</a>
        </p>
    </div>
<?php
}
?>