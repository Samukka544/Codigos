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
        <h3><i class="bi bi-calendar-check"></i> Cadastro de Eventos</h3>
    </header>
    <div>
        <form class="needs-validation" action="index.php?menuop=inserir-evento" method="POST" novalidate>
            <div class="mb-3">
                <label for="tituloEvento" class="form-label">Título</label>
                <input class="form-control" type="text" name="tituloEvento" id="tituloEvento" required>
            </div>
            <div class="mb-3">
                <label for="descricaoEvento" class="form-label">Descrição</label>
                <textarea name="descricaoEvento" id="descricaoEvento" cols="30" rows="5" class="form-control" required></textarea>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="dataInicioEvento" class="form-label">Data de Início</label>
                    <input class="form-control" type="date" name="dataInicioEvento" id="dataInicioEvento" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="horaInicioEvento" class="form-label">Hora de Início</label>
                    <input class="form-control" type="time" name="horaInicioEvento" id="horaInicioEvento" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="dataFimEvento" class="form-label">Data de Fim</label>
                    <input class="form-control" type="date" name="dataFimEvento" id="dataFimEvento">
                </div>
                <div class="mb-3 col-6">
                    <label for="horaFimEvento" class="form-label">Hora de Fim</label>
                    <input class="form-control" type="time" name="horaFimEvento" id="horaFimEvento">
                </div>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-success" value="Adicionar" name="btnAdicionar">
            </div>
    </div>
</body>

</html>