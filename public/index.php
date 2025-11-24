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

    <link rel="icon" href="/images/transparente.png" type="image/png">
    <link rel="shortcut icon" href="/images/logotransparente.png" type="image/png">

    
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
                    <span class="navbar-toggler-icon menuheader"></span>
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
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
  <section class="nav-link" style="background-color: var(--maincolor); padding-top: 30px;" >
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fa-solid fa-cookie-bite"></i> Doce Mix
          </h6>
          <p>
            Descubra a nossa coleção de doces artesanais, feitos com amor para celebrar o seu dia!
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Links Rápidos
          </h6>
          <p>
            <a href="footer/sobre" class="text-reset footr">Sobre Nós</a>
          </p>
          <p>
            <a href="Index" class="text-reset footr">Página de Administrador</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Legal
          </h6>
          <p>
            <a href="footer/politica" class="text-reset footr">Política de Privacidade</a>
          </p>
          <p>
            <a href="footer/termos" class="text-reset footr">Termos de Uso</a>
          </p>
          <p>
            <a href="footer/politicacookies" class="text-reset footr">Política de Cookies</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contato</h6>
          <p>
            <i class="fas fa-envelope me-3"></i>
            contato@docemix.com
          </p>
          <p><i class="fas fa-phone me-3"></i> (44) 9999-9999</p>
        <p><i class="fas fa-map-marker-alt me-2"></i>Campo Mourão, PR - Brasil</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4 footr" style="background-color: var(--maincolor); text-decoration:none;">
    © 2025 Copyright DoceMix
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->


    <?php
       }  
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>