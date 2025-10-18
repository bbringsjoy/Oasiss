<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[Entity]
class Locadores
{
    #[Column, Id, GeneratedValue]
    private int $id_locadores;

    #[ManyToOne(targetEntity: Usuarios::class)]
    #[JoinColumn(name: 'usuario_id', referencedColumnName: 'id_usuarios')]
    private Usuarios $usuarios;

    
    #[Column(name: 'cpf', length: 14)]
    private string $cpf;

    public function __construct(Usuarios $usuarios, string $cpf)
    {
        $this->usuarios = $usuarios;
        $this->cpf = $cpf;
    }

    public function getIdLocadores(): int
    {
        return $this->id_locadores;
    }

    public function getUsuarios(): Usuarios
    {
        return $this->usuarios;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}