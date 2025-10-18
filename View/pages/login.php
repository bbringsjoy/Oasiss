<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> <!-- Font Awesome -->

    <link href="imagens/icon.png" rel="shortcut icon">

    <title> Oásis </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"><!-- animação git -->

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <section class="bodylogin">

    <div class="login">
        <h1 class="user-select-none">Login</h1>
        <form name="form1" method="POST" data-parsley-validate="">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control"
            required
            data-parsley-required-message="Preencha o email"
            data-parsley-type-message="Digite um e-mail válido"
            placeholder="Digite um email">
            <br>


            <label for="senha">Senha:</label>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="senha" id="senha"
                placeholder="Digite sua senha" required
                data-parsley-required-message="Digite uma senha"
                data-parsley-errors-container="#erro">
                <button class="btn btn-outline-secondary" type="button" onclick="mostrarSenha()">
                    <i class="fas fa-eye"></i></button>
            </div>
            <div id="erro"></div>
            <br>
            <button type="submit" class="btn btn-success w-100">
                <i class="fas fa-check"></i>Fazer Login
            </button>



            <div class="cadastro">
                <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se aqui!</a></p>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl)) // const do popOver do bootstrap
    </script>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script><!-- script animaçao -->
    <script>
        AOS.init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/fslightbox/index.js" type="module"></script><!-- script lightbox -->


</section>
</body>

</html>