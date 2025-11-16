<div class="login">
    <div class="card">
        <div class="card-header text-center tstlogin">
            <img src="images/DOCEMIX.png" alt="Painel" class="imglogin">
        </div>
        <div class="card-body">
            <form name="formControle" method="post" data-parsley-validate="">
                <input type="email" name="email" class="form-control borderad" required 
                data-parsley-required-message="Digite um e-mail"
                data-parsley-type-message="Digite um e-mail válido"
                placeholder="Digite seu e-mail">

                <br>

                <div class="input-group mb-3">
                    <input type="password" class="form-control borderad" name="senha" id="senha" placeholder="Digite sua senha" required
                    data-parsley-required-message="Digite uma senha"
                    data-parsley-errors-container="#erro">
                    <button class="btn btnscd btn-outline-secondary borderad" type="button" onclick="mostrarSenha()"><i class="fas fa-eye"></i></button>
                </div>
                <div id="erro"></div>
                <br>
                <button type="submit" class="btn btnscd btn-success w-100 borderad">
                    Fazer Login
                </button>
            </form>
        </div>
    </div>
</div>