<div class="card">
    <div class="card-header">
        <h2 class="float-start tltt">Listagem de Doces</h2>
        <div class="float-end">
            <a href="doce" title="Novo Registro" class="btn btn-success btntrc">
                <i class="fas fa-file"></i> Novo Registro
            </a>

            <a href="Doce/listar" title="Listar" class="btn btn-success btntrc">
                <i class="fas fa-file"></i> Listar
            </a>
        </div>
    </div>
    <div class="card-body">
        <p>Abaixo os doces cadastrados:</p>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Imagem</td>
                    <td>Nome do doce</td>
                    <td>Valor</td>
                    <td>Ativo</td>
                    <td>Opções</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $dadosDoce = $this->doce->listar();
                    foreach ($dadosDoce as $dados) {

                        $ativo = "<span class='alert alert-success'>Sim</span>";
                        if ($dados->ativo == 'N') $ativo = "<span class='alert alert-danger'>Não</span>";
                        ?>
                        <tr>
                            <td><?=$dados->id?></td>
                            <td><img src="arquivos/<?=$dados->imagem?>" width="70px" class="imglistar"></td>
                            <td><?=$dados->nome?></td>
                            <td><?=number_format($dados->valor,2,",",".")?></td>
                            <td><?=$ativo?></td>
                            <td width="150px">
                                <a href="javascript:excluir(<?=$dados->id?>, 'doce')" class="btn btn-danger btnscd btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="Doce/index/<?=$dados->id?>" class="btn btn-info btnprm btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>