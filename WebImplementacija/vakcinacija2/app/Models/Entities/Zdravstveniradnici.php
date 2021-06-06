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
     * @ORM\Column(name="JMBG", type="string", length=13, nullable=true)
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
     * @ORM\OneToMany(targetEntity="App\Models\Entities\Izvestajlekara",mappedBy="idlekara", orphanRemoval=true,cascade={"persist"})
     */
    private $izvestaji;

    public function __construct()
    {
        $this->izvestaji = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idzdravstveniradnik.
     *
     * @return int
     */
    public function getId()
    {
        return $this->idzdravstveniradnik;
    }

    /**
     * Set jmbg.
     *
     * @param string|null $jmbg
     *
     * @return Zdravstveniradnici
     */
    public function setJmbg($jmbg = null)
    {
        $this->jmbg = $jmbg;

        return $this;
    }

    /**
     * Get jmbg.
     *
     * @return string|null
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
     * @return Zdravstveniradnici
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
     * @return Zdravstveniradnici
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
     * Set licenca.
     *
     * @param string|null $licenca
     *
     * @return Zdravstveniradnici
     */
    public function setLicenca($licenca = null)
    {
        $this->licenca = $licenca;

        return $this;
    }

    /**
     * Get licenca.
     *
     * @return string|null
     */
    public function getLicenca()
    {
        return $this->licenca;
    }

    /**
     * Set tipradnika.
     *
     * @param string|null $tipradnika
     *
     * @return Zdravstveniradnici
     */
    public function setTipradnika($tipradnika = null)
    {
        $this->tipradnika = $tipradnika;

        return $this;
    }

    /**
     * Get tipradnika.
     *
     * @return string|null
     */
    public function getTip()
    {
        return $this->tipradnika;
    }

    /**
     * Set specijalizacija.
     *
     * @param string|null $specijalizacija
     *
     * @return Zdravstveniradnici
     */
    public function setSpecijalizacija($specijalizacija = null)
    {
        $this->specijalizacija = $specijalizacija;

        return $this;
    }

    /**
     * Get specijalizacija.
     *
     * @return string|null
     */
    public function getSpecijalizacija()
    {
        return $this->specijalizacija;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Zdravstveniradnici
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
     * @return Zdravstveniradnici
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
     * Add izvestaji.
     *
     * @param \App\Models\Entities\Izvestajlekara $izvestaji
     *
     * @return Zdravstveniradnici
     */
    public function addIzvestaji(\App\Models\Entities\Izvestajlekara $izvestaji)
    {
        if(!$this->izvestaji->contains($izvestaji)){

            $this->izvestaji[] = $izvestaji;
            $izvestaji->setIdlekara($this);
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
}
