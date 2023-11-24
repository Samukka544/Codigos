<?php
// Conexão com o banco de dados
include "./db/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Cadastro - Agendador 1.0</title>
</head>

<body class="bg-secondary">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="nav justify-content-center">
                    <h2>Cadastro</h2>
                </div>
                <form class="needs-validation" action="insert.php" method="post" novalidate>
                    <div class="form-group mb-4">
                        <label class="form-label" for="cadUser">Usuário</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input class="form-control" type="text" name="cadUser" id="cadUser" required>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Informe o nome de usuário.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="passUser">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input class="form-control" type="password" name="passUser" id="passUser" required>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="nameUser">Nome</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-badge"></i>
                            </span>
                            <input class="form-control" type="text" name="nameUser" id="nameUser" required>
                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                Informe seu nome.
                            </div>
                        </div>
                    </div>
                    <a href="login.php">Já tenho um cadastro.</a>
                    <button class="btn btn-success w-100 mt-3"><i class="bi bi-box-arrow-in-right"></i> Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/validation.js"></script>