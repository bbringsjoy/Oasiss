<div>
    <div class="card-header">
        <h2 class="float-start">Lista de Imóveis Cadastrados</h2>
        <div class="float-end">
            <a href="imoveis/salvar" title="Novo Registro" class="btn btn-success">
                <i class="fas fa-file"></i> Novo Imóvel
            </a>

            <a href="imoveis/listar" title="Listar" class="btn btn-success">
                <i class="fas fa-list"></i> Atualizar Lista
            </a>
        </div>
    </div>
    <div class="card-body">
        <p>Visualização completa dos imóveis cadastrados:</p>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Título</td>
                        <td>Endereço (Cidade)</td>
                        <td>Quartos</td>
                        <td>Banheiros</td>
                        <td>Hóspedes</td>
                        <td>Comodidades</td>
                        <td>Preço Diário</td>
                        <td>Destaque</td>
                        <td>Disponível</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // O array $imoveis foi preenchido pelo ImoveisController antes de carregar esta View
                    if (isset($imoveis) && (is_array($imoveis) || is_object($imoveis))):

                        foreach ($imoveis as $dados) {

                            // Lógica de Apresentação (mantida do seu código original)
                            $disponivel = (isset($dados->ativo) && $dados->ativo == 'N')
                                ? "<span class='alert alert-danger p-1'>Não</span>"
                                : "<span class='alert alert-success p-1'>Sim</span>";

                            $destaque = (isset($dados->destaque) && $dados->destaque == 'S')
                                ? "<span class='badge bg-warning text-dark'>Sim</span>"
                                : "Não";
                    ?>
                            <tr>
                                <td><?= $dados->id_imoveis ?></td>

                                <td title="<?= $dados->descricao ?>">
                                    <img src="arquivos/<?= $dados->nome_foto ?>" width="100px" class="me-2" alt="Imagem">
                                    <strong><?= $dados->titulo ?></strong>
                                    <small>(Locador: <?= $dados->nome_locador ?? 'N/D' ?>)</small>
                                </td>

                                <td><?= $dados->endereco_completo ?> (<?= $dados->cidade ?>)</td>

                                <td class="text-center"><?= $dados->nm_quartos ?></td>
                                <td class="text-center"><?= $dados->nm_banheiros ?></td>
                                <td class="text-center"><?= $dados->max_hospedes ?></td>

                                <td style="max-width: 150px; font-size: 0.85em;"><?= $dados->comodidades ?></td>

                                <td>R$ <?= number_format($dados->preco_diario, 2, ",", ".") ?></td>

                                <td><?= $destaque ?></td>
                                <td><?= $disponivel ?></td>

                                <td width="120px">
                                    <a href="javascript:excluir(<?= $dados->id_imoveis ?>, 'imovel')" class="btn btn-danger btn-sm" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="imoveis/salvar/<?= $dados->id_imoveis ?>" class="btn btn-info btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php
                        }
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>