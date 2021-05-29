<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mestorezervisanopodanu
 *
 * @ORM\Table(name="mestorezervisanopodanu", indexes={@ORM\Index(name="fk_MestoRezervisanoPoDanu_Mesto1_idx", columns={"IdMesta"})})
 * @ORM\Entity
 */
class Mestorezervisanopodanu
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMestoRezervisanoPoDanu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmestorezervisanopodanu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Datum", type="date", nullable=true)
     */
    private $datum;

    /**
     * @var int|null
     *
     * @ORM\Column(name="BrojRezervisanih", type="integer", nullable=true)
     */
    private $brojrezervisanih;

    /**
     * @var \App\Models\Entities\Mesto
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Mesto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdMesta", referencedColumnName="idMesta")
     * })
     */
    private $idmesta;



    /**
     * Get idmestorezervisanopodanu.
     *
     * @return int
     */
    public function getIdmestorezervisanopodanu()
    {
        return $this->idmestorezervisanopodanu;
    }

    /**
     * Set datum.
     *
     * @param \DateTime|null $datum
     *
     * @return Mestorezervisanopodanu
     */
    public function setDatum($datum = null)
    {
        $this->datum = $datum;

        return $this;
    }

    /**
     * Get datum.
     *
     * @return \DateTime|null
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * Set brojrezervisanih.
     *
     * @param int|null $brojrezervisanih
     *
     * @return Mestorezervisanopodanu
     */
    public function setBrojrezervisanih($brojrezervisanih = null)
    {
        $this->brojrezervisanih = $brojrezervisanih;

        return $this;
    }

    /**
     * Get brojrezervisanih.
     *
     * @return int|null
     */
    public function getBrojrezervisanih()
    {
        return $this->brojrezervisanih;
    }

    /**
     * Set idmesta.
     *
     * @param \App\Models\Entities\Mesto|null $idmesta
     *
     * @return Mestorezervisanopodanu
     */
    public function setIdmesta(\App\Models\Entities\Mesto $idmesta = null)
    {
        $this->idmesta = $idmesta;

        return $this;
    }

    /**
     * Get idmesta.
     *
     * @return \App\Models\Entities\Mesto|null
     */
    public function getIdmesta()
    {
        return $this->idmesta;
    }
}
