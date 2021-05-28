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
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Nezeljenereakcije",mappedBy="idnezeljenereakcije")
     */
    private $idnezeljenereakcije;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->nezeljenereakcijeIdnezeljenereakcije = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idizvestaja.
     *
     * @return int
     */
    public function getIdizvestaja()
    {
        return $this->idizvestaja;
    }

    /**
     * Set diagnoza.
     *
     * @param string|null $diagnoza
     *
     * @return Izvestajlekara
     */
    public function setDiagnoza($diagnoza = null)
    {
        $this->diagnoza = $diagnoza;

        return $this;
    }

    /**
     * Get diagnoza.
     *
     * @return string|null
     */
    public function getDiagnoza()
    {
        return $this->diagnoza;
    }

    /**
     * Set idgradjanin.
     *
     * @param \App\Models\Entities\Gradjanin|null $idgradjanin
     *
     * @return Izvestajlekara
     */
    public function setIdgradjanin(\App\Models\Entities\Gradjanin $idgradjanin = null)
    {
        $this->idgradjanin = $idgradjanin;

        return $this;
    }

    /**
     * Get idgradjanin.
     *
     * @return \App\Models\Entities\Gradjanin|null
     */
    public function getIdgradjanin()
    {
        return $this->idgradjanin;
    }

    /**
     * Set idtipvakcine.
     *
     * @param \App\Models\Entities\Tipvakcine|null $idtipvakcine
     *
     * @return Izvestajlekara
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

    /**
     * Set idlekara.
     *
     * @param \App\Models\Entities\Zdravstveniradnici|null $idlekara
     *
     * @return Izvestajlekara
     */
    public function setIdlekara(\App\Models\Entities\Zdravstveniradnici $idlekara = null)
    {
        $this->idlekara = $idlekara;

        return $this;
    }

    /**
     * Get idlekara.
     *
     * @return \App\Models\Entities\Zdravstveniradnici|null
     */
    public function getIdlekara()
    {
        return $this->idlekara;
    }

    /**
     * Add nezeljenereakcijeIdnezeljenereakcije.
     *
     * @param \App\Models\Entities\Nezeljenereakcije $nezeljenereakcijeIdnezeljenereakcije
     *
     * @return Izvestajlekara
     */
    public function addNezeljenereakcijeIdnezeljenereakcije(\App\Models\Entities\Nezeljenereakcije $nezeljenereakcijeIdnezeljenereakcije)
    {
        $this->nezeljenereakcijeIdnezeljenereakcije[] = $nezeljenereakcijeIdnezeljenereakcije;

        return $this;
    }

    /**
     * Remove nezeljenereakcijeIdnezeljenereakcije.
     *
     * @param \App\Models\Entities\Nezeljenereakcije $nezeljenereakcijeIdnezeljenereakcije
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeNezeljenereakcijeIdnezeljenereakcije(\App\Models\Entities\Nezeljenereakcije $nezeljenereakcijeIdnezeljenereakcije)
    {
        return $this->nezeljenereakcijeIdnezeljenereakcije->removeElement($nezeljenereakcijeIdnezeljenereakcije);
    }

    /**
     * Get nezeljenereakcijeIdnezeljenereakcije.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNezeljenereakcijeIdnezeljenereakcije()
    {
        return $this->nezeljenereakcijeIdnezeljenereakcije;
    }

    /**
     * Add idnezeljenereakcije.
     *
     * @param \App\Models\Entities\Nezeljenereakcije $idnezeljenereakcije
     *
     * @return Izvestajlekara
     */
    public function addIdnezeljenereakcije(\App\Models\Entities\Nezeljenereakcije $idnezeljenereakcije)
    {
        $this->idnezeljenereakcije[] = $idnezeljenereakcije;

        return $this;
    }

    /**
     * Remove idnezeljenereakcije.
     *
     * @param \App\Models\Entities\Nezeljenereakcije $idnezeljenereakcije
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIdnezeljenereakcije(\App\Models\Entities\Nezeljenereakcije $idnezeljenereakcije)
    {
        return $this->idnezeljenereakcije->removeElement($idnezeljenereakcije);
    }

    /**
     * Get idnezeljenereakcije.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdnezeljenereakcije()
    {
        return $this->idnezeljenereakcije;
    }
}
