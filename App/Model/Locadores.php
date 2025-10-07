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
    private Usuarios $usuario;

    
    #[Column(name: 'cpf', length: 14)]
    private string $cpf;

    public function __construct(Usuarios $usuario, string $cpf)
    {
        $this->usuario = $usuario;
        $this->cpf = $cpf;
    }

    public function getIdLocadores(): int
    {
        return $this->id_locadores;
    }

    public function getUsuario(): Usuarios
    {
        return $this->usuario;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
}