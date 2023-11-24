<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Agendador 1.0</title>
</head>

<body>
    <header class="mt-3">
        <h3><i class="bi bi-person-square"></i> Cadastro de Contatos</h3>
    </header>
    <div>
        <form class="needs-validation" action="index.php?menuop=inserir-contato" method="POST" novalidate>
            <div class="mb-1">
                <label class="form-label" for="nomeContato">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input class="form-control" type="text" name="nomeContato" id="nomeContato" required>
                    <div class="valid-feedback">
                        Está correto.
                    </div>
                    <div class="invalid-feedback">
                        Preencha o campo com seu nome completo. Máximo de 255 caracteres.
                    </div>
                </div>
            </div>
            <div class="mb-1">
                <label class="form-label" for="emailContato">E-Mail</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
                    <input class="form-control" type="email" name="emailContato" id="emailContato" required>
                    <div class="valid-feedback">
                        Está correto.
                    </div>
                    <div class="invalid-feedback">
                        Preencha com um e-mail. Máximo de 255 caracteres.
                    </div>
                </div>
            </div>
            <div class="mb-1">
                <label class="form-label" for="telefoneContato">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                    <input class="form-control" type="text" name="telefoneContato" id="telefoneContato" required>
                    <div class="valid-feedback">
                        Está correto.
                    </div>
                    <div class="invalid-feedback">
                        Preencha com um número de telefone.
                    </div>
                </div>

            </div>
            <div class="mb-1">
                <label class="form-label" for="enderecoContato">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-mailbox2"></i></span>
                    <input class="form-control" type="text" name="enderecoContato" id="enderecoContato" required>
                    <div class="valid-feedback">
                        Está correto.
                    </div>
                    <div class="invalid-feedback">
                        Preencha com rua e número da residência. Máximo de 255 caracteres.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label class="form-label" for="sexoContato">Sexo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                        <select class="form-control" name="sexoContato" id="sexoContato" required>
                            <option selected value="">Selecione o sexo</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            <option value="O">Outros</option>
                        </select>
                        <div class="valid-feedback">
                            Está correto.
                        </div>
                        <div class="invalid-feedback">
                            Preencha o campo.
                        </div>
                    </div>

                </div>
                <div class="mb-3 col-3">
                    <label class="form-label" for="dataNascContato">Data de Nascimento</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input class="form-control" type="date" name="dataNascContato" id="dataNascContato" required>
                        <div class="valid-feedback">
                            Está correto.
                        </div>
                        <div class="invalid-feedback">
                            Preencha a data corretamente.
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
            </div>
        </form>
    </div>
</body>

</html>