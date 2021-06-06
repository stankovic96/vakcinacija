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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Models\Entities\Izvestajlekara", mappedBy="nezeljenereakcijeIdnezeljenereakcije", cascade = {"persist"})
     */
    private $izvestajlekaraIdizvestaja;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->izvestajlekaraIdizvestaja = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idnezeljenereakcije.
     *
     * @return int
     */
    public function getIdnezeljenereakcije()
    {
        return $this->idnezeljenereakcije;
    }

    /**
     * Set naziv.
     *
     * @param string|null $naziv
     *
     * @return Nezeljenereakcije
     */
    public function setNaziv($naziv = null)
    {
        $this->naziv = $naziv;

        return $this;
    }

    /**
     * Get naziv.
     *
     * @return string|null
     */
    public function getNaziv()
    {
        return $this->naziv;
    }

    /**
     * Set opis.
     *
     * @param string|null $opis
     *
     * @return Nezeljenereakcije
     */
    public function setOpis($opis = null)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis.
     *
     * @return string|null
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Add izvestajlekaraIdizvestaja.
     *
     * @param \App\Models\Entities\Izvestajlekara $izvestajlekaraIdizvestaja
     *
     * @return Nezeljenereakcije
     */
    public function addIzvestajlekaraIdizvestaja(\App\Models\Entities\Izvestajlekara $izvestajlekaraIdizvestaja)
    {
        if(!$this->izvestajlekaraIdizvestaja->contains($izvestajlekaraIdizvestaja)){

            $this->izvestajlekaraIdizvestaja[] = $izvestajlekaraIdizvestaja;
            $izvestajlekaraIdizvestaja->addNezeljenereakcijeIdnezeljenereakcije($this);
        }
        return $this;
    }

    /**
     * Remove izvestajlekaraIdizvestaja.
     *
     * @param \App\Models\Entities\Izvestajlekara $izvestajlekaraIdizvestaja
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIzvestajlekaraIdizvestaja(\App\Models\Entities\Izvestajlekara $izvestajlekaraIdizvestaja)
    {
        return $this->izvestajlekaraIdizvestaja->removeElement($izvestajlekaraIdizvestaja);
    }

    /**
     * Get izvestajlekaraIdizvestaja.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIzvestajlekaraIdizvestaja()
    {
        return $this->izvestajlekaraIdizvestaja;
    }
}
