<?php
$idContato = $_GET["idContato"];

$sql = "SELECT * FROM tbcontatos WHERE idContato= {$idContato}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro. " . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>
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
        <h3>Editar Contato</h3>
    </header>
    <div class="row">
        <div class="col-6">
            <form action="index.php?menuop=atualizar-contato" method="POST">
                <div class="input-form-group">
                    <label for="idContato">ID</label>
                    <div class="mb-1 col-4 input-group">
                        <span class="input-group-text">
                            <i class="bi bi-key-fill"></i>
                        </span>
                        <input class="form-control" type="text" name="idContato" value="<?= $dados["idContato"] ?>">
                    </div>
                </div>
                <div class="input-form-group">
                    <label for="nomeContato">Nome</label>
                    <div class="mb-1 input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input class="form-control" type="text" name="nomeContato" id="nomeContato" value="<?= $dados["nomeContato"] ?>">
                        <div class="valid-feedback">
                            Está correto.
                        </div>
                        <div class="invalid-feedback">
                            Preencha o campo. Máximo de 255 caracteres.
                        </div>
                    </div>
                </div>
                <div class="input-form-group">
                    <label for="emailContato">E-mail</label>
                    <div class="mb-1 input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-at-fill"></i>
                        </span>
                        <input class="form-control" type="email" name="emailContato" id="emailContato" value="<?= $dados["emailContato"] ?>">
                        <div class="valid-feedback">
                            Está correto.
                        </div>
                        <div class="invalid-feedback">
                            Preencha o campo. Máximo de 255 caracteres.
                        </div>
                    </div>
                </div>
                <div class="input-form-group">
                    <label for="telefoneContato">Telefone</label>
                    <div class="mb-1 input-group">
                        <span class="input-group-text">
                            <i class="bi bi-telephone-fill"></i>
                        </span>
                        <input class="form-control" type="text" name="telefoneContato" id="telefoneContato" value="<?= $dados["telefoneContato"] ?>">
                        <div class="valid-feedback">
                            Está correto.
                        </div>
                        <div class="invalid-feedback">
                            Preencha o campo.
                        </div>
                    </div>
                </div>
                <div class="input-form-group">
                    <label for="enderecoContato">Endereço</label>
                    <div class="mb-1 input-group">
                        <span class="input-group-text">
                            <i class="bi bi-mailbox2"></i>
                        </span>
                        <input class="form-control" type="text" name="enderecoContato" id="enderecoContato" value="<?= $dados["enderecoContato"] ?>">
                        <div class="valid-feedback">
                            Está correto.
                        </div>
                        <div class="invalid-feedback">
                            Preencha o campo. Máximo de 255 caracteres.
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="mb-3 col-6">
                        <label for="sexoContato">Sexo</label>
                        <div class="mb-1 input-group">
                            <span class="input-group-text">
                                <i class="bi bi-gender-ambiguous"></i>
                            </span>
                            <select class="form-control" type="text" name="sexoContato" id="sexoContato" value="<?= $dados["sexoContato"] ?>">
                                <option <?php echo ($dados['sexoContato'] == '' ? 'selected' : '') ?>>Selecione o Gênero</option>
                                <option <?php echo ($dados['sexoContato'] == 'M' ? 'selected' : '') ?> value="M">Masculino</option>
                                <option <?php echo ($dados['sexoContato'] == 'F' ? 'selected' : '') ?> value="F">Feminino</option>
                                <option <?php echo ($dados['sexoContato'] == 'O' ? 'selected' : '') ?> value="O">Outros</option>
                            </select>
                            <div class="valid-feedback">
                                Está correto.
                            </div>
                            <div class="invalid-feedback">
                                Preencha o campo.
                            </div>
                        </div>
                    </div>
                    <div class="input-form-group mb-3 col-6">
                        <label for="dataNascContato">Data de Nascimento</label>
                        <div class="mb-1 input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="date" name="dataNascContato" id="dataNascContato" value="<?= $dados["dataNascContato"] ?>">
                            <div class="valid-feedback">
                                Está correto.
                            </div>
                            <div class="invalid-feedback">
                                Preencha o campo.
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-warning" type="submit" value="Atualizar" name="btnAtualizar">
                </div>
            </form>
        </div>
        <div class="col-6">
            <?php
            if ($dados['nomeFotoContato'] == "" || !file_exists('./paginas/contatos/fotos-contatos/' . $dados['nomeFotoContato'])) {
                $nomeFoto = "SemFoto.jpg";
            } else {
                $nomeFoto = $dados['nomeFotoContato'];
            }
            ?>

            <div class="mb-3">
                <img id="foto-contato" class="img-fluid img-thumbnail" width="300px" src="./paginas/contatos/fotos-contatos/<?= $nomeFoto ?>" alt="Foto do Contato">
            </div>

            <div class="mb-3">
                <button class="btn btn-info" id="btn-editar-foto">
                    <i class="bi bi-camera-fill"></i> Editar Foto
                </button>
            </div>
            <div id="editar-foto">
                <form id="form-upload-foto" class="mb-3" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idContato" value="<?= $idContato ?>">
                    <label class="form-label" for="arquivo">Selecione um arquivo de imagem</label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="arquivo" id="arquivo">
                        <input id="btn-enviar-foto" class="btn btn-secondary" type="submit" value="Enviar">
                    </div>
                </form>
                <div id="mensagem" class="mb-3 alert alert-success">
                    Mensagem aqui.
                </div>
                <div id="preloader" class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    <div id="barra" class="progress-bar bg-danger" style="width: 0%">0%</div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
</body>

</html>