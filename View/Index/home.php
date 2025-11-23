
<div class="card d-flex justify-content-center align-items-center" 
     style="padding-top: 50px; font-size: 22px;">
    <p class="text-center m-0" style="font-family: roboto; color:var(--maincolor); font-size:40px; font-weight: bold;">
        Olá seja-bem vindo: <?=$_SESSION["Doce"]["nome"]?> <i class="fa-solid fa-cookie-bite"></i>
    </p>
    <br>
    <iframe src="http://localhost:3000/public/dashboard/45d5deb9-b224-44be-b6b1-593ca2df1558" title="W3Schools Free Online Web Tutorials" width=800 height=800>
</iframe>
</div>

<div class="container" style="text-align: center; width: 100%">
    
</div>

<div class="card">
    <div class="card-header">
        <h1 class="titulo">Atalhos</h1>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-3">
                <a href="Categoria" title="Categorias" class="btn btn-outline-success w-100">
                    <i class="fas fa-tags fa-2x"></i>
                    <br>
                    Categorias
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="Doce" title="Doces" class="btn btn-outline-success w-100">
                    <i class="fas fa-gift fa-2x"></i>
                    <br>
                    Doces
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="Usuario" title="Usuários" class="btn btn-outline-success w-100">
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