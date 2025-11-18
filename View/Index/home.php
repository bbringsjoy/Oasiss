
<div class="card d-flex justify-content-center align-items-center" 
     style="height: 150px; font-size: 22px;">
    <p class="text-center m-0">
        Olá seja-bem vindo: <?=$_SESSION["Doce"]["nome"]?>
    </p>
</div>

<div class="card">
    <div class="card-header">
        <h1 class="titulo">Atalhos</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-3">
                <a href="Categoria/listar" title="Categorias" class="btn btn-outline-success w-100">
                    <i class="fas fa-tags fa-2x"></i>
                    <br>
                    Categorias
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="Doce/listar" title="Doces" class="btn btn-outline-success w-100">
                    <i class="fas fa-gift fa-2x"></i>
                    <br>
                    Doces
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="Usuario/listar" title="Usuários" class="btn btn-outline-success w-100">
                    <i class="fas fa-user fa-2x"></i>
                    <br>
                    Usuários
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="index/sair" title="Sair" class="btn btn-outline-danger w-100">
                    <i class="fas fa-power-off fa-2x"></i>
                    <br>
                    Sair
                </a>
            </div>
        </div>
    </div>
</div>