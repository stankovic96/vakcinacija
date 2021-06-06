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
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Izvestajlekara",mappedBy="idtipvakcine", orphanRemoval=true,cascade={"persist"})
     */
    private $izvestaji;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Pristiglevakcine",mappedBy="idtipvakcine", orphanRemoval=true,cascade={"all"})
     */
    private $pristigleKolicine;

    public function __construct()
    {
        $this->izvestaji = new \Doctrine\Common\Collections\ArrayCollection();
        $this->pristigleKolicine = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idtipvakcine.
     *
     * @return int
     */
    public function getIdtipvakcine()
    {
        return $this->idtipvakcine;
    }

    /**
     * Set naziv.
     *
     * @param string|null $naziv
     *
     * @return Tipvakcine
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
     * @return Tipvakcine
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
     * Set vremedodrugevakcinacije.
     *
     * @param int|null $vremedodrugevakcinacije
     *
     * @return Tipvakcine
     */
    public function setVremedodrugevakcinacije($vremedodrugevakcinacije = null)
    {
        $this->vremedodrugevakcinacije = $vremedodrugevakcinacije;

        return $this;
    }

    /**
     * Get vremedodrugevakcinacije.
     *
     * @return int|null
     */
    public function getVremedodrugevakcinacije()
    {
        return $this->vremedodrugevakcinacije;
    }

    /**
     * Set kolicinavakcinisanih.
     *
     * @param int|null $kolicinavakcinisanih
     *
     * @return Tipvakcine
     */
    public function setKolicinavakcinisanih($kolicinavakcinisanih = null)
    {
        $this->kolicinavakcinisanih = $kolicinavakcinisanih;

        return $this;
    }

    /**
     * Get kolicinavakcinisanih.
     *
     * @return int|null
     */
    public function getKolicinavakcinisanih()
    {
        return $this->kolicinavakcinisanih;
    }

    /**
     * Set brojnezeljenih.
     *
     * @param int|null $brojnezeljenih
     *
     * @return Tipvakcine
     */
    public function setBrojnezeljenih($brojnezeljenih = null)
    {
        $this->brojnezeljenih = $brojnezeljenih;

        return $this;
    }

    /**
     * Get brojnezeljenih.
     *
     * @return int|null
     */
    public function getBrojnezeljenih()
    {
        return $this->brojnezeljenih;
    }

    /**
     * Add izvestaji.
     *
     * @param \App\Models\Entities\Izvestajlekara $izvestaj
     *
     * @return Tipvakcine
     */
    public function addIzvestaji(\App\Models\Entities\Izvestajlekara $izvestaj)
    {
        if(!$this->izvestaji->contains($izvestaj)){

            $this->izvestaji[] = $izvestaj;
            $izvestaj->setIdtipvakcine($this);
        }
        return $this;
    }

    /**
     * Remove izvestaji.
     *
     * @param \App\Models\Entities\Izvestajlekara $izvestaji
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeIzvestaji(\App\Models\Entities\Izvestajlekara $izvestaji)
    {
        return $this->izvestaji->removeElement($izvestaji);
    }

    /**
     * Get izvestaji.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIzvestaji()
    {
        return $this->izvestaji;
    }

    /**
     * Add pristigleKolicine.
     *
     * @param \App\Models\Entities\Pristiglevakcine $pristigleKolicine
     *
     * @return Tipvakcine
     */
    public function addPristigleKolicine(\App\Models\Entities\Pristiglevakcine $pristigleKolicine)
    {
        if(!$this->pristigleKolicine->contains($pristigleKolicine)){
            $this->pristigleKolicine[] = $pristigleKolicine;
            $pristigleKolicine->setIdtipvakcine($this);
        }

        return $this;
    }

    /**
     * Remove pristigleKolicine.
     *
     * @param \App\Models\Entities\Pristiglevakcine $pristigleKolicine
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePristigleKolicine(\App\Models\Entities\Pristiglevakcine $pristigleKolicine)
    {
        if($this->pristigleKolicine->contains($pristigleKolicine)){
            $this->pristigleKolicine->removeElement($pristigleKolicine);
            $pristigleKolicine->setIdtipvakcine(null);
            return true;
        }
        return false;
    }

    /**
     * Get pristigleKolicine.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPristigleKolicine()
    {
        return $this->pristigleKolicine;
    }
}
