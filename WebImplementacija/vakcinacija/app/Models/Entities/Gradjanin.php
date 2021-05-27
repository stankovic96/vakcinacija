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
     * @var string
     *
     * @ORM\Column(name="JMBG", type="string", length=8, nullable=false, options={"fixed"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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

}
