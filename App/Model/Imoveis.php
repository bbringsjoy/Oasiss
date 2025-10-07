<?php

namespace App\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

#[Entity]
class Imoveis
{
    #[Column, Id, GeneratedValue]
    private int $id_imoveis;

    
    #[ManyToOne(targetEntity: Locadores::class)]
    #[JoinColumn(name: 'locador_id', referencedColumnName: 'id_locadores')]
    private Locadores $locador;

    #[Column(name: 'titulo', length: 255)]
    private string $titulo;

    #[Column(name: 'descricao', type: 'text')]
    private string $descricao;

    #[Column(name: 'endereco_completo', length: 500)]
    private string $enderecoCompleto;

    #[Column(name: 'cidade', length: 100)]
    private string $cidade;

    
    #[Column(name: 'preco_diario', type: 'decimal', precision: 10, scale: 2)]
    private string $precoDiario; 

    #[Column(name: 'nm_quartos')]
    private int $nmQuartos;

    #[Column(name: 'nm_banheiros')]
    private int $nmBanheiros;

    #[Column(name: 'max_hospedes')]
    private int $maxHospedes;

   
    #[Column(name: 'nome_foto', length: 255)]
    private string $nomeFoto;


    #[Column(name: 'comodidades', type: 'string', nullable: true)]
    private ?string $comodidades; 

    public function __construct(Locadores $locador, string $titulo, string $descricao, string $enderecoCompleto, string $cidade, string $precoDiario, int $nmQuartos, int $nmBanheiros, int $maxHospedes, string $nomeFoto, ?string $comodidades = null)
    {
        $this->locador = $locador;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->enderecoCompleto = $enderecoCompleto;
        $this->cidade = $cidade;
        $this->precoDiario = $precoDiario;
        $this->nmQuartos = $nmQuartos;
        $this->nmBanheiros = $nmBanheiros;
        $this->maxHospedes = $maxHospedes;
        $this->nomeFoto = $nomeFoto;
        $this->comodidades = $comodidades;
    }

    public function getIdImoveis(): int
    {
        return $this->id_imoveis;
    }

    public function getLocador(): Locadores
    {
        return $this->locador;
    }

    public function getComodidades(): ?string
    {
        return $this->comodidades;
    }

    
}