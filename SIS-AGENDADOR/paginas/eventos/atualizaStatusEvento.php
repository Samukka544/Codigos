<?php
include("../../db/conexao.php");
$idEvento = $_GET["idEvento"];
$statusEvento = $_GET["statusEvento"];

$sql = "UPDATE tbeventos SET statusEvento = {$statusEvento} WHERE idEvento = {$idEvento}";
mysqli_query($conexao, $sql);
