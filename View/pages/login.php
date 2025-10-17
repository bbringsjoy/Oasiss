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

<body class="bodylogin">

    <div class="login">

        <form action="" method="POST">
            <h1 class="user-select-none">Login</h1>

            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
                <i class='bx. bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="password" name="senha" placeholder="Senha" required>
                <i class='bx bxs-lock-alt'></i>
            </div>



            <button type="submit" class="btn">Login</button>

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



</body>

</html>