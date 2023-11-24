<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<?php
include('db/conexao.php');

$loginUser = mysqli_real_escape_string($conexao, $_POST["cadUser"]);
$senhaUser = mysqli_real_escape_string($conexao, $_POST["passUser"]);
$nomeUser = mysqli_real_escape_string($conexao, $_POST["nameUser"]);

$senhaCripto = hash('sha256', $senhaUser);

$sqls = "SELECT * FROM tbusuarios WHERE loginUser = '{$loginUser}' and senhaUser = '{$senhaCripto}'";
$result = mysqli_query($conexao, $sqls);

if ($result && mysqli_num_rows($result) > 0) {
    // User already exists
    // Your error message or handling here
?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erro</h4>
        <p>O usuário já existe.</p>
        <hr>
        <p class="mb-0">
            <a href="cad.php">Voltar para o cadastro.</a>
        </p>
    </div>
<?php
} else {
    $sql = "INSERT INTO tbusuarios (
            loginUser,
            senhaUser,
            nomeUser
        ) VALUES (
            '{$loginUser}',
            '{$senhaCripto}',
            '{$nomeUser}'
        )";

    try {
        $rs = mysqli_query($conexao, $sql);

        if ($rs) {
            // User registration successful, redirect to index.php
            header('Location: index.php');
        } else {
            // Handle the case where the query fails
            ?>
            <div class="container vw-50 alert alert-danger" role="alert">
                <h4 class="alert-heading">Erro</h4>
                <p>Ocorreu um erro ao inserir o usuário.</p>
                <hr>
                <p class="mb-0">
                    <a href="cad.php">Voltar para o cadastro.</a>
                </p>
            </div>
            <?php
        }
    } catch (mysqli_sql_exception $e) {
        // Catch and handle the exception (duplicate entry)
        ?>
        <div class="container vw-50 alert alert-danger" role="alert">
            <h4 class="alert-heading">Erro</h4>
            <p>O usuário já existe.</p>
            <hr>
            <p class="mb-0">
                <a href="cad.php">Voltar para o cadastro.</a>
            </p>
        </div>
        <?php
    }
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>