<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipvakcine
 *
 * @ORM\Table(name="tipvakcine")
 * @ORM\Entity
 */
class Tipvakcine
{
    /**
     * @var int
     *
     * @ORM\Column(name="idTipVakcine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtipvakcine;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Naziv", type="string", length=45, nullable=true)
     */
    private $naziv;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Opis", type="text", length=0, nullable=true, options={"comment"="	"})
     */
    private $opis;

    /**
     * @var int|null
     *
     * @ORM\Column(name="VremeDoDrugeVakcinacije", type="integer", nullable=true)
     */
    private $vremedodrugevakcinacije;

    /**
     * @var int|null
     *
     * @ORM\Column(name="KolicinaVakcinisanih", type="integer", nullable=true)
     */
    private $kolicinavakcinisanih;

    /**
     * @var int|null
     *
     * @ORM\Column(name="BrojNezeljenih", type="integer", nullable=true)
     */
    private $brojnezeljenih;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Izvestajlekara",mappedBy="idtipvakcine", orphanRemoval=true)
     */
    private $izvestaji;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Pristiglevakcine",mappedBy="idtipvakcine", orphanRemoval=true)
     */
    private $pristigleKolicine;

    public function __construct()
    {
        $this->izvestaji = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pristigleKolicine = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
