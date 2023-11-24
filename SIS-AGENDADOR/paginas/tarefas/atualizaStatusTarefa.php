<?php
include("../../db/conexao.php");
$idTarefa = $_GET["idTarefa"];
$statusTarefa = $_GET["statusTarefa"];

$sql = "UPDATE tbtarefas SET statusTarefa = {$statusTarefa} WHERE idTarefa = {$idTarefa}";
mysqli_query($conexao, $sql);
