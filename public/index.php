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

    <link rel="icon" href="/images/logoteste.png" type="image/png">
    <link rel="shortcut icon" href="/images/logoteste.png">

    
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
    if ((!isset($_SESSION["Doce"]//["id"] não tem no do burns
    )) && (!$_POST)) {

        include "../View/Index/index.php";
    } else if ((!isset($_SESSION["Doce"]//["id"] não tem no do burns
    )) && ($_POST)) {

        $email = trim($_POST["email"] ?? NULL);
        $senha = trim($_POST["senha"] ?? NULL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>mensagem('E-mail inválido','index','error');</script>";
        //apaguei o exit            
        } else if (empty($senha)) {
            echo "<script>mensagem('Preencha a senha','index','error');</script>";
            
        }//apagou o exit
        else {

        require "../Controller/IndexController.php";
        $acao = new IndexController();
        $acao->verificar($email, $senha);
        }
    } else {
      
     
    ?>
<header>
    <nav class="navbar navbar-expand-lg container">
            <div class="nav-container">
                <a class="navbar-brand" href="index">
                    <img src="images/logotransparente.png" alt="DoceMix" class="imglogo">
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
                            <a class="nav-link" href="Doce">Doces</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Usuario">Usuários</a>
                        </li>

                    </ul>
                </div>
                <div class="d-flex">
                        <p class="pheader">
                            Olá <?= $_SESSION["Doce"]["nome"] ?>!
                            <a href="index/sair" title="Sair" class="btn btntrc">
                                <i class="fas fa-power-off"></i> Sair
                            </a>
                        </p>
                    </div>
            </div>
        </nav>
        </header>

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

        <footer class="footer text-white pt-5 pb-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">DoceMix</h5>
                    <p>Descubra a nossa coleção de doces artesanais, feitos com amor para celebrar o seu dia!</p>
                    <div style="height: 20px"></div>
                    <div class="d-flex social-icons mt-3">
                        <a href="https://www.linkedin.com/in/beatriz-gomes-santana-0197b5289?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>


                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">Links Rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php?page=sobre" class="text-white text-decoration-none">Sobre Nós</a></li>
                        <li><a href="index.php?page=cadastro" class="text-white text-decoration-none">Seja um Locador</a></li>
                    </ul>
                    <div style="height: 50px"></div>
                    <div class="d-flex social-icons mt-3 tst mt-auto">
                        <a href="https://www.linkedin.com/in/beatriz-gomes-santana-0197b5289?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php?page=legal-footer" class="text-white text-decoration-none">Política de Privacidade</a></li>
                        <li><a href="index.php?page=legal-footer#politica-privacidade" class="text-white text-decoration-none">Política de Privacidade</a></li>
                        <li><a href="index.php?page=legal-footer#termos-uso" class="text-white text-decoration-none">Termos de Uso</a></li>
                        <li><a href="index.php?page=legal-footer#politica-cookies" class="text-white text-decoration-none">Política de Cookies</a></li>
                        <li><a href="index.php?page=legal-footer#lgpd" class="text-white text-decoration-none">LGPD</a></li>

                    </ul>
                    <div class="d-flex social-icons mt-3">
                        <a href="https://www.linkedin.com/in/francesco-gris-053092355/" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">Contato</h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-2"><i class="fas fa-envelope me-2"></i> contato@docemix.com</li>
                        <li class="d-flex align-items-center mb-2"><i class="fas fa-phone-alt me-2"></i> (44) 9 9999-9999</li>
                        <li class="d-flex align-items-center"><i class="fas fa-map-marker-alt me-2"></i> Campo Mourão, PR - Brasil</li>
                    </ul>
                    <div class="d-flex social-icons mt-3">
                        <a href="https://www.linkedin.com/in/lara-pereira-ferraz-5a2511367/" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr class="footer-hr">
            <div class="d-flex justify-content-between align-items-center mt-3">
                <p class="mb-0">&copy; 2025 DoceMix. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <?php
       }  
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>