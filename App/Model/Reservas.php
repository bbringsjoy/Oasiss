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
class Reservas
{
    #[Column, Id, GeneratedValue]
    private int $id_reservas;

    
    #[ManyToOne(targetEntity: Imoveis::class)]
    #[JoinColumn(name: 'imovel_id', referencedColumnName: 'id_imoveis')]
    private Imoveis $imovel;

    
    #[ManyToOne(targetEntity: Usuarios::class)]
    #[JoinColumn(name: 'id_hospede', referencedColumnName: 'id_usuarios')]
    private Usuarios $hospede;

    #[Column(name: 'data_checkin')]
    private DateTime $dataCheckin;

    #[Column(name: 'data_checkout')]
    private DateTime $dataCheckout;

    
    #[Column(name: 'valor_total', type: 'decimal', precision: 10, scale: 2)]
    private string $valorTotal;

    #[Column(name: 'status_reserva')]
    private string $statusReserva; // 'Pendente', 'Confirmada', 'Cancelada'

    public function __construct(Imoveis $imovel, Usuarios $hospede, DateTime $dataCheckin, DateTime $dataCheckout, string $valorTotal, string $statusReserva)
    {
        $this->imovel = $imovel;
        $this->hospede = $hospede;
        $this->dataCheckin = $dataCheckin;
        $this->dataCheckout = $dataCheckout;
        $this->valorTotal = $valorTotal;
        $this->statusReserva = $statusReserva;
    }

    public function getIdReservas(): int
    {
        return $this->id_reservas;
    }

    public function getImovel(): Imoveis
    {
        return $this->imovel;
    }

    public function getHospede(): Usuarios
    {
        return $this->hospede;
    }

    public function getStatusReserva(): string
    {
        return $this->statusReserva;
    }
}