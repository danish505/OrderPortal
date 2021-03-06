<?php

namespace Proxies\__CG__;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class GptHospitalContact extends \GptHospitalContact implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
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
            return ['__isInitialized__', '' . "\0" . 'GptHospitalContact' . "\0" . 'contId', '' . "\0" . 'GptHospitalContact' . "\0" . 'salutation', '' . "\0" . 'GptHospitalContact' . "\0" . 'firstName', '' . "\0" . 'GptHospitalContact' . "\0" . 'middleName', '' . "\0" . 'GptHospitalContact' . "\0" . 'lastName', '' . "\0" . 'GptHospitalContact' . "\0" . 'jobTitle', '' . "\0" . 'GptHospitalContact' . "\0" . 'jobFunction', '' . "\0" . 'GptHospitalContact' . "\0" . 'jobRole', '' . "\0" . 'GptHospitalContact' . "\0" . 'activeFlg', '' . "\0" . 'GptHospitalContact' . "\0" . 'createTs', '' . "\0" . 'GptHospitalContact' . "\0" . 'updateTs', '' . "\0" . 'GptHospitalContact' . "\0" . 'addresses', '' . "\0" . 'GptHospitalContact' . "\0" . 'emails', '' . "\0" . 'GptHospitalContact' . "\0" . 'phone_numbers'];
        }

        return ['__isInitialized__', '' . "\0" . 'GptHospitalContact' . "\0" . 'contId', '' . "\0" . 'GptHospitalContact' . "\0" . 'salutation', '' . "\0" . 'GptHospitalContact' . "\0" . 'firstName', '' . "\0" . 'GptHospitalContact' . "\0" . 'middleName', '' . "\0" . 'GptHospitalContact' . "\0" . 'lastName', '' . "\0" . 'GptHospitalContact' . "\0" . 'jobTitle', '' . "\0" . 'GptHospitalContact' . "\0" . 'jobFunction', '' . "\0" . 'GptHospitalContact' . "\0" . 'jobRole', '' . "\0" . 'GptHospitalContact' . "\0" . 'activeFlg', '' . "\0" . 'GptHospitalContact' . "\0" . 'createTs', '' . "\0" . 'GptHospitalContact' . "\0" . 'updateTs', '' . "\0" . 'GptHospitalContact' . "\0" . 'addresses', '' . "\0" . 'GptHospitalContact' . "\0" . 'emails', '' . "\0" . 'GptHospitalContact' . "\0" . 'phone_numbers'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (GptHospitalContact $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
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
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function preCreate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preCreate', []);

        return parent::preCreate();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompany(\GptCompany $company)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompany', [$company]);

        return parent::setCompany($company);
    }

    /**
     * {@inheritDoc}
     */
    public function getCompany()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompany', []);

        return parent::getCompany();
    }

    /**
     * {@inheritDoc}
     */
    public function setActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActive', []);

        return parent::setActive();
    }

    /**
     * {@inheritDoc}
     */
    public function isActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isActive', []);

        return parent::isActive();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddresses()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddresses', []);

        return parent::getAddresses();
    }

    /**
     * {@inheritDoc}
     */
    public function getEmails()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmails', []);

        return parent::getEmails();
    }

    /**
     * {@inheritDoc}
     */
    public function getPhoneNumbers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhoneNumbers', []);

        return parent::getPhoneNumbers();
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getSalutation()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSalutation', []);

        return parent::getSalutation();
    }

    /**
     * {@inheritDoc}
     */
    public function setSalutation($salutation)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSalutation', [$salutation]);

        return parent::setSalutation($salutation);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', []);

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', []);

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function getMiddleName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMiddleName', []);

        return parent::getMiddleName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', [$firstName]);

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', [$lastName]);

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function setMiddleName($middleName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMiddleName', [$middleName]);

        return parent::setMiddleName($middleName);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisplayName', []);

        return parent::getDisplayName();
    }

    /**
     * {@inheritDoc}
     */
    public function setJobTitle($jobTitle)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJobTitle', [$jobTitle]);

        return parent::setJobTitle($jobTitle);
    }

    /**
     * {@inheritDoc}
     */
    public function getJobTitle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJobTitle', []);

        return parent::getJobTitle();
    }

    /**
     * {@inheritDoc}
     */
    public function setJobFunction($jobFunction)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJobFunction', [$jobFunction]);

        return parent::setJobFunction($jobFunction);
    }

    /**
     * {@inheritDoc}
     */
    public function getJobFunction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJobFunction', []);

        return parent::getJobFunction();
    }

    /**
     * {@inheritDoc}
     */
    public function setJobRole($jobRole)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setJobRole', [$jobRole]);

        return parent::setJobRole($jobRole);
    }

    /**
     * {@inheritDoc}
     */
    public function getJobRole()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJobRole', []);

        return parent::getJobRole();
    }

    /**
     * {@inheritDoc}
     */
    public function toJson()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toJson', []);

        return parent::toJson();
    }

}
