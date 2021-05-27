<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pristiglevakcine
 *
 * @ORM\Table(name="pristiglevakcine", indexes={@ORM\Index(name="fk_PristigleVakcine_TipVakcine1_idx", columns={"IdTipVakcine"})})
 * @ORM\Entity
 */
class Pristiglevakcine
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPristigleVakcine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpristiglevakcine;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RaspolozivaKolicina", type="integer", nullable=true)
     */
    private $raspolozivakolicina;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RezervisanaKolicina", type="integer", nullable=true)
     */
    private $rezervisanakolicina;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="RokUpotrebe", type="date", nullable=true)
     */
    private $rokupotrebe;

    /**
     * @var \App\Models\Entities\Tipvakcine
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Tipvakcine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdTipVakcine", referencedColumnName="idTipVakcine")
     * })
     */
    private $idtipvakcine;


}
