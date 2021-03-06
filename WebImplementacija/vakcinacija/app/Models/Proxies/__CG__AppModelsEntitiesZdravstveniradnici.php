<?php

namespace App\Models\Proxies\__CG__\App\Models\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Zdravstveniradnici extends \App\Models\Entities\Zdravstveniradnici implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'idzdravstveniradnik', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'jmbg', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'ime', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'prezime', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'licenca', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'tipradnika', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'specijalizacija', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'email', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'password', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'izvestaji'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'idzdravstveniradnik', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'jmbg', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'ime', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'prezime', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'licenca', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'tipradnika', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'specijalizacija', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'email', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'password', '' . "\0" . 'App\\Models\\Entities\\Zdravstveniradnici' . "\0" . 'izvestaji'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Zdravstveniradnici $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdzdravstveniradnik()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdzdravstveniradnik();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdzdravstveniradnik', []);

        return parent::getIdzdravstveniradnik();
    }

    /**
     * {@inheritDoc}
     */
    public function setJmbg($jmbg = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJmbg', [$jmbg]);

        return parent::setJmbg($jmbg);
    }

    /**
     * {@inheritDoc}
     */
    public function getJmbg()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJmbg', []);

        return parent::getJmbg();
    }

    /**
     * {@inheritDoc}
     */
    public function setIme($ime = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIme', [$ime]);

        return parent::setIme($ime);
    }

    /**
     * {@inheritDoc}
     */
    public function getIme()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIme', []);

        return parent::getIme();
    }

    /**
     * {@inheritDoc}
     */
    public function setPrezime($prezime = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPrezime', [$prezime]);

        return parent::setPrezime($prezime);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrezime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPrezime', []);

        return parent::getPrezime();
    }

    /**
     * {@inheritDoc}
     */
    public function setLicenca($licenca = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLicenca', [$licenca]);

        return parent::setLicenca($licenca);
    }

    /**
     * {@inheritDoc}
     */
    public function getLicenca()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLicenca', []);

        return parent::getLicenca();
    }

    /**
     * {@inheritDoc}
     */
    public function setTipradnika($tipradnika = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTipradnika', [$tipradnika]);

        return parent::setTipradnika($tipradnika);
    }

    /**
     * {@inheritDoc}
     */
    public function getTipradnika()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTipradnika', []);

        return parent::getTipradnika();
    }

    /**
     * {@inheritDoc}
     */
    public function setSpecijalizacija($specijalizacija = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSpecijalizacija', [$specijalizacija]);

        return parent::setSpecijalizacija($specijalizacija);
    }

    /**
     * {@inheritDoc}
     */
    public function getSpecijalizacija()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSpecijalizacija', []);

        return parent::getSpecijalizacija();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', [$email]);

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', []);

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', [$password]);

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', []);

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function addIzvestaji(\App\Models\Entities\Izvestajlekara $izvestaji)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addIzvestaji', [$izvestaji]);

        return parent::addIzvestaji($izvestaji);
    }

    /**
     * {@inheritDoc}
     */
    public function removeIzvestaji(\App\Models\Entities\Izvestajlekara $izvestaji)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeIzvestaji', [$izvestaji]);

        return parent::removeIzvestaji($izvestaji);
    }

    /**
     * {@inheritDoc}
     */
    public function getIzvestaji()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIzvestaji', []);

        return parent::getIzvestaji();
    }

}
