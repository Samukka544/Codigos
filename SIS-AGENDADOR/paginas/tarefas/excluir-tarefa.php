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

    <?php

    $idTarefa = $_GET["idTarefa"];

    $sql = "DELETE FROM tbtarefas WHERE idTarefa = '{$idTarefa}'";
    $rs = mysqli_query($conexao, $sql);
    if ($rs) {
    ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Excluir Tarefa</h4>
            <p>Tarefa excluída com sucesso.</p>
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
            <p>A tarefa não pôde ser excluída.</p>
            <hr>
            <p class="mb-0">
                <a href="?menuop=tarefas">Voltar para a lista de tarefas.</a>
            </p>
        </div>
    <?php
    }
    ?>
</body>