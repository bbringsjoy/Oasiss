<div class="card">
    <div class="card-header">
        <h2 class="float-start">Lista de Usuários Cadastrados</h2>
        <div class="float-end">
            <a href="usuario/salvar" title="Novo Registro" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Novo Usuário
            </a>

            <a href="usuario/listar" title="Listar" class="btn btn-success">
                <i class="fas fa-list"></i> Atualizar Lista
            </a>
        </div>
    </div>

    <div class="card-body">
        <p>Visualização dos usuários do sistema:</p>
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome Completo</td>
                        <td>E-mail</td>
                        <td>Tipo de Perfil</td>
                        <td>Data de Cadastro</td>
                        <td width="120px">Opções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $dadosUsuario = $this->usuario->listar(); 
                        
                        foreach ($dadosUsuario as $dados) {
                            
                            // Lógica para colorir o tipo de perfil
                            $perfil_class = match ($dados->tipo_perfil) {
                                'ADMIN' => 'badge bg-danger text-white p-1',
                                'LOCADOR' => 'badge bg-warning text-dark p-1',
                                'HOSPEDE' => 'badge bg-info text-white p-1',
                                default => 'badge bg-secondary text-white p-1',
                            };

                            $data_cadastro_formatada = date('d/m/Y H:i', strtotime($dados->data_cadastro));
                            ?>
                            <tr>
                                <td><?=$dados->id_usuarios?></td>
                                <td><?=$dados->nome_completo?></td>
                                <td><?=$dados->email?></td>
                                <td>
                                    <span class="<?=$perfil_class?>">
                                        <?=$dados->tipo_perfil?>
                                    </span>
                                </td>
                                <td><?=$data_cadastro_formatada?></td>
                                <td>
                                    <a href="javascript:excluir(<?=$dados->id_usuarios?>, 'usuario')" class="btn btn-danger btn-sm" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <a href="usuario/salvar/<?=$dados->id_usuarios?>" class="btn btn-info btn-sm" title="Editar">
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
</div>