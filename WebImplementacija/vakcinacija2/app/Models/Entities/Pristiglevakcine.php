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



    /**
     * Get idpristiglevakcine.
     *
     * @return int
     */
    public function getIdpristiglevakcine()
    {
        return $this->idpristiglevakcine;
    }

    /**
     * Set raspolozivakolicina.
     *
     * @param int|null $raspolozivakolicina
     *
     * @return Pristiglevakcine
     */
    public function setRaspolozivakolicina($raspolozivakolicina = null)
    {
        $this->raspolozivakolicina = $raspolozivakolicina;

        return $this;
    }

    /**
     * Get raspolozivakolicina.
     *
     * @return int|null
     */
    public function getRaspolozivakolicina()
    {
        return $this->raspolozivakolicina;
    }

    /**
     * Set rezervisanakolicina.
     *
     * @param int|null $rezervisanakolicina
     *
     * @return Pristiglevakcine
     */
    public function setRezervisanakolicina($rezervisanakolicina = null)
    {
        $this->rezervisanakolicina = $rezervisanakolicina;

        return $this;
    }

    /**
     * Get rezervisanakolicina.
     *
     * @return int|null
     */
    public function getRezervisanakolicina()
    {
        return $this->rezervisanakolicina;
    }

    /**
     * Set rokupotrebe.
     *
     * @param \DateTime|null $rokupotrebe
     *
     * @return Pristiglevakcine
     */
    public function setRokupotrebe($rokupotrebe = null)
    {
        $this->rokupotrebe = $rokupotrebe;

        return $this;
    }

    /**
     * Get rokupotrebe.
     *
     * @return \DateTime|null
     */
    public function getRokupotrebe()
    {
        return $this->rokupotrebe;
    }

    /**
     * Set idtipvakcine.
     *
     * @param \App\Models\Entities\Tipvakcine|null $idtipvakcine
     *
     * @return Pristiglevakcine
     */
    public function setIdtipvakcine(\App\Models\Entities\Tipvakcine $idtipvakcine = null)
    {
        $this->idtipvakcine = $idtipvakcine;

        return $this;
    }

    /**
     * Get idtipvakcine.
     *
     * @return \App\Models\Entities\Tipvakcine|null
     */
    public function getIdtipvakcine()
    {
        return $this->idtipvakcine;
    }
}
