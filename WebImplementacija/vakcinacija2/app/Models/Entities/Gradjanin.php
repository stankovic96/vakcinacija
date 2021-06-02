<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gradjanin
 *
 * @ORM\Table(name="gradjanin", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})}, indexes={@ORM\Index(name="fk_Gradjanin_Mesto1_idx", columns={"IdMesta"}), @ORM\Index(name="fk_Gradjanin_TipVakcine_idx", columns={"IdTipVakcine"}), @ORM\Index(name="fk_Gradjanin_ZdravstveniRadnici1_idx", columns={"IdSestraT1"}), @ORM\Index(name="fk_Gradjanin_ZdravstveniRadnici2_idx", columns={"IdSestraT2"})})
 * @ORM\Entity
 */
class Gradjanin
{
    
    /**
     * @var int
     *
     * @ORM\Column(name="idGradjanin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idGradjanin;
    
    /**
     * @var string
     *
     * @ORM\Column(name="JMBG", type="string", length=13, nullable=true)
     */
    private $jmbg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Ime", type="string", length=50, nullable=true)
     */
    private $ime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Prezime", type="string", length=50, nullable=true)
     */
    private $prezime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BrojTelefona", type="string", length=45, nullable=true)
     */
    private $brojtelefona;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresa", type="string", length=150, nullable=true)
     */
    private $adresa;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="Prijava", type="boolean", nullable=true)
     */
    private $prijava;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StatusPrijave", type="string", length=0, nullable=true)
     */
    private $statusprijave;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="TerminT1", type="boolean", nullable=true)
     */
    private $termint1;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DatumT1", type="datetime", nullable=true)
     */
    private $datumt1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StatusT1", type="string", length=0, nullable=true)
     */
    private $statust1;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="TerminT2", type="boolean", nullable=true)
     */
    private $termint2;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DatumT2", type="datetime", nullable=true)
     */
    private $datumt2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="StatusT2", type="string", length=0, nullable=true)
     */
    private $statust2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=512, nullable=true)
     */
    private $password;

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
     *   @ORM\JoinColumn(name="IdSestraT1", referencedColumnName="idZdravstveniRadnik")
     * })
     */
    private $idsestrat1;

    /**
     * @var \App\Models\Entities\Zdravstveniradnici
     *
     * @ORM\ManyToOne(targetEntity="App\Models\Entities\Zdravstveniradnici")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdSestraT2", referencedColumnName="idZdravstveniRadnik")
     * })
     */
    private $idsestrat2;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Izvestajlekara",mappedBy="idgradjanin", orphanRemoval=true)
     */
    private $izvestaji;

    public function __construct()
    {
        $this->izvestaji = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get idGradjanin.
     *
     * @return int
     */
    
    public function getId()
    {
        return $this->idGradjanin;
    }
    
     /**
     * Set jmbg.
     *
     * @param string|null jmbg
     *
     * @return Gradjanin
     */
    public function setJmbg($jmbg = null)
    {
        $this->jmbg = $jmbg;

        return $this;
    }

    /**
     * Get jmbg.
     *
     * @return string
     */
    public function getJmbg()
    {
        return $this->jmbg;
    }
    
    /**
     * Set ime.
     *
     * @param string|null $ime
     *
     * @return Gradjanin
     */
    public function setIme($ime = null)
    {
        $this->ime = $ime;

        return $this;
    }

    /**
     * Get ime.
     *
     * @return string|null
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * Set prezime.
     *
     * @param string|null $prezime
     *
     * @return Gradjanin
     */
    public function setPrezime($prezime = null)
    {
        $this->prezime = $prezime;

        return $this;
    }

    /**
     * Get prezime.
     *
     * @return string|null
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * Set brojtelefona.
     *
     * @param string|null $brojtelefona
     *
     * @return Gradjanin
     */
    public function setBrojtelefona($brojtelefona = null)
    {
        $this->brojtelefona = $brojtelefona;

        return $this;
    }

    /**
     * Get brojtelefona.
     *
     * @return string|null
     */
    public function getBrojtelefona()
    {
        return $this->brojtelefona;
    }

    /**
     * Set adresa.
     *
     * @param string|null $adresa
     *
     * @return Gradjanin
     */
    public function setAdresa($adresa = null)
    {
        $this->adresa = $adresa;

        return $this;
    }

    /**
     * Get adresa.
     *
     * @return string|null
     */
    public function getAdresa()
    {
        return $this->adresa;
    }

    /**
     * Set prijava.
     *
     * @param bool|null $prijava
     *
     * @return Gradjanin
     */
    public function setPrijava($prijava = null)
    {
        $this->prijava = $prijava;

        return $this;
    }

    /**
     * Get prijava.
     *
     * @return bool|null
     */
    public function getPrijava()
    {
        return $this->prijava;
    }

    /**
     * Set statusprijave.
     *
     * @param string|null $statusprijave
     *
     * @return Gradjanin
     */
    public function setStatusprijave($statusprijave = null)
    {
        $this->statusprijave = $statusprijave;

        return $this;
    }

    /**
     * Get statusprijave.
     *
     * @return string|null
     */
    public function getStatusprijave()
    {
        return $this->statusprijave;
    }

    /**
     * Set termint1.
     *
     * @param bool|null $termint1
     *
     * @return Gradjanin
     */
    public function setTermint1($termint1 = null)
    {
        $this->termint1 = $termint1;

        return $this;
    }

    /**
     * Get termint1.
     *
     * @return bool|null
     */
    public function getTermint1()
    {
        return $this->termint1;
    }

    /**
     * Set datumt1.
     *
     * @param \DateTime|null $datumt1
     *
     * @return Gradjanin
     */
    public function setDatumt1($datumt1 = null)
    {
        $this->datumt1 = $datumt1;

        return $this;
    }

    /**
     * Get datumt1.
     *
     * @return \DateTime|null
     */
    public function getDatumt1()
    {
        return $this->datumt1;
    }

    /**
     * Set statust1.
     *
     * @param string|null $statust1
     *
     * @return Gradjanin
     */
    public function setStatust1($statust1 = null)
    {
        $this->statust1 = $statust1;

        return $this;
    }

    /**
     * Get statust1.
     *
     * @return string|null
     */
    public function getStatust1()
    {
        return $this->statust1;
    }

    /**
     * Set termint2.
     *
     * @param bool|null $termint2
     *
     * @return Gradjanin
     */
    public function setTermint2($termint2 = null)
    {
        $this->termint2 = $termint2;

        return $this;
    }

    /**
     * Get termint2.
     *
     * @return bool|null
     */
    public function getTermint2()
    {
        return $this->termint2;
    }

    /**
     * Set datumt2.
     *
     * @param \DateTime|null $datumt2
     *
     * @return Gradjanin
     */
    public function setDatumt2($datumt2 = null)
    {
        $this->datumt2 = $datumt2;

        return $this;
    }

    /**
     * Get datumt2.
     *
     * @return \DateTime|null
     */
    public function getDatumt2()
    {
        return $this->datumt2;
    }

    /**
     * Set statust2.
     *
     * @param string|null $statust2
     *
     * @return Gradjanin
     */
    public function setStatust2($statust2 = null)
    {
        $this->statust2 = $statust2;

        return $this;
    }

    /**
     * Get statust2.
     *
     * @return string|null
     */
    public function getStatust2()
    {
        return $this->statust2;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Gradjanin
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string|null $password
     *
     * @return Gradjanin
     */
    public function setPassword($password = null)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set idmesta.
     *
     * @param \App\Models\Entities\Mesto|null $idmesta
     *
     * @return Gradjanin
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

    /**
     * Set idtipvakcine.
     *
     * @param \App\Models\Entities\Tipvakcine|null $idtipvakcine
     *
     * @return Gradjanin
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
     * Set idsestrat1.
     *
     * @param \App\Models\Entities\Zdravstveniradnici|null $idsestrat1
     *
     * @return Gradjanin
     */
    public function setIdsestrat1(\App\Models\Entities\Zdravstveniradnici $idsestrat1 = null)
    {
        $this->idsestrat1 = $idsestrat1;

        return $this;
    }

    /**
     * Get idsestrat1.
     *
     * @return \App\Models\Entities\Zdravstveniradnici|null
     */
    public function getIdsestrat1()
    {
        return $this->idsestrat1;
    }

    /**
     * Set idsestrat2.
     *
     * @param \App\Models\Entities\Zdravstveniradnici|null $idsestrat2
     *
     * @return Gradjanin
     */
    public function setIdsestrat2(\App\Models\Entities\Zdravstveniradnici $idsestrat2 = null)
    {
        $this->idsestrat2 = $idsestrat2;

        return $this;
    }

    /**
     * Get idsestrat2.
     *
     * @return \App\Models\Entities\Zdravstveniradnici|null
     */
    public function getIdsestrat2()
    {
        return $this->idsestrat2;
    }

    /**
     * Add izvestaji.
     *
     * @param \App\Models\Entities\Izvestajlekara $izvestaji
     *
     * @return Gradjanin
     */
    public function addIzvestaji(\App\Models\Entities\Izvestajlekara $izvestaji)
    {
        $this->izvestaji[] = $izvestaji;

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
    
    public function getTip(){
        return "Gradjanin";
    }
}
