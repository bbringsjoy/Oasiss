<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doce Mix - Painel de Controle</title>
    <base href="http://<?= $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"] ?>">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link href="imagens/logoteste.png" rel="shortcut icon">
    
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <script src="js/jquery-3.5.1.min.js"></script>

    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/bindings/inputmask.binding.js"></script>

    <script src="js/sweetalert2.js"></script>
    <script src="js/parsley.min.js"></script>


    <script>
        mensagem = function(msg, tabela, icone) {
            Swal.fire({
                icon: icone,
                title: msg,
                confirmButtonText: "OK",
            }).then((result) => {
                location.href = tabela;
            });
        }

        excluir = function(id, tabela) {
            Swal.fire({
                icon: "question",
                title: "Deseja realmente excluir este registro?",
                showCancelButton: true,
                confirmButtonText: "Excluir",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = tabela + "/excluir/" + id;
                }
            });
        }

        mostrarSenha = function() {
            const campo = document.getElementById('senha');
            if (campo.type === 'password') {
                campo.type = 'text';
            } else {
                campo.type = 'password';
            }
        }
    </script>
</head>

<body>
    <?php
    if ((!isset($_SESSION["Doce"]["id"])) && (!$_POST)) {

        include "../View/Index/index.php";
    } else if ((!isset($_SESSION["Doce"]["id"])) && ($_POST)) {

        $email = trim($_POST["email"] ?? NULL);
        $senha = trim($_POST["senha"] ?? NULL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('E-mail inválido','index','error');</script>";
            exit;
        } else if (empty($senha)) {
            echo "<script>mensagem('Preencha a senha','index','error');</script>";
            exit;
        }

        require "../Controller/IndexController.php";
        $acao = new IndexController();
        $acao->verificar($email, $senha);
    } else {

    ?>

    <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="index">
                    <img src="images/logoteste.png" alt="DoceMix">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="Index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Categoria">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Doces">Doces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Usuario">Usuários</a>
                        </li>

                    </ul>
                    <div class="d-flex">
                        <p>
                            Olá <?= $_SESSION["Doce"]["nome"] ?>
                            <a href="index/sair" title="Sair" class="btn btn-sm btn-danger">
                                <i class="fas fa-power-off"></i> Sair
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </nav>

        <main class="container">
            <?php
            $controller = $_GET["param"] ?? NULL;
            $param = explode("/", $controller);

            $controller = $param[0] ?? "index";
            $acao = $param[1] ?? "index";
            $id = $param[2] ?? NULL;

            $controller = ucfirst($controller)."Controller";
            $page = "../Controller/{$controller}.php";

            if (file_exists($page)) {

                include $page;
                $control = new $controller();
                $control->$acao($id);

            } else include "../View/Index/erro.php";
            ?>
        </main>

        <footer class="footer">
            <p class="text-center"> DoceMix - Todos os direitos reservados </p>
        </footer>

    <?php

    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>