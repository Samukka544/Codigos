<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Agendador 1.0</title>
</head>

<body>
    <?php
    // Variável da pesquisa
    $txt_pesquisa = (isset($_POST["txt_pesquisa"])) ? $_POST["txt_pesquisa"] : "";
    ?>
    <header>
        <h3><i class="bi bi-list-task"></i> Tarefas</h3>
    </header>
    <div>
        <div>
            <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-tarefa"><i class="bi bi-list-task"></i> Nova Tarefa</a>
        </div>
        <div>
            <form action="index.php?menuop=tarefas" method="post">
                <div class="input-group">
                    <input class="form-control" type="text" name="txt_pesquisa" value="<?= $txt_pesquisa ?>">
                    <button class=" btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="tabela table-responsive">
        <table class="table table-dark table-striped table-bordered table-sm" style="text-align: center;">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data da conclusão</th>
                    <th>Hora da conclusão</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $quantidade = 10;

                $pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

                $inicio = ($quantidade * $pagina) - $quantidade;

                $sql = "SELECT
                        idTarefa,
                        statusTarefa,
                        tituloTarefa,
                        descricaoTarefa,
                        DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') AS dataConclusaoTarefa,
                        horaConclusaoTarefa
                        FROM tbtarefas
                        WHERE
                        tituloTarefa LIKE '%{$txt_pesquisa}%' OR
                        descricaoTarefa LIKE '%{$txt_pesquisa}%' OR
                        DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
                        ORDER BY statusTarefa, dataConclusaoTarefa
                        LIMIT $inicio, $quantidade
                        ";
                $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td>
                            <?php
                            if ($dados["statusTarefa"] == 1) {
                                echo "<a href=\"#\" class=\"statusTarefa\" title=\"Concluído\" id=\"{$dados["idTarefa"]}\">
                                          <i class=\"bi bi-check-square\"></i>
                                      </a>";
                            } else {
                                echo "<a href=\"#\" class=\"statusTarefa\" title=\"Não Concluído\" id=\"{$dados["idTarefa"]}\">
                                          <i class=\"bi bi-square\"></i>
                                      </a>";
                            }
                            ?>
                        </td>
                        <td class="text-nowrap"><?= $dados["tituloTarefa"]; ?></td>
                        <td class="text-nowrap"><?= $dados["descricaoTarefa"]; ?></td>
                        <td class="text-nowrap"><?= $dados["dataConclusaoTarefa"]; ?></td>
                        <td class="text-nowrap"><?= $dados["horaConclusaoTarefa"]; ?></td>
                        <td style="width: 50px;" class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-tarefa&idTarefa=<?= $dados["idTarefa"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                        <td style="width: 50px;" class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-tarefa&idTarefa=<?= $dados["idTarefa"] ?>"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <ul class="pagination justify-content-center">
        <?php
        $sqlTotal = "SELECT idTarefa FROM tbtarefas";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<li class='page-item'><span class='page-link'>Total de registros: " . $numTotal . " </span></li> ";

        echo '<li class="page-item"><a class="page-link" href="?menuop=tarefas&pagina=1">Primeira página</a></li>';

        if ($pagina > 6) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=tarefas&pagina=<?php echo $pagina - 1 ?>">
                    << </a>
                    <?php
                }

                for ($i = 1; $i <= $totalPagina; $i++) {

                    if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                        if ($i == $pagina) {
                            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href=\"?menuop=tarefas&pagina={$i}\"> {$i} </a></li> ";
                        }
                    }
                }

                if ($pagina < $totalPagina - 5) {
                    ?>
            <li class="page-item"><a class="page-link" href="?menuop=tarefas&pagina=<?php echo $pagina + 1 ?>"> >> </a></li>
        <?php
                }

                echo "<li class='page-item'><a class='page-link' href=\"?menuop=tarefas&pagina=$totalPagina\">Última página</a>";
        ?>
    </ul>

</body>

</html>