<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oásis</title>

    <base href="http://<?=$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> <!-- Font Awesome -->
    <link href="../images/icon.png" rel="shortcut icon">


    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- Animação -->
    <link rel="stylesheet" href="../css/style.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.inputmask.min.js"></script>
    <script src="js/jquery.maskedinput-1.2.1.js"></script>
    <script src="js/parsley.min.js"></script>
    <script src="js/sweetalert2.js"></script>
    <script>
        mostrarSenha = function() {
            const campo = document.getElementById('senha');
            if (campo.type === 'password') {
                campo.type = 'text';
            } else {
                campo.type = 'password';
            }
        }

        //função para mostrar mensagem de erro 
        mensagem = function(msg, url, icone) {
            Swal.fire({
                icon: icone,
                title: msg,
                confirmButtonText: "OK",
            }).then((result) => {
                location.href = url;
            });
        }
    </script>

</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid col-12">
                        <a class="navbar-brand" href="index.php?page=home">
                            <img src="../images/logo.png" alt="Logo" class="logohead">
                        </a>
                        <button class="navbar-toggler menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar"><i class="fa-solid fa-bars"></i></span>
                        </button>
                        <div class="listas">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <div class="d-flex">
                                        <!-- botao para deslogar -->
                                        <a href="" class="btn btn-login me-2">
                                            <i class="fa-solid fa-right-to-bracket me-2"></i>Logout
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                



        
                <main>
                    <?php

                    require "pages/painel.php";
                    ?>
                </main>
        
        <?php

        
        
        // Pega o parâmetro 'page' da URL ou define 'home' como padrão
        $pagina = $_GET['page'] ?? 'home';

        // Caminho absoluto para as páginas dentro de View/pages
        $caminho_pagina = __DIR__ . "/pages/{$pagina}.php";

        // Inclui a página se existir, senão inclui erro.php
        if (file_exists($caminho_pagina)) {
            include $caminho_pagina;
        } else {
            include __DIR__ . "/pages/erro.php";
        }
        ?>

    <footer class="text-white pt-5 pb-3">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">Oásis</h5>
                    <p>Conectando pessoas a lugares que inspiram. Hospede-se, descanse, viva momentos únicos.</p>
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
                        <li><a href="index.php?page=legal#politica-de-privacidade" class="text-white text-decoration-none">Política de Privacidade</a></li>
                        <li><a href="index.php?page=legal#termos-uso" class="text-white text-decoration-none">Termos de Uso</a></li>
                        <li><a href="index.php?page=legal#cookies" class="text-white text-decoration-none">Política de Cookies</a></li>
                        <li><a href="index.php?page=legal#lgpd" class="text-white text-decoration-none">LGPD</a></li>
                    </ul>
                    <div class="d-flex social-icons mt-3">
                        <a href="https://www.linkedin.com/in/francesco-gris-053092355/" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">Contato</h5>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mb-2"><i class="fas fa-envelope me-2"></i> contato@oasis.com</li>
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
                <p class="mb-0">&copy; 2025 Oásis. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js" type="module"></script>
</body>

</html>