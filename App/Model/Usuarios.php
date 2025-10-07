<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use DateTime;

#[Entity]
class Usuarios
{
    #[Column, Id, GeneratedValue]
    private int $id_usuarios;

    #[Column(name: 'email', length: 255)]
    private string $email;

    #[Column(name: 'senha', length: 255)]
    private string $senha;

    #[Column(name: 'nome_completo', length: 255)]
    private string $nomeCompleto;

    #[Column(name: 'tipo_perfil')]
    private string $tipoPerfil; // 'Hóspede' ou 'Locador'

    #[Column(name: 'data_cadastro')]
    private DateTime $dataCadastro;

    public function __construct(string $email, string $senha, string $nomeCompleto, string $tipoPerfil)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->nomeCompleto = $nomeCompleto;
        $this->tipoPerfil = $tipoPerfil;
        $this->dataCadastro = new DateTime();
    }

    public function getIdUsuarios(): int
    {
        return $this->id_usuarios;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    public function getTipoPerfil(): string
    {
        return $this->tipoPerfil;
    }

    public function getDataCadastro(): DateTime
    {
        return $this->dataCadastro;
    }
}