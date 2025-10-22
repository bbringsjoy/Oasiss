<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<!-- MaskMoney -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                <h2>Cadastro de Imoveis</h2>
            </div>
            <div class="float-end">
            <a href="imoveis/salvar" class="btn btn-sucess">
                    Adicionar Imovel
                </a>
                <a href="imoveis/listar" class="btn btn-sucess">
                    Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" action="imoveis/salvar" enctype="multipart/form-data"
            data-parsley-validate="">
            <div class="row">
                <div class="col-12 col-md-1">
                    <label for="id">ID:</label>
                    <input type="text" readonly name="id" id="id" class="form-control">
                </div>
                <div class="col-12 col-md-8">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" required
                    data-parsley-required-message="Digite o título do imóvel">
                </div>
                <br>
            <div class="row">
                <div class="col-12 col-md-12">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" id="descricao" required data-parsley-required-message="Preencha a descrição" class="form-control"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12 col-md-4">
                    <label for="imagem">Selecione uma Imagem (JPG):</label>
                    <input type="file" name="imagem" id="imagem" class="form-control" accept=".jpg">
                    <input type="hidden" name="imagem" value="<?= $imagem ?>">
                </div>  
                    
                <div class="col-12 col-md-2">
                    <label for="precoDiario">Valor diário:</label>
                    <input type="text" name="precoDiario" id="precoDiario" class="form-control" required data-parsley-required-message="Digite o valor" value="">
                </div>      

                <div class="col-12 col-md-2">
                    <label for="destaque">Destaque:</label>
                    <select name="destaque" id="destaque" class="form-control" required data-parsley-required-message="Selecione uma opção">
                        <option value=""></option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>
                    <div class="col-12 col-md-2">
                    <label for="ativo">Disponível:</label>
                    <select name="ativo" id="ativo" class="form-control" required data-parsley-required-message="Selecione uma opção">
                        <option value=""></option>
                        <option value="S">Sim</option>
                        <option value="N">Não</option>
                    </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success float-end">
                <i class="fas fa-check"></i> Salvar/Atualizar Registro
            </button>
        </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#descricao').summernote({
            height: 200
        });
    });
    $("#precoDiario").maskMoney({thousands:'.', decimal:','});
</script>