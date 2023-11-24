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
        <h3><i class="bi bi-calendar-check"></i> Eventos</h3>
    </header>
    <div>
        <div>
            <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-evento"><i class="bi bi-calendar-check"></i> Novo Evento</a>
        </div>
        <div>
            <form action="index.php?menuop=eventos" method="post">
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
                    <th>Data de Início</th>
                    <th>Hora de Início</th>
                    <th>Data de Fim</th>
                    <th>Hora de Fim</th>
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
                        idEvento,
                        statusEvento,
                        tituloEvento,
                        descricaoEvento,
                        DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') AS dataInicioEvento,
                        DATE_FORMAT(dataFimEvento, '%d/%m/%Y') AS dataFimEvento,
                        horaInicioEvento,
                        horaFimEvento
                        FROM tbeventos
                        WHERE
                        tituloEvento LIKE '%{$txt_pesquisa}%' OR
                        descricaoEvento LIKE '%{$txt_pesquisa}%' OR
                        DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
                        ORDER BY statusEvento, dataInicioEvento
                        LIMIT $inicio, $quantidade
                        ";
                $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td>
                            <?php
                            if ($dados["statusEvento"] == 1) {
                                echo "<a href=\"#\" class=\"statusEvento\" title=\"Concluído\" id=\"{$dados["idEvento"]}\">
                                          <i class=\"bi bi-check-square\"></i>
                                      </a>";
                            } else {
                                echo "<a href=\"#\" class=\"statusEvento\" title=\"Não Concluído\" id=\"{$dados["idEvento"]}\">
                                          <i class=\"bi bi-square\"></i>
                                      </a>";
                            }
                            ?>
                        </td>
                        <td class="text-nowrap"><?= $dados["tituloEvento"]; ?></td>
                        <td class="text-nowrap"><?= $dados["descricaoEvento"]; ?></td>
                        <td class="text-nowrap"><?= $dados["dataInicioEvento"]; ?></td>
                        <td class="text-nowrap"><?= $dados["horaInicioEvento"]; ?></td>
                        <td class="text-nowrap"><?= $dados["dataFimEvento"]; ?></td>
                        <td class="text-nowrap"><?= $dados["horaFimEvento"]; ?></td>
                        <td style="width: 50px;" class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-evento&idEvento=<?= $dados["idEvento"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                        <td style="width: 50px;" class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-evento&idEvento=<?= $dados["idEvento"] ?>"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <ul class="pagination justify-content-center">
        <?php
        $sqlTotal = "SELECT idEvento FROM tbeventos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<li class='page-item'><span class='page-link'>Total de registros: " . $numTotal . " </span></li> ";

        echo '<li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=1">Primeira página</a></li>';

        if ($pagina > 6) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina - 1 ?>">
                    << </a>
                    <?php
                }

                for ($i = 1; $i <= $totalPagina; $i++) {

                    if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                        if ($i == $pagina) {
                            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href=\"?menuop=eventos&pagina={$i}\"> {$i} </a></li> ";
                        }
                    }
                }

                if ($pagina < $totalPagina - 5) {
                    ?>
            <li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina + 1 ?>"> >> </a></li>
        <?php
                }

                echo "<li class='page-item'><a class='page-link' href=\"?menuop=eventos&pagina=$totalPagina\">Última página</a>";
        ?>
    </ul>

</body>

</html>