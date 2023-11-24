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
        <h3>Inserir Evento</h3>
    </header>
</body>

</html>
<?php
$tituloEvento = mysqli_real_escape_string($conexao, $_POST["tituloEvento"]);
$descricaoEvento = mysqli_real_escape_string($conexao, $_POST["descricaoEvento"]);
$dataInicioEvento = mysqli_real_escape_string($conexao, $_POST["dataInicioEvento"]);
$horaInicioEvento = mysqli_real_escape_string($conexao, $_POST["horaInicioEvento"]);
$dataFimEvento = mysqli_real_escape_string($conexao, $_POST["dataFimEvento"]);
$horaFimEvento = mysqli_real_escape_string($conexao, $_POST["horaFimEvento"]);

$sql = "INSERT INTO tbeventos (
            tituloEvento,
            descricaoEvento,
            dataInicioEvento,
            dataFimEvento,
            horaInicioEvento,
            horaFimEvento
        ) VALUES (
            '{$tituloEvento}',
            '{$descricaoEvento}',
            '{$dataInicioEvento}',
            '{$dataFimEvento}',
            '{$horaInicioEvento}',
            '{$horaFimEvento}'
        )";
$rs = mysqli_query($conexao, $sql);

if ($rs) {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Inserir Evento</h4>
        <p>Evento inserido com sucesso.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=eventos">Voltar para a lista de Eventos.</a>
        </p>
    </div>
<?php
} else {
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Erro</h4>
        <p>O Evento não pôde ser inserido.</p>
        <hr>
        <p class="mb-0">
            <a href="?menuop=eventos">Voltar para a lista de Eventos.</a>
        </p>
    </div>
<?php
}
?>