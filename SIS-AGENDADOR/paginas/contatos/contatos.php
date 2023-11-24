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
        <h3><i class="bi bi-person-square"></i> Contatos</h3>
    </header>
    <div>
        <div>
            <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
        </div>
        <div>
            <form action="index.php?menuop=contatos" method="post">
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
                    <th>
                        <i class="bi bi-star-fill"></i>
                    </th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Sexo</th>
                    <th>Data de Nasc.</th>
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
                        idContato,
                        upper(nomeContato) AS nomeContato,
                        lower(emailContato) AS emailContato,
                        telefoneContato,
                        upper(enderecoContato) AS enderecoContato,
                        CASE
                            WHEN sexoContato='F' THEN 'FEMININO'
                            WHEN sexoContato='M' THEN 'MASCULINO'
                            WHEN sexoContato='O' THEN 'OUTROS'
                        ELSE
                            'NÃO ESPECIFICADO'
                        END AS sexoContato,
                        DATE_FORMAT(dataNascContato,'%d/%m/%Y') AS dataNascContato,
                        flagFavoritoContato
                        FROM tbcontatos
                        WHERE
                        idContato='{$txt_pesquisa}' or
                        nomeContato LIKE '%{$txt_pesquisa}%'
                        ORDER BY flagFavoritoContato DESC, nomeContato ASC
                        LIMIT $inicio, $quantidade
                        ";
                $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
                while ($dados = mysqli_fetch_assoc($rs)) {
                ?>
                    <tr>
                        <td>
                            <?php
                            if ($dados["flagFavoritoContato"] == 1) {
                                echo "<a href=\"#\" class=\"flagFavoritoContato btn-outline-warning\" title=\"Favorito\" id=\"{$dados["idContato"]}\">
                                          <i class=\"bi bi-star-fill\"></i>
                                      </a>";
                            } else {
                                echo "<a href=\"#\" class=\"flagFavoritoContato btn-outline-warning\" title=\"Não Favorito\" id=\"{$dados["idContato"]}\">
                                          <i class=\"bi bi-star\"></i>
                                      </a>";
                            }
                            ?>
                        </td>
                        <td><?= $dados["idContato"]; ?></td>
                        <td style="max-width: 100px; overflow:hidden; padding-right: 2px;" class="text-nowrap"><?= $dados["nomeContato"]; ?></td>
                        <td style="max-width: 100px; overflow:hidden; padding-right: 2px;" class="text-nowrap"><?= $dados["emailContato"]; ?></td>
                        <td style="width: 120px;" class="text-nowrap"><?= $dados["telefoneContato"]; ?></td>
                        <td style="max-width: 100px; overflow:hidden; padding-right: 2px;" class="text-nowrap"><?= $dados["enderecoContato"]; ?></td>
                        <td style="width: 120px;"><?= $dados["sexoContato"]; ?></td>
                        <td style="width: 100px;"><?= $dados["dataNascContato"]; ?></td>
                        <td style="width: 50px;" class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-pencil-square"></i></a></td>
                        <td style="width: 50px;" class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <ul class="pagination justify-content-center">
        <?php
        $sqlTotal = "SELECT idContato FROM tbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<li class='page-item'><span class='page-link'>Total de registros: " . $numTotal . " </span></li> ";

        echo '<li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=1">Primeira página</a></li>';

        if ($pagina > 6) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina - 1 ?>">
                    << </a>
                    <?php
                }

                for ($i = 1; $i <= $totalPagina; $i++) {

                    if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                        if ($i == $pagina) {
                            echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina={$i}\"> {$i} </a></li> ";
                        }
                    }
                }

                if ($pagina < $totalPagina - 5) {
                    ?>
            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina + 1 ?>"> >> </a></li>
        <?php
                }

                echo "<li class='page-item'><a class='page-link' href=\"?menuop=contatos&pagina=$totalPagina\">Última página</a>";
        ?>
    </ul>

</body>

</html>