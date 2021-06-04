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
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Gradjanin", mappedBy="idmesta", orphanRemoval=true, cascade ={"persist"})
     */
    private $gradjanini;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Mestorezervisanopodanu", mappedBy="idmesta", orphanRemoval=true)
     */
    private $VakcinacijaPoDanu;

    public function __construct()
    {
        $this->gradjanini = new \Doctrine\Common\Collections\ArrayCollection();
        $this->VakcinacijaPoDanu = new \Doctrine\Common\Collections\ArrayCollection();

    }


    /**
     * Get idmesta.
     *
     * @return int
     */
    public function getIdmesta()
    {
        return $this->idmesta;
    }

    /**
     * Set naziv.
     *
     * @param string|null $naziv
     *
     * @return Mesto
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
     * @return Mesto
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
     * Set dnevnakolicina.
     *
     * @param int|null $dnevnakolicina
     *
     * @return Mesto
     */
    public function setDnevnakolicina($dnevnakolicina = null)
    {
        $this->dnevnakolicina = $dnevnakolicina;

        return $this;
    }

    /**
     * Get dnevnakolicina.
     *
     * @return int|null
     */
    public function getDnevnakolicina()
    {
        return $this->dnevnakolicina;
    }

    /**
     * Add gradjanini.
     *
     * @param \App\Models\Entities\Gradjanin $gradjanini
     *
     * @return Mesto
     */
    public function addGradjanini(\App\Models\Entities\Gradjanin $gradjanini)
    {
         if(!$this->gradjanini->contains($gradjanini)){
            $this->gradjanini[] = $gradjanini;
            $gradjanini->setIdmesta($this);
        }
        
        return $this;
    }

    /**
     * Remove gradjanini.
     *
     * @param \App\Models\Entities\Gradjanin $gradjanini
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGradjanini(\App\Models\Entities\Gradjanin $gradjanini)
    {
        if($this->gradjanini->contains($gradjanini)){
            if($gradjanini->getIdmesta() == $this)
                $gradjanini->setIdmesta(null);
            
            return $this->gradjanini->removeElement($gradjanini);
        }
        
        return false;
    }

    /**
     * Get gradjanini.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGradjanini()
    {
        return $this->gradjanini;
    }

    /**
     * Add vakcinacijaPoDanu.
     *
     * @param \App\Models\Entities\Mestorezervisanopodanu $vakcinacijaPoDanu
     *
     * @return Mesto
     */
    public function addVakcinacijaPoDanu(\App\Models\Entities\Mestorezervisanopodanu $vakcinacijaPoDanu)
    {
        $this->VakcinacijaPoDanu[] = $vakcinacijaPoDanu;

        return $this;
    }

    /**
     * Remove vakcinacijaPoDanu.
     *
     * @param \App\Models\Entities\Mestorezervisanopodanu $vakcinacijaPoDanu
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVakcinacijaPoDanu(\App\Models\Entities\Mestorezervisanopodanu $vakcinacijaPoDanu)
    {
        return $this->VakcinacijaPoDanu->removeElement($vakcinacijaPoDanu);
    }

    /**
     * Get vakcinacijaPoDanu.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVakcinacijaPoDanu()
    {
        return $this->VakcinacijaPoDanu;
    }
}
