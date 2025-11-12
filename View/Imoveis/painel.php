<?php

    if(!empty($id)){
        $dados = $this->imovel->editar($id);
    }

?>


<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<div class="container">
    <div class="card painel">
        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2>Cadastro de Imóveis</h2>
            </div>
            <div>
                <a href="imoveis/salvar" class="btn btn-primary">
                    Adicionar Imóvel
                </a>
                <a href="imoveis/listar" class="btn btn-primary">
                    Listar
                </a>
            </div>
        </div>
        <div class="card-body">
            <form name="formCadastro" method="post" action="imoveis/salvar" enctype="multipart/form-data"
            data-parsley-validate="">
                <input type="hidden" name="id_imoveis" id="id_imoveis" value="">
                
                <div class="row">
                    <div class="col-12 col-md-1">
                        <label for="id">ID:</label>
                        <input type="text" readonly name="id" id="id" class="form-control" value="">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="locador_id">ID do Locador:</label>
                        <input type="number" name="locador_id" id="locador_id" class="form-control" required 
                        data-parsley-required-message="Informe o ID do Locador">
                    </div>
                    <div class="col-12 col-md-8">
                        <label for="titulo">Título:</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required
                        data-parsley-required-message="Digite o título do imóvel">
                    </div>
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
                    <div class="col-12 col-md-8">
                        <label for="endereco_completo">Endereço Completo:</label>
                        <input type="text" name="endereco_completo" id="endereco_completo" class="form-control" required
                        data-parsley-required-message="Informe o endereço completo">
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" required
                        data-parsley-required-message="Informe a cidade">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <label for="preco_diario">Preço Diário (R$):</label>
                        <input type="text" name="preco_diario" id="preco_diario" class="form-control" required 
                        data-parsley-required-message="Digite o valor" value="">
                    </div>
                    <div class="col-12 col-md-3">
                        <label for="imagem">Selecione uma Imagem (JPG):</label>
                        <input type="file" name="imagem" id="imagem" class="form-control" accept=".jpg">
                        <input type="hidden" name="imagem_existente" value="<?= $imagem ?>">
                    </div> 
                </div> 
                <br>
                <div class="row">
                    <div class="col-12 col-md-2">
                        <label for="destaque">Destaque:</label>
                        <select name="destaque" id="destaque" class="form-control" required data-parsley-required-message="Selecione uma opção">
                            <option value=""></option>
                            <option value="S">Sim</option>
                            <option value="N">Não</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-end">
                            <i class="fas fa-check"></i> Salvar/Atualizar Registro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // inicia o Summernote para a descricao (editar o texto)
        $('#descricao').summernote({
            height: 200,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        
        // mascara para o preco diario
        $("#preco_diario").maskMoney({
            prefix: 'R$ ', 
            thousands: '.', 
            decimal: ',', 
            allowZero: true, 
            allowNegative: false
        });

       
    });
</script>