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
$nome_foto = $_POST["nome_foto"] ?? NULL;

$comodidades = $_POST["comodidades"] ?? NULL; 


    //1500.00 -> 1500.00
    $preco_diario = str_replace(".", "", $preco_diario);
    //1500,00 -> 1500.00
    $preco_diario = str_replace(",", ".", $preco_diario);

    $_POST["preco_diario"] = $preco_diario;


// validação dos campos principais
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
        $_POST["nome_foto"] = md5($nome) . time() . ".jpg";
    }

$msg = $this->imovel->salvar(); 

// resultado e Upload do Arquivo
if ($msg == 1) {
    $msg = "Imóvel salvo com sucesso!";
    
    // se teve upload da imagem, move o arquivo
    if (!empty($_FILES["nome_foto"]["name"])) {
        move_uploaded_file($_FILES["nome_foto"]["tmp_name"], "../arquivos/".$_POST["nome_foto"]);
    }
}
else {
    $msg = "Erro ao salvar o imóvel";
}

// mostra a mensagem e sai
echo "<script>mensagem('{$msg}','imovel','question');</script>";
exit;
?>