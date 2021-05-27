<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mesto
 *
 * @ORM\Table(name="mesto")
 * @ORM\Entity
 */
class Mesto
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMesta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmesta;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Naziv", type="string", length=100, nullable=true)
     */
    private $naziv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Opis", type="text", length=65535, nullable=true)
     */
    private $opis;

    /**
     * @var int|null
     *
     * @ORM\Column(name="DnevnaKolicina", type="integer", nullable=true)
     */
    private $dnevnakolicina;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Gradjanin",mappedBy="idmesta",orphanRemoval=true)
     */
    private $gradjanini;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Mestorezervisanopodanu",mappedBy="idmesta", orphanRemoval=true)
     */
    private $VakcinacijaPoDanu;

    public function __construct()
    {
        $this->gradjanini = new \Doctrine\Common\Collections\ArrayCollection();
        $this->VakcinacijaPoDanu = new \Doctrine\Common\Collections\ArrayCollection();

    }

}
