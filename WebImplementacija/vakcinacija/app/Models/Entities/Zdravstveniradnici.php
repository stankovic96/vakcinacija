<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zdravstveniradnici
 *
 * @ORM\Table(name="zdravstveniradnici", uniqueConstraints={@ORM\UniqueConstraint(name="username_UNIQUE", columns={"email"})})
 * @ORM\Entity
 */
class Zdravstveniradnici
{
    /**
     * @var int
     *
     * @ORM\Column(name="idZdravstveniRadnik", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idzdravstveniradnik;

    /**
     * @var string|null
     *
     * @ORM\Column(name="JMBG", type="string", length=45, nullable=true)
     */
    private $jmbg;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Ime", type="string", length=45, nullable=true)
     */
    private $ime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Prezime", type="string", length=45, nullable=true)
     */
    private $prezime;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Licenca", type="string", length=45, nullable=true)
     */
    private $licenca;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TipRadnika", type="string", length=0, nullable=true)
     */
    private $tipradnika;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Specijalizacija", type="string", length=100, nullable=true)
     */
    private $specijalizacija;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=512, nullable=true)
     */
    private $password;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Izvestajlekara",mappedBy="idlekara", orphanRemoval=true)
     */
    private $izvestaji;

    public function __construct()
    {
        $this->izvestaji = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
