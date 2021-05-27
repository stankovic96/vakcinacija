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


}
