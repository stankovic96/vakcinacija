<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Izvestajlekara
 *
 * @ORM\Table(name="izvestajlekara", indexes={@ORM\Index(name="fk_IzvestajLekara_Gradjanin1_idx", columns={"IdGradjanin"}), @ORM\Index(name="fk_IzvestajLekara_TipVakcine1_idx", columns={"IdTipVakcine"}), @ORM\Index(name="fk_izvestajlekara_zdravstveniradnici1_idx", columns={"idLekara"})})
 * @ORM\Entity
 */
class Izvestajlekara
{
    /**
     * @var int
     *
     * @ORM\Column(name="idIzvestaja", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idizvestaja;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Diagnoza", type="text", length=0, nullable=true)
     */
    private $diagnoza;

    /**
     * @var \App\Models\Entities\Gradjanin
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Gradjanin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdGradjanin", referencedColumnName="JMBG")
     * })
     */
    private $idgradjanin;

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
     * @var \App\Models\Entities\Zdravstveniradnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Zdravstveniradnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLekara", referencedColumnName="idZdravstveniRadnik")
     * })
     */
    private $idlekara;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Nezeljenereakcije", inversedBy="izvestajlekaraIdizvestaja")
     * @ORM\JoinTable(name="izvestajlekaraimanezeljenereakcije",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IzvestajLekara_idIzvestaja", referencedColumnName="idIzvestaja")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="NezeljeneReakcije_idNezeljeneReakcije", referencedColumnName="idNezeljeneReakcije")
     *   }
     * )
     */
    private $nezeljenereakcijeIdnezeljenereakcije;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Nezeljenereakcije" mappedBy="idnezeljenereakcije")
     */
    private $idnezeljenereakcije;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nezeljenereakcijeIdnezeljenereakcije = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
