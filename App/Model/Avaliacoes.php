<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use DateTime;

#[Entity]
class Avaliacoes
{
    #[Column, Id, GeneratedValue]
    private int $id_avaliacoes;

    
    #[ManyToOne(targetEntity: Imoveis::class)]
    #[JoinColumn(name: 'imovel_id', referencedColumnName: 'id_imoveis')]
    private Imoveis $imovel;

    
    #[ManyToOne(targetEntity: Usuarios::class)]
    #[JoinColumn(name: 'hospede_id', referencedColumnName: 'id_usuarios')]
    private Usuarios $hospede;

    
    #[Column(name: 'nota', type: 'decimal', precision: 2, scale: 1)]
    private string $nota; 

    #[Column(name: 'comentario', type: 'text')]
    private string $comentario;

    #[Column(name: 'data_avaliacao')]
    private DateTime $dataAvaliacao;

    public function __construct(Imoveis $imovel, Usuarios $hospede, string $nota, string $comentario)
    {
        $this->imovel = $imovel;
        $this->hospede = $hospede;
        $this->nota = $nota;
        $this->comentario = $comentario;
        $this->dataAvaliacao = new DateTime();
    }

    public function getIdAvaliacoes(): int
    {
        return $this->id_avaliacoes;
    }

    public function getImovel(): Imoveis
    {
        return $this->imovel;
    }

    public function getHospede(): Usuarios
    {
        return $this->hospede;
    }

    public function getNota(): string
    {
        return $this->nota;
    }
}