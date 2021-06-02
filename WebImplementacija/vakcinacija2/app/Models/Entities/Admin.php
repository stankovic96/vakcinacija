<?php

namespace App\Models\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 */
class Admin
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAdmin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadmin;

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
     * @var string|null
     *
     * @ORM\Column(name="ime", type="string", length=45, nullable=true)
     */
    private $ime;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="prezime", type="string", length=45, nullable=true)
     */
    private $prezime;


    /**
     * Get idadmin.
     *
     * @return int
     */
    public function getId()
    {
        return $this->idadmin;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Admin
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
     * @return Admin
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
     * Set ime.
     *
     * @param string|null $ime
     *
     * @return Admin
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
     * @return Admin
     */
    public function setPrezime($prezime = null)
    {
        $this->prezime = $prezime;

        return $this;
    }

    /**
     * Get prezime..
     *
     * @return string|null
     */
    public function getPrezime()
    {
        return $this->prezime;
    }
    
    public function getTip(){
        return "Admin";
    }
}
