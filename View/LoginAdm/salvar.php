<?php
//informaçoes da tabela
$id_imoveis = $_POST["id_imoveis"] ?? NULL;
$titulo = $_POST["titulo"] ?? NULL;
$locador_id = $_POST["locador_id"] ?? NULL;
$descricao = $_POST["descricao"] ?? NULL;
$endereco_completo = $_POST["endereco_completo"] ?? NULL;
$cidade = $_POST["cidade"] ?? NULL;
$preco_diario = $_POST["preco_diario"] ?? NULL;
$nm_quartos = $_POST["nm_quartos"] ?? NULL;
$nm_banheiros = $_POST["nm_banheiros"] ?? NULL;
$max_hospedes = $_POST["max_hospedes"] ?? NULL;

$comodidades = $_POST["comodidades"] ?? NULL; 

if (!empty($preco_diario)) {
    $preco_diario = str_replace(".", "", $preco_diario);
    $preco_diario = str_replace(",", ".", $preco_diario);
    $_POST["preco_diario"] = $preco_diario;
}

// Validação dos Campos Obrigatórios
if ((empty($id_imoveis) && (empty($_FILES["nome_foto"]["name"])))) {
    echo "<script>mensagem('Por favor, selecione uma imagem para o imóvel','error');</script>";
    exit;
} else if (empty($titulo)) {
    echo "<script>mensagem('Por favor, preencha o título do imóvel','error');</script>";
    exit;
} else if (empty($cidade)) {
    echo "<script>mensagem('Por favor, preencha a cidade do imóvel','error');</script>";
    exit;
} else if (empty($preco_diario) || !is_numeric($preco_diario)) {
    echo "<script>mensagem('Preço diário inválido ou não preenchido','error');</script>";
    exit;
} 

if (!empty($_FILES["nome_foto"]["name"])) {
    // gera o nome da imagem para a tabela
    $nome_arquivo_foto = md5($titulo) . time() . ".jpg";
    $_POST["nome_foto"] = $nome_arquivo_foto;
} else if (!empty($id_imoveis)) {
    $_POST["nome_foto"] = $nome_foto_atual_do_banco;
}

$msg_status = $this->imovel->salvar(); 

// resultado e Upload do Arquivo
if ($msg_status == 1) {
    $msg_texto = "Imóvel salvo com sucesso!";
    
    // se teve upload da imagem, move o arquivo
    if (!empty($_FILES["nome_foto"]["name"])) {
        // Certifique-se de que a pasta 'arquivos/' exista e tenha permissão de escrita
        move_uploaded_file($_FILES["nome_foto"]["tmp_name"], "arquivos/".$_POST["nome_foto"]);
    }
}
else {
    $msg_texto = "Erro ao alterar/salvar o registro do imóvel";
}

// mostra a mensagem e sai
echo "<script>mensagem('{$msg_texto}','imovel','question');</script>";
exit;
?>