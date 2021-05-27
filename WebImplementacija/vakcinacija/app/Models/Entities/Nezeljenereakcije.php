<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nezeljenereakcije
 *
 * @ORM\Table(name="nezeljenereakcije")
 * @ORM\Entity
 */
class Nezeljenereakcije
{
    /**
     * @var int
     *
     * @ORM\Column(name="idNezeljeneReakcije", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnezeljenereakcije;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Naziv", type="string", length=45, nullable=true)
     */
    private $naziv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Opis", type="text", length=0, nullable=true)
     */
    private $opis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Izvestajlekara", mappedBy="nezeljenereakcijeIdnezeljenereakcije")
     */
    private $izvestajlekaraIdizvestaja;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->izvestajlekaraIdizvestaja = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
